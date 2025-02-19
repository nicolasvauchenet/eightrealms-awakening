<?php

namespace App\Service\Character;

use App\Entity\Character\Character;

readonly class CharacterBonusService
{
    public function getCharacterBonus(Character $character, string $bonusType): array
    {
        $bonus = [
            'amount' => 0,
            'extra' => false,
        ];

        $bonusMapping = [
            'damage' => ['arme', 'arc', 'anneau', 'amulette'],
            'magicalDamage' => ['arme-magique'],
            'defense' => ['armure', 'bouclier', 'anneau', 'amulette'],
            'health' => ['armure', 'bouclier', 'anneau', 'amulette'],
            'mana' => ['armure', 'bouclier', 'anneau', 'amulette'],
        ];

        foreach($character->getCharacterItems() as $characterItem) {
            if(!$characterItem->isEquipped()) {
                continue;
            }

            $item = $characterItem->getItem();
            $categorySlug = $item->getCategory()->getSlug();
            $itemTarget = method_exists($item, 'getTarget') ? $item->getTarget() : null;
            $itemAmount = method_exists($item, 'getAmount') ? $item->getAmount() : 0;

            if(in_array($categorySlug, $bonusMapping[$bonusType] ?? [])) {
                if($bonusType === 'magicalDamage') {
                    if($itemTarget === 'health' && $item->getType() === 'Offensif') {
                        $bonus['amount'] += $itemAmount;
                    }
                } else {
                    if($bonusType === 'damage' && method_exists($item, 'getDamage')) {
                        $bonus['amount'] += $item->getDamage();
                    } else if($bonusType === 'defense' && method_exists($item, 'getDefense')) {
                        $bonus['amount'] += $item->getDefense();
                    }
                }
            }

            if(!in_array($categorySlug, ['arme-magique', 'potion', 'parchemin']) && $itemTarget === $bonusType) {
                $bonus['amount'] += $itemAmount;
                $bonus['extra'] = true;
            }
        }

        return $bonus;
    }
}
