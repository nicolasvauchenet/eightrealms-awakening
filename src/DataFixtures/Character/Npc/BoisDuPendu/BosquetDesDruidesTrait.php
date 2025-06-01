<?php

namespace App\DataFixtures\Character\Npc\BoisDuPendu;

trait BosquetDesDruidesTrait
{
    const BOSQUET_DES_DRUIDES_NPCS = [
        // Npcs
        [
            'name' => 'Grand Druide',
            'picture' => 'img/core/npc/grand-druide.png',
            'thumbnail' => 'img/core/npc/grand-druide_thumb.png',
            'description' => "<p>Il se tient là, droit comme un chêne millénaire, au cœur de la forêt ancienne. Son manteau vert sombre effleure la mousse, et un torque de bois sculpté repose sur sa poitrine, gravé de symboles oubliés. Sa longue barbe argentée descend jusqu’à sa ceinture, et un diadème de ramures couronne son front marqué par le temps.</p><p>Son regard, perçant et calme, semble sonder votre âme. Aucun mot n'est échangé — et pourtant, vous sentez qu'il sait déjà tout de vous. Autour de lui, la forêt écoute. Le silence est plein de promesses, ou de jugements.</p>",
            'strength' => 10,
            'dexterity' => 12,
            'constitution' => 12,
            'wisdom' => 16,
            'intelligence' => 15,
            'charisma' => 8,
            'healthMax' => 120,
            'manaMax' => 75,
            'fortune' => 50,
            'level' => 4,
            'race' => 'race_humain',
            'profession' => 'profession_druide',
            'reference' => 'npc_grand_druide',
        ],
    ];
}
