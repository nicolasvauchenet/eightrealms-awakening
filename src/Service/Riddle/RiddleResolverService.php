<?php

namespace App\Service\Riddle;

use App\Entity\Character\Player;
use App\Entity\Riddle\PlayerRiddle;
use App\Entity\Riddle\RiddleTrigger;
use App\Repository\Riddle\PlayerRiddleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Random\RandomException;

class RiddleResolverService
{
    public function __construct(
        private readonly EntityManagerInterface     $entityManager,
        private readonly RiddleEffectApplierService $riddleEffectApplierService,
        private readonly PlayerRiddleRepository     $playerRiddleRepository,
    )
    {
    }

    /**
     * @throws RandomException
     */
    public function resolve(Player $player, RiddleTrigger $riddleTrigger): string
    {
        $playerRiddle = $this->playerRiddleRepository->findOneBy(['player' => $player, 'riddle' => $riddleTrigger->getRiddle()]);
        if(!$playerRiddle) {
            $playerRiddle = (new PlayerRiddle())
                ->setPlayer($player)
                ->setRiddle($riddleTrigger->getRiddle());
        }

        // Jet de caractéristique
        $characteristic = $riddleTrigger->getRiddle()->getCharacteristic();
        $difficulty = $riddleTrigger->getRiddle()->getDifficulty() ?? 0;

        $statValue = $player->getCharacteristicValue($characteristic);
        $roll = random_int(1, 20);
        $total = $roll + $statValue;
        $success = $total >= $difficulty;

        $playerRiddle->setSolved(true)
            ->setSuccess($success);
        $this->entityManager->persist($playerRiddle);

        // Application des effets
        $conditions = $riddleTrigger->getConditions();
        $effects = $success ? $riddleTrigger->getRiddle()->getSuccessEffects() : $riddleTrigger->getRiddle()->getFailureEffects() ?? [];
        $this->riddleEffectApplierService->applyEffects($effects, $player, $conditions);

        // Logs
        $log = $riddleTrigger->getRiddle()->getDescription() . ($success ? $riddleTrigger->getRiddle()->getSuccessEffects()['log'] : $riddleTrigger->getRiddle()->getFailureEffects()['log']);

        return $log;
    }
}
