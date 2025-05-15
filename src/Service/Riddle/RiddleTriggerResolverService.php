<?php

namespace App\Service\Riddle;

use App\Entity\Character\Player;
use App\Entity\Riddle\RiddleTrigger;
use App\Repository\Riddle\PlayerRiddleRepository;
use App\Service\Game\Condition\ConditionEvaluatorService;
use Doctrine\ORM\EntityManagerInterface;

readonly class RiddleTriggerResolverService
{
    public function __construct(
        private EntityManagerInterface    $entityManager,
        private PlayerRiddleRepository    $playerRiddleRepository,
        private ConditionEvaluatorService $conditionEvaluator,
    )
    {
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
        foreach($triggers as $trigger) {
            $payload = $trigger->getPayload();
            if(($payload['slug'] ?? null) !== $slug) {
                continue;
            }

            if(!$this->conditionEvaluator->isValid($trigger->getConditions() ?? [], $player)) {
                continue;
            }

            $riddle = $trigger->getRiddle();
            if(!$riddle) {
                continue;
            }

            $playerRiddle = $this->playerRiddleRepository->findOneBy(['player' => $player, 'riddle' => $riddle,]);
            $alreadySolved = $playerRiddle && $playerRiddle->isSolved();
            $wasSuccess = $playerRiddle && $playerRiddle->isSuccess();
            $canRetry = $riddle->isRepeatOnFailure();

            if($alreadySolved && ($wasSuccess || !$canRetry)) {
                continue;
            }

            $riddleTriggers[] = $trigger;
        }

        return $riddleTriggers;
    }
}
