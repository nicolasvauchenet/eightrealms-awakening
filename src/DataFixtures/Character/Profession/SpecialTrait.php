<?php

namespace App\DataFixtures\Character\Profession;

trait SpecialTrait
{
    const SPECIAL_PROFESSIONS = [
        // Personnages
        [
            'name' => 'Mécaniste',
            'type' => 'specialized',
            'playable' => true,
            'reference' => 'profession_mecaniste',
        ],

        // Pnjs
        [
            'name' => 'Prêtre',
            'type' => 'specialized',
            'playable' => false,
            'reference' => 'profession_pretre',
        ],
        [
            'name' => 'Passant',
            'type' => 'specialized',
            'playable' => false,
            'reference' => 'profession_passant',
        ],
        [
            'name' => 'Pêcheur',
            'type' => 'specialized',
            'playable' => false,
            'reference' => 'profession_pecheur',
        ],
        [
            'name' => 'Devineresse',
            'type' => 'specialized',
            'playable' => false,
            'reference' => 'profession_devineresse',
        ],
        [
            'name' => 'Mineur',
            'type' => 'specialized',
            'playable' => false,
            'reference' => 'profession_mineur',
        ],
        [
            'name' => 'Érudit',
            'type' => 'specialized',
            'playable' => false,
            'reference' => 'profession_erudit',
        ],
        [
            'name' => 'Serviteur',
            'type' => 'specialized',
            'playable' => false,
            'reference' => 'profession_serviteur',
        ],
        [
            'name' => 'Notable',
            'type' => 'specialized',
            'playable' => false,
            'reference' => 'profession_notable',
        ],
        [
            'name' => 'Ermite',
            'type' => 'specialized',
            'playable' => false,
            'reference' => 'profession_ermite',
        ],
    ];
}
