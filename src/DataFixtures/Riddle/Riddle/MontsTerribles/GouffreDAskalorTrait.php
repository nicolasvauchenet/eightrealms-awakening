<?php

namespace App\DataFixtures\Riddle\Riddle\MontsTerribles;

trait GouffreDAskalorTrait
{
    const GOUFFRE_D_ASKALOR_RIDDLES = [
        [
            'name' => 'Fouiller le refuge',
            'thumbnail' => 'img/core/action/search.png',
            'description' => "<p class='text-info'>Vous fouillez un peu partout autour du trou… ",
            'type' => 'search',
            'characteristic' => 'intelligence',
            'difficulty' => 10,
            'repeatOnFailure' => true,
            'successEffects' => [
                'add_items' => [
                    [
                        'item' => 'journal-de-tharol',
                        'quantity' => 1,
                        'questItem' => true,
                    ],
                ],
                'log' => "et vous découvrez un vieux journal moisi, probablement abandonné ou perdu entre deux pierres humides.</p>",
            ],
            'failureEffects' => [
                'log' => "mais vous ne trouvez rien de particulier, hormis de vieux os inquiétants.</p>",
            ],
            'reference' => 'riddle_gouffre_daskalor_fouiller',
        ],
    ];
}
