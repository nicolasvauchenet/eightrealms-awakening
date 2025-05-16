<?php

namespace App\DataFixtures\Riddle\Riddle\BoisDuPendu;

trait ClairiereDeLOublieTrait
{
    const CLAIRIERE_DE_L_OUBLIE_RIDDLES = [
        [
            'name' => 'Fouiller la clairière',
            'thumbnail' => 'img/core/action/search.png',
            'description' => "<p class='text-info'>Quelque chose semble bouger dans les buissons… ",
            'type' => 'search',
            'characteristic' => 'intelligence',
            'difficulty' => 10,
            'repeatOnFailure' => true,
            'successEffects' => [
                'add_characters' => [
                    'theobald-le-gris-murmure',
                ],
                'log' => "un vieillard se cachait et vous observait&nbsp;!</p>",
            ],
            'failureEffects' => [
                'log' => "mais vous ne voyez rien de particulier, à part quelques crottes de chèvre.</p>",
            ],
            'reference' => 'riddle_clairiere_de_loublie_fouiller',
        ],
    ];
}
