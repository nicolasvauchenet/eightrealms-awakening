<?php

namespace App\DataFixtures\Character\Npc\SablesChauds;

trait OasisSansNomTrait
{
    const OASIS_SANS_NOM_NPCS = [
        // Ennemies
        [
            'name' => 'Faux Djinn',
            'picture' => 'img/chapter1/npc/faux-djinn.png',
            'thumbnail' => 'img/chapter1/npc/faux-djinn_thumb.png',
            'description' => "<p>Une silhouette drapée de voiles soulevés par une brise chaude, les yeux brillants d’un feu surnaturel. Sa voix résonne comme un écho, tantôt calme, tantôt grondante, comme s’il parlait depuis deux plans différents. On devine la silhouette d’un homme derrière le masque… ou ce qu’il en reste.</p>",
            'strength' => 14,
            'dexterity' => 14,
            'constitution' => 12,
            'wisdom' => 8,
            'intelligence' => 10,
            'charisma' => 16,
            'healthMax' => 120,
            'manaMax' => 80,
            'fortune' => 0,
            'level' => 5,
            'race' => 'race_humain',
            'profession' => 'profession_ensorceleur',
            'reference' => 'npc_faux_djinn',
        ],
    ];
}
