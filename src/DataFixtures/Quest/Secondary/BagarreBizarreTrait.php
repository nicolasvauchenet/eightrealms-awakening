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
            'description' => "<p>À la Taverne de la Flûte Moisie, le Tavernier m’a parlé d’une étrange altercation&nbsp;:&nbsp;un vieillard seul, mais redoutable au combat, a mis en déroute trois bandits en un instant. Avant de quitter les lieux, il aurait murmuré quelque chose à propos d’un bois ancien… un certain Bois du Pendu.</p><p>Le nom seul donne des frissons. Peut-être que cet homme s’y est réfugié. Ou peut-être qu’il y cherchait quelque chose.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'giver' => 'npc_jarrod_le_tavernier',
            'giverClass' => Npc::class,
            'reference' => 'quest_secondary_bagarre_bizarre_step_2',
        ],
        [
            'description' => "<p>Je me suis aventuré dans le Bois du Pendu. L’endroit est encore plus sinistre que les rumeurs le laissaient penser. Dans une clairière, j’ai aperçu une silhouette recroquevillée… C’était Théobald. Il semblait m’attendre.</p><p>Mais avant que je puisse l’approcher, des murmures ont surgi des arbres. Plusieurs druides en sont sortis, visiblement décidés à l’éliminer… et moi avec.</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'reference' => 'quest_secondary_bagarre_bizarre_step_3',
        ],
        [
            'description' => "<p>Après la bataille, Théobald m’a expliqué qu’il avait autrefois appartenu à un cercle druidique. Il en est parti après une divergence sur un rituel ancien que le Prince Alaric voulait comprendre avant d’entrer dans le Donjon de l’Âme. Théobald pense que ce rituel pourrait être la clé de sa disparition…</p><p>Il m’a donné un objet scellé, en me disant : &laquo;&nbsp;Quand le moment viendra, ce sera à toi d’en découvrir le sens&nbsp;&raquo;.</p>",
            'position' => 4,
            'last' => true,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'reference' => 'quest_secondary_bagarre_bizarre_step_4',
        ],
    ];
}
