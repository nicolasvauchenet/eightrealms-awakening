<?php

namespace App\DataFixtures\Quest\Secondary;

use App\Entity\Character\Npc;

trait BagarreBizarreTrait
{
    const BAGARRE_BIZARRE_QUEST_STEPS = [
        [
            'description' => "<p>Robert, un garde de Port Saint-Doux que j'ai rencontré dans le Quartier du Marché, m'a parlé d'une rixe étrange qui se serait déroulée à la Taverne de la Flûte Moisie, dans le Quartier des Docks de l'Ouest.</p><p>Je vais me rendre à la Taverne pour en savoir plus.</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'giver' => 'npc_robert_le_garde',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_bagarre_bizarre_step_1',
        ],
        [
            'description' => "<p>À la Taverne de la Flûte Moisie, le Tavernier m’a parlé d’une altercation pas commune&nbsp;: un vieillard seul, mais redoutable au combat, a mis en déroute trois bandits en un instant. Avant de quitter les lieux, il aurait murmuré quelque chose à propos d’un bois ancien… un certain Bois du Pendu.</p><p>Le nom seul donne des frissons. Peut-être que cet homme s’y est réfugié. Peut-être qu’il fuyait quelque chose…</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'giver' => 'npc_jarrod_le_tavernier',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_bagarre_bizarre_step_2',
        ],
        [
            'description' => "<p>Je me suis aventuré dans le Bois du Pendu. L’endroit est encore plus sinistre que les rumeurs le laissaient penser. Dans une clairière, j’ai aperçu une silhouette recroquevillée… C’était Théobald Gris-Murmure, le vieillard de la taverne. Il semblait attendre quelqu'un, ou quelque chose.</p><p>Mais à peine ai-je commencé à lui parler, des murmures ont surgi des arbres. Plusieurs druides en sont sortis, visiblement décidés à l’éliminer… et moi avec.</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'reference' => 'quest_secondary_bagarre_bizarre_step_3',
        ],
        [
            'description' => "<p>Le combat fut rude et compliqué, mais j'ai eu raison des assaillants. En effet, ils n'ont fait aucune différence entre leur cible et moi. D'ailleurs, je ne souviens pas avoir vu Théobald se battre…</p>",
            'position' => 4,
            'last' => false,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'reference' => 'quest_secondary_bagarre_bizarre_step_4',
        ],
        [
            'description' => "<p>Après la bataille, Théobald m’a révélé qu’il avait été banni du Cercle des Druides. Il avait osé vouloir apprendre un rituel, le &laquo;Rituel de l’Âme&raquo;, de peur que ce savoir précieux disparaisse avec le Grand Druide. Accusé de vouloir usurper les secrets sacrés, il fut d'abord rejeté, puis pourchassé par ses anciens compagnons.</p>",
            'position' => 5,
            'last' => false,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'reference' => 'quest_secondary_bagarre_bizarre_step_5',
        ],
        [
            'description' => "<p>Cette histoire de bagarre est résolue, et Port Saint-Doux n'était pas directement concernée. Ce sont des histoires de druides, sans incidence pour le Royaume ni pour la Capitale. Je vais retourner voir le garde au Quartier du Marché.</p>",
            'position' => 6,
            'last' => false,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'reference' => 'quest_secondary_bagarre_bizarre_step_6',
        ],
        [
            'description' => "<p>Je suis retourné voir Robert le Garde, à Port Saint-Doux. Il m’a remercié… à sa manière. Pas de récompense, pas d'effusion de joie, mais au moins, il semble soulagé de tourner la page. Et moi, j’en sais désormais un peu plus sur les druides du Bois du Pendu.</p>",
            'position' => 7,
            'last' => true,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'giver' => 'npc_robert_le_garde',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_bagarre_bizarre_step_7',
        ],
    ];
}
