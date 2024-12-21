<?php

namespace App\DataFixtures\Scene\DialogueScene;

trait PortSaintDouxTrait
{
    const SOPHIE_LA_MARCHANDE_START = [
        'name' => 'Sophie La Marchande',
        'position' => 1,
        'description' => "<p>Vous êtes face à une marchande. Elle vous regarde avec un sourire bienveillant. Elle semble prête à vous aider si vous avez besoin de quelque chose.</p><p><em>&laquo;Bonjour&nbsp;! Quelle belle journée aujourd'hui&nbsp;! Que puis-je faire pour vous&nbsp;?&raquo;</em></p>",
        'screen' => 'screen_dialogue_sophie_la_marchande',
        'npc' => 'npc_sophie_la_marchande',
        'reference' => 'scene_dialogue_sophie_la_marchande',
    ];

    const SOPHIE_LA_MARCHANDE_HISTORY_START = [
        'name' => 'Sophie La Marchande',
        'position' => 1,
        'description' => "<p><em>&laquo;C'est quand même un comble&nbsp;! Nous n'avons plus ni Roi, ni Prince&nbsp;! Mais qu'est-ce qui leur a pris de nous laisser tous seuls comme ça&nbsp;? Qu'est-ce qu'on va devenir, nous autres&nbsp;? Heureusement que les gardes sont toujours là…&raquo;</em></p>",
        'screen' => 'screen_dialogue_sophie_la_marchande',
        'npc' => 'npc_sophie_la_marchande',
        'reference' => 'scene_dialogue_sophie_la_marchande_history',
    ];

    const ROBERT_LE_GARDE_START = [
        'name' => 'Robert Le Garde',
        'position' => 2,
        'description' => "<p>Vous êtes face à un garde de la ville. Il est en armure et son arme est prête à être dégainée. Il vous regarde avec méfiance.</p><p><em>&laquo;Qu'y a-t-il, citoyen&nbsp;? Un problème&nbsp;? Faites vite&nbsp;!&raquo;</em></p>",
        'screen' => 'screen_dialogue_robert_le_garde',
        'npc' => 'npc_robert_le_garde',
        'reference' => 'scene_dialogue_robert_le_garde',
    ];

    const ROBERT_LE_GARDE_HISTORY_RUMORS_START = [
        'name' => 'Robert Le Garde',
        'position' => 1,
        'description' => "<p><em>&laquo;Bon. Là en ce moment, chus occupé. Chuis en service au cas où z'auriez point remarqué. Alors salut.&raquo;</em></p>",
        'screen' => 'screen_dialogue_robert_le_garde',
        'npc' => 'npc_robert_le_garde',
        'reference' => 'scene_dialogue_robert_le_garde_history_rumors',
    ];

    const BILO_LE_PASSANT_START = [
        'name' => 'Bilo Le Passant',
        'position' => 3,
        'description' => "<p>Vous croisez un passant qui semble désœuvré. Il vous regarde avec insistance, comme s'il avait quelque chose à vous dire.</p><p><em>&laquo;Euh… Oui&nbsp;? Bonjour&nbsp;? Je m'appelle Bilo&nbsp;! Comment allez-vous&nbsp;?&raquo;</em></p>",
        'screen' => 'screen_dialogue_bilo_le_passant',
        'npc' => 'npc_bilo_le_passant',
        'reference' => 'scene_dialogue_bilo_le_passant',
    ];
}
