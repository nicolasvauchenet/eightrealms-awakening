<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait MyraLaVieilleTrait
{
    const MYRA_LA_VIEILLE_DIALOG_STEPS = [
        // Quête : La Sirène et le Marin
        [
            'name' => 'Myra - Quête',
            'text' => "<p><em>Vous avez la voix pour la chanson, et le silence pour l’écouter. La mer a perdu un cœur jadis… un cœur noyé dans une promesse. Chantez, étranger. Chantez les vers qu’on ne dit plus. Et vous verrez… la Flûte Moisie n’est pas le seul endroit hanté par les regrets.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_not_started' => 'la-sirene-et-le-marin',
            ],
            'dialog' => 'quest_myra_la_vieille',
            'reference' => 'quest_step_myra_la_vieille_1',
        ],
        [
            'name' => 'Myra - Accepter la quête',
            'text' => "<p>Myra se met à fredonner doucement, si doucement qu’il vous faut tendre l’oreille pour capter le fil fragile de sa voix rauque.</p><p><em>&laquo;&nbsp;Sous les quais où l’écho s’endort<br/>Un marin perdit son serment<br/>Pour une voix née dans le nord<br/>Et morte au chant du firmament.</em></p><p><em>Verse à mes lèvres l’oubli salé<br/>Étreins mon âme et retiens ton vœu<br/>Car l’amour chanté sous la jetée<br/>Ressuscite ce qui dort sous les cieux.</em></p><p><em>Et la vieille Flûte Moisie soupire<br/>Quand le vin se mêle au soupir<br/>Le chant revient, parfois à tort<br/>Et emporte ceux qui l’aiment trop fort.&nbsp;&raquo;</em></p><p>Une fois la chanson terminée, Myra baisse les yeux sur son tricot, et semble vous avoir oublié…</p>",
            'conditions' => [
                'quest_not_started' => 'la-sirene-et-le-marin',
            ],
            'effects' => [
                'start_quest' => 'la-sirene-et-le-marin',
            ],
            'dialog' => 'quest_myra_la_vieille',
            'reference' => 'quest_step_myra_la_vieille_2',
        ],
        [
            'name' => 'Myra - Refuser la quête',
            'text' => "<p>Myra se remet à tricoter, sans rien dire. Elle ne vous prête plus aucune attention.</p>",
            'conditions' => [
                'quest_not_started' => 'la-sirene-et-le-marin',
            ],
            'dialog' => 'quest_myra_la_vieille',
            'reference' => 'quest_step_myra_la_vieille_3',
        ],
        [
            'name' => 'Myra - Quête en cours',
            'text' => "<p><em>La mer vous a chanté son secret, hein&nbsp;? Elle vous a promis des vérités noyées, des baisers salés et des larmes oubliées. Mais prenez garde…</em></p><p>Elle lève son aiguille à tricoter comme une vieille prêtresse brandissant un talisman rouillé.</p><p><em>Ceux qui cherchent les chants perdus trouvent parfois le silence éternel. Et les sirènes, elles, ne chantent jamais pour rien.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_myra_la_vieille',
            'reference' => 'quest_step_myra_la_vieille_4',
        ],
        [
            'name' => 'Myra - Quête terminée - Vérité',
            'text' => "<p>Myra relève à peine les yeux de son tricot quand vous entrez, mais vous sentez qu’elle sait déjà.</p><p><em>Elle est partie, hein&nbsp;? Je l’ai sentie dans les vagues… un silence lourd, comme un adieu qui a mis des années à se décider.</em></p><p>Elle marque une pause, puis reprend son tricot avec une lenteur rituelle.</p><p><em>Je lui avais dit de ne pas lui faire confiance. Mais je comprends… Quand le cœur chante, les oreilles se ferment.</em></p><p>Elle vous adresse un regard plus doux, presque maternel.</p><p><em>Tu as bien fait. Les vérités salées sont les plus dures à avaler. Mais elles guérissent mieux que les mensonges doux.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 5,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'start_quest_step' => [
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 7,
                        'status' => 'completed',
                    ],
                ],
                'reward_quest' => 'la-sirene-et-le-marin',
            ],
            'dialog' => 'quest_myra_la_vieille',
            'reference' => 'quest_step_myra_la_vieille_5_1',
        ],
        [
            'name' => 'Myra - Quête terminée - Mensonge',
            'text' => "<p>Myra vous regarde un long moment, ses aiguilles suspendues dans l'air. Son regard n'est ni dur, ni tendre… juste lourd.</p><p><em>Tu n'as rien dit, hein&nbsp;? Tu as préféré le silence au chant.</em></p><p>Elle reprend son tricot avec un soupir las.</p><p><em>Peut-être que c'était mieux ainsi. Peut-être… Mais souviens-toi&nbsp;:&nbsp;parfois, c'est dans les mensonges qu'on enterre les vérités les plus profondes.</em></p><p>Elle vous adresse un dernier regard, fatigué mais sans colère.</p><p><em>Qu'elle t'oublie, qu'elle te bénisse… ou qu'elle te chante dans ses larmes. Allez, va. Le vin refroidit, et les souvenirs aussi.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 6,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'start_quest_step' => [
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 6,
                        'status' => 'completed',
                    ],
                ],
                'reward_quest' => 'la-sirene-et-le-marin',
            ],
            'dialog' => 'quest_myra_la_vieille',
            'reference' => 'quest_step_myra_la_vieille_5_2',
        ],

        // Dialogue normal
        [
            'name' => 'Myra - Dialogue',
            'text' => "<p><em>Un jour j’ai vu un marin écrire une lettre d’amour avec une arête de maquereau. Il disait que l’encre d’algue révélait les vrais sentiments. Résultat&nbsp;: la lettre a moisi, et sa bien-aimée l’a confondue avec un vieux menu.</em></p><p>Elle ricane, sans lever les yeux de son tricot.</p><p><em>Comme quoi, les mots d’amour et les poissons… faut les conserver au frais.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'status' => 'rewarded',
                ],
            ],
            'dialog' => 'dialog_myra_la_vieille',
            'reference' => 'dialog_step_myra_la_vieille_1',
        ],

        // Ragots
        [
            'name' => 'Myra - Ragots',
            'text' => "<p><em>Le roi a voulu défier l’oubli. Et son fils, lui, a cru pouvoir défier les ombres. Mais il y a des choses qu’on ne déterre pas, même avec une couronne sur la tête. Les vieux lieux rêvent encore, vous savez. Et parfois, leurs cauchemars s’échappent.</em></p><p>Elle affiche un petit sourire mauvais, à peine déguisé et vous fixe droit dans les yeux.</p><p><em>Mais bon. Qu’est-ce qu’une vieille qui tricote peut bien savoir, n’est-ce pas&nbsp;?</em></p>",
            'first' => true,
            'dialog' => 'rumor_myra_la_vieille',
            'reference' => 'rumor_step_myra_la_vieille_1',
        ],
    ];
}
