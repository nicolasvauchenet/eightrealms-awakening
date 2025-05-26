<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait GartLeForgeronTrait
{
    const GART_LE_FORGERON_DIALOG_STEPS = [
        // Quête : Livraison en cours
        [
            'name' => 'Gart - Début de la Quête',
            'text' => "<p><em>Bien le bonjour à vous. Si vous avez besoin de mes services, je suis tout ouïe. Sinon, je vous prierai de ne pas rester dans mes pattes, j’ai du travail.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_not_started' => 'livraison-en-cours',
            ],
            'dialog' => 'quest_gart_le_forgeron',
            'reference' => 'quest_step_gart_le_forgeron_1',
        ],
        [
            'name' => 'Gart - Quête',
            'text' => "<p><em>Disons simplement que j’ai forgé un bouclier de fer pour un client… et que ce dernier n’a jamais daigné revenir le chercher. Un travail de précision, coûteux en temps comme en matériaux. Je n’aime pas travailler à perte.</em></p><p>Il hésite un instant, puis se lance.</p><p><em>Vous n'iriez pas à Plouc, des fois&nbsp;?</em></p>",
            'conditions' => [
                'quest_not_started' => 'livraison-en-cours',
            ],
            'dialog' => 'quest_gart_le_forgeron',
            'reference' => 'quest_step_gart_le_forgeron_2',
        ],
        [
            'name' => 'Gart - Plouc',
            'text' => "<p><em>Un petit village de pêcheurs à l’ouest de l’île, à une dizaine de lieues depuis Port Saint-Doux, en longeant la côte. Le client est un pêcheur du nom de Gérard. Je comprends pas bien ce qu’un homme comme lui compte faire d’un bouclier de cette facture. Ça m’échappe.</em></p>",
            'conditions' => [
                'quest_not_started' => 'livraison-en-cours',
            ],
            'effects' => [
                'reveal_location' => 'plouc',
            ],
            'dialog' => 'quest_gart_le_forgeron',
            'reference' => 'quest_step_gart_le_forgeron_3',
        ],
        [
            'name' => 'Gart - Accepter la quête',
            'text' => "<p><em>C’est bien aimable à vous. Voici le bouclier. Sa maison est la première à droite en entrant dans le village. Remettez-lui, et dites-lui que je ne suis pas une œuvre de charité.</em></p>",
            'conditions' => [
                'quest_not_started' => 'livraison-en-cours',
            ],
            'effects' => [
                'start_quest' => 'livraison-en-cours',
                'add_items' => [
                    [
                        'item' => 'bouclier-en-fer-de-gerard',
                        'questItem' => true,
                    ],
                ],
            ],
            'dialog' => 'quest_gart_le_forgeron',
            'reference' => 'quest_step_gart_le_forgeron_4',
        ],
        [
            'name' => 'Gart - Refuser la quête',
            'text' => "<p>Gart fait un pas en arrière, se redresse et son attitude se fait plus distante.</p><p><em>Bon. Dans ce cas, je ne vous ennuie pas plus avec mes problèmes. Si vous changez d'avis, vous savez où me trouver. Merci quand même.</em></p><p>Il coince ses pouces dans son tablier.</p><p><em>Qu'est-ce que je peux faire pour vous&nbsp;?</em></p>",
            'conditions' => [
                'quest_not_started' => 'livraison-en-cours',
            ],
            'dialog' => 'quest_gart_le_forgeron',
            'reference' => 'quest_step_gart_le_forgeron_5',
        ],
        [
            'name' => 'Gart - Quête en cours',
            'text' => "<p><em>Vous avez vu Gérard&nbsp;? Vous lui avez donné le bouclier&nbsp;? Vous avez fait votre livraison&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'livraison-en-cours',
                    'status' => 'progress',
                ],
                'all' => [
                    [
                        'quest_step_status_not' => [
                            'quest' => 'livraison-en-cours',
                            'quest_step' => 4,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'livraison-en-cours',
                            'quest_step' => 9,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'livraison-en-cours',
                            'quest_step' => 11,
                            'status' => 'progress',
                        ],
                    ],
                ],
            ],
            'dialog' => 'quest_gart_le_forgeron',
            'reference' => 'quest_step_gart_le_forgeron_6',
        ],
        [
            'name' => 'Gart - Quête terminée',
            'text' => "<p><em>Hé bien vous revoilà. Vous m'avez rendu un fier service. Je vous remercie. Voici votre paiement.</em></p>",
            'first' => true,
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'livraison-en-cours',
                            'quest_step' => 4,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'livraison-en-cours',
                            'quest_step' => 9,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'livraison-en-cours',
                            'quest_step' => 11,
                            'status' => 'progress',
                        ],
                    ],
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 11,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 12,
                        'status' => 'completed',
                    ],
                ],
                'reward_quest' => 'livraison-en-cours',
            ],
            'dialog' => 'quest_gart_le_forgeron',
            'reference' => 'quest_step_gart_le_forgeron_7',
        ],

        // Dialogue : Le Sceau du Tombeau
        [
            'name' => 'Gart - Sceau',
            'text' => "<p>Le forgeron fait un effort visible pour rester patient, et vous regarde en tapotant ses doigts sur son avant-bras.</p><p><em>Que vous faut-il&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'livraison-en-cours',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 12,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_gart_le_forgeron',
            'reference' => 'dialog_step_gart_le_forgeron_sceau_1',
        ],
        [
            'name' => 'Gart - Sceau',
            'text' => "<p>Ses doigts s'arrêtent de tapoter, ses sourcils se lèvent et il entrouve la bouche, ne savant quoi dire… Puis il se reprend, essaie de prendre un air détaché, et il vous regarde, les sourcils toujours en l'air.</p><p><em>Le seau&nbsp;? J'en ai forgé un avant-hier, oui. Mais en quoi ça vous intéresse&nbsp;? Vous êtes jardinier&nbsp;?</em></p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'livraison-en-cours',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 12,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_gart_le_forgeron',
            'reference' => 'dialog_step_gart_le_forgeron_sceau_2',
        ],
        [
            'name' => 'Gart - Sceau',
            'text' => "<p>Il vous regarde un moment, semble réfléchir.</p><p><em>Ça va&nbsp;! Vous êtes au courant, d'accord, même si je me demande comment… Et en quoi ça vous intéresse, je peux savoir&nbsp;?</em></p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'livraison-en-cours',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 12,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_gart_le_forgeron',
            'reference' => 'dialog_step_gart_le_forgeron_sceau_3',
        ],
        [
            'name' => 'Gart - Alaric',
            'text' => "<p><em>…mais il n'est pas revenu. Ni lui, ni le Prince. Je comprends mieux alors. Pourquoi il m'a interrogé sur les médaillons, pourquoi il était si intéressé par ces vieilles histoires… Je ne lui ai rien dit bien entendu, car si Galdric ne lui en a jamais parlé, ce n'était pas à moi de le faire. J'ai fait un serment. Ne rien dire à propos du Sceau, à personne.</em></p><p>Il hésite, puis continue.</p><p><em>Et vous voulez reconstituer le Sceau&nbsp;? Avec quoi&nbsp;?</em></p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'livraison-en-cours',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 12,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_gart_le_forgeron',
            'reference' => 'dialog_step_gart_le_forgeron_sceau_4',
        ],
        [
            'name' => 'Gart - Médaillons',
            'text' => "<p>Vous lui montrez le médaillon, qu'il prend délicatement, avec déférence et un peu de crainte. Il le regarde longuement, comme s'il retrouvait un objet perdu depuis bien longtemps.</p><p><em>Où l'avez-vous trouvé&nbsp;? Bah, qu'importe. Vous m'avez tout l'air d'être capable de retrouver ce genre de choses… Le Médaillon des Vents… C'est bien lui, le premier fragment du Sceau du Tombeau.</em></p><p>Il vous le rend, et vous regarde d'un air dubitatif.</p><p><em>Et vous voulez que je reforge le Sceau, c'est bien ça&nbsp;? Pour quoi faire&nbsp;? Vous avez l'autre fragment au moins&nbsp;?</em></p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'livraison-en-cours',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 12,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_gart_le_forgeron',
            'reference' => 'dialog_step_gart_le_forgeron_sceau_5',
        ],
        [
            'name' => 'Gart - Fragment',
            'text' => "<p><em>Alors ne comptez pas sur moi pour vous en dire davantage. Comprenez bien&nbsp;:&nbsp;le Tombeau ne doit PAS être rouvert. Ce qui y est enfermé ne doit pas en sortir. Jamais. Il en va de l'avenir du Monde.</em></p><p>Il décroise ses bras, prend un marteau et un casque cabossé.</p><p><em>Un conseil d'ami&nbsp;:&nbsp;laissez tomber. Ces affaires nous dépassent, vous et moi, ce sont des histoires de rois et de magiciens surpuissants. Et de démons. Tout ce qu'on tenterait serait en pure perte. Au pire, on ne ferait qu'empirer les choses.</em></p><p>Il vous tourne le dos et se met à taper bruyamment sur le casque.</p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'livraison-en-cours',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 12,
                        'status' => 'progress',
                    ],
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 12,
                        'status' => 'completed',
                    ],
                ],
            ],
            'dialog' => 'dialog_gart_le_forgeron',
            'reference' => 'dialog_step_gart_le_forgeron_sceau_6',
        ],

        // Dialogue normal
        [
            'name' => 'Gart - Dialogue',
            'text' => "<p><em>Quand je pense à ces gobelins… Des fois, je me demande si on les comprend bien, s'ils sont vraiment ce qu'on dit d'eux…</em></p><p>Il redresse la tête et interrompt ses réflexions.</p><p><em>Enfin bref&nbsp;! C'est des bestioles, de toute façon. Et pas des plus sympathiques, ma foi. Qu'est-ce qu'il vous faut, l'ami&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'livraison-en-cours',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status_not' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 12,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_gart_le_forgeron',
            'reference' => 'dialog_step_gart_le_forgeron_1',
        ],

        // Ragots
        [
            'name' => 'Gart - Ragots',
            'text' => "<p><em>Moi je ne crois pas aux pouvoirs infinis des mages, aux spectres ou aux histoires de bouquins hantés. Un bon acier, un feu bien nourri et un marteau solide : c’est ça, la vraie magie. Et si vous survivez à Port Saint-Doux avec une épée rouillée… vous aurez mérité votre place dans la forge.</em></p>",
            'first' => true,
            'dialog' => 'rumor_gart_le_forgeron',
            'reference' => 'rumor_step_gart_le_forgeron_1',
        ],
    ];
}
