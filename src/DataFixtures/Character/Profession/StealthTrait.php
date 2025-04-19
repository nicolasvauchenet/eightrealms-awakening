<?php

namespace App\DataFixtures\Character\Profession;

trait StealthTrait
{
    const STEALTH_PROFESSIONS = [
        [
            'name' => 'Voleur',
            'type' => 'stealth',
            'playable' => true,
            'reference' => 'profession_voleur',
        ],
        [
            'name' => 'Assassin',
            'type' => 'stealth',
            'playable' => true,
            'reference' => 'profession_assassin',
        ],
    ];
}
