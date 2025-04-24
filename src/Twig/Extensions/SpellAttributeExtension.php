<?php

namespace App\Twig\Extensions;

use App\Entity\Spell\CharacterSpell;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SpellAttributeExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_spell_attributes', $this->getSpellAttributes(...)),
        ];
    }

    public function getSpellAttributes(CharacterSpell $characterSpell, ?bool $allInfos = false): array
    {
        $spell = $characterSpell->getSpell();
        $type = $spell->getType();
        $effect = $spell->getEffect();
        $target = $spell->getTarget();
        $area = method_exists($spell, 'getArea') ? $characterSpell->getAreaBonus() + $spell->getArea() : null;
        $duration = method_exists($spell, 'getDuration') ? $characterSpell->getDurationBonus() + $spell->getDuration() : null;

        $attributes = [];

        $add = function(string $icon, string $class, $value = null) use (&$attributes) {
            $attributes[] = [
                'icon' => $icon,
                'class' => $class,
                'amount' => $value,
            ];
        };

        $manaCost = $spell->getManaCost() + $characterSpell->getManaCost();
        $add('game-icons:egg-defense', 'text-third simple', $manaCost);

        if($allInfos && $area > 0) $add('ph:map-pin-area-fill', 'simple', $area);
        if($allInfos && $duration > 0) $add('lsicon:time-two-filled', 'simple', $duration);

        if($type === 'offensive') {
            $add('game-icons:sabers-choc', 'text-fifth', $characterSpell->getAmountBonus() + $spell->getAmount());
        } else if(in_array($type, ['defensive', 'utile'])) {
            if($effect !== null) {
                if($effect === 'invisibility') {
                    $add('ant-design:eye-invisible-filled', 'text-primary', null);
                }
            } else {
                $amount = $characterSpell->getAmountBonus() + $spell->getAmount();
                if($target === 'health') {
                    $add('game-icons:health-potion', 'text-fifth', "$amount");
                } else if($target === 'mana') {
                    $add('game-icons:egg-defense', 'text-third', "$amount");
                } else if($target === 'defense') {
                    $add('game-icons:checked-shield', 'text-primary', "$amount");
                } else if($target === 'damage') {
                    $add('game-icons:crossed-swords', 'text-primary', "$amount");
                }
            }
        }

        return $attributes;
    }
}
