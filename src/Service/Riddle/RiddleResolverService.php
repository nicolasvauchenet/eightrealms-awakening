<?php

namespace App\Service\Riddle;

use App\Entity\Character\Player;
use App\Entity\Riddle\PlayerRiddle;
use App\Entity\Riddle\RiddleTrigger;
use App\Service\Riddle\Resolver\RiddleResolverInterface;
use Doctrine\ORM\EntityManagerInterface;
use Random\RandomException;
use Symfony\Component\DependencyInjection\Attribute\AutowireLocator;

readonly class RiddleResolverService
{
    public function __construct(
        #[AutowireLocator('riddle.resolver')]
        private iterable                   $resolvers,
        private EntityManagerInterface     $entityManager,
        private RiddleEffectApplierService $riddleEffectApplierService,
    )
    {
    }

    /**
     * @throws RandomException
     */
    public function evaluate(Player $player, RiddleTrigger $riddleTrigger): bool
    {
        $riddle = $riddleTrigger->getRiddle();

        if($riddle->getResolverKey()) {
            foreach($this->resolvers as $resolver) {
                if($resolver instanceof RiddleResolverInterface && $resolver->supports($riddle)) {
                    return $resolver->resolve($riddle, $player);
                }
            }
        }

        // fallback stat check
        $characteristic = $riddle->getCharacteristic();
        $difficulty = $riddle->getDifficulty() ?? 0;

        $statValue = $player->getCharacteristicValue($characteristic);
        $roll = random_int(1, 20);
        $total = $roll + $statValue;

        return $total >= $difficulty;
    }

    public function resolve(Player $player, RiddleTrigger $riddleTrigger): string
    {
        $riddle = $riddleTrigger->getRiddle();

        $success = $this->evaluate($player, $riddleTrigger);

        $playerRiddle = $this->entityManager->getRepository(PlayerRiddle::class)->findOneBy([
            'player' => $player,
            'riddle' => $riddle,
        ]) ?? (new PlayerRiddle())->setPlayer($player)->setRiddle($riddle);

        $playerRiddle->setSolved(true)->setSuccess($success);
        $this->entityManager->persist($playerRiddle);
        $this->entityManager->flush();

        $effects = $success ? $riddle->getSuccessEffects() : $riddle->getFailureEffects() ?? [];
        $conditions = $riddleTrigger->getConditions();
        $this->riddleEffectApplierService->applyEffects($effects, $player, $conditions);

        return $riddle->getDescription() . ($effects['log'] ?? '');
    }
}
