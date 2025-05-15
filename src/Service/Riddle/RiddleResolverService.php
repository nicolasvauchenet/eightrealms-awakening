<?php

namespace App\Service\Riddle;

use App\Entity\Character\Player;
use App\Entity\Riddle\PlayerRiddle;
use App\Entity\Riddle\RiddleTrigger;
use App\Repository\Riddle\PlayerRiddleRepository;
use Doctrine\ORM\EntityManagerInterface;

class RiddleResolverService
{
    public function __construct(
        private readonly EntityManagerInterface     $entityManager,
        private readonly RiddleEffectApplierService $riddleEffectApplierService,
        private readonly PlayerRiddleRepository     $playerRiddleRepository,
    )
    {
    }

    public function resolve(Player $player, RiddleTrigger $riddleTrigger): RiddleResolutionResult
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

        $locationName = $player->getCurrentLocation()?->getName() ?? 'cet endroit';
        $log = '';
        if($riddleTrigger->getRiddle()->getType() === 'search') {
            if($success) {
                $log .= "<p class='text-success'>$locationName cachait bien un secret&nbsp;!</p>";
            } else {
                $log .= "<p class='text-info'>Vous fouillez $locationName mais vous ne trouvez rien d'intéressant.</p>";
            }
        } else {
            $log .= sprintf(
                "<p>Jet de <strong>%s</strong> : <code>%d + %d = %d</code> contre une difficulté de <strong>%d</strong>.</p>",
                ucfirst($characteristic),
                $roll,
                $statValue,
                $total,
                $difficulty
            );
            $log .= $success
                ? "<p><strong class='text-success'>Succès !</strong></p>"
                : "<p><strong class='text-danger'>Échec…</strong></p>";
        }

        return new RiddleResolutionResult($success, $roll, $statValue, $total, $difficulty, $log);
    }
}
