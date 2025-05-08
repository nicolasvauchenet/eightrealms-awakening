<?php

namespace App\DataFixtures\Combat\SablesChauds;

use App\Entity\Character\Npc;

trait OasisSansNomTrait
{
    const OASIS_SANS_NOM_COMBATS = [
        // Quêtes
        [
            'name' => 'Le Faux Djinn',
            'picture' => 'img/chapter1/npc/faux-djinn.png',
            'thumbnail' => 'img/chapter1/npc/faux-djinn_thumb.png',
            'description' => "<p>Le vent s’arrête net. Le ciel semble s’assombrir alors que la silhouette drapée s’élève d’un souffle au-dessus du sable. Ses mains tremblent, irradiant une lumière dorée maladive, et ses yeux brillent d’un feu étrange — celui de la folie, ou d’un pouvoir ancien qui ne lui appartient pas.</p><p>Le Faux Djinn vous fixe sans ciller, son rire se mêlant aux vagues de chaleur. Autour de lui, le sable s’élève en spirale, comme prêt à fondre sur quiconque tenterait de briser l’illusion.</p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 3,
                    'status' => 'progress',
                ],
            ],
            'reward' => 'reward_combat_oasis_sans_nom_faux_djinn',
            'victoryDescription' => "<p>Le vent reprend. Le sable retombe. Le Faux Djinn s’effondre, sa main encore crispée sur la fiole brisée. Son regard vacille une dernière fois, comme s’il retrouvait un fragment de lucidité — ou de regret. Dans ses affaires éparpillées, un objet scintille faiblement&nbsp;:&nbsp;un médaillon, orné de symboles oubliés.</p><p>Le désert redevient silencieux. Mais le pouvoir, lui, a changé de main…</p>",
            'defeatDescription' => "<p>Un souffle brûlant vous projette au sol. Le Faux Djinn rit, sa voix se déformant sous l’effet du pouvoir qu’il ne contrôle plus. Le sable vous engloutit presque, et dans un dernier éclair, vous perdez connaissance sous les échos d’un chant ancien…</p>",
            'location' => 'location_zone_oasis_sans_nom',
            'questStep' => 'quest_secondary_la_fiole_perdue_step_3',
            'enemies' => [
                [
                    'enemy' => 'npc_faux_djinn',
                    'enemyClass' => Npc::class,
                ],
            ],
            'reference' => 'combat_oasis_sans_nom_faux_djinn',
        ],
    ];
}
