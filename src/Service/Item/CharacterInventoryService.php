<?php

namespace App\Service\Item;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use Doctrine\ORM\EntityManagerInterface;

readonly class CharacterInventoryService
{
    public function __construct(
        private EntityManagerInterface $entityManager
    )
    {
    }

    public function addItem(Player $player, string $itemSlug, bool $isQuestItem = false): void
    {
        $item = $this->entityManager->getRepository(Item::class)->findOneBy(['slug' => $itemSlug]);
        if(!$item) {
            return;
        }

        $existing = $this->entityManager->getRepository(CharacterItem::class)->findOneBy([
            'character' => $player,
            'item' => $item,
        ]);

        if($existing) {
            return;
        }

        $characterItem = (new CharacterItem())
            ->setCharacter($player)
            ->setItem($item)
            ->setEquipped(false)
            ->setQuestItem($isQuestItem);

        $this->entityManager->persist($characterItem);
    }

    public function removeItem(Player $player, string $itemSlug): void
    {
        $item = $this->entityManager->getRepository(Item::class)->findOneBy(['slug' => $itemSlug]);
        if(!$item) {
            return;
        }

        $characterItem = $this->entityManager->getRepository(CharacterItem::class)->findOneBy([
            'character' => $player,
            'item' => $item,
        ]);

        if($characterItem) {
            $this->entityManager->remove($characterItem);
        }
    }
}
