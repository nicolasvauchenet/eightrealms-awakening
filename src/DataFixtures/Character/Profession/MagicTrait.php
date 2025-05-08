<?php

namespace App\DataFixtures\Character\Profession;

trait MagicTrait
{
    const MAGIC_PROFESSIONS = [
        [
            'name' => 'Mage',
            'type' => 'magical',
            'playable' => true,
            'reference' => 'profession_mage',
        ],
        [
            'name' => 'Druide',
            'type' => 'magical',
            'playable' => true,
            'reference' => 'profession_druide',
        ],
        [
            'name' => 'Ensorceleur',
            'type' => 'magical',
            'playable' => true,
            'reference' => 'profession_ensorceleur',
        ],
    ];
}
