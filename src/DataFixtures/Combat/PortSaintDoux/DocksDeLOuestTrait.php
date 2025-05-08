<?php

namespace App\DataFixtures\Combat\PortSaintDoux;

use App\Entity\Character\Creature;

trait DocksDeLOuestTrait
{
    const DOCKS_DE_L_OUEST_COMBATS = [
        // Quêtes
        [
            'name' => 'La Sirène des Docks',
            'picture' => 'img/core/creature/sirene-angry.png',
            'thumbnail' => 'img/core/creature/sirene_thumb.png',
            'description' => "<p>L’eau clapote étrangement, puis une silhouette féminine émerge des flots. Ses yeux scintillent d’un éclat hypnotique. Une sirène, envoûtante et létale, fond sur vous sans un mot. Votre cœur hésite, mais vos mains saisissent déjà vos armes…</p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'reward' => 'reward_combat_port_saint_doux_la_sirene_des_docks',
            'victoryDescription' => "<p>La sirène pousse un cri déchirant, puis s’enfonce dans les flots. Un instant de silence… avant qu’elle ne réapparaisse lentement à la surface.</p><p>Son regard a changé. Plus doux, presque humain. Elle vous observe sans hostilité, comme si le combat avait brisé un sort ou dissipé un malentendu.</p><p>Peut-être est-il temps de parler.</p>",
            'defeatDescription' => "<p>Le combat vous échappe… Vos forces vous trahissent et l’ombre vous engloutit.</p><p>Mais ce n’est pas la fin. Les Dieux, dans leur mystérieuse clémence, vous offrent une seconde chance. Une résurrection au Temple de la Capitale… contre quelques Couronnes.</p><p>Relevez-vous, affûtez vos armes, et souvenez-vous&nbsp;: la mort n’est qu’un détour dans les Huit Royaumes.</p>",
            'location' => 'location_zone_docks_de_l_ouest',
            'questStep' => 'quest_secondary_la_sirene_et_le_marin_step_1',
            'enemies' => [
                [
                    'enemy' => 'creature_sirene',
                    'enemyClass' => Creature::class,
                ],
            ],
            'redirectToInteraction' => 'sirene',
            'reference' => 'combat_port_saint_doux_la_sirene_des_docks',
        ],
    ];
}
