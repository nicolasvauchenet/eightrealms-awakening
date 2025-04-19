<?php

namespace App\DataFixtures\Spell\Spell;

trait UtileTrait
{
    const UTILE_SPELLS = [
        // Illusion
        [
            'name' => 'Invisibilité',
            'description' => "<p>En activant ce sort, le lanceur devient totalement invisible aux yeux de ses ennemis, lui permettant de se déplacer ou de se repositionner sans être détecté. Essentiel pour les missions d’infiltration ou pour fuir une situation désespérée, l’Invisibilité est aussi utile qu’impressionnante.</p>",
            'type' => 'utile',
            'manaCost' => 15,
            'effect' => 'invisibility',
            'duration' => 1,
            'category' => 'category_illusion',
            'reference' => 'spell_invisibility',
        ],
        [
            'name' => 'Mur de Glace',
            'description' => "<p>Ce sort invoque un mur imposant de glace, bloquant le passage des ennemis et offrant une barrière temporaire. Idéal pour contrôler le champ de bataille, protéger ses alliés ou ralentir les assauts, le Mur de Glace est une solution tactique dans de nombreuses situations.</p>",
            'type' => 'utile',
            'manaCost' => 15,
            'effect' => 'invisibility',
            'duration' => 1,
            'category' => 'category_water',
            'reference' => 'spell_ice_wall',
        ],

        // Nature
        [
            'name' => 'Racines Enchevêtrantes',
            'description' => "<p>En faisant appel à la nature, ce sort fait surgir des racines qui immobilisent les ennemis dans une zone donnée. Ces racines limitent leurs mouvements et leur capacité à riposter, offrant un contrôle inestimable dans les combats chaotiques ou lors de fuites stratégiques.</p>",
            'type' => 'utile',
            'manaCost' => 15,
            'effect' => 'invisibility',
            'duration' => 1,
            'area' => 1,
            'category' => 'category_nature',
            'reference' => 'spell_entangling_roots',
        ],

        // Métamorphose
        [
            'name' => 'Loup',
            'description' => "<p>Ce sort de métamorphose transforme le lanceur en un loup sauvage, augmentant sa vitesse et ses capacités de combat. Idéal pour la chasse, l’exploration ou la fuite, il offre une nouvelle perspective sur le monde et permet de surmonter de nombreux obstacles. Attention cependant, la transformation est temporaire et nécessite une grande concentration.</p>",
            'type' => 'utile',
            'manaCost' => 15,
            'effect' => 'metamorphosis',
            'duration' => 1,
            'category' => 'category_metamorphosis',
            'reference' => 'spell_metamorphosis_wolf',
        ],
    ];
}
