<?php

namespace App\DataFixtures\Riddle\Riddle\BoisDuPendu;

trait BosquetDesDruidesTrait
{
    const BOSQUET_DES_DRUIDES_RIDDLES = [
        [
            'name' => "L'Épreuve de l'Esprit du Cercle",
            'picture' => 'img/core/npc/grand-druide.png',
            'thumbnail' => 'img/core/action/test.png',
            'description' => "<p>Une série de questions initiatiques posées par le Grand Druide pour sonder ton âme.</p>",
            'type' => 'test',
            'repeatOnFailure' => false,
            'reference' => 'riddle_bosquet_des_druides_test',
        ],
    ];
}
