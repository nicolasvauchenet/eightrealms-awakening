<?php

namespace App\DataFixtures\Character\Npc\SablesChauds;

trait CampAbandonneTrait
{
    const CAMP_ABANDONNE_NPCS = [
        // Npcs
        [
            'name' => 'Farouk le Nomade',
            'picture' => 'img/chapter1/npc/farouk-le-nomade.png',
            'thumbnail' => 'img/chapter1/npc/farouk-le-nomade_thumb.png',
            'description' => "<p>Un homme à la peau tannée par le vent, vêtu de tissus légers mais savamment noués. Des colifichets brillants pendent à ses poignets et un sourire rusé flotte constamment sur ses lèvres. Il semble avoir tout vu, tout vendu, et tout échappé de peu. Il vous jauge comme on jauge un chameau avant une longue traversée.</p>",
            'strength' => 9,
            'dexterity' => 14,
            'constitution' => 11,
            'wisdom' => 12,
            'intelligence' => 14,
            'charisma' => 15,
            'healthMax' => 110,
            'manaMax' => 40,
            'fortune' => 900,
            'level' => 3,
            'race' => 'race_humain',
            'profession' => 'profession_marchand',
            'reference' => 'npc_farouk_le_nomade',
        ],
    ];
}
