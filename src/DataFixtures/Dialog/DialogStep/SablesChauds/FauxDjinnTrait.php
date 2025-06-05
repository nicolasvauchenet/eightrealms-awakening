<?php

namespace App\DataFixtures\Dialog\DialogStep\SablesChauds;

trait FauxDjinnTrait
{
    const FAUX_DJINN_DIALOG_STEPS = [
        // Quête secondaire : La Fiole Perdue
        [
            'name' => 'Faux Djinn - Rencontre',
            'text' => "<p>L’air se trouble devant vous, comme agité par une chaleur invisible. Au centre de l’oasis, une silhouette se dresse au bord de l’eau, drapée de tissus aux reflets flamboyants. Ses pieds ne semblent pas toucher le sol. Autour de lui, le sable vibre doucement, comme attiré par sa présence. Une odeur de cendres et de pourriture flotte dans l’air.</p><p><em>Je suis le souffle du désert. La flamme du passé. L’éclat de la vérité que vous ne pouvez supporter…</em></p>",
            'first' => true,
            'conditions' => [
                'quest_secondary_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_secondary_faux_djinn',
            'reference' => 'quest_secondary_faux_djinn_1',
        ],
        [
            'name' => 'Faux Djinn - Quête',
            'text' => "<p><em>Ils m’ont appelé voleur. Imposteur. Mais moi seul ai compris. Cette fiole… ce bijou… Ils me parlent, vois-tu&nbsp;? Ils m’ont choisi. Ils me brûlent, oui… mais c’est le prix du savoir&nbsp;!</em></p>",
            'dialog' => 'quest_secondary_faux_djinn',
            'reference' => 'quest_secondary_faux_djinn_2',
        ],
        [
            'name' => 'Faux Djinn - Accepter la quête',
            'text' => "<p><em>Tu veux la reprendre&nbsp;? Tu veux éteindre la lumière&nbsp;? Alors viens. Approche. Et embrasse le feu&nbsp;!</em></p>",
            'effects' => [
                'edit_quest_secondary_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 2,
                    'status' => 'completed',
                ],
            ],
            'redirectToCombat' => 'le-faux-djinn',
            'dialog' => 'quest_secondary_faux_djinn',
            'reference' => 'quest_secondary_faux_djinn_3',
        ],
        [
            'name' => 'Faux Djinn - Refuser la quête',
            'text' => "<p>Un ricanement sinistre semble monter du fond de sa gorge.</p><p><em>Tu es raisonnable, à défaut d'être courageux. Ne reviens plus ici, ou l'air que tu expires actuellement sera ton dernier souffle.</em></p>",
            'dialog' => 'quest_secondary_faux_djinn',
            'reference' => 'quest_secondary_faux_djinn_4',
        ],
    ];
}
