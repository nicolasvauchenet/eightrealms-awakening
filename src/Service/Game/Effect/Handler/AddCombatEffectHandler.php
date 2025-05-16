<?php

namespace App\Service\Game\Effect\Handler;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Combat\PlayerCombat;
use App\Service\Game\Player\UpdatePlayerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;

#[AsTaggedItem('riddle_effect.handler')]
readonly class AddCombatEffectHandler implements EffectHandlerInterface
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private UpdatePlayerService    $updatePlayerService)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'add_combat';
    }

    public function apply(Player $player, mixed $value): void
    {
        $values = $value['value'] ?? [];

        $location = $player->getCurrentLocation();
        if(!$location) return;

        foreach($values as $slug) {
            $combat = $this->entityManager->getRepository(Combat::class)->findOneBy(['slug' => $slug]);
            if(!$combat) continue;

            $this->updatePlayerService->updatePlayerCombat($player, $combat);
        }
    }
}
