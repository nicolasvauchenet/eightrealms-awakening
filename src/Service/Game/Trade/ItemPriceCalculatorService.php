<?php

namespace App\Service\Game\Trade;

use App\Entity\Character\PlayerCharacter;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\PlayerCharacterItem;

class ItemPriceCalculatorService
{
    public function calculatePrice(
        PlayerCharacter                   $playerCharacter,
        CharacterItem|PlayerCharacterItem $playerCharacterItem,
        string                            $mode = 'buy'
    ): int
    {
        $item = $playerCharacterItem->getItem();
        $basePrice = $item->getPrice();

        $reputation = max(-20, min(20, $playerCharacter->getReputation() ?? 0));
        $repCoef = match ($mode) {
            'buy' => 1.0 - ($reputation / 120),
            'sell' => 1.0 + ($reputation / 120),
            default => 1.0,
        };

        $character = $playerCharacter->getCharacter();
        $professionMod = match ($character->getProfession()?->getSlug()) {
            'forgeron' => match ($mode) {
                'buy' => 1.05,
                'sell' => 0.75,
                'repair' => 0.9,
                default => 1.0,
            },
            'arcaniste' => match ($mode) {
                'buy' => 1.05,
                'sell' => 0.75,
                'reload' => 0.9,
                default => 1.0,
            },
            'tavernier' => $mode === 'buy' ? 1.25 : ($mode === 'sell' ? 0.25 : 1.0),
            default => $mode === 'buy' ? 1 : ($mode === 'sell' ? 0.35 : 1.0),
        };

        if($mode === 'repair') {
            $max = $item->getHealthMax();
            $missing = $max - $playerCharacterItem->getHealth();
            $repairCoef = $missing / $max;

            $price = $basePrice * $repCoef * $professionMod * $repairCoef;
        } else if($mode === 'reload') {
            $max = $item->getChargeMax();
            $missing = $max - $playerCharacterItem->getCharge();
            $reloadCoef = $max > 0 ? $missing / $max : 0.0;

            $price = $basePrice * $repCoef * $professionMod * $reloadCoef;
        } else {
            $durabilityCoef = 1.0;
            if(in_array($item->getCategory()->getSlug(), ['arme', 'armure', 'bouclier'])) {
                $health = $playerCharacterItem->getHealth();
                $max = $item->getHealthMax();
                $durabilityCoef = ($max > 0) ? min(1.0, max(0.1, $health / $max)) : 1.0;
            }

            $chargeCoef = 1.0;
            if($item->getCategory()->getSlug() === 'arme-magique' && $item->getChargeMax() > 0) {
                $charge = $playerCharacterItem->getCharge();
                $max = $item->getChargeMax();
                $chargeCoef = $charge > 0 ? $charge / $max : 0.1;
            }

            $price = $basePrice * $repCoef * $professionMod * $durabilityCoef * $chargeCoef;
        }

        return max(1, (int)round($price));
    }
}
