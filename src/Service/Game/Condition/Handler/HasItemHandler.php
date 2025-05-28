<?php

namespace App\Service\Game\Condition\Handler;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use Doctrine\ORM\EntityManagerInterface;

class HasItemHandler implements ConditionHandlerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'has_item';
    }

    public function evaluate(Player $player, mixed $value): bool
    {
        $item = $this->entityManager->getRepository(Item::class)->findOneBy(['slug' => $value]);

        return $this->entityManager->getRepository(CharacterItem::class)->findOneBy([
                'character' => $player,
                'item' => $item,
            ]) !== null;
    }
}
