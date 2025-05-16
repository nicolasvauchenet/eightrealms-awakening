<?php

namespace App\DataFixtures\Riddle\Riddle\SablesChauds;

trait PlageDeLaSireneTrait
{
    const PLAGE_DE_LA_SIRENE_RIDDLES = [
        [
            'name' => 'Fouiller la plage',
            'thumbnail' => 'img/core/action/search.png',
            'description' => "<p class='text-info'>Vous creusez dans le sable… ",
            'type' => 'search',
            'characteristic' => 'intelligence',
            'difficulty' => 10,
            'repeatOnFailure' => true,
            'successEffects' => [
                'add_combat' => [
                    'eryl-le-traitre',
                ],
                'log' => "et vous découvrez un squelette à moitié enfoui. Puis un autre. L’un d’eux porte un étrange médaillon autour du cou. Vous approchez la main pour l’attraper…</p>",
            ],
            'failureEffects' => [
                'log' => "mais vous ne trouvez rien de particulier, à part quelques restes de crustacés.</p>",
            ],
            'reference' => 'riddle_plage_de_la_sirene_fouiller',
        ],
    ];
}
