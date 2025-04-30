<?php

namespace App\DataFixtures\Quest\Secondary;

trait SecondaryQuestTrait
{
    const SECONDARY_QUESTS = [
        [
            'name' => 'Des rats sur les Docks',
            'type' => 'Secondaire',
            'reward' => 'reward_quest_des_rats_sur_les_docks',
            'reference' => 'quest_secondary_des_rats_sur_les_docks',
        ],
        [
            'name' => 'La Fiole perdue',
            'type' => 'Secondaire',
            'reference' => 'quest_secondary_la_fiole_perdue',
        ],
        [
            'name' => 'Bagarre bizarre',
            'type' => 'Secondaire',
            'reference' => 'quest_secondary_bagarre_bizarre',
        ],
        [
            'name' => 'Livraison en cours',
            'type' => 'Secondaire',
            'reference' => 'quest_secondary_livraison_en_cours',
        ],
        [
            'name' => 'La Sirène et le Marin',
            'type' => 'Secondaire',
            'reference' => 'quest_secondary_la_sirene_et_le_marin',
        ],
    ];
}
