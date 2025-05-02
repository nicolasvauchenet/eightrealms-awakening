<?php

namespace App\Twig\Extensions;

use App\Entity\Item\CharacterItem;
use App\Entity\Item\PlayerNpcItem;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ItemAttributeExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_item_attributes', $this->getItemAttributes(...)),
        ];
    }

    public function getItemAttributes(CharacterItem|PlayerNpcItem $characterItem, ?bool $allInfos = false): ?array
    {
        if(in_array($characterItem->getItem()->getCategory()->getSlug(), ['carte', 'cadeau'])) {
            return null;
        }

        $item = $characterItem->getItem();
        $category = $item->getCategory()?->getSlug();
        $type = $item->getType();
        $target = method_exists($item, 'getTarget') ? $item->getTarget() : null;
        $area = method_exists($item, 'getArea') ? $item->getArea() : null;
        $duration = method_exists($item, 'getDuration') ? $item->getDuration() : null;
        $effect = method_exists($item, 'getEffect') ? $item->getEffect() : null;
        $attributes = [];

        $add = function(string $icon, string $class, $value = null) use (&$attributes, $characterItem) {
            $attributes[] = [
                'icon' => $icon,
                'class' => $class,
                'amount' => $value ?? $characterItem->getItem()->getAmount(),
            ];
        };

        if(in_array($category, ['armure', 'bouclier'])) {
            if($target === 'health') $add('game-icons:health-potion', 'text-fifth');
            else if($target === 'mana') $add('game-icons:egg-defense', 'text-third');
            else if($target === 'defense') $add('game-icons:checked-shield', 'text-primary');
            $add('game-icons:checked-shield', 'text-primary', $characterItem->getHealth() <= 0 ? 1 : $item->getDefense());
        } else if($category === 'arme') {
            if($allInfos && $area !== null) $add('ph:map-pin-area-fill', 'simple', $area);
            if($allInfos && $duration !== null) $add('lsicon:time-two-filled', 'simple', $duration);
            if($target === 'damage') $add('game-icons:sabers-choc', 'text-fifth');
            $add('game-icons:crossed-swords', 'text-primary', $characterItem->getHealth() <= 0 ? 1 : $item->getDamage());
        } else if($category === 'arme-magique') {
            if($allInfos && $area !== null) $add('ph:map-pin-area-fill', 'simple', $area);
            if($allInfos && $duration !== null) $add('lsicon:time-two-filled', 'simple', $duration);
            if($type === 'offensive') {
                $add('game-icons:sabers-choc', 'text-fifth');
            } else if($type === 'defensive') {
                if($target === 'health') $add('game-icons:health-potion', 'text-fifth');
                else if($target === 'mana') $add('game-icons:egg-defense', 'text-third');
            }
        } else if(in_array($category, ['potion', 'parchemin', 'anneau', 'amulette'])) {
            if($allInfos && $area !== null) $add('ph:map-pin-area-fill', 'simple', $area);
            if($allInfos && $duration !== null) $add('lsicon:time-two-filled', 'simple', $duration);
            if($type === 'defensive') {
                if($target === 'health') $add('game-icons:health-potion', 'text-fifth');
                else if($target === 'mana') $add('game-icons:egg-defense', 'text-third');
                else if($target === 'defense') $add('game-icons:checked-shield', 'text-primary');
                else if($target === 'damage') $add('game-icons:crossed-swords', 'text-primary');
                else if($target === 'charisma') $add('material-symbols:attribution-sharp', 'text-primary');
            } else if($type === 'offensive') {
                if($target === 'health') $add('game-icons:sabers-choc', 'text-fifth');
                else if($target === 'mana') $add('game-icons:egg-defense', 'text-third');
                else if($target === 'damage') $add('game-icons:crossed-swords', 'text-primary');
            } else if($type === 'utile') {
                $add('entypo:tools', 'text-primary', null);
            }
        } else if($category === 'nourriture') {
            if($effect !== null) {
                if($effect === 'ivresse') {
                    $add('mdi:alcohol', 'text-warning simple', '');
                } else if($effect == 'maladie') {
                    $add('material-symbols:sick', 'text-warning simple', '');
                }
            }
            if($allInfos && $duration !== null) $add('lsicon:time-two-filled', 'simple', $duration);
            $add('game-icons:health-potion', 'text-fifth');
        }

        return $attributes;
    }
}
