<?php

namespace App\DataFixtures\Scene\DialogueScene;

trait QuartierDuMarcheTrait
{
    const SOPHIE_LA_MARCHANDE_START = [
        'name' => 'Sophie La Marchande',
        'position' => 1,
        'description' => "<p>Vous êtes face à une marchande. Elle vous regarde avec un sourire bienveillant. Elle semble prête à vous aider si vous avez besoin de quelque chose.</p><p><em>Bonjour&nbsp;! Quelle belle journée aujourd'hui&nbsp;! Que puis-je faire pour vous&nbsp;?</em></p>",
        'screen' => 'screen_dialogue_sophie_la_marchande',
        'npc' => 'npc_sophie_la_marchande',
        'reference' => 'scene_dialogue_sophie_la_marchande',
    ];

    const SOPHIE_LA_MARCHANDE_HISTORY_START = [
        'name' => 'Sophie La Marchande',
        'position' => 1,
        'description' => "<p><em>C'est quand même un comble&nbsp;! Nous n'avons plus ni Roi, ni Prince&nbsp;! Mais qu'est-ce qui leur a pris de nous laisser tous seuls comme ça&nbsp;? Qu'est-ce qu'on va devenir, nous autres&nbsp;? Heureusement que les gardes sont toujours là…</em></p>",
        'screen' => 'screen_dialogue_sophie_la_marchande',
        'npc' => 'npc_sophie_la_marchande',
        'reference' => 'scene_dialogue_sophie_la_marchande_history',
    ];

    const ROBERT_LE_GARDE_START = [
        'name' => 'Robert Le Garde',
        'position' => 2,
        'description' => "<p>Vous êtes face à un garde de la ville. Il est en armure et son arme est prête à être dégainée. Il vous regarde avec méfiance.</p><p><em>Qu'y a-t-il, citoyen&nbsp;? Un problème&nbsp;? Faites vite&nbsp;!</em></p>",
        'screen' => 'screen_dialogue_robert_le_garde',
        'npc' => 'npc_robert_le_garde',
        'reference' => 'scene_dialogue_robert_le_garde',
    ];

    const ROBERT_LE_GARDE_HISTORY_RUMORS_START = [
        'name' => 'Robert Le Garde',
        'position' => 1,
        'description' => "<p><em>Bon. Là en ce moment, chus occupé. Chuis en service au cas où z'auriez point remarqué. Alors salut.</em></p>",
        'screen' => 'screen_dialogue_robert_le_garde',
        'npc' => 'npc_robert_le_garde',
        'reference' => 'scene_dialogue_robert_le_garde_history_rumors',
    ];

    const BILO_LE_PASSANT_START = [
        'name' => 'Bilo Le Passant',
        'position' => 3,
        'description' => "<p>Vous croisez un passant qui semble désœuvré. Il vous regarde avec insistance, comme s'il avait quelque chose à vous dire.</p><p><em>Euh… Oui&nbsp;? Bonjour&nbsp;? Je m'appelle Bilo&nbsp;! Comment allez-vous&nbsp;?</em></p>",
        'screen' => 'screen_dialogue_bilo_le_passant',
        'npc' => 'npc_bilo_le_passant',
        'reference' => 'scene_dialogue_bilo_le_passant',
    ];

    const BILO_LE_PASSANT_HISTORY_START = [
        'name' => 'Bilo Le Passant',
        'position' => 1,
        'description' => "<p><em>Le Roi Galdric a disparu depuis maintenant trois jours, et le Prince Alaric depuis une semaine et demi. Je ne sais pas ce qu'il y a au Donjon de l'Âme, mais si deux groupes de soldats en armes n'ont pas réussi à en ressortir, qui pourra bien nous aider&nbsp;?</em></p>",
        'screen' => 'screen_dialogue_bilo_le_passant',
        'npc' => 'npc_bilo_le_passant',
        'reference' => 'scene_dialogue_bilo_le_passant_history',
    ];

    const BILO_LE_PASSANT_RUMORS_START = [
        'name' => 'Bilo Le Passant',
        'position' => 1,
        'description' => "<p><em>Vous avez entendu parler des rats qui envahissent les rues de Port&nbsp;? Il y en a partout&nbsp;! Et ils sortent même le jour maintenant… C’est inquiétant.</em></p>",
        'screen' => 'screen_dialogue_bilo_le_passant',
        'npc' => 'npc_bilo_le_passant',
        'reference' => 'scene_dialogue_bilo_le_passant_rumors',
    ];

    const BILO_LE_PASSANT_RUMORS_2 = [
        'name' => 'Bilo Le Passant',
        'position' => 2,
        'description' => "<p><em>C'est dans les Anciens Docks, au sud-est de la ville. C'est l'ancien quartier des pêcheurs et des marins, mais surtout des vieux qui se sont pas fait à la modernité des Docks de l'Ouest. C'est un endroit calme, mais avec ces rats, ça devient un peu plus animé… enfin, si on peut dire.</em></p>",
        'screen' => 'screen_dialogue_bilo_le_passant',
        'npc' => 'npc_bilo_le_passant',
        'reference' => 'scene_dialogue_bilo_le_passant_rumors_2',
    ];

    const BILO_LE_PASSANT_RUMORS_2_ACCEPT = [
        'name' => 'Bilo Le Passant',
        'position' => 3,
        'description' => "<p><em>Super&nbsp;! Enfin quelqu'un qui s'occupe des problèmes du peuple&nbsp;! C'est pas tous les jours qu'on voit ça. Merci, vraiment&nbsp;!</em></p>",
        'screen' => 'screen_dialogue_bilo_le_passant',
        'npc' => 'npc_bilo_le_passant',
        'reference' => 'scene_dialogue_bilo_le_passant_rumors_2_accept',
    ];

    const BILO_LE_PASSANT_RUMORS_2_DECLINE = [
        'name' => 'Bilo Le Passant',
        'position' => 4,
        'description' => "<p><em>Oh, vous savez moi, ce que j'en dis… Si c'est le problème de personne, et que les gardes sont trop occupés, alors qui va s'en occuper de ces rats&nbsp;?</em></p>",
        'screen' => 'screen_dialogue_bilo_le_passant',
        'npc' => 'npc_bilo_le_passant',
        'reference' => 'scene_dialogue_bilo_le_passant_rumors_2_decline',
    ];
}
