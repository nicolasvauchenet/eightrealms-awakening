<?php

namespace App\DataFixtures\Dialog\DialogStep\BoisDuPendu;

trait GrandDruideTrait
{
    const GRAND_DRUIDE_DIALOG_STEPS = [
        // Quête : Les disparus du Donjon
        [
            'name' => 'Grand Druide - Rencontre',
            'text' => "<p><em>La sève parle. Le vent écoute. Mais toi… que viens-tu troubler en ce lieu sacré&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 4,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_not_started' => 'le-gardien-du-refuge',
                    ],
                ],
            ],
            'dialog' => 'quest_grand_druide',
            'reference' => 'quest_step_grand_druide_1',
        ],
        [
            'name' => 'Grand Druide - Épreuve',
            'text' => "<p><em>Alors prouve que ton cœur n'est pas vide. Affronte l'Épreuve de l'Esprit du Cercle. Si tu vacilles, la forêt t’oubliera.</em></p>",
            'effects' => [
                'end_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 4,
                    'status' => 'completed',
                ],
                'start_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 7,
                ],
            ],
            'dialog' => 'quest_grand_druide',
            'redirectToRiddle' => 'lepreuve-de-lesprit-du-cercle',
            'reference' => 'quest_step_grand_druide_2',
        ],
        [
            'name' => 'Grand Druide - Réponses',
            'text' => "<p>Le Grand Druide vous regarde d'un air bienveillant.</p><p><em>Tu as traversé l’épreuve sans perdre ton essence. Je vais donc répondre à tes questions.</em></p><p>Il vous regarde un long moment sans rien dire, comme s'il lisait quelque chose dans vos yeux.</p><p><em>Le Rituel de l’Âme permet de pénétrer dans le Donjon de l’Âme. Le Médaillon des Vents n’est qu’un fragment. Un éclat du Sceau du Tombeau… Celui où repose Galdric, le Premier du nom.</em></p><p><em>Son tombeau se trouve tout au fond du Donjon. Mais prends garde… le Donjon de l'Âme est un lieu maudit, où les épreuves se succèdent jusqu'à venir à bout des plus valeureux.</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 7,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_not_started' => 'le-gardien-du-refuge',
                    ],
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 7,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_grand_druide',
            'reference' => 'quest_step_grand_druide_3',
        ],
        [
            'name' => 'Grand Druide - Fragment',
            'text' => "<p><em>Ce qui est enfermé ne l’est jamais pour rien. L'équilibre est précaire. Je n'en dirai pas plus à ce sujet.</em></p>",
            'dialog' => 'quest_grand_druide',
            'reference' => 'quest_step_grand_druide_4',
        ],
        [
            'name' => 'Grand Druide - Rituel refus',
            'text' => "<p><em>Je ne suis pas ton maître, et tu n’es pas mon successeur. Le Rituel de l’Âme ne s’enseigne pas à tout venant.</em></p>",
            'dialog' => 'quest_grand_druide',
            'reference' => 'quest_step_grand_druide_5',
        ],
        [
            'name' => 'Grand Druide - Rituel refus',
            'text' => "<p><em>Et je le regrette. À trop vouloir transmettre, on disperse le sens. Le Rituel ne doit être connu que du prochain Grand Druide. C’est la tradition.</em></p>",
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 8,
                        'status' => 'completed',
                    ],
                ],
            ],
            'dialog' => 'quest_grand_druide',
            'reference' => 'quest_step_grand_druide_6',
        ],
        [
            'name' => 'Grand Druide - Rituel ok',
            'text' => "<p><em>Tu portes un symbole de l'Ancien Monde, l'Amulette du Cercle des Druides Anciens, celle qui s'est formée par la volonté de la Nature elle-même. Il n'en existe qu'un seul exemplaire par druide. Tu as donc rencontré Gérome, à qui nous l'avions laissée pour le respect de son âme…</em></p><p>Il ferme les yeux, prend une profonde inspiration, puis les rouvre et vous regarde.</p><p><em>Peu d'âmes en ce monde ne se sont pas dissipées dans la Crique du Pendu. Alors soit. Je vais te partager le savoir secret du Grand Druide de l'Ancien Cercle.</em></p><p>Mêlant le geste à la parole, il vous détaille les étapes du rituel.</p><p><em>Le Rituel de l’Âme doit être accompli devant l’entrée du Donjon, au moment où le soleil décline, lorsque l’ombre commence à s’allonger mais que la nuit n’a pas encore gagné.<br/>Trace un cercle de cendre au sol. Place-y quatre pierres dressées aux quatre points cardinaux. Chaque pierre doit être gravée : au nord, l’Âme&nbsp;; au sud, la Mémoire&nbsp;; à l’est, la Chair&nbsp;; à l’ouest, le Sang.<br/>Au centre du cercle, dépose un objet lié à un mort. Quelque chose de personnel, marqué par le souvenir. Verse ensuite ton propre sang sur cet objet.<br/>Prononce ces mots sans détourner les yeux : <strong>&laquo;Que les morts m’entendent, que les vivants me laissent passer. Que l’Âme parle, et que la Chair se taise.&raquo;</strong></em></p><p><em>Alors, si le Cercle te reconnaît, le vent tombera. Le sol vibrera. Et l’entrée s’ouvrira.<br/>Mais si tu te trompes… quelque chose pourrait répondre à ta place.</em></p><p>Il marque une pause pour vous laisser le temps de tout mémoriser, puis il reprend.</p><p><em>Tu connais à présent le Rituel de l’Âme. Mais prends garde à Celui qui Doit rester Enfermé. Car si jamais il sort… le Monde ne dansera plus sur son axe.</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'has_item' => 'amulette-du-cercle',
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 10,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_status' => [
                            'quest' => 'le-jugement-du-cercle',
                            'status' => 'rewarded',
                        ],
                    ],
                ],
            ],
            'dialog' => 'quest_grand_druide',
            'reference' => 'quest_step_grand_druide_7',
        ],
        [
            'name' => 'Grand Druide - Nom',
            'text' => "<p><em>Des noms, il en eut cent. Mais aujourd’hui… aucun ne devrait être prononcé. Pars maintenant. Accomplis le travail de la Destinée, ou meurs en essayant.</em></p>",
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 10,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 11,
                        'status' => 'completed',
                    ],
                ],
            ],
            'dialog' => 'quest_grand_druide',
            'reference' => 'quest_step_grand_druide_8',
        ],

        // Quête : Le Gardien du Refuge
        [
            'name' => 'Grand Druide - Retour',
            'text' => "<p>Le Grand Druide vous accueille d'un air aimable et détendu. Cette fois vous vous sentez bienvenu en ces lieux. Il vous sourit presque.</p><p><em>Tu es revenu. Je suppose que ce n'est pas par simple courtoisie. Qu'attends-tu de nous, ami&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 8,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'dialog_grand_druide',
            'reference' => 'dialog_step_grand_druide_1',
        ],
        [
            'name' => 'Grand Druide - Rituel de dépossession',
            'text' => "<p>Il lève un sourcil, surpris, et vous demande en affichant un air mi-moqueur, mi-incrédule.</p><p><em>Un rituel de dépossession&nbsp;? Vraiment&nbsp;? Tu es possédé&nbsp;?</em></p>",
            'dialog' => 'dialog_grand_druide',
            'reference' => 'dialog_step_grand_druide_2',
        ],
        [
            'name' => 'Grand Druide - Histoire de Tharôl',
            'text' => "<p>Il vous écoute attentivement, son air redevient plus sérieux à mesure qu'il découvre l'histoire de l'ermite et de son pendentif maudit. À la fin, il regarde dans le vague, comme s'il inscrivait chaque détail dans sa mémoire, avant de réfléchir longuement… Puis il vous regarde droit dans les yeux, d'un air assuré.</p><p><em>J'ai entendu parler de l'Épine du Roi, mais c'était il y a fort longtemps. Elle avait disparu. Ainsi, Tharôl s'est sacrifié pour le royaume, et il a passé toutes ces années dans la solitude froide des Monts…</em></p><p>Son visage affiche une peine sincère. Il ferme les yeux, hoche la tête doucement.</p><p><em>Je ne connais pas le rituel qui pourra le délivrer. Les druides n'ont que faire des objets démoniaques. Mais il existe un moyen qui pourrait séparer l'âme de Tharôl de celle du démon qui habite cette amulette. L'Épine est maudite, mais elle a une faille.</em></p>",
            'dialog' => 'dialog_grand_druide',
            'reference' => 'dialog_step_grand_druide_3',
        ],
        [
            'name' => 'Grand Druide - Grimoire ancien',
            'text' => "<p><em>Le secret est écrit dans un vieux grimoire. Interdit depuis des années. Le Roi Galdric II l'avait caché, parce qu'il n'a pas osé le brûler.</em></p><p>Il hausse les épaules en signe d'impuissance.</p><p><em>Je n'en sais pas plus. Demande à quelqu'un qui se passionne pour les vieux livres, on ne sait jamais.</em></p>",
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'le-gardien-du-refuge',
                        'quest_step' => 8,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'le-gardien-du-refuge',
                        'quest_step' => 10,
                        'status' => 'skipped',
                    ],
                ],
            ],
            'dialog' => 'dialog_grand_druide',
            'reference' => 'dialog_step_grand_druide_4',
        ],
        [
            'name' => 'Grand Druide - Désolé',
            'text' => "<p><em>Je ne puis t'aider davantage, et j'en suis sincèrement désolé. Ce Tharôl a bien mérité qu'on soulage ses souffrances.</em></p><p>Il se perd dans ses méditations, et vous comprenez qu'il ne vous en dira pas davantage.</p>",
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'le-gardien-du-refuge',
                        'quest_step' => 8,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'le-gardien-du-refuge',
                        'quest_step' => 9,
                        'status' => 'skipped',
                    ],
                ],
                'start_quest_step' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 10,
                ],
            ],
            'dialog' => 'dialog_grand_druide',
            'reference' => 'dialog_step_grand_druide_5',
        ],
    ];
}
