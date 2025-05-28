<?php

namespace App\DataFixtures\Quest\Secondary;

trait LeJugementDuCercleTrait
{
    const LE_JUGEMENT_DU_CERCLE_QUEST_STEPS = [
        [
            'description' => "<p>Farouk le Nomade, un marchand ambulant que j'ai rencontré dans un vieux camp abandonné en plein cœur des Sables Chauds, m'a parlé d'un lieu étrange, situé dans &laquo;le bois au nord du désert&raquo;. Il l'a appelé la Crique du Pendu, et m'a proposé d'aller là-bas et de poser ma main sur le sol… Je n'ai pas compris grand chose, je dois avouer…</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_le_jugement_du_cercle',
            'reference' => 'quest_secondary_le_jugement_du_cercle_step_1',
        ],
        [
            'description' => "<p>J’ai exploré la Crique du Pendu. D’abord, je n’ai rien vu… Puis, je me suis rappelé des paroles de Farouk, et j'ai posé la main sur le sol, juste sous une vieille corde qui pendait, et l’air s’est fait plus lourd et s'est rafraîchi brutalement. C’est là que je l’ai vu. Une silhouette spectrale. Un homme au cou brisé, les pieds dans le vide. Il ne m’a pas attaqué. Il m’a parlé. Lentement. Comme s’il cherchait à se rappeler quelque chose…</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_le_jugement_du_cercle',
            'reference' => 'quest_secondary_le_jugement_du_cercle_step_2',
        ],
        [
            'description' => "<p>Le fantôme m’a posé des questions. Des énigmes… ou plutôt des souvenirs brisés. Il voulait que je lui dise pourquoi il avait été jugé, pendu, effacé. Comme si j’étais là. Comme si j’avais le droit de le juger à mon tour. Il voulait savoir qui il était. J’ai répondu. Et il s’est souvenu. Son nom, son erreur, son supplice. Il m’a regardé avec des yeux presque vivants, et il m’a remercié. Avant de disparaître dans un souffle de brume. À mes pieds, là où il flottait, j’ai trouvé une vieille amulette. Une amulette druidique. Peut-être que le Cercle s’en souviendra, lui aussi.</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_secondary_le_jugement_du_cercle',
            'reference' => 'quest_secondary_le_jugement_du_cercle_step_3',
        ],
        [
            'description' => "<p>Le fantôme m’a posé des questions. Des énigmes… ou plutôt des souvenirs brisés. Il voulait que je lui dise pourquoi il avait été jugé, pendu, effacé. Comme si j’étais là. Comme si j’avais le droit de le juger à mon tour. Il voulait savoir qui il était. J’ai échoué à répondre à ses questions. Il s’est mis à hurler. La forêt a tremblé. Et le fantôme m’a attaqué, ivre de douleur, de colère… ou de folie. J’ai dû me battre. Quand tout fut terminé, un silence écrasant s’est abattu. Et à mes pieds, j’ai trouvé une vieille amulette, visiblement druidique. Peut-être intéressera-t-elle quelqu'un.</p>",
            'position' => 4,
            'last' => true,
            'quest' => 'quest_secondary_le_jugement_du_cercle',
            'reference' => 'quest_secondary_le_jugement_du_cercle_step_4',
        ],
    ];
}
