<?php

namespace App\DataFixtures\Combat\BoisDuPendu;

use App\Entity\Character\Npc;

trait ClairiereDeLOublieTrait
{
    const CLAIRIERE_DE_L_OUBLIE_COMBATS = [
        // Quêtes
        [
            'name' => 'Les Druides du Bois du Pendu',
            'picture' => 'img/chapter1/combat/bois-du-pendu-druides-de-la-clairiere.webp',
            'thumbnail' => 'img/chapter1/combat/bois-du-pendu-druides-de-la-clairiere_thumb.png',
            'description' => "<p>Alors que vous approchez de la clairière, une brume épaisse s’élève entre les arbres. Trois druides surgissent des fourrés, le visage peint de symboles anciens. Leurs voix se mêlent en un chant étrange et sinistre. Ce n’est pas une simple mise en garde : c’est une sentence.</p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 3,
                    'status' => 'progress',
                ],
            ],
            'reward' => 'reward_combat_bois_du_pendu_druides_de_la_clairiere',
            'victoryDescription' => "<p>Le silence retombe, brisé seulement par les bruissements des feuilles. Les corps des druides gisent à vos pieds, inertes, leurs bâtons brisés. Derrière eux, une silhouette émerge lentement de l’ombre… Théobald.</p><p>Il vous observe, et hoche lentement la tête.</p><p><em>Vous êtes encore debout… Très bien. Alors écoutez.</em></p>",
            'defeatDescription' => "<p>Les racines ont jailli du sol, les lianes ont serré vos membres, et les chants druidiques ont fait vibrer la forêt entière contre vous. La clairière s’est refermée comme une cage. Les druides se penchent vers vous, puis… le noir.</p><p>Quand vous revenez à vous, vous êtes au Temple de la Capitale. Vous vous sentez mieux, et votre bourse semble allégée elle aussi.</p>",
            'location' => 'location_zone_clairiere_de_loublie',
            'questStep' => 'quest_secondary_bagarre_bizarre_step_3',
            'enemies' => [
                [
                    'enemy' => 'npc_druide',
                    'enemyClass' => Npc::class,
                ],
                [
                    'enemy' => 'npc_druide',
                    'enemyClass' => Npc::class,
                ],
                [
                    'enemy' => 'npc_druide',
                    'enemyClass' => Npc::class,
                ],
            ],
            'redirectToDialog' => 'theobald-combat',
            'reference' => 'combat_bois_du_pendu_druides_de_la_clairiere',
        ],
    ];
}
