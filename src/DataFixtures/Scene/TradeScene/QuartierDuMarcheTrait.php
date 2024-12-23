<?php

namespace App\DataFixtures\Scene\TradeScene;

trait QuartierDuMarcheTrait
{
    const SOPHIE_LA_MARCHANDE_TRADE = [
        'name' => 'Sophie La Marchande',
        'position' => 1,
        'npc' => 'npc_sophie_la_marchande',
        'description' => "<p><em>Quelle belle journée pour faire un peu de commerce&nbsp;! Que puis-je pour vous&nbsp;?</em></p>",
        'screen' => 'screen_trade_sophie_la_marchande',
        'sellableItems' => [
            'map',
            'gift',
            'food',
        ],
        'reference' => 'scene_trade_sophie_la_marchande',
    ];
}
