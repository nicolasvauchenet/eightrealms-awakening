<?php

namespace App\Service\Game\Screen\Location;

use App\Entity\Character\Creature;
use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Quest\Quest;
use App\Entity\Quest\QuestStep;
use App\Entity\Screen\LocationScreen;
use App\Event\EnterLocationEvent;
use App\Service\Game\Condition\ConditionEvaluatorService;
use App\Service\Game\Navigation\ExitActionResolver;
use App\Service\Quest\CharacterQuestService;
use App\Service\Riddle\RiddleTriggerResolverService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

readonly class LocationScreenService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ConditionEvaluatorService $conditionEvaluatorService,
        private ExitActionResolver $exitActionResolver,
        private RiddleTriggerResolverService $riddleTriggerResolver,
        private EventDispatcherInterface $eventDispatcher,
        private CharacterQuestService $characterQuestService
    ) {
    }

    public function getScreen(Location $location, Player $player): LocationScreen|RedirectResponse
    {
        $result = $this->conditionEvaluatorService->isValid($location->getConditions(), $player);
        if ($result instanceof RedirectResponse) {
            return $result;
        }

        if ($result === false) {
            throw new \RuntimeException('Accès au lieu refusé sans redirection définie.');
        }

        $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $location]);
        if (!$screen) {
            $screen = (new LocationScreen())
                ->setName($location->getName())
                ->setPicture($location->getPicture())
                ->setDescription($location->getDescription())
                ->setType('location')
                ->setLocation($location);
        }
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        // Entrer dans un lieu peut déclencher une étape de quête
        $this->eventDispatcher->dispatch(new EnterLocationEvent($player->getId(), $screen->getSlug()));

        $this->createScreenActions($screen, $location, $player);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }

    private function createScreenActions(LocationScreen $screen, Location $location, Player $player): void
    {
        $screen->setActions([]);

        $footerActions = [
            'npcs' => [],
            'creatures' => [],
            'riddles' => [],
            'specials' => [],
            'buildings' => [],
            'exit' => [],
        ];

        $combatCharacters = [];

        switch ($location->getType()) {
            case 'location':
            case 'zone':
            case 'building':

                // Combats d'abord : on stocke les ennemis
                foreach ($location->getCombats() ?? [] as $combat) {
                    $conditions = $combat->getConditions();
                    if ($conditions && !$this->conditionEvaluatorService->isValid($conditions, $player)) {
                        continue;
                    }

                    if ($this->riddleTriggerResolver->isCombatLockedByUnsolvedRiddle($player, $combat->getSlug())) {
                        continue;
                    }

                    foreach ($combat->getCombatEnemies() as $CombatEnemy) {
                        $combatCharacters[] = $CombatEnemy->getEnemy()->getSlug();
                    }

                    $footerActions['creatures'][] = [
                        'type' => 'combat',
                        'slug' => $combat->getSlug(),
                        'label' => $combat->getName(),
                        'thumbnail' => $combat->getThumbnail(),
                        'isQuest' => $combat->getQuestStep() ? true : false,
                    ];
                }

                // Interactions personnages
                foreach ($location->getCharacterLocations() as $characterLocation) {
                    $character = $characterLocation->getCharacter();
                    if ($character instanceof Player) {
                        continue;
                    }

                    if (in_array($character->getSlug(), $combatCharacters, true)) {
                        if ($combat->getSlug() !== 'le-campement-gobelin') {
                            continue;
                        } // Éviter les doublons bouton combat + interaction, SAUF pour le campement Gobelin
                    }

                    // --- CONDITIONS sur le CharacterLocation (avec support du 'hidden') ---
                    $conditions = $characterLocation->getConditions();
                    if ($conditions) {
                        $result = $this->conditionEvaluatorService->isValid($conditions, $player);
                        if ($result === false) {
                            continue;
                        }
                        if ($result instanceof RedirectResponse && $result->getTargetUrl() === 'hidden') {
                            continue; // => bouton masqué
                        }
                    }

                    // --- VERROU ENIGME : masquer si l'interaction est liée à une énigme non résolue ---
                    if ($this->riddleTriggerResolver->isInteractionLockedByUnsolvedRiddle(
                        $player,
                        $character->getSlug(),
                        $location->getSlug()
                    )) {
                        continue;
                    }

                    $action = [
                        'type' => 'interaction',
                        'slug' => $character->getSlug(),
                        'label' => $character->getName(),
                        'thumbnail' => $character->getThumbnail(),
                    ];

                    if ($character instanceof Creature) {
                        $footerActions['creatures'][] = $action;
                    } else {
                        $footerActions['npcs'][] = $action;
                    }
                }

                // Cas particulier du refuge
                if ($location->getSlug() === 'le-refuge') {
                    $isTharolInHere = false;
                    $stepConditions = [3, 4, 6, 7, 10];
                    foreach ($stepConditions as $step) {
                        if ($this->characterQuestService->hasQuestStep($player, [
                            'quest' => 'le-gardien-du-refuge',
                            'quest_step' => $step,
                            'status' => 'progress',
                        ])) {
                            $isTharolInHere = true;
                            break;
                        }
                    }

                    if (!$isTharolInHere) {
                        $footerActions['specials'][] = [
                            'type' => 'sleep',
                            'slug' => 'le-refuge',
                            'label' => 'Dormir',
                            'thumbnail' => 'img/core/action/sleep.png',
                        ];
                    }
                }

                // Énigmes
                $riddles = $this->createRiddleActions($location, $player);
                foreach ($riddles as $riddleAction) {
                    $footerActions['riddles'][] = $riddleAction;
                }

                // Bâtiments enfants
                foreach ($location->getChildren() as $childLocation) {
                    if ($childLocation->getType() !== 'building') {
                        continue;
                    }

                    $childResult = $this->conditionEvaluatorService->isValid($childLocation->getConditions(), $player);
                    if ($childResult === false) {
                        continue;
                    }

                    if ($childResult instanceof RedirectResponse && $childResult->getTargetUrl() === 'hidden') {
                        continue;
                    }

                    $footerActions['buildings'][] = [
                        'type' => 'location',
                        'slug' => $childLocation->getSlug(),
                        'label' => $childLocation->getName(),
                        'thumbnail' => $childLocation->getThumbnail(),
                    ];
                }

                // Bouton Exit
                $exitAction = $this->exitActionResolver->getExitAction($screen);
                if ($exitAction) {
                    $footerActions['exit'][] = $exitAction;
                }

                break;
        }

        // Bouton 'Explorer' si aucune action dispo
        $isEmpty = empty($footerActions['npcs']) &&
            empty($footerActions['creatures']) &&
            empty($footerActions['buildings']) &&
            empty($footerActions['riddles']);
        if ($isEmpty) {
            if ($location->getType() === 'location' && $location->getChildren()->count() > 0) {
                $firstChild = $location->getChildren()->first();
                if ($firstChild) {
                    $footerActions['exit'][] = [
                        'type' => 'location',
                        'slug' => $firstChild->getSlug(),
                        'label' => 'Explorer',
                        'thumbnail' => 'img/core/action/walk.png',
                    ];
                }
            }

            if ($location->getType() === 'zone') {
                $parent = $location->getParent();
                if ($parent) {
                    $siblings = $parent->getChildren()->filter(
                        fn(Location $child) => $child->getType() === 'zone'
                    )->getValues();

                    $currentIndex = array_search($location, $siblings, true);
                    $nextZone = null;

                    if ($currentIndex !== false) {
                        $nextIndex = $currentIndex + 1;
                        $nextZone = $siblings[$nextIndex] ?? $siblings[0] ?? null;
                    }

                    if ($nextZone && $nextZone !== $location) {
                        $footerActions['exit'][] = [
                            'type' => 'location',
                            'slug' => $nextZone->getSlug(),
                            'label' => 'Explorer',
                            'thumbnail' => 'img/core/action/walk.png',
                        ];
                    }
                }
            }
        }

        // Nettoyage final
        $cleanFooter = array_filter($footerActions, fn(array $group) => !empty($group));
        if (!empty($cleanFooter)) {
            $screen->setActions(['footer' => $cleanFooter]);
        }
    }

    private function createRiddleActions(Location $location, Player $player): array
    {
        $riddleActions = [];
        $riddleTriggers = $this->riddleTriggerResolver->getAvailableRiddleTriggers(
            'location_screen',
            $location->getSlug(),
            $player
        );
        foreach ($riddleTriggers as $riddleTrigger) {
            $riddleActions[] = [
                'type' => 'riddle',
                'triggerId' => $riddleTrigger->getId(),
                'label' => $riddleTrigger->getRiddle()->getName(),
                'thumbnail' => $riddleTrigger->getRiddle()->getThumbnail() ?? 'img/core/action/search.png',
            ];
        }

        return $riddleActions;
    }
}
