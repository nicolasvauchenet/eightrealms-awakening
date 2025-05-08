<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait SireneDesDocksDeLOuestTrait
{
    const SIRENE_DES_DOCKS_DE_L_OUEST_DIALOG_STEPS = [
        // Quête : La Sirène et le Marin
        [
            'text' => "<p>La Sirène, blessée, vous observe sans colère. Sa voix, lorsqu’elle s’élève, semble flotter au bord du silence.</p><p><em>Le serment fut brisé sous une lune sans reflet. Il a laissé derrière lui un éclat… un souvenir oublié sur une plage où le vent chante encore son nom.</em></p><p>Ses yeux se voilent un instant.</p><p><em>Va vers les dunes dorées. Là où les sables brûlent les pieds et les promesses. Cherche la plage des murmures. L’objet y attend… ou bien l’âme qui saura l’entendre.</em></p><p>Elle plonge alors sans un bruit, ne laissant derrière elle qu’un frisson sur les vagues.</p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 2,
                    'status' => 'completed',
                ],
                'reveal_location' => 'sables-chauds',
            ],
            'dialog' => 'quest_sirene_des_docks_de_louest',
            'reference' => 'quest_step_sirene_des_docks_de_louest_1',
        ],
        [
            'text' => "<p>La sirène regarde fixement le médaillon que vous lui brandissez. Elle semble hésiter un instant, puis elle se redresse, la voix tremblante.</p><p><em>Il est là. Le souvenir du serment. La promesse oubliée. Mais il n’est pas venu… C'est terminé.</em></p><p>Elle plonge alors dans l’eau, disparaissant dans les profondeurs, vous laissant le médaillon dans la main.</p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 3,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'remove_item' => 'medaillon-deryl',
                'add_item' => [
                    'slug' => 'medaillon-deryl',
                    'isQuestItem' => false,
                ],
                'end_quest' => 'la-sirene-et-le-marin',
            ],
            'dialog' => 'quest_sirene_des_docks_de_louest',
            'reference' => 'quest_step_sirene_des_docks_de_louest_2',
        ],
    ];
}
