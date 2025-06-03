<?php

namespace App\DataFixtures\Quest\Secondary;

use App\Entity\Character\Npc;

trait SecondaryQuestTrait
{
    const SECONDARY_QUESTS = [
        // Quêtes secondaires
        [
            'name' => 'Des rats sur les Docks',
            'type' => 'Secondaire',
            'reward' => 'reward_quest_des_rats_sur_les_docks',
            'giver' => 'npc_bilo_le_passant',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_des_rats_sur_les_docks',
        ],
        [
            'name' => 'Livraison en cours',
            'type' => 'Secondaire',
            'reward' => 'reward_quest_livraison_en_cours',
            'giver' => 'npc_gart_le_forgeron',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_livraison_en_cours',
        ],
        [
            'name' => 'Bagarre bizarre',
            'type' => 'Secondaire',
            'reward' => 'reward_quest_bagarre_bizarre',
            'giver' => 'npc_robert_le_garde',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_bagarre_bizarre',
        ],
        [
            'name' => 'La Fiole perdue',
            'type' => 'Secondaire',
            'reward' => 'reward_quest_la_fiole_perdue',
            'giver' => 'npc_wilbert_larcaniste',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_la_fiole_perdue',
        ],
        [
            'name' => 'Le Jugement du Cercle',
            'type' => 'Secondaire',
            'reward' => 'reward_quest_le_jugement_du_cercle',
            'reference' => 'quest_secondary_le_jugement_du_cercle',
        ],
        [
            'name' => 'Le Gardien du Refuge',
            'type' => 'Secondaire',
            'reference' => 'quest_secondary_le_gardien_du_refuge',
        ],

        // Quêtes annexes
        [
            'name' => 'La Sirène et le Marin',
            'type' => 'Secondaire',
            'reward' => 'reward_quest_la_sirene_et_le_marin',
            'giver' => 'npc_myra_la_vieille',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_la_sirene_et_le_marin',
        ],
    ];
}
