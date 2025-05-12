<?php

namespace App\DataFixtures\Quest\Secondary;

use App\Entity\Character\Npc;

trait SecondaryQuestTrait
{
    const SECONDARY_QUESTS = [
        [
            'name' => 'Des rats sur les Docks',
            'type' => 'Secondaire',
            'reward' => 'reward_quest_des_rats_sur_les_docks',
            'giver' => 'npc_bilo_le_passant',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_des_rats_sur_les_docks',
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
            'name' => 'Bagarre bizarre',
            'type' => 'Secondaire',
            'reward' => 'reward_quest_bagarre_bizarre',
            'giver' => 'npc_robert_le_garde',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_bagarre_bizarre',
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
            'name' => 'La Sirène et le Marin',
            'type' => 'Secondaire',
            'reward' => 'reward_quest_la_sirene_et_le_marin',
            'giver' => 'npc_myra_la_vieille',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_la_sirene_et_le_marin',
        ],
    ];
}
