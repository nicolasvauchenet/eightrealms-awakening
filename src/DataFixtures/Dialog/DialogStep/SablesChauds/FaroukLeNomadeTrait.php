<?php

namespace App\DataFixtures\Dialog\DialogStep\SablesChauds;

trait FaroukLeNomadeTrait
{
    const FAROUK_LE_NOMADE_DIALOG_STEPS = [
        // Quête : La Fiole Perdue
        [
            'name' => 'Farouk - Rencontre',
            'text' => "<p>Farouk vous accueille d’un geste ample, comme s’il saluait un ancien roi. Son sourire est large, ses yeux vifs, et sa voix grave a le timbre de celui qui a vendu bien plus que des objets.</p><p><em>Bienvenue, voyageur. Mes marchandises n’existent sur aucune carte et changent de main plus vite que le vent. Jette un œil si tu veux, mais ne tarde pas trop… le désert ne pardonne pas l’hésitation.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_farouk_le_nomade',
            'reference' => 'quest_step_farouk_le_nomade_1',
        ],
        [
            'name' => 'Farouk - Quête',
            'text' => "<p><em>Un homme étrange, oui. Sable dans les bottes, mais pas une goutte de sueur. Il est passé ici, m’a volé un objet avant même que je le voie bouger. Je l’ai suivi un moment… jusqu’à ce qu’il disparaisse dans l’Oasis Sans Nom.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_farouk_le_nomade',
            'reference' => 'quest_step_farouk_le_nomade_2',
        ],
        [
            'name' => 'Farouk - Oasis',
            'text' => "<p><em>Tu veux suivre ses traces&nbsp;? L’Oasis Sans Nom dort au sud, cachée entre les dunes. Si tu vois les palmiers danser sans vent, c’est que tu es proche. Et si tu entends chanter… ne réponds pas.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'reveal_location' => 'oasis-sans-nom',
            ],
            'dialog' => 'quest_farouk_le_nomade',
            'reference' => 'quest_step_farouk_le_nomade_3',
        ],
        [
            'name' => 'Farouk - Accepter la quête',
            'text' => "<p><em>Surprenante décision. Mais si tu veux traverser le sable, équipe-toi. Le désert ne respecte que les âmes bien préparées… et les bourses pleines.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 1,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_farouk_le_nomade',
            'reference' => 'quest_step_farouk_le_nomade_4',
        ],
        [
            'name' => 'Farouk - Refuser la quête',
            'text' => "<p><em>Tu choisis la prudence&nbsp;? Je comprends. Mais sache que ce que je vends ici ne repassera peut-être jamais. Le désert garde ses secrets… et moi aussi.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_farouk_le_nomade',
            'reference' => 'quest_step_farouk_le_nomade_5',
        ],
        [
            'name' => 'Farouk - Quête en cours',
            'text' => "<p><em>Tu as trouvé ton voleur&nbsp;? Tu as besoin de t'équiper mieux que… ça, afin de l'affronter dignement&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_farouk_le_nomade',
            'reference' => 'quest_step_farouk_le_nomade_6',
        ],

        // Ragots
        [
            'name' => 'Farouk - Histoire',
            'text' => "<p><em>Le bois qui rafraîchit le désert au nord… Il cache beaucoup de nœuds dans ses branches. Des nœuds qu’on n’a pas tous défaits. Un client, un vieil homme du sud, m’a jadis murmuré cette phrase&nbsp;:&nbsp;Le Cercle jugeait en silence. Et parfois… il pendait aussi.</em></p>",
            'first' => true,
            'conditions' => [
                'location_unknown' => 'crique-du-pendu',
            ],
            'dialog' => 'rumor_farouk_le_nomade',
            'reference' => 'rumor_step_farouk_le_nomade_1',
        ],
        [
            'name' => "Farouk - Crique du Pendu",
            'text' => "<p><em>Je n’ai pas compris sur le moment, moi non plus. Mais j’ai retenu le nom de l'endroit qu’il a évoqué. La Crique du Pendu. Charmant, non&nbsp;? Si vous avez du courage… et on dirait bien que c'est le cas, allez poser votre main sur le sol là-bas.</em></p>",
            'conditions' => [
                'location_unknown' => 'crique-du-pendu',
            ],
            'effects' => [
                'reveal_location' => [
                    'bois-du-pendu',
                    'crique-du-pendu',
                ],
                'start_quest' => 'le-jugement-du-cercle',
            ],
            'dialog' => 'rumor_farouk_le_nomade',
            'reference' => 'rumor_step_farouk_le_nomade_2',
        ],
        [
            'name' => 'Farouk - Ragots',
            'text' => "<p><em>Jadis, j’ai vendu un miroir à une vieille femme qui vivait seule. Depuis, elle refuse de me voir. Elle dit que j’y ai laissé une part de moi…</em></p><p>Il se fend d'un large sourire, pas très convaincant cependant.</p><p><em>Comment serait-ce possible&nbsp;?</em></p>",
            'conditions' => [
                'location_known' => 'crique-du-pendu',
            ],
            'first' => true,
            'dialog' => 'rumor_farouk_le_nomade',
            'reference' => 'rumor_step_farouk_le_nomade_3',
        ],
    ];
}
