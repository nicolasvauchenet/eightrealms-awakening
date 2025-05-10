<?php

namespace App\Service\Game\Combat;

use App\Entity\Character\Character;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Food;
use App\Entity\Item\Potion;
use App\Entity\Item\Scroll;

readonly class UseItemService
{
    public function __construct(
        private UsePotionService $usePotionService,
        private UseScrollService $useScrollService,
        private UseFoodService   $useFoodService
    )
    {
    }

    public function useItem(Character $player, CharacterItem $characterItem, ?PlayerCombatEnemy $enemy = null): ?string
    {
        $item = $characterItem->getItem();

        if($item instanceof Potion) {
            return $this->usePotionService->useItem($player, $characterItem);
        }

        if($item instanceof Scroll) {
            return $this->useScrollService->useItem($player, $characterItem, $enemy);
        }

        if($item instanceof Food) {
            return $this->useFoodService->useItem($player, $characterItem);
        }

        return "<span class='text-warning'>Cet objet ne peut pas être utilisé ici.</span><br/>";
    }
}
