<?php

namespace App\DataFixtures\Scene\DialogueScene;

trait PortSaintDouxTrait
{
    const SOPHIE_LA_MARCHANDE = [
        'name' => 'Sophie La Marchande',
        'position' => 1,
        'description' => "<p>Vous êtes face à une marchande. Elle vous regarde avec un sourire bienveillant. Elle semble prête à vous aider si vous avez besoin de quelque chose.</p>",
        'screen' => 'screen_dialogue_sophie_la_marchande',
        'npc' => 'npc_sophie_la_marchande',
        'reference' => 'scene_dialogue_sophie_la_marchande',
    ];

    const ROBERT_LE_GARDE = [
        'name' => 'Robert Le Garde',
        'position' => 2,
        'description' => "<p>Vous êtes face à un garde de la ville. Il est en armure et son arme est prête à être dégainée. Il vous regarde avec méfiance.</p>",
        'screen' => 'screen_dialogue_robert_le_garde',
        'npc' => 'npc_robert_le_garde',
        'reference' => 'scene_dialogue_robert_le_garde',
    ];

    const BILO_LE_PASSANT = [
        'name' => 'Bilo Le Passant',
        'position' => 3,
        'description' => "<p>Vous croisez un passant qui semble désœuvré. Il vous regarde avec insistance, comme s'il avait quelque chose à vous dire.</p>",
        'screen' => 'screen_dialogue_bilo_le_passant',
        'npc' => 'npc_bilo_le_passant',
        'reference' => 'scene_dialogue_bilo_le_passant',
    ];
}
