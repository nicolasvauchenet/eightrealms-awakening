<?php

namespace App\DataFixtures\Riddle\Riddle\BoisDuPendu;

trait ClairiereDeLOublieTrait
{
    const CLAIRIERE_DE_L_OUBLIE_RIDDLES = [
        [
            'name' => 'Fouiller la clairière',
            'thumbnail' => 'img/core/action/search.png',
            'description' => "<p>Quelque chose vous paraît étrange dans ces buissons…</p>",
            'type' => 'search',
            'characteristic' => 'intelligence',
            'difficulty' => 10,
            'repeatOnFailure' => true,
            'successEffects' => [
                'add_characters' => [
                    'theobald-le-gris-murmure',
                ],
            ],
            'failureEffects' => [
                'log' => "<p>Vous ne trouvez rien de particulier, à part quelques crottes de chèvre.</p>",
            ],
            'reference' => 'riddle_clairiere_de_loublie_fouiller',
        ],
    ];
}
