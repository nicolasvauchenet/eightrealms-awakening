<?php

namespace App\Service\Item;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use App\Event\ItemReceivedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

readonly class CharacterInventoryService
{
    public function __construct(private EntityManagerInterface   $entityManager,
                                private EventDispatcherInterface $eventDispatcher)
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
        if($isQuestItem && $existing) {
            return;
        }
        $characterItem = (new CharacterItem())
            ->setCharacter($player)
            ->setItem($item)
            ->setEquipped(false)
            ->setHealth(method_exists($item, 'getHealth') ? $item->getHealth() : 100)
            ->setCharge(method_exists($item, 'getCharge') ? $item->getCharge() : 100)
            ->setQuestItem($isQuestItem);
        $this->entityManager->persist($characterItem);
        $this->entityManager->flush();

        // L'ajout de l'item peut déclencher une étape de la quête principale
        $this->eventDispatcher->dispatch(new ItemReceivedEvent($player->getId(), $item->getSlug()));
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
            $this->entityManager->flush();
        }
    }
}
