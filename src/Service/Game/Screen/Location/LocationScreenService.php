<?php

namespace App\Service\Game\Screen\Location;

use App\Entity\Character\Creature;
use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Screen\LocationScreen;
use App\Service\Game\Condition\ConditionEvaluatorService;
use App\Service\Game\Navigation\ExitActionResolver;
use App\Service\Riddle\RiddleTriggerResolverService;
use Doctrine\ORM\EntityManagerInterface;

readonly class LocationScreenService
{
    public function __construct(private EntityManagerInterface       $entityManager,
                                private ConditionEvaluatorService    $conditionEvaluatorService,
                                private ExitActionResolver           $exitActionResolver,
                                private RiddleTriggerResolverService $riddleTriggerResolver,)
    {
    }

    public function getScreen(Location $location, Player $player): LocationScreen
    {
        $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $location]);
        if(!$screen) {
            $screen = (new LocationScreen())
                ->setName($location->getName())
                ->setPicture($location->getPicture())
                ->setDescription($location->getDescription())
                ->setType('location')
                ->setLocation($location);
        }

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
            'buildings' => [],
            'riddles' => [],
            'exit' => [],
        ];

        switch($location->getType()) {
            case 'location':
            case 'zone':
            case 'building':
                foreach($location->getCharacterLocations() as $characterLocation) {
                    $character = $characterLocation->getCharacter();
                    if($character instanceof Player) {
                        continue;
                    }

                    $conditions = $characterLocation->getConditions();
                    if($conditions && !$this->conditionEvaluatorService->isValid($conditions, $player)) {
                        continue;
                    }

                    $action = [
                        'type' => 'interaction',
                        'slug' => $character->getSlug(),
                        'label' => $character->getName(),
                        'thumbnail' => $character->getThumbnail(),
                    ];

                    if($character instanceof Creature) {
                        $footerActions['creatures'][] = $action;
                    } else {
                        $footerActions['npcs'][] = $action;
                    }
                }

                foreach($location->getCombats() ?? [] as $combat) {
                    $conditions = $combat->getConditions();
                    if($conditions && !$this->conditionEvaluatorService->isValid($conditions, $player)) {
                        continue;
                    }

                    if($this->riddleTriggerResolver->isCombatLockedByUnsolvedRiddle($player, $combat->getSlug())) {
                        continue;
                    }

                    $footerActions['creatures'][] = [
                        'type' => 'combat',
                        'slug' => $combat->getSlug(),
                        'label' => $combat->getName(),
                        'thumbnail' => $combat->getThumbnail(),
                        'isQuest' => $combat->getQuestStep() ? true : false,
                    ];
                }

                foreach($location->getChildren() as $childLocation) {
                    if($childLocation->getType() === 'building') {
                        $footerActions['buildings'][] = [
                            'type' => 'location',
                            'slug' => $childLocation->getSlug(),
                            'label' => $childLocation->getName(),
                            'thumbnail' => $childLocation->getThumbnail(),
                        ];
                    }
                }

                // Énigmes
                $riddles = $this->createRiddleActions($location, $player);
                foreach($riddles as $riddleAction) {
                    $footerActions['riddles'][] = $riddleAction;
                }

                // Exit
                $exitAction = $this->exitActionResolver->getExitAction($screen);
                if($exitAction) {
                    $footerActions['exit'][] = $exitAction;
                }

                break;
        }

        // Bouton 'Explorer' si aucune action n'est possible
        $isEmpty = empty($footerActions['npcs']) &&
            empty($footerActions['creatures']) &&
            empty($footerActions['buildings']) &&
            empty($footerActions['riddles']);
        if($isEmpty) {
            if($location->getType() === 'location' && $location->getChildren()->count() > 0) {
                $firstChild = $location->getChildren()->first();
                if($firstChild) {
                    $footerActions['exit'][] = [
                        'type' => 'location',
                        'slug' => $firstChild->getSlug(),
                        'label' => 'Explorer',
                        'thumbnail' => 'img/core/action/walk.png',
                    ];
                }
            }

            if($location->getType() === 'zone') {
                $parent = $location->getParent();
                if($parent) {
                    $siblings = $parent->getChildren()->filter(
                        fn(Location $child) => $child->getType() === 'zone'
                    )->getValues();

                    $currentIndex = array_search($location, $siblings, true);
                    $nextZone = null;

                    if($currentIndex !== false) {
                        $nextIndex = $currentIndex + 1;
                        $nextZone = $siblings[$nextIndex] ?? $siblings[0] ?? null;
                    }

                    if($nextZone && $nextZone !== $location) {
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

        // Ne pas injecter de section vide
        $cleanFooter = array_filter($footerActions, fn(array $group) => !empty($group));
        if(!empty($cleanFooter)) {
            $screen->setActions(['footer' => $cleanFooter]);
        }
    }

    private function createRiddleActions(Location $location, Player $player): array
    {
        $riddleActions = [];
        $riddleTriggers = $this->riddleTriggerResolver->getAvailableRiddleTriggers('location_screen', $location->getSlug(), $player);
        foreach($riddleTriggers as $riddleTrigger) {
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
