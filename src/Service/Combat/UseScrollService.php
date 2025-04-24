<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Scroll;
use Doctrine\ORM\EntityManagerInterface;

readonly class UseScrollService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function useItem(Player $player, CharacterItem $characterItem): ?string
    {
        $item = $characterItem->getItem();

        if(!$item instanceof Scroll) {
            return "<span class='text-warning'>Cet objet ne peut pas être utilisé ici.</span>";
        }

        $effect = $item->getEffect();
        $amount = $item->getAmount() ?? 0;

        switch($effect) {
            case 'fireball':
                // Exemple de log, à adapter selon contexte (zone, ennemi ciblé, etc.)
                $message = "<span class='text-danger'>Vous lancez une boule de feu qui inflige $amount points de dégâts aux ennemis alentour&nbsp;!</span>";
                break;

            case 'shield':
                $message = "<span class='text-primary'>Vous vous entourez d’un bouclier magique (+$amount armure).</span>";
                break;

            default:
                $message = "<span class='text-warning'>Ce parchemin n’a pas d’effet connu.</span>";
                break;
        }

        // Supprimer l’objet une fois utilisé
        $this->deleteItem($characterItem);
        $this->entityManager->flush();

        return $message;
    }

    private function deleteItem(CharacterItem $characterItem): void
    {
        $this->entityManager->remove($characterItem);
    }
}
