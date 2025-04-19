<?php

namespace App\DataFixtures\Item\Ring;

trait UtileTrait
{
    const UTILE_RINGS = [
        [
            'name' => 'Anneau de vision nocturne',
            'picture' => 'ring.png',
            'description' => "<p>Ce mystérieux anneau, gravé de runes anciennes, confère à son porteur la capacité de voir dans l’obscurité totale. Idéal pour les explorateurs de cavernes ou les voleurs opérant dans l’ombre, il dévoile les secrets cachés et les dangers invisibles. Plus qu’un simple accessoire, cet anneau est un outil précieux pour les missions nécessitant discrétion et précision dans les environnements sombres.</p>",
            'type' => 'utile',
            'price' => 800,
            'category' => 'category_ring',
            'effect' => 'nightVision',
            'reference' => 'ring_night_vision',
        ],
    ];
}
