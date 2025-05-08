<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait BiloLePassantTrait
{
    const BILO_LE_PASSANT_DIALOG_STEPS = [
        // Discuter
        [
            'text' => "<p><em>Le Roi Galdric a disparu depuis maintenant trois jours, et le Prince Alaric depuis une semaine et demi. Je ne sais pas ce qu'il y a au Donjon de l'Âme, mais si deux groupes de soldats en armes n'ont pas réussi à en ressortir, qui pourra bien nous aider&nbsp;?</em></p>",
            'first' => true,
            'effects' => [
                'start_quest' => 'quest_main',
            ],
            'dialog' => 'dialog_bilo_le_passant',
            'reference' => 'dialog_step_bilo_le_passant_1',
        ],

        // Quête
        [
            'text' => "<p><em>Vous avez entendu parler des rats qui envahissent les rues du Vieux Port&nbsp;? Il y en a partout&nbsp;! Et ils sortent même le jour maintenant… C’est inquiétant.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_not_started' => 'des-rats-sur-les-docks',
            ],
            'dialog' => 'quest_bilo_le_passant',
            'reference' => 'quest_step_bilo_le_passant_1',
        ],
        [
            'text' => "<p><em>C'est dans les Anciens Docks, au sud-est de la ville. C'est l'ancien quartier des pêcheurs et des marins, mais surtout des vieux qui se sont pas fait à la modernité des Docks de l'Ouest. C'est un endroit calme, mais avec ces rats, ça devient un peu plus animé… enfin, si on peut dire.</em></p>",
            'conditions' => [
                'quest_not_started' => 'des-rats-sur-les-docks',
            ],
            'effects' => [
                'reveal_location' => 'anciens-docks',
            ],
            'dialog' => 'quest_bilo_le_passant',
            'reference' => 'quest_step_bilo_le_passant_2',
        ],
        [
            'text' => "<p><em>Super&nbsp;! Enfin quelqu'un qui s'occupe des problèmes du peuple&nbsp;! C'est pas tous les jours qu'on voit ça. Bonne chance à vous&nbsp;!</em></p>",
            'conditions' => [
                'quest_not_started' => 'des-rats-sur-les-docks',
            ],
            'effects' => [
                'start_quest' => 'des-rats-sur-les-docks',
            ],
            'dialog' => 'quest_bilo_le_passant',
            'reference' => 'quest_step_bilo_le_passant_3',
        ],
        [
            'text' => "<p><em>Oh, vous savez moi, ce que j'en dis… Si ce n'est le problème de personne, et que les gardes sont trop occupés, alors qui va s'en occuper de ces rats&nbsp;?</em></p>",
            'conditions' => [
                'quest_not_started' => 'des-rats-sur-les-docks',
            ],
            'dialog' => 'quest_bilo_le_passant',
            'reference' => 'quest_step_bilo_le_passant_4',
        ],
        [
            'text' => "<p><em>Alors, ces rats&nbsp;? Vous les avez vus&nbsp;? Vous avez fait quelque chose&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'des-rats-sur-les-docks',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_bilo_le_passant',
            'reference' => 'quest_step_bilo_le_passant_5',
        ],
        [
            'text' => "<p><em>Bravo&nbsp;! Vous avez réussi à vous débarrasser de ces rats&nbsp;! C'est un soulagement pour tout le monde, et soyez sûr que je vais m'empresser d'aller raconter votre victoire&nbsp;! J'espère que vous ne vous êtes pas fait mordre trop fort…</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'des-rats-sur-les-docks',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'reward_quest' => 'des-rats-sur-les-docks',
            ],
            'dialog' => 'quest_bilo_le_passant',
            'reference' => 'quest_step_bilo_le_passant_6',
        ],

        // Ragots
        [
            'text' => "<p><em>Vous savez que si vous mangez trois pommes, une carotte et un vieux fromage de chèvre avant de dormir, vous rêverez du futur&nbsp;? Enfin… moi, j’ai rêvé que j’étais un poisson qui chantait des berceuses à des dragons. Alors bon, ce n’est peut-être pas le futur-futur. Mais c'est une preuve, vous ne pensez pas&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'des-rats-sur-les-docks',
                    'status' => 'rewarded',
                ],
            ],
            'dialog' => 'rumor_bilo_le_passant',
            'reference' => 'rumor_step_bilo_le_passant_1',
        ],
    ];
}
