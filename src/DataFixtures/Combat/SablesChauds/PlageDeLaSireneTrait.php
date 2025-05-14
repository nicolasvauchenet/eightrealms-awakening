<?php

namespace App\DataFixtures\Combat\SablesChauds;

use App\Entity\Character\Creature;

trait PlageDeLaSireneTrait
{
    const PLAGE_DE_LA_SIRENE_COMBATS = [
        // Quêtes
        [
            'name' => 'Eryl le Traître',
            'picture' => 'img/chapter1/combat/plage-de-la-sirene-squelettes-marins.png',
            'thumbnail' => 'img/chapter1/combat/plage-de-la-sirene-squelettes-marins_thumb.png',
            'description' => "<p>Deux silhouettes osseuses émergent lentement du sable brûlant. L’une tient encore un vieux harpon rongé par le sel, l’autre arbore un médaillon qui pulse faiblement. Leurs orbites vides brillent d’une haine figée. Même la mort n’a pas effacé les rancunes des marins.</p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 3,
                    'status' => 'progress',
                ],
            ],
            'reward' => 'reward_combat_plage_de_la_sirene_eryl_le_traitre',
            'victoryDescription' => "<p>Les os retombent sur le sable, inertes à nouveau. Le médaillon brille encore au cou du squelette d’Eryl. À ses côtés, un vieux journal trempé émerge de ses effets. Le silence s’installe à nouveau sur la plage, lourd de regrets.</p>",
            'defeatDescription' => "<p>Alors que vos forces vous abandonnent, les deux squelettes vous encerclent. Le sable devient froid et hostile. Votre dernière vision est celle du médaillon se balançant doucement, comme un cœur moqué par le vent.</p>",
            'location' => 'location_zone_plage_de_la_sirene',
            'questStep' => 'quest_secondary_la_sirene_et_le_marin_step_3',
            'enemies' => [
                [
                    'enemy' => 'creature_squelette_de_marin',
                    'enemyClass' => Creature::class,
                ],
                [
                    'enemy' => 'creature_squelette_deryl',
                    'enemyClass' => Creature::class,
                ],
            ],
            'reference' => 'combat_plage_de_la_sirene_eryl_le_traitre',
        ],
    ];
}
