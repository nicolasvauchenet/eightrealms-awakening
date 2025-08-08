<?php

namespace App\Twig\Components\Game\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Item\CharacterItem;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Quest\QuestStep;
use App\Entity\Screen\CombatScreen;
use App\Service\Character\CharacterBonusService;
use App\Service\Character\CharacterReputationService;
use App\Service\Game\Combat\CastSpellService;
use App\Service\Game\Combat\Effect\CombatEffectService;
use App\Service\Game\Combat\EnemyAttackService;
use App\Service\Game\Combat\FleeService;
use App\Service\Game\Combat\InitiativeService;
use App\Service\Game\Combat\PlayerAttackService;
use App\Service\Game\Combat\UseItemService;
use App\Service\Game\Screen\Cinematic\CinematicScreenService;
use App\Service\Item\CharacterItemService;
use App\Service\Quest\QuestProgressionService;
use App\Service\Quest\QuestSelectorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\Attribute\PreDehydrate;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('CombatScreen', template: 'game/screen/combat/_component/_index.html.twig')]
class CombatComponent extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public string $characterType;

    #[LiveProp(writable: true)]
    public CombatScreen $screen;

    #[LiveProp(writable: true)]
    public PlayerCombat $playerCombat;

    #[LiveProp(writable: true)]
    public string $description = '';

    #[LiveProp]
    public array $roundLogs = [];

    #[LiveProp]
    public string $intro = '';

    #[LiveProp(writable: true)]
    public array $damageBonus = [];

    #[LiveProp(writable: true)]
    public array $defenseBonus = [];

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly InitiativeService $initiativeService,
        private readonly FleeService $fleeService,
        private readonly PlayerAttackService $playerAttackService,
        private readonly EnemyAttackService $enemyAttackService,
        private readonly CastSpellService $castSpellService,
        private readonly UseItemService $useItemService,
        private readonly CharacterItemService $characterItemService,
        private readonly CombatEffectService $combatEffectService,
        private readonly CharacterBonusService $characterBonusService,
        private readonly CinematicScreenService $cinematicScreenService,
        private readonly QuestSelectorService $questService,
        private readonly CharacterReputationService $characterReputationService,
        private readonly QuestProgressionService $questProgressionService,
    ) {
    }

    #[PreDehydrate]
    public function hydrate(): void
    {
        $this->updateBonuses();
    }

    #[PostMount]
    public function postMount(): void
    {
        $this->characterType = 'player';

        $this->playerCombat = $this->entityManager->getRepository(PlayerCombat::class)->findOneBy([
            'player' => $this->character,
            'combat' => $this->screen->getCombat(),
        ]);
        $this->entityManager->refresh($this->playerCombat);

        if (!$this->playerCombat->getTurnOrder()) {
            $order = $this->initiativeService->getTurnOrder($this->playerCombat);
            $this->playerCombat
                ->setTurnOrder($order)
                ->setCurrentRound(1)
                ->setCurrentTurn(0);
            $this->roundLogs = [[]];
            $this->entityManager->persist($this->playerCombat);
            $this->entityManager->flush();
        }

        $this->updateBonuses();

        $this->intro = $this->screen->getCombat()->getDescription()."\n";
        $this->generateDescription();

        $this->advanceUntilPlayerTurn();
    }

    #[LiveAction]
    public function doCombatAction(
        #[LiveArg] string $combatAction,
        #[LiveArg] int $enemyId,
        #[LiveArg] ?string $mode = null,
        #[LiveArg] ?int $characterSpellId = null,
    ): ?RedirectResponse {
        $turnOrder = $this->playerCombat->getTurnOrder();
        $currentTurn = $this->playerCombat->getCurrentTurn();
        $currentEntity = $turnOrder[$currentTurn] ?? null;
        $playerEffects = $this->combatEffectService->getActiveBonusesForTarget($this->playerCombat, $this->character);
        if (!empty($playerEffects['charmed'])) {
            $this->addLog(
                $this->playerCombat->getCurrentRound(),
                "<strong class='text-warning'>Vous êtes sous l’effet d’un charme mental et ne pouvez pas agir ce tour-ci.</strong><br/>"
            );

            $this->playerCombat->setCurrentTurn($currentTurn + 1);
            $this->entityManager->persist($this->playerCombat);
            $this->entityManager->flush();

            return $this->advanceUntilPlayerTurn();
        }

        if (!$currentEntity || $currentEntity['type'] !== 'player' || $currentEntity['id'] !== $this->character->getId(
            )) {
            $this->addLog($this->playerCombat->getCurrentRound(), "<em>Ce n’est pas votre tour&nbsp;!</em>");

            return null;
        }

        if ($combatAction === 'player_attack') {
            $log = $this->playerAttackService->playerAttack(
                $this->character,
                $this->screen->getCombat(),
                $enemyId,
                $mode
            );
            $this->addLog($this->playerCombat->getCurrentRound(), $log);
        } else {
            if ($combatAction === 'cast_spell') {
                $log = $this->castSpellService->cast(
                    $this->character,
                    $this->screen->getCombat(),
                    $enemyId,
                    $characterSpellId
                );
                $this->addLog($this->playerCombat->getCurrentRound(), $log);
            }
        }

        $this->playerCombat->setCurrentTurn($currentTurn + 1);
        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();

        return $this->advanceUntilPlayerTurn();
    }

    #[LiveAction]
    public function useItem(#[LiveArg] int $characterItemId, #[LiveArg] ?int $enemyId = null): ?RedirectResponse
    {
        $turnOrder = $this->playerCombat->getTurnOrder();
        $currentTurn = $this->playerCombat->getCurrentTurn();
        $currentEntity = $turnOrder[$currentTurn] ?? null;

        if (!$currentEntity || $currentEntity['type'] !== 'player' || $currentEntity['id'] !== $this->character->getId(
            )) {
            $this->addLog($this->playerCombat->getCurrentRound(), "<em>Ce n’est pas votre tour&nbsp;!</em>");

            return null;
        }

        $characterItem = $this->entityManager->getRepository(CharacterItem::class)->find($characterItemId);
        $enemy = $enemyId ? $this->entityManager->getRepository(PlayerCombatEnemy::class)->find($enemyId) : null;

        if (!$characterItem || !$characterItem->getItem()) {
            $this->addLog(
                $this->playerCombat->getCurrentRound(),
                "<span class='text-danger'>Objet introuvable.</span>"
            );

            return null;
        }

        $log = $this->useItemService->useItem($this->character, $characterItem, $enemy);
        $this->addLog($this->playerCombat->getCurrentRound(), $log);

        $this->playerCombat->setCurrentTurn($currentTurn + 1);
        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();

        return $this->advanceUntilPlayerTurn();
    }

    #[LiveAction]
    public function flee(): ?RedirectResponse
    {
        if ($this->fleeService->flee($this->playerCombat)) {
            return $this->redirectToRoute('app_game_screen_location', [
                'slug' => $this->character->getCurrentLocation()->getSlug(),
            ]);
        }

        $this->playerCombat->setCurrentTurn($this->playerCombat->getCurrentTurn() + 1);
        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();

        $this->addLog(
            $this->playerCombat->getCurrentRound(),
            "<strong class='text-warning'>Votre tentative de fuite a échoué&nbsp;!</strong><br/>"
        );
        $this->advanceUntilPlayerTurn();

        return $this->advanceUntilPlayerTurn();
    }

    private function updateBonuses(): void
    {
        $activeBonuses = $this->combatEffectService->getActiveBonusesForTarget($this->playerCombat, $this->character);

        $this->damageBonus = [
            'amount' => $activeBonuses['damage'] ?? 0,
            'extra' => $activeBonuses['damage'] > 0,
            'magical' => false,
        ];

        $this->defenseBonus = [
            'amount' => $activeBonuses['defense'] ?? 0,
            'extra' => $activeBonuses['defense'] > 0,
        ];

        $damageBonusItem = $this->characterBonusService->getDamage(
            $this->character,
            $this->playerCombat,
            $this->screen->getType()
        );
        $this->damageBonus['amount'] += $damageBonusItem['amount'];
        $this->damageBonus['extra'] = $damageBonusItem['extra'];

        $defenseBonusItem = $this->characterBonusService->getDefense(
            $this->character,
            $this->playerCombat,
            $this->screen->getType()
        );
        $this->defenseBonus['amount'] += $defenseBonusItem['amount'];
        $this->defenseBonus['extra'] = $defenseBonusItem['extra'];
    }

    private function addLog(int $round, string $message): void
    {
        if (!isset($this->roundLogs[$round - 1])) {
            $this->roundLogs[$round - 1] = [];
        }

        $this->roundLogs[$round - 1][] = $message;
        $this->generateDescription();
    }

    private function generateDescription(): void
    {
        $html = $this->intro;

        foreach ($this->roundLogs as $index => $messages) {
            if (empty($messages)) {
                continue;
            }

            $html .= "<h2>Round ".($index + 1)."</h2>\n<p>\n";
            foreach ($messages as $message) {
                $html .= $message."\n";
            }
            $html .= "</p>\n";
        }

        $this->description = $html;
    }

    private function advanceUntilPlayerTurn(): ?RedirectResponse
    {
        $turnOrder = $this->playerCombat->getTurnOrder();
        $turnCount = count($turnOrder);

        while ($this->playerCombat->getCurrentTurn() < $turnCount) {
            $currentEntity = $turnOrder[$this->playerCombat->getCurrentTurn()];

            if ($currentEntity['type'] === 'enemy') {
                $enemyId = $currentEntity['id'];
                $log = $this->enemyAttackService->enemyAttack($this->playerCombat, $enemyId);
                $this->addLog($this->playerCombat->getCurrentRound(), $log);
                $this->playerCombat->setCurrentTurn($this->playerCombat->getCurrentTurn() + 1);
            } else {
                if ($currentEntity['type'] === 'player' && $currentEntity['id'] === $this->character->getId()) {
                    $playerEffects = $this->combatEffectService->getActiveBonusesForTarget(
                        $this->playerCombat,
                        $this->character
                    );
                    if (!empty($playerEffects['charmed'])) {
                        $this->addLog(
                            $this->playerCombat->getCurrentRound(),
                            "<strong class='text-warning'>Vous êtes sous l’emprise d’un charme et perdez votre tour.</strong><br/>"
                        );
                        $this->playerCombat->setCurrentTurn($this->playerCombat->getCurrentTurn() + 1);
                        continue;
                    }

                    $this->addLog(
                        $this->playerCombat->getCurrentRound(),
                        "<strong>C’est votre tour d'agir…</strong><br/>"
                    );
                    break;
                } else {
                    $this->playerCombat->setCurrentTurn($this->playerCombat->getCurrentTurn() + 1);
                }
            }
        }

        if ($this->playerCombat->getCurrentTurn() >= $turnCount) {
            $redirect = $this->isCombatFinished();
            if ($redirect) {
                return $redirect;
            }

            $this->combatEffectService->tickEffects($this->playerCombat);

            $expiredLogs = $this->combatEffectService->removeExpiredEffects($this->playerCombat);
            foreach ($expiredLogs as $log) {
                $this->addLog($this->playerCombat->getCurrentRound(), $log);
            }

            $this->playerCombat->setCurrentRound($this->playerCombat->getCurrentRound() + 1);
            $this->playerCombat->setCurrentTurn(0);

            $newOrder = $this->initiativeService->getTurnOrder($this->playerCombat);
            $this->playerCombat->setTurnOrder($newOrder);
            $this->roundLogs[] = [];

            return $this->advanceUntilPlayerTurn();
        }

        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();

        return null;
    }

    private function isCombatFinished(): ?RedirectResponse
    {
        if ($this->areAllEnemiesDead()) {
            return $this->handleCombatVictory();
        }

        if ($this->character->getHealth() <= 0) {
            return $this->handleCombatDefeat();
        }

        return null;
    }

    private function areAllEnemiesDead(): bool
    {
        return !$this->playerCombat->getPlayerCombatEnemies()
            ->exists(fn($key, $enemy) => $enemy->getHealth() > 0);
    }

    private function handleCombatVictory(): RedirectResponse
    {
        $this->playerCombat->setStatus('completed');
        $this->entityManager->persist($this->playerCombat);

        $questStep = $this->screen->getCombat()->getQuestStep();
        if ($questStep) {
            $stepsToUnlock = $this->buildQuestStepsToUnlock($questStep);
            $this->questProgressionService->editQuestStepStatus($this->character, $stepsToUnlock);
        }

        $this->entityManager->flush();

        $victoryScreen = $this->cinematicScreenService->getVictoryScreen(
            $this->screen->getCombat(),
            $this->character
        );

        return $this->redirectToRoute('app_game_screen_cinematic', [
            'slug' => $victoryScreen->getSlug(),
        ]);
    }

    private function buildQuestStepsToUnlock(QuestStep $questStep): array
    {
        $steps = [
            [
                'quest' => $questStep->getQuest()->getSlug(),
                'quest_step' => $questStep->getPosition(),
                'status' => 'completed',
            ],
        ];

        $nextStep = $this->questService->getNextQuestStep($questStep);
        while ($nextStep) {
            $playerStep = $this->entityManager->getRepository(PlayerQuestStep::class)
                ->findOneBy(['player' => $this->character, 'questStep' => $nextStep]);

            if (!$playerStep) {
                $steps[] = [
                    'quest' => $questStep->getQuest()->getSlug(),
                    'quest_step' => $nextStep->getPosition(),
                    'status' => 'progress',
                ];
                break;
            }

            if ($playerStep->getStatus() !== 'skipped') {
                break;
            }

            $nextStep = $this->questService->getNextQuestStep($nextStep);
        }

        return $steps;
    }

    private function handleCombatDefeat(): RedirectResponse
    {
        if ($this->character->getFortune() >= 50) {
            $this->character->setFortune($this->character->getFortune() - 50);
            $this->character->setHealth($this->character->getHealthMax());
            $this->character->setMana($this->character->getManaMax());
        } else {
            $this->character->setFortune(0);
            $this->character->setHealth(1);
            $this->character->setMana(0);
        }
        $this->entityManager->persist($this->character);

        $this->playerCombat->setStatus('defeat');
        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();

        $defeatScreen = $this->cinematicScreenService->getDefeatScreen(
            $this->screen->getCombat()->getName(),
            $this->screen->getCombat()->getDefeatDescription(),
            $this->screen->getCombat()->getPicture(),
            $this->character
        );

        return $this->redirectToRoute('app_game_screen_cinematic', [
            'slug' => $defeatScreen->getSlug(),
        ]);
    }
}
