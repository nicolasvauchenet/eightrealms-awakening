<?php

namespace App\DataFixtures\Character\Profession;

trait TradeTrait
{
    const TRADE_PROFESSIONS = [
        [
            'name' => 'Marchand',
            'type' => 'trade',
            'playable' => false,
            'reference' => 'profession_marchand',
        ],
        [
            'name' => 'Forgeron',
            'type' => 'trade',
            'playable' => false,
            'reference' => 'profession_forgeron',
        ],
        [
            'name' => 'Arcaniste',
            'type' => 'trade',
            'playable' => false,
            'reference' => 'profession_arcaniste',
        ],
        [
            'name' => 'Tavernier',
            'type' => 'trade',
            'playable' => false,
            'reference' => 'profession_tavernier',
        ],
    ];
}
