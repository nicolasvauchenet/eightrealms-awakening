<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait BiloLePassantTrait
{
    const BILO_LE_PASSANT_DIALOG_STEPS = [
        // Quête secondaire : Des Rats sur les Docks
        [
            'name' => 'Bilo - Quête',
            'text' => "<p><em>Vous avez entendu parler des rats qui envahissent les quais du Vieux Port&nbsp;? Il y en a partout&nbsp;! Et ils sortent même le jour maintenant… C’est inquiétant. Plus personne n'ose se promener là-bas, à cause d'eux. C'est du gâchis, non&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_not_started' => 'des-rats-sur-les-docks',
            ],
            'dialog' => 'quest_secondary_bilo_le_passant',
            'reference' => 'quest_secondary_bilo_le_passant_1',
        ],
        [
            'name' => 'Bilo - Anciens Docks',
            'text' => "<p><em>C'est dans les Anciens Docks, au sud-est de la ville. C'est l'ancien quartier des pêcheurs et des marins, mais surtout des vieux qui se sont pas fait à la modernité des Docks de l'Ouest. C'est un endroit calme, mais avec ces rats, ça devient un peu plus animé… enfin, si on peut dire.</em></p>",
            'effects' => [
                'reveal_location' => 'anciens-docks',
            ],
            'dialog' => 'quest_secondary_bilo_le_passant',
            'reference' => 'quest_secondary_bilo_le_passant_2',
        ],
        [
            'name' => 'Bilo - Accepter la quête',
            'text' => "<p><em>Super&nbsp;! Enfin quelqu'un qui s'occupe des problèmes du peuple&nbsp;! C'est pas tous les jours qu'on voit ça. Je vous récompenserai, soyez sûr&nbsp;! Bonne chance à vous&nbsp;!</em></p>",
            'effects' => [
                'start_quest' => 'des-rats-sur-les-docks',
            ],
            'dialog' => 'quest_secondary_bilo_le_passant',
            'reference' => 'quest_secondary_bilo_le_passant_3',
        ],
        [
            'name' => 'Bilo - Refuser la quête',
            'text' => "<p><em>Oh, vous savez moi, ce que j'en dis… Si ce n'est le problème de personne, et que les gardes sont trop occupés, alors qui va s'en occuper de ces rats&nbsp;?</em></p>",
            'dialog' => 'quest_secondary_bilo_le_passant',
            'reference' => 'quest_secondary_bilo_le_passant_4',
        ],
        [
            'name' => 'Bilo - Quête en cours',
            'text' => "<p><em>Alors, ces rats&nbsp;? Vous les avez vus&nbsp;? Vous avez fait quelque chose&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'des-rats-sur-les-docks',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_secondary_bilo_le_passant',
            'reference' => 'quest_secondary_bilo_le_passant_5',
        ],
        [
            'name' => 'Bilo - Quête terminée',
            'text' => "<p><em>Bravo&nbsp;! Vous avez réussi à vous débarrasser de ces rats&nbsp;! C'est un soulagement pour tout le monde, et soyez sûr que je vais m'empresser d'aller raconter votre victoire&nbsp;! Et voici votre récompense, comme promis. J'espère que vous ne vous êtes pas fait mordre trop fort…</em></p>",
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
            'dialog' => 'quest_secondary_bilo_le_passant',
            'reference' => 'quest_secondary_bilo_le_passant_6',
        ],

        // Dialogue normal
        [
            'name' => 'Bilo - Dialogue',
            'text' => "<p><em>Le Roi Galdric a disparu depuis maintenant trois semaines, et le Prince Alaric depuis un mois et demi. Je ne sais pas ce qui se terre dans ce donjon, mais si deux groupes de soldats en armes n'ont pas réussi à en ressortir, qui pourra bien aller secourir nos souverains&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'des-rats-sur-les-docks',
                    'status' => 'rewarded',
                ],
            ],
            'dialog' => 'dialog_bilo_le_passant',
            'reference' => 'dialog_bilo_le_passant_1',
        ],

        // Ragots : Arcanes de Port Saint-Doux
        [
            'name' => 'Bilo - Rencontre',
            'text' => "<p><em>Je reviens de chez Wilbert, l'Arcaniste. C'est un érudit, il connaît toutes les langues du Royaume, et il a lu plein de bouquins. Il est vraiment impressionnant, j'adore parler avec lui&nbsp;! Et il en a des trucs magiques&nbsp;! Plein ses étagères. Ça fait rêver… Mais qu'est-ce que c'est cher, la magie&nbsp;!</em></p>",
            'first' => true,
            'conditions' => [
                'location_unknown' => 'quartier-des-ploucs',
            ],
            'dialog' => 'rumor_arcanes_bilo_le_passant',
            'reference' => 'rumor_arcanes_bilo_le_passant_1',
        ],
        [
            'name' => "Bilo - Quartier des Ploucs",
            'text' => "<p><em>Dans le Quartier des Ploucs. Ça s'appelle comme ça parce que c'est en grande partie les pêcheurs du village de Plouc qui y habitent. C'est le Roi Galdric 1er qui leur a donné ce quartier, quand il a voulu réunifier les peuples de l'Île. Certains ont saisi la chance et ont déménagé à la ville. Sûrement à cause des gobelins… Il paraît qu'ils pullulent dans le bois d'à côté.</em></p>",
            'effects' => [
                'reveal_location' => 'quartier-des-ploucs',
            ],
            'dialog' => 'rumor_arcanes_bilo_le_passant',
            'reference' => 'rumor_arcanes_bilo_le_passant_2',
        ],

        // Ragots: Banquet Inaugural
        [
            'name' => 'Bilo - Banquet Inaugural',
            'text' => "<p><em>Oh bah vous voilà&nbsp;! J’vous avais pas vu dans tout ce monde.</em></p><p>Il se rapproche de vous et votre odorat vous confirme qu'il ripaille depuis déjà un certain temps.</p><p><em>Dites, vous l’avez remarquée vous aussi, l’amulette du Maire&nbsp;? Celle qu’il a autour du cou. On dirait qu’elle brille toute seule, même à l’ombre. R'gardez bien… C’est pas un bijou qu’on trouve au marché, ça, j’vous le dis.</em></p><p>Il s'approche encore un peu plus, vous tenez bon et vous évitez les gouttes de bière.</p><p><em>J’ai entendu dire qu’il l’aurait reçue d’un vieux noble… ou d’un mage, même&nbsp;! Personne sait trop. Mais moi, j’crois que c'est un truc mystique. Vachement ancien, vous voyez&nbsp;?</em></p><p>Son air presque sérieux et le doigt qui hasarde vers son visage vous donnent envie de sourire.</p><p><em>Y a quelque chose qui cloche, j’le sens dans mes mollets.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'banquet-inaugural',
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'banquet-inaugural',
                    'quest_step' => 1,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'rumor_bilo_le_passant_banquet_inaugural',
            'reference' => 'rumor_bilo_le_passant_banquet_inaugural_1',
        ],

        // Ragots
        [
            'name' => 'Bilo - Ragots',
            'text' => "<p><em>Vous savez que si vous mangez trois pommes, une carotte et un vieux fromage de chèvre avant de dormir, vous rêverez du futur&nbsp;? Enfin… moi, j’ai rêvé que j’étais un poisson qui chantait des berceuses à des dragons. Alors bon, ce n’est peut-être pas le futur-futur. Mais c'est une preuve, vous ne pensez pas&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    'location_known' => 'quartier-des-ploucs',
                    'quest_status_not' => [
                        'quest' => 'banquet-inaugural',
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'rumor_bilo_le_passant',
            'reference' => 'rumor_bilo_le_passant_1',
        ],
    ];
}
