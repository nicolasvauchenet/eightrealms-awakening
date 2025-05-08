<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait WilbertLArcanisteTrait
{
    const WILBERT_L_ARCANISTE_DIALOG_STEPS = [
        // Quête : La Fiole Perdue
        [
            'text' => "<p><em>Ma fiole&nbsp;! Une concoction d’essence de feu pur, stabilisée à grand-peine… envolée&nbsp;! Pas de traces de pas, pas d’empreintes… juste de petits tas de sable épars, comme déposés par le vent lui-même.</em></p><p><em>Quel genre de voleur laisse du désert derrière lui&nbsp;? Hmmm… Si vous avez l’esprit vif et le pas léger, suivez la piste. Vers les Sables Chauds…</em></p>",
            'first' => true,
            'conditions' => [
                'quest_not_started' => 'la-fiole-perdue',
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_1',
        ],
        [
            'text' => "<p><em>Les Sables Chauds&nbsp;? À l’extrême sud-est de l’île. On y accède par les dunes au-delà des falaises rouges. Peu osent s’y aventurer, sauf les fous… et les désespérés.</em></p><p><em>Si ce voleur est ce que je crois, il n’a pas fui au hasard. Le désert attire ceux qui veulent disparaître… ou ceux qui cherchent à réveiller ce qui ne devrait pas l’être.</em></p>",
            'conditions' => [
                'quest_not_started' => 'la-fiole-perdue',
            ],
            'effects' => [
                'reveal_location' => 'sables-chauds',
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_2',
        ],
        [
            'text' => "<p><em>Bonne chance. Et souvenez-vous&nbsp;:&nbsp;tout ce qui brille dans le sable n’est pas or… parfois, c’est pire. Revenez si vous survivez, je vous paierai pour vos efforts.</em></p>",
            'conditions' => [
                'quest_not_started' => 'la-fiole-perdue',
            ],
            'effects' => [
                'start_quest' => 'la-fiole-perdue',
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_3',
        ],
        [
            'text' => "<p><em>Je vois. Je ne vous en tiens pas rigueur. Peu sont prêts à affronter le désert. Mais si un jour vous changez d’avis… ma porte est ouverte.</em></p>",
            'conditions' => [
                'quest_not_started' => 'la-fiole-perdue',
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_4',
        ],
        [
            'text' => "<p><em>Si ma fiole tombait entre de mauvaises mains, elle pourrait provoquer une catastrophe. Le désert est déjà assez dangereux sans ça. Restez sur vos gardes&nbsp;!</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_5',
        ],
        [
            'text' => "<p><em>Vous êtes revenu vivant… C’est déjà une victoire. Quant à ma fiole… elle n'est peut-être pas tout à fait perdue, mais au moins, le désert ne brûlera pas avec elle.</em></p><p><em>Voici votre récompense, comme promis. Je garde mes serments, même quand mes objets me trahissent.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 4,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 4,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_6',
        ],
        [
            'text' => "<p><em>Ce… ce n’est pas un simple bijou. Il pulse… Il respire. C’est un artefact ancien, chargé d’énergie élémentaire. Je crois… je crois que c’est l’un des deux fragments de la clé… Oui c'est ça&nbsp;:&nbsp; le Médaillons des Vents. Incroyable&nbsp;! Un fragment du Sceau&nbsp;! On les croyait perdus, dispersés… ou détruits.</em></p><p><em>Conservez-le. Il pourrait vous ouvrir des portes que nul ne voit encore.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 5,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'remove_items' => [
                    'fiole-brisee',
                ],
                'reward_quest' => 'la-fiole-perdue',
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_7',
        ],

        // Dialogue normal
        [
            'text' => "<p><em>Vous m’avez bien aidé, l’ami. Depuis, mes recherches avancent à pas de géant. J’espère que le désert vous a enseigné quelque chose… ou au moins appris à boire lentement.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'la-fiole-perdue',
                    'status' => 'rewarded',
                ],
            ],
            'dialog' => 'dialog_wilbert_larcaniste',
            'reference' => 'dialog_step_wilbert_larcaniste_1',
        ],

        // Ragots
        [
            'text' => "<p><em>Port Saint-Doux est aveugle. Les gens rient, commercent, prient… pendant que des forces invisibles tirent les ficelles. Mais je les vois, moi. Je les entends. Et si vous ouvrez votre esprit, vous entendrez aussi… Oh, mais j’en oublie mes manières. Vous voulez un sort de lévitation ou une infusion pour la mémoire&nbsp;?</em></p>",
            'first' => true,
            'dialog' => 'rumor_wilbert_larcaniste',
            'reference' => 'rumor_step_wilbert_larcaniste_1',
        ],
    ];
}
