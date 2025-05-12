<?php

namespace App\DataFixtures\Dialog\Dialog\Plouc;

use App\Entity\Character\Npc;

trait GerardLePecheurTrait
{
    const GERARD_LE_PECHEUR_DIALOGS = [
        // Quête : Livraison en cours
        [
            'type' => 'dialog',
            'character' => 'npc_gerard_le_pecheur',
            'characterClass' => Npc::class,
            'reference' => 'quest_gerard_le_pecheur',
        ],

        // Dialogue normal
        [
            'type' => 'dialog',
            'character' => 'npc_gerard_le_pecheur',
            'characterClass' => Npc::class,
            'reference' => 'dialog_gerard_le_pecheur',
        ],

        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_gerard_le_pecheur',
            'characterClass' => Npc::class,
            'reference' => 'rumor_gerard_le_pecheur',
        ],
    ];
}
