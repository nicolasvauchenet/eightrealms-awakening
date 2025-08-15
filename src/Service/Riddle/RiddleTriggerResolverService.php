<?php

namespace App\Service\Riddle;

use App\Entity\Character\Player;
use App\Entity\Riddle\Riddle;
use App\Entity\Riddle\RiddleTrigger;
use App\Repository\Riddle\PlayerRiddleRepository;
use App\Service\Game\Condition\ConditionEvaluatorService;
use Doctrine\ORM\EntityManagerInterface;

class RiddleTriggerResolverService
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly PlayerRiddleRepository $playerRiddleRepository,
        private readonly ConditionEvaluatorService $conditionEvaluator,
        private array $triggersCacheByType = []
    ) {
    }

    /**
     * Renvoie les énigmes disponibles à afficher (bouton) pour un joueur dans un contexte donné
     *
     * @return RiddleTrigger[]
     */
    public function getAvailableRiddleTriggers(string $type, string $slug, Player $player): array
    {
        $riddleTriggers = [];

        $triggers = $this->entityManager->getRepository(RiddleTrigger::class)->findBy(['type' => $type]);
        foreach ($triggers as $trigger) {
            $payload = $trigger->getPayload();
            if (($payload['slug'] ?? null) !== $slug) {
                continue;
            }

            if (!$this->conditionEvaluator->isValid($trigger->getConditions() ?? [], $player)) {
                continue;
            }

            $riddle = $trigger->getRiddle();
            if (!$riddle) {
                continue;
            }

            $playerRiddle = $this->playerRiddleRepository->findOneBy(['player' => $player, 'riddle' => $riddle,]);
            $alreadySolved = $playerRiddle && $playerRiddle->isSolved();
            $wasSuccess = $playerRiddle && $playerRiddle->isSuccess();
            $canRetry = $riddle->isRepeatOnFailure();

            if ($alreadySolved && ($wasSuccess || !$canRetry)) {
                continue;
            }

            $riddleTriggers[] = $trigger;
        }

        return $riddleTriggers;
    }

    public function isCombatLockedByUnsolvedRiddle(Player $player, string $combatSlug): bool
    {
        $triggers = $this->entityManager->getRepository(RiddleTrigger::class)->findBy(['type' => 'location_screen']);

        foreach ($triggers as $trigger) {
            $riddle = $trigger->getRiddle();
            if (!$riddle) {
                continue;
            }

            $effects = $riddle->getSuccessEffects();
            if (!isset($effects['add_combat']) || !in_array($combatSlug, $effects['add_combat'], true)) {
                continue;
            }

            // Check si le player a résolu l'énigme
            $playerRiddle = $this->playerRiddleRepository->findOneBy(['player' => $player, 'riddle' => $riddle]);

            if (!$playerRiddle || !$playerRiddle->isSolved() || !$playerRiddle->isSuccess()) {
                return true;
            }
        }

        return false;
    }

    public function isInteractionLockedByUnsolvedRiddle(
        Player $player,
        string $characterSlug,
        string $locationSlug
    ): bool {
        return $this->isEntityLockedByUnsolvedRiddle(
            player: $player,
            effectKey: 'add_characters',
            entitySlug: $characterSlug,
            type: 'search',
            contextSlug: $locationSlug
        );
    }

    private function isEntityLockedByUnsolvedRiddle(
        Player $player,
        string $effectKey,
        string $entitySlug,
        string $type = 'search',
        ?string $contextSlug = null
    ): bool {
        $hasAtLeastOneUnlockingTrigger = false;

        foreach ($this->getTriggersByType($type) as $trigger) {
            $riddle = $trigger->getRiddle();
            if (!$riddle) {
                continue;
            }

            $payload = $trigger->getPayload();
            if ($contextSlug !== null && ($payload['slug'] ?? null) !== $contextSlug) {
                continue;
            }

            if (!$this->conditionEvaluator->isValid($trigger->getConditions() ?? [], $player)) {
                continue;
            }

            $effects = $riddle->getSuccessEffects() ?? [];

            if (!isset($effects[$effectKey])) {
                continue;
            }

            $list = is_array($effects[$effectKey]) ? $effects[$effectKey] : [$effects[$effectKey]];
            if (!in_array($entitySlug, $list, true)) {
                continue;
            }

            $hasAtLeastOneUnlockingTrigger = true;

            if ($this->playerHasSucceededRiddle($player, $riddle)) {
                return false;
            }
        }

        return $hasAtLeastOneUnlockingTrigger;
    }

    private function playerHasSucceededRiddle(Player $player, Riddle $riddle): bool
    {
        $playerRiddle = $this->playerRiddleRepository->findOneBy([
            'player' => $player,
            'riddle' => $riddle,
        ]);

        return (bool)($playerRiddle && $playerRiddle->isSolved() && $playerRiddle->isSuccess());
    }

    private function getTriggersByType(string $type): array
    {
        if (!isset($this->triggersCacheByType[$type])) {
            $this->triggersCacheByType[$type] = $this->entityManager
                ->getRepository(RiddleTrigger::class)
                ->findBy(['type' => $type]);
        }

        return $this->triggersCacheByType[$type];
    }
}
