<?php

namespace App\DataFixtures\Character\Npc\DonjonDeLAme;

trait AntichambreDuRoiTrait
{
    const ANTICHAMBRE_DU_ROI_NPCS = [
        [
            'name' => 'Prince Alaric',
            'picture' => 'img/chapter1/npc/prince-alaric.png',
            'thumbnail' => 'img/chapter1/npc/prince-alaric_thumb.png',
            'description' => "<p>Fils du roi Galdric III, Alaric a grandi dans l’ombre du trône. Charismatique, audacieux et stratège, il n’a cependant jamais su contenir l’orgueil qui couvait sous ses sourires. Certains le disent inspiré, d'autres… possédé par une ambition noire. Désormais, ses pas résonnent jusqu’aux tréfonds du Donjon de l’Âme, guidés par une obsession que nul ne comprend tout à fait.</p>",
            'strength' => 10,
            'dexterity' => 13,
            'constitution' => 11,
            'wisdom' => 6,
            'intelligence' => 14,
            'charisma' => 16,
            'healthMax' => 110,
            'manaMax' => 70,
            'fortune' => 3000,
            'level' => 3,
            'race' => 'race_humain',
            'profession' => 'profession_notable',
            'reference' => 'npc_prince_alaric',
        ],
    ];
}
