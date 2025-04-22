<?php

namespace App\DataFixtures\Quest\Secondary;

trait BagarreBizarreTrait
{
    const BAGARRE_BIZARRE_QUEST_STEPS = [
        [
            'description' => "<p>Robert, un garde de Port Saint-Doux que j'ai rencontré dans le Quartier du Marché, m'a parlé d'une rixe étrange qui se serait déroulée à la Taverne de la Flûte Moisie, dans le Quartier des Docks de l'Ouest.</p><p>Je vais me rendre à la Taverne pour en savoir plus.</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'reference' => 'quest_secondary_bagarre_bizarre_step_1',
        ],
        [
            'description' => "<p>À la Taverne de la Flûte Moisie, le Tavernier m’a parlé d’une étrange altercation&nbsp;:&nbsp;un vieillard seul, mais redoutable au combat, a mis en déroute trois bandits en un instant. Avant de quitter les lieux, il aurait murmuré quelque chose à propos d’un bois ancien… un certain Bois du Pendu.</p><p>Le nom seul donne des frissons. Peut-être que cet homme s’y est réfugié. Ou peut-être qu’il y cherchait quelque chose.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_bagarre_bizarre',
            'reference' => 'quest_secondary_bagarre_bizarre_step_2',
        ],
    ];
}
