<?php

namespace App\DataFixtures\Item\NpcItem;

use App\Entity\Item\Amulet;
use App\Entity\Item\Book;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Map;
use App\Entity\Item\Potion;
use App\Entity\Item\Ring;
use App\Entity\Item\Scroll;

trait WilbertTrait
{
    const WILBERT_ITEMS = [
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'magical_firewand',
            'class' => MagicalWeapon::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'magical_icewand',
            'class' => MagicalWeapon::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'magical_stormwand',
            'class' => MagicalWeapon::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'magical_firestick',
            'class' => MagicalWeapon::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'magical_icestick',
            'class' => MagicalWeapon::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'magical_stormstick',
            'class' => MagicalWeapon::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'magical_healstick',
            'class' => MagicalWeapon::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'magical_protectionstick',
            'class' => MagicalWeapon::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'ring_health',
            'class' => Ring::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'ring_mana',
            'class' => Ring::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'ring_protection',
            'class' => Ring::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'ring_knight',
            'class' => Ring::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'ring_night_vision',
            'class' => Ring::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'amulet_health',
            'class' => Amulet::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'amulet_mana',
            'class' => Amulet::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'amulet_protection',
            'class' => Amulet::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'scroll_fireball',
            'class' => Scroll::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'scroll_deconcentration',
            'class' => Scroll::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'scroll_heal',
            'class' => Scroll::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'scroll_concentration',
            'class' => Scroll::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'scroll_power',
            'class' => Scroll::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'scroll_barrier',
            'class' => Scroll::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'scroll_invisibility',
            'class' => Scroll::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'scroll_lockpick',
            'class' => Scroll::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'potion_healing',
            'class' => Potion::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'potion_lightmana',
            'class' => Potion::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'potion_mana',
            'class' => Potion::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'potion_invisibility',
            'class' => Potion::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'map_royaume_de_lile_du_nord',
            'class' => Map::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'map_port_saint_doux',
            'class' => Map::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'book_chroniques_galdric',
            'class' => Book::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'journal_d_eryl',
            'class' => Book::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'journal_de_tharol',
            'class' => Book::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'note_anonyme',
            'class' => Book::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'book_bestiary_betes_sauvages',
            'class' => Book::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'book_bestiary_creatures_aquatiques',
            'class' => Book::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'book_bestiary_creatures_monstrueuses',
            'class' => Book::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'book_bestiary_ames_revenantes',
            'class' => Book::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'book_bestiary_creatires_legendaires',
            'class' => Book::class,
        ],
        [
            'character' => 'npc_wilbert_larcaniste',
            'item' => 'book_bestiary_entites_infernales',
            'class' => Book::class,
        ],
    ];
}
