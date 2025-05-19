<?php

namespace App\DataFixtures\Combat\BoisDuPendu;

use App\Entity\Character\Creature;

trait CriqueDuPenduTrait
{
    const CRIQUE_DU_PENDU_COMBATS = [
        // Quêtes
        [
            'name' => 'Gérome le Pendu',
            'picture' => 'img/chapter1/combat/bois-du-pendu-gerome.webp',
            'thumbnail' => 'img/chapter1/combat/bois-du-pendu-gerome_thumb.png',
            'description' => "<p>L’air s’est figé. Le silence est devenu lourd. Gérome ne parle plus. Il ne vous regarde plus. Il hurle, mais ce cri ne sort pas de sa bouche. C’est un cri ancien, oublié, résonnant dans les arbres. Et soudain, il se jette sur vous, le visage tordu par la douleur, les bras comme des crocs. Ce n’est plus un fantôme… c’est une blessure ouverte.</p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-jugement-du-cercle',
                    'quest_step' => 4,
                    'status' => 'progress',
                ],
            ],
            'reward' => 'reward_combat_bois_du_pendu_gerome',
            'victoryDescription' => "<p>Le corps spectral de Gérome se fige une dernière fois, puis se dissout lentement dans un souffle. Pas un cri, pas un mot. Juste un soupir… Peut-être un merci. Peut-être un oubli. Il ne reste plus que la vase… et une vieille amulette, à moitié enfoncée dans la boue.</p>",
            'defeatDescription' => "<p>Gérome vous terrasse avec une rage sourde. Son visage est celui d’un mort qu’on n’a jamais laissé partir. Vous sentez sa main glacée effleurer votre gorge, comme pour y accrocher une corde. Puis, plus rien. Juste le noir. Et le poids d’une histoire que vous n’avez pas su comprendre.</p>",
            'location' => 'location_zone_crique_du_pendu',
            'questStep' => 'quest_secondary_le_jugement_du_cercle_step_4',
            'enemies' => [
                [
                    'enemy' => 'creature_gerome_le_pendu',
                    'enemyClass' => Creature::class,
                ],
            ],
            'reference' => 'combat_bois_du_pendu_gerome',
        ],
    ];
}
