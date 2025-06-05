<?php

namespace App\DataFixtures\Dialog\DialogStep\BoisDuPendu;

trait GrandDruideTrait
{
    const GRAND_DRUIDE_DIALOG_STEPS = [
        // Quête principale : Les disparus du Donjon - Rencontre
        [
            'name' => 'Grand Druide - Rencontre',
            'text' => "<p><em>La sève parle. Le vent écoute. Mais toi… que viens-tu troubler en ce lieu sacré&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 5,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_1',
        ],
        [
            'name' => 'Grand Druide - Épreuve',
            'text' => "<p><em>Alors prouve que ton cœur n'est pas vide. Affronte l'Épreuve de l'Esprit du Cercle. Si tu vacilles, la forêt t’oubliera.</em></p>",
            'dialog' => 'quest_main_grand_druide',
            'effects' => [
                'end_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 5,
                    'status' => 'completed',
                ],
            ],
            'redirectToRiddle' => 'lepreuve-de-lesprit-du-cercle',
            'reference' => 'quest_main_grand_druide_2',
        ],
        [
            'name' => 'Grand Druide - Réponses',
            'text' => "<p>Le Grand Druide vous regarde d'un air bienveillant.</p><p><em>Tu as traversé l’épreuve sans perdre ton essence. Je vais donc répondre à tes questions.</em></p><p>Il vous regarde un long moment sans rien dire, comme s'il lisait quelque chose dans vos yeux.</p><p><em>Le Rituel de l’Âme permet de pénétrer dans le Donjon de l’Âme.</em></p><p>Il prend une petite pause, puis reprend.</p><p><em>Le Médaillon des Vents n’est qu’un des deux fragments du Sceau du Tombeau… Celui où repose Galdric, le Premier du nom.</em></p><p><em>Son tombeau se trouve tout au fond du Donjon. Mais prends garde… le Donjon de l'Âme est un lieu maudit, où les épreuves se succèdent jusqu'à venir à bout des plus valeureux.</em></p>",
            'first' => true,
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 6,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 6,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_3',
        ],
        [
            'name' => 'Grand Druide - Fragment',
            'text' => "<p><em>Ce qui est enfermé ne l’est jamais pour rien. L'équilibre est précaire. Je n'en dirai pas plus à ce sujet.</em></p>",
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_4',
        ],
        [
            'name' => 'Grand Druide - Rituel refus',
            'text' => "<p>Il lève un sourcil, surpris par votre demande.</p><p><em>Je ne suis pas ton maître, et tu n’es pas mon successeur. Le Rituel de l’Âme ne s’enseigne pas à tout venant.</em></p>",
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_5',
        ],
        [
            'name' => 'Grand Druide - Rituel refus',
            'text' => "<p><em>Et je le regrette. À trop vouloir transmettre, on disperse le sens. Le Rituel ne doit être connu que du prochain Grand Druide. C’est la tradition.</em></p><p>Son visage se referme, il baisse le bras et s'apprête à partir. L'entretien est terminé.</p>",
            'effects' => [
                'end_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 6,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_6',
        ],

        // Quête principale : Les disparus du Donjon - Rituel
        [
            'name' => 'Grand Druide - Rituel redemandé',
            'text' => "<p>Le Grand Druide vous accueille à sa façon, ni chaleureuse, ni hostile.</p><p><em>Tu es revenu dans le Cercle. Que me veux-tu, à présent&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 25,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 27,
                            'status' => 'progress',
                        ],
                    ],
                ],
            ],
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_7',
        ],
        [
            'name' => 'Grand Druide - Rituel refusé',
            'text' => "<p>Il ferme les yeux et semble puiser au fond de lui la force de vous répondre. Il soupire.</p><p><em>Tu as déjà fait cette demande. Et je l'ai refusée. Et tu viens de me donner une raison supplémentaire.</em></p><p>Il rouvre les yeux, son regard est plus dur, plus froid.</p>",
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 25,
                        'status' => 'completed',
                    ],
                ],
            ],
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_8',
        ],

        // Quête principale : Les disparus du Donjon - Apprentissage du Rituel
        [
            'name' => 'Grand Druide - Rituel ok',
            'text' => "<p>Le Grand Druide fixe l'Amulette du Cercle que vous portez. Il réfléchit, un long moment, en silence. Alors que vous pensez qu'il cherche une nouvelle façon de vous envoyer promener, il relève les yeux sur vous, et sourit&nbsp;—&nbsp;presque imperceptiblement.<em>Tu portes un symbole de l'Ancien Monde, l'Amulette du Cercle des Druides Anciens, celle qui s'est formée par la volonté de la Nature elle-même. Il n'en existe qu'un seul exemplaire par druide. Tu as donc rencontré Gérome, à qui nous l'avions laissée pour le respect de son âme…</em></p><p>Il ferme les yeux, prend une profonde inspiration, puis les rouvre et vous regarde.</p><p><em>Peu d'âmes en ce monde ne se sont pas dissipées dans la Crique du Pendu. Alors soit. Je vais te partager le savoir secret du Grand Druide de l'Ancien Cercle.</em></p><p>Mêlant le geste à la parole, il vous détaille les étapes du rituel.</p><p><em>Le Rituel de l’Âme doit être accompli devant l’entrée du Donjon, au moment où le soleil décline, lorsque l’ombre commence à s’allonger mais que la nuit n’a pas encore gagné.<br/>Trace un cercle de cendre au sol. Place-y quatre pierres dressées aux quatre points cardinaux. Chaque pierre doit être gravée : au nord, l’Âme&nbsp;; au sud, la Mémoire&nbsp;; à l’est, la Chair&nbsp;; à l’ouest, le Sang.<br/>Au centre du cercle, dépose un objet lié à un mort. Quelque chose de personnel, marqué par le souvenir. Verse ensuite ton propre sang sur cet objet.<br/>Prononce ces mots sans détourner les yeux : <strong>&laquo;Que les morts m’entendent, que les vivants me laissent passer. Que l’Âme parle, et que la Chair se taise.&raquo;</strong></em></p><p><em>Alors, si le Cercle te reconnaît, le vent tombera. Le sol vibrera. Et l’entrée s’ouvrira.<br/>Mais si tu te trompes… quelque chose pourrait répondre à ta place.</em></p><p>Il marque une pause pour vous laisser le temps de tout mémoriser, puis il reprend.</p><p><em>Tu connais à présent le Rituel de l’Âme. Mais prends garde à Celui qui Doit rester Enfermé. Car si jamais Il devait sortir du Tombeau… le Monde ne tournerait alors plus sur son axe.</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'has_item' => 'amulette-du-cercle',
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 27,
                            'status' => 'progress',
                        ],
                    ],
                ],
            ],
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_9',
        ],
        [
            'name' => 'Grand Druide - Nom interdit',
            'text' => "<p><em>Des noms, il en eut cent. Mais aujourd’hui… aucun ne devrait être prononcé. Pars maintenant. Accomplis le travail de la Destinée, ou meurs en essayant.</em></p><p>Il vous regarde longuement, comme s'il vous évaluait une dernière fois. Puis il se retourne, et quitte le Cercle.</p>",
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 27,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 28,
                        'status' => 'completed',
                    ],
                ],
            ],
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_10',
        ],
    ];
}
