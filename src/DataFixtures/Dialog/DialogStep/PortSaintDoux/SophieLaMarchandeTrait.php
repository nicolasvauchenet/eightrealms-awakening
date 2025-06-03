<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait SophieLaMarchandeTrait
{
    const SOPHIE_LA_MARCHANDE_DIALOG_STEPS = [
        // Dialogue normal
        [
            'name' => "Sophie - Dialogue normal",
            'text' => "<p><em>C'est quand même un comble&nbsp;! Nous n'avons plus ni Roi, ni Prince&nbsp;! Mais qu'est-ce qui leur a pris de nous laisser tous seuls comme ça&nbsp;? Qu'est-ce qu'on va devenir, nous autres&nbsp;? Heureusement que le Maire est toujours là…</em></p>",
            'first' => true,
            'dialog' => 'dialog_sophie_la_marchande',
            'reference' => 'dialog_step_sophie_la_marchande_1',
        ],

        // Ragots
        [
            'name' => "Sophie - Rencontre",
            'text' => "<p><em>J'ai hâte de terminer ma journée pour aller au temple&nbsp;! J'ai besoin de prier pour que tout ça se termine bien…</em></p>",
            'first' => true,
            'conditions' => [
                'location_unknown' => 'vieille-ville',
            ],
            'dialog' => 'rumor_sophie_la_marchande',
            'reference' => 'rumor_step_sophie_la_marchande_1',
        ],
        [
            'name' => "Sophie - Vieille Ville",
            'text' => "<p><em>Dans le Quartier de la Vieille Ville, bien sûr&nbsp;! Vous n'avez pas vu la flèche du temple&nbsp;? C'est le plus grand bâtiment de la ville, en plein centre. Vous ne pouvez pas le manquer, il suffit de lever la tête.</em></p>",
            'effects' => [
                'reveal_location' => 'vieille-ville',
            ],
            'dialog' => 'rumor_sophie_la_marchande',
            'reference' => 'rumor_step_sophie_la_marchande_2',
        ],
        [
            'name' => "Sophie - Ragots",
            'text' => "<p><em>Il paraît que le Grand Prêtre fait ses ablutions dans du vin… mais chut&nbsp;!</em></p>",
            'first' => true,
            'conditions' => [
                'location_known' => 'vieille-ville',
            ],
            'dialog' => 'rumor_sophie_la_marchande',
            'reference' => 'rumor_step_sophie_la_marchande_3',
        ],
    ];
}
