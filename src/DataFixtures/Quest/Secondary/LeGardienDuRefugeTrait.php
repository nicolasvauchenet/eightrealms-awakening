<?php

namespace App\DataFixtures\Quest\Secondary;

trait LeGardienDuRefugeTrait
{
    const LE_GARDIEN_DU_REFUGE_QUEST_STEPS = [
        [
            'description' => "<p>Perdu dans les hauteurs des Monts Terribles, j’ai découvert un refuge isolé. Rien ne bouge à l'intérieur, mais tout semble habité&nbsp;:&nbsp;des cendres encore tièdes dans la cheminée, de la vaisselle récente. L’endroit garde un secret, mais je ne comprends pas…</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_1',
        ],
        [
            'description' => "<p>En fouillant le refuge, j'ai trouvé un journal griffonné de mots énigmatiques. Il appartient à Tharôl. Il semble être le dernier occupant des lieux, mais il n'est pas là. Le journal parle d'une bête, d'un lien étrange, et de la peur de perdre le contrôle.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_2',
        ],
        [
            'description' => "<p>Ne sachant trop quoi faire, et fatigué par l'ascension jusqu'au refuge, j'ai décidé de rester cette nuit pour me reposer.</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_3',
        ],
        [
            'description' => "<p>En sortant le lendemain matin, j’ai été attaqué par une bête immense&nbsp;:&nbsp;un bouquetin massif, aux yeux trop humains pour être ceux d'un simple animal. Il m’a chargé sans hésiter. J’ai dû me battre. Quand ce fut terminé, son corps gisait dans la neige.</p>",
            'position' => 4,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_4',
        ],
        [
            'description' => "<p>En revenant dans le refuge, une surprise m'attendait&nbsp;:&nbsp;Tharôl était là, assis sur une chaise. Il n'a posé aucune question, ne semblait même pas surpris par ma présence. Il a prétendu n’avoir rien vu et rien entendu du combat qui venait de se dérouler juste dehors. Mais ce silence n’était pas celui d’un ignorant. Je trouve cet homme étrangement silencieux, et je me demande comment il a pu entrer dans le refuge sans que je ne le voie. Peut-être s'y est-il glissé pendant que j'évitais les coups de cornes…</p>",
            'position' => 5,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_5',
        ],
        [
            'description' => "<p>Je ne sais vraiment pas quoi faire, ni quoi dire, quand Tharôl reviendra… s'il revient. J'ai décidé de passer une nuit de plus dans le refuge.</p>",
            'position' => 6,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_6',
        ],
        [
            'description' => "<p>Le bouquetin est revenu&nbsp;! Je l'ai pourtant tué et je suis certain qu'il était bien mort, mais il est revenu. Je vais devoir forcer les choses, quand Tharôl reviendra, j'ai besoin de comprendre ce qui se passe dans ces montagnes.</p>",
            'position' => 7,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_7',
        ],
        [
            'description' => "<p>J’ai réussi à faire tomber le masque. À demi-mots, Tharôl a reconnu la vérité&nbsp;:&nbsp;il devient cette bête. Sans le vouloir, et de plus en plus souvent. Il ignore pourquoi, mais cela semble être lié à l'Épine du Roi, qu'il porte depuis trop longtemps. Il ne contrôle rien. Il se transforme… et il oublie. Il m’a demandé de partir. Mais je refuse d’abandonner un homme à moitié vivant.</p>",
            'position' => 8,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_8',
        ],
        //Break
        [
            'description' => "<p>Le Grand Druide m’a parlé d’un ancien rituel de séparation. Un lien d’âme. Une faille. Il ne connaît pas les mots exacts, mais il m’a guidé vers les Archives oubliées de Port Saint-Doux. Là-bas, peut-être, j’en saurai davantage.</p>",
            'position' => 9,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_9',
        ],
        [
            'description' => "<p>Dans les profondeurs des Archives, j’ai retrouvé un vieux manuscrit : <em>Serments Brisés</em>. Deux rituels s’y affrontent : l’un pour rompre le lien, l’autre pour le reprendre à son compte. Les avertissements sont clairs. Mais je n’ai plus le luxe d’hésiter.</p>",
            'position' => 10,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_10',
        ],
        [
            'description' => "<p>J’ai échoué. Le rituel n’a pas fonctionné. Tharôl s’est tordu dans une douleur impossible. Il s’est transformé. Définitivement. Ce n’est plus un homme. C’est la bête. Et elle ne reviendra plus. J’ai mis fin au lien. Mais pas comme je l’espérais.</p>",
            'position' => 11,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_11',
        ],
        [
            'description' => "<p>Le rituel a réussi. Tharôl s’est effondré, vidé. Il ne se souvient plus. L’Épine est là, entre nous. Il la regarde à peine. Il ne veut plus décider. Il ne veut plus rien. C’est à moi de trancher.</p>",
            'position' => 12,
            'last' => false,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_12',
        ],
        [
            'description' => "<p>J’ai affronté Tharôl. Ou ce qu’il en restait. Il refusait de céder l’Épine. J’ai dû la prendre par la force. Ce n’est pas une victoire. C’est une fin. Une fin sale.</p>",
            'position' => 13,
            'last' => true,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_13',
        ],
        [
            'description' => "<p>Je suis reparti avec l’Épine. Tharôl est resté là, libre, vide… ou mort. Je ne sais plus. Je sais seulement que le poids a changé de main. Et qu’il ne sera pas plus léger pour moi.</p>",
            'position' => 14,
            'last' => true,
            'quest' => 'quest_secondary_le_gardien_du_refuge',
            'reference' => 'quest_secondary_le_gardien_du_refuge_step_14',
        ],
    ];
}
