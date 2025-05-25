<?php

namespace App\DataFixtures\Riddle\Riddle\BoisDuPendu;

use App\Entity\Character\Npc;

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
            'successDescription' => "<p>Le Grand Druide incline la tête.</p><p><em>%s, vous avez passé l’épreuve. %s</em></p>",
            'failureDescription' => "<p>Le Grand Druide ferme les yeux un instant.</p><p><em>Ton esprit s’agite encore… Il te faudra du temps pour comprendre les voies du Cercle. Mais l’épreuve n’est jamais vaine. Marque bien tes pas, car ils te ramèneront peut-être ici.</em></p>",
            'redirectToDialog' => 'grand-druide-reponses',
            'targetCharacter' => 'npc_grand_druide',
            'targetCharacterClass' => Npc::class,
            'resolverKey' => 'alignment_match',
            'reference' => 'riddle_bosquet_des_druides_test',
        ],
    ];
}
