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
            'description' => "<p>J'ai trouvé une horde de rats avec une espèce de chef à leur tête, et je les ai vaincus. Les autres semblent avoir pris la fuite.</p><p>Je vais retourner voir Bilo.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_des_rats_sur_les_docks',
            'reference' => 'quest_secondary_des_rats_sur_les_docks_step_2',
        ],
        [
            'description' => "<p>Bilo m'a remercié d'avoir débarrassé les Anciens Docks de ces rats. Il m'a même offert une modique récompense, et m'a promis de parler de mes actes autour de lui. C'est bon pour ma réputation, cette quête n'était pas si minable tout compte fait.</p>",
            'position' => 3,
            'last' => true,
            'quest' => 'quest_secondary_des_rats_sur_les_docks',
            'reference' => 'quest_secondary_des_rats_sur_les_docks_step_3',
        ],
    ];
}
