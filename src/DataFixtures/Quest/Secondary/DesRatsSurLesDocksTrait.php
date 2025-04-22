<?php

namespace App\DataFixtures\Quest\Secondary;

trait DesRatsSurLesDocksTrait
{
    const DES_RATS_SUR_LES_DOCKS_QUEST_STEPS = [
        [
            'description' => "<p>J'ai rencontré un passant sur la place du Marché. Il s'appelle Bilo, et il a parlé de rats qui auraient envahi les Anciens Docks de la ville. Il semblerait que ces rats soient plus gros et plus agressifs que la normale.</p><p>Il serait peut-être intéressant de se rendre aux Anciens Docks pour voir de quoi il en retourne.</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_des_rats_sur_les_docks',
            'reference' => 'quest_secondary_des_rats_sur_les_docks_step_1',
        ],
        [
            'description' => "<p>J'ai trouvé les rats et je les ai vaincus. Les autres ont pris la fuite. Je devrais retourner voir Bilo…</p>",
            'position' => 2,
            'last' => true,
            'quest' => 'quest_secondary_des_rats_sur_les_docks',
            'reference' => 'quest_secondary_des_rats_sur_les_docks_step_2',
        ],
    ];
}
