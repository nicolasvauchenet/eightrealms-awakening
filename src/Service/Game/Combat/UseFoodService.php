<?php

namespace App\Service\Game\Combat;

use App\Entity\Character\Character;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Food;
use Doctrine\ORM\EntityManagerInterface;

readonly class UseFoodService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function useItem(Character $player, CharacterItem $characterItem): ?string
    {
        $item = $characterItem->getItem();

        // Vérification de base
        if(!$item instanceof Food) {
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

            return "<span class='text-success'>Vous votre {$item->getName()} et récupérez $amount point" . ($amount > 1 ? 's' : '') . " de santé.</span><br/>";
        }

        return "<span class='text-warning'>Cette nourriture n'a pas d'effet connu.</span><br/>";
    }

    public function deleteItem(CharacterItem $characterItem): void
    {
        $this->entityManager->remove($characterItem);
    }
}
