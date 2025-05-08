<?php

namespace App\DataFixtures\Quest\Secondary;

use App\Entity\Character\Creature;
use App\Entity\Character\Npc;

trait LaSireneEtLeMarinTrait
{
    const LA_SIRENE_ET_LE_MARIN_QUEST_STEPS = [
        [
            'description' => "<p>Dans un coin de la Taverne de la Flûte Moisie, une vieille femme nommée Myra m’a parlé d’une ancienne ballade oubliée, capable d’éveiller les souvenirs engloutis. Selon elle, certains vers chantés au bon endroit pourraient réveiller une présence dans les Docks de l’Ouest.</p><p>Je vais explorer le quartier en fredonnant la chanson…</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_la_sirene_et_le_marin',
            'giver' => 'npc_myra_la_vieille',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_la_sirene_et_le_marin_step_1',
        ],
        [
            'description' => "<p>En chantant la ballade près du port, une créature est apparue depuis les flots : une Sirène mélancolique. Elle m’a attaqué sans un mot. Après un rude combat, elle m’a parlé d’un objet précieux perdu sur une plage lointaine, dans le Désert des Sables Chauds.</p><p>Je dois retrouver cette plage mystérieuse.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_la_sirene_et_le_marin',
            'giver' => 'creature_sirene',
            'giverClass' => Creature::class,
            'reference' => 'quest_secondary_la_sirene_et_le_marin_step_2',
        ],
        [
            'description' => "<p>J’ai atteint la Plage de la Sirène dans le Désert des Sables Chauds. Deux squelettes gisaient dans le sable : l’un portait un médaillon étincelant, l’autre semblait mort au combat, tenant un vieux harpon rouillé à la main. En m’approchant, ils se sont relevés. Eryl, le marin traître, et l'autre marin ont tenté de me tuer.</p><p>Après les avoir vaincus, j’ai trouvé sur le corps d’Eryl un vieux journal racontant la trahison du félon. Je peux maintenant décider de dire ou non la vérité à la Sirène…</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_secondary_la_sirene_et_le_marin',
            'reference' => 'quest_secondary_la_sirene_et_le_marin_step_3',
        ],
        [
            'description' => "<p>J’ai retrouvé la Sirène et lui ai tendu le médaillon. Je lui ai raconté ce que j’ai découvert sur Eryl. Elle était bouleversée, mais elle m’a remercié pour la vérité. Avant de disparaître à jamais dans les flots, elle m’a confié le Cœur d’Écume en gage d’amitié et m’a demandé de porter ses regrets à Myra.</p><p>Il est temps de retourner à la Taverne.</p>",
            'position' => 4,
            'last' => false,
            'quest' => 'quest_secondary_la_sirene_et_le_marin',
            'reference' => 'quest_secondary_la_sirene_et_le_marin_step_4',
        ],
        [
            'description' => "<p>J’ai retrouvé la Sirène et je lui ai raconté qu’Eryl l’aimait encore, qu’il n’avait jamais cessé de penser à elle. Elle a semblé apaisée, a repris le médaillon sans un mot, puis a plongé dans les flots. Elle ne m’a rien laissé, sauf peut-être un peu de paix.</p>",
            'position' => 5,
            'last' => true,
            'quest' => 'quest_secondary_la_sirene_et_le_marin',
            'reference' => 'quest_secondary_la_sirene_et_le_marin_step_5',
        ],
        [
            'description' => "<p>Je suis retourné voir Myra à la Taverne. Elle savait déjà. Elle m’a remercié, et a confié que certains cœurs coulent si profondément qu’ils ne refont jamais surface… mais que chanter les souvenirs, c’est déjà les honorer.</p>",
            'position' => 6,
            'last' => true,
            'quest' => 'quest_secondary_la_sirene_et_le_marin',
            'giver' => 'npc_myra_la_vieille',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_la_sirene_et_le_marin_step_6',
        ],
        [
            'description' => "<p>Je suis retourné à la Taverne sans avoir dit la vérité à la Sirène. Myra m’a regardé longuement, sans poser de questions. Elle savait. Ses mots étaient doux, mais leur poids m’est resté dans la gorge. J’ai compris que les mensonges peuvent être des refuges… ou des tombes pour les vérités que l’on n’ose pas affronter.</p><p>Elle a repris son tricot. Et moi, j’ai commandé un verre. Peut-être deux. Le silence, parfois, vaut toutes les chansons du monde.</p>",
            'position' => 7,
            'last' => true,
            'quest' => 'quest_secondary_la_sirene_et_le_marin',
            'giver' => 'npc_myra_la_vieille',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_la_sirene_et_le_marin_step_7',
        ],
    ];
}
