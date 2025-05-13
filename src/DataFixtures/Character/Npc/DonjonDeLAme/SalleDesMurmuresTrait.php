<?php

namespace App\DataFixtures\Character\Npc\DonjonDeLAme;

trait SalleDesMurmuresTrait
{
    const SALLE_DES_MURMURES_NPCS = [
        [
            'name' => 'Galdric III',
            'picture' => 'img/chapter1/npc/roi-galdric.png',
            'thumbnail' => 'img/chapter1/npc/roi-galdric_thumb.png',
            'description' => "<p>Le roi Galdric III n’est plus que l’ombre de lui-même. Jadis souverain respecté du Royaume de l’Île du Nord, il gît désormais, blessé, au fond du Donjon de l’Âme. Sa couronne est ternie, son regard hanté par la trahison… mais dans la profondeur de ses yeux brûle encore une flamme, ténue mais farouche&nbsp;:&nbsp;celle d’un roi qui n’a pas dit son dernier mot.</p>",
            'strength' => 8,
            'dexterity' => 8,
            'constitution' => 4,
            'wisdom' => 15,
            'intelligence' => 14,
            'charisma' => 12,
            'healthMax' => 40,
            'manaMax' => 70,
            'fortune' => 5000,
            'level' => 5,
            'race' => 'race_humain',
            'profession' => 'profession_notable',
            'reference' => 'npc_roi_galdric',
        ],
    ];
}
