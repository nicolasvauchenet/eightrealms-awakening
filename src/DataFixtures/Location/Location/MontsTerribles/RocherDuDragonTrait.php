<?php

namespace App\DataFixtures\Location\Location\MontsTerribles;

trait RocherDuDragonTrait
{
    const ROCHER_DU_DRAGON_LOCATIONS = [
        [
            'name' => 'Rocher du Dragon',
            'picture' => 'img/chapter1/location/rocher-du-dragon.webp',
            'description' => "<p>Dressé comme une griffe géante plantée dans la montagne, le Rocher du Dragon surplombe un précipice silencieux. Les anciens disent qu’un dragon de pierre y sommeille depuis des siècles, figé dans la roche par un antique sortilège. Parfois, la nuit, des grondements résonnent dans les falaises…</p><p>Certains aventuriers affirment avoir vu des écailles briller sous la lune, d’autres n’en sont jamais revenus.</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_rocher_du_dragon',
        ],
    ];
}
