<?php

namespace App\DataFixtures\Character\Npc\MontsTerribles;

trait RefugeDuBoucBoiteuxTrait
{
    const REFUGE_DU_BOUC_BOITEUX_NPCS = [
        [
            'name' => 'Tharôl le Silencieux',
            'picture' => 'img/chapter1/npc/tharol-le-silencieux.png',
            'thumbnail' => 'img/chapter1/npc/tharol-le-silencieux_thumb.png',
            'description' => "<p>Drapé dans une vieille cape rapiécée, l’homme semble d’abord n’être qu’un vieillard oublié par le monde. Son regard, pourtant, vous cloue sur place. Il est fatigué… mais il vous jauge. Comme s’il lisait dans votre cœur. Il ne parle pas. Il observe. Autour de lui, le silence est total, comme suspendu. Une étrange odeur animale flotte dans l’air. Et vous sentez confusément que ce corps frêle cache quelque chose de plus grand. De plus ancien. De plus dangereux.</p>",
            'strength' => 4,
            'dexterity' => 6,
            'constitution' => 5,
            'wisdom' => 18,
            'intelligence' => 17,
            'charisma' => 12,
            'healthMax' => 20,
            'manaMax' => 60,
            'fortune' => 3,
            'level' => 12,
            'race' => 'race_humain',
            'profession' => 'profession_ermite',
            'reference' => 'npc_tharol_le_silencieux',
        ],
    ];
}
