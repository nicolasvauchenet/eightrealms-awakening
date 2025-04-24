<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
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

    public function useItem(Player $player, CharacterItem $characterItem): ?string
    {
        $item = $characterItem->getItem();

        if($item instanceof Potion) {
            return $this->usePotionService->useItem($player, $characterItem);
        }

        if($item instanceof Scroll) {
            return $this->useScrollService->useItem($player, $characterItem);
        }

        return "<span class='text-warning'>Cet objet ne peut pas être utilisé ici.</span>";
    }
}
