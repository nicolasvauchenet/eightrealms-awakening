<?php

namespace App\DataFixtures\Riddle\Riddle\PortSaintDoux;

trait DocksDeLouestTrait
{
    const DOCKS_DE_L_OUEST_RIDDLES = [
        [
            'name' => 'Chanter sur le port',
            'thumbnail' => 'img/core/action/sing.png',
            'description' => "<p class='text-info'>Vous arpentez le quai en fredonnant la chanson de Myra. D'abord sans trop d'enthousiasme, mais à un moment, l'eau commence à s'agiter. Alors vous chantez un peu plus fort, ",
            'type' => 'search',
            'characteristic' => 'charisma',
            'difficulty' => 8,
            'repeatOnFailure' => true,
            'successEffects' => [
                'add_characters' => [
                    'sirene',
                ],
                'log' => "et vous voyez quelque chose émerger…</p>",
            ],
            'failureEffects' => [
                'log' => "mais rien de plus. Continuez à chanter.</p>",
            ],
            'reference' => 'riddle_docks_de_louest_chanter',
        ],
    ];
}
