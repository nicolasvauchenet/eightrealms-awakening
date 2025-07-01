<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait PecheurDuQuartierDesPloucsTrait
{
    const PECHEUR_DU_QUARTIER_DES_PLOUCS_DIALOGS = [
        // Dialogue normal
        [
            'type' => 'dialog',
            'character' => 'npc_pecheur_du_quartier_des_ploucs',
            'characterClass' => Npc::class,
            'reference' => 'dialog_pecheur_du_quartier_des_ploucs',
        ],

        // Ragots : Quartier des Chauves
        [
            'type' => 'rumor',
            'character' => 'npc_pecheur_du_quartier_des_ploucs',
            'characterClass' => Npc::class,
            'reference' => 'rumor_quartier_des_chauves_pecheur_du_quartier_des_ploucs',
        ],

        // Ragots : Banquet Inaugural
        [
            'type' => 'rumor',
            'character' => 'npc_pecheur_du_quartier_des_ploucs',
            'characterClass' => Npc::class,
            'reference' => 'rumor_pecheur_du_quartier_des_ploucs_banquet_inaugural',
        ],

        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_pecheur_du_quartier_des_ploucs',
            'characterClass' => Npc::class,
            'reference' => 'rumor_pecheur_du_quartier_des_ploucs',
        ],
    ];
}
