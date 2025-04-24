<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Potion;
use Doctrine\ORM\EntityManagerInterface;

readonly class UsePotionService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function useItem(Player $player, CharacterItem $characterItem): ?string
    {
        $item = $characterItem->getItem();

        // Vérification de base
        if(!$item instanceof Potion) {
            return "<span class='text-warning'>Cet objet ne peut pas être utilisé ici.</span><br/>";
        }

        $target = $item->getTarget();
        $amount = $item->getAmount() ?? 0;

        if($target === 'health') {
            $before = $player->getHealth();
            $after = min($player->getHealthMax(), $before + $amount);
            $player->setHealth($after);

            $this->entityManager->persist($player);
            $this->deleteItem($characterItem);
            $this->entityManager->flush();

            return "<span class='text-success'>Vous buvez une potion de vie et récupérez $amount point" . ($amount > 1 ? 's' : '') . " de santé.</span><br/>";
        }

        if($target === 'mana') {
            $before = $player->getMana();
            $after = min($player->getManaMax(), $before + $amount);
            $player->setMana($after);

            $this->entityManager->persist($player);
            $this->deleteItem($characterItem);
            $this->entityManager->flush();

            return "<span class='text-info'>Vous buvez une potion de mana et récupérez $amount point" . ($amount > 1 ? 's' : '') . " de magie.</span><br/>";
        }

        return "<span class='text-warning'>Cette potion n'a pas d'effet connu.</span><br/>";
    }

    public function deleteItem(CharacterItem $characterItem): void
    {
        $this->entityManager->remove($characterItem);
    }
}
