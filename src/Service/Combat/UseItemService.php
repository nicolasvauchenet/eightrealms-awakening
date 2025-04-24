<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Potion;
use App\Entity\Item\Scroll;

readonly class UseItemService
{
    public function __construct(
        private UsePotionService $usePotionService,
        private UseScrollService $useScrollService
    )
    {
    }

    public function useItem(Player $player, CharacterItem $characterItem, ?PlayerCombatEnemy $enemy = null): ?string
    {
        $item = $characterItem->getItem();

        if($item instanceof Potion) {
            return $this->usePotionService->useItem($player, $characterItem);
        }

        if($item instanceof Scroll) {
            return $this->useScrollService->useItem($player, $characterItem, $enemy);
        }

        return "<span class='text-warning'>Cet objet ne peut pas être utilisé ici.</span>";
    }
}
