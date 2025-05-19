<?php

namespace App\DataFixtures\Riddle\Riddle\BoisDuPendu;

trait CriqueDuPenduTrait
{
    const CRIQUE_DU_PENDU_RIDDLES = [
        [
            'name' => 'Fouiller la crique',
            'thumbnail' => 'img/core/action/search.png',
            'description' => "<p class='text-info'>Vous examinez chaque recoin, chaque pierre, et vous vous arrêtez sur une vieille corde, accrochée à une branche. ",
            'type' => 'search',
            'characteristic' => 'intelligence',
            'difficulty' => 10,
            'repeatOnFailure' => true,
            'successEffects' => [
                'add_characters' => [
                    'gerome-le-pendu',
                ],
                'log' => "Vous souvenant des paroles du nomade, vous posez votre main sur le sol, juste en-dessous. L'air se trouble, se refroidit brutalement… Une forme spectrale apparaît devant vous.</p>",
            ],
            'failureEffects' => [
                'log' => " Vous la tirez doucement, et un bruit de craquement résonne dans l'air. Mais rien d'autre.</p>",
            ],
            'reference' => 'riddle_crique_du_pendu_fouiller',
        ],
    ];
}
