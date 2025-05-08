<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait MyraLaVieilleTrait
{
    const MYRA_LA_VIEILLE_DIALOG_STEPS = [
        // Quête : La Sirène et le Marin
        [
            'text' => "<p><em>Vous avez la voix pour la chanson, et le silence pour l’écouter. La mer a perdu un cœur jadis… un cœur noyé dans une promesse. Chantez, étranger. Chantez les vers qu’on ne dit plus. Et vous verrez… la Flûte Moisie n’est pas le seul endroit hanté par les regrets.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_not_started' => 'la-sirene-et-le-marin',
            ],
            'dialog' => 'quest_myra_la_vieille',
            'reference' => 'quest_step_myra_la_vieille_1',
        ],
        [
            'text' => "<p>Myra se remet à fredonner doucement, si doucement qu’il vous faut tendre l’oreille pour capter le fil fragile de sa voix rauque.</p><p><em>&laquo;&nbsp;Sous les quais où l’écho s’endort<br/>Un marin perdit son serment<br/>Pour une voix née dans le nord<br/>Et morte au chant du firmament.</em></p><p><em>Verse à mes lèvres l’oubli salé<br/>Étreins mon âme et retiens ton vœu<br/>Car l’amour chanté sous la jetée<br/>Ressuscite ce qui dort sous les cieux.</em></p><p><em>Et la vieille Flûte Moisie soupire<br/>Quand le vin se mêle au soupir<br/>Le chant revient, parfois à tort<br/>Et emporte ceux qui l’aiment trop fort.&nbsp;&raquo;</em></p><p>Une fois la chanson terminée, Myra baisse les yeux sur son tricot, et semble vous avoir oublié…</p>",
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
            'text' => "<p>Myra se remet à tricoter, sans rien dire. Elle ne vous prête plus aucune attention.</p>",
            'conditions' => [
                'quest_not_started' => 'la-sirene-et-le-marin',
            ],
            'dialog' => 'quest_myra_la_vieille',
            'reference' => 'quest_step_myra_la_vieille_3',
        ],
        [
            'text' => "<p><em>La mer vous a chanté son secret, hein&nbsp;? Elle vous a promis des vérités noyées, des baisers salés et des larmes oubliées. Mais prenez garde…</em></p><p>Elle lève son aiguille à tricoter comme une vieille prêtresse brandissant un talisman rouillé.</p><p><em>Ceux qui cherchent les chants perdus trouvent parfois le silence éternel. Et les sirènes, elles, ne chantent jamais pour rien.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_myra_la_vieille',
            'reference' => 'quest_step_myra_la_vieille_4',
        ],

        // Dialogue normal
        [
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
            'text' => "<p><em>Le roi a voulu défier l’oubli. Et son fils, lui, a cru pouvoir défier les ombres. Mais il y a des choses qu’on ne déterre pas, même avec une couronne sur la tête. Les vieux lieux rêvent encore, vous savez. Et parfois, leurs cauchemars s’échappent.</em></p><p>Elle affiche un petit sourire mauvais, à peine déguisé et vous fixe droit dans les yeux.</p><p><em>Mais bon. Qu’est-ce qu’une vieille qui tricote peut bien savoir, n’est-ce pas&nbsp;?</em></p>",
            'first' => true,
            'dialog' => 'rumor_myra_la_vieille',
            'reference' => 'rumor_step_myra_la_vieille_1',
        ],
    ];
}
