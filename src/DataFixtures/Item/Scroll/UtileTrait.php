<?php

namespace App\DataFixtures\Item\Scroll;

trait UtileTrait
{
    const UTILE_SCROLLS = [
        [
            'name' => 'Parchemin de Invisibilité',
            'picture' => 'scroll.png',
            'description' => "<p>Une fois activé, ce parchemin mystique enveloppe son utilisateur d’un voile d’ombre, le rendant invisible aux yeux de ses ennemis. Idéal pour les voleurs, les espions ou les aventuriers cherchant à échapper à des situations périlleuses, l’Invisibilité est une arme redoutable pour ceux qui savent l’utiliser à bon escient.</p>",
            'type' => 'utile',
            'price' => 800,
            'category' => 'category_scroll',
            'effect' => 'invisibility',
            'duration' => 3,
            'reference' => 'scroll_invisibility',
        ],
        [
            'name' => 'Parchemin de Crochetage',
            'picture' => 'scroll.png',
            'description' => "<p>Ce parchemin utilitaire, parsemé de dessins complexes de serrures et de clés, est l’allié parfait des aventuriers en quête de trésors cachés. Une fois utilisé, il déverrouille magiquement n’importe quelle serrure, même les plus complexes, offrant un accès rapide et silencieux aux zones verrouillées. Idéal pour les voleurs ou les explorateurs en quête d’artefacts précieux.</p>",
            'type' => 'utile',
            'price' => 300,
            'category' => 'category_scroll',
            'effect' => 'unlock',
            'reference' => 'scroll_lockpick',
        ],
    ];
}
