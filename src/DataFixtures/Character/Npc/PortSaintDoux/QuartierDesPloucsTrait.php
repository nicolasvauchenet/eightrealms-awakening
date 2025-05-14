<?php

namespace App\DataFixtures\Character\Npc\PortSaintDoux;

trait QuartierDesPloucsTrait
{
    const QUARTIER_DES_PLOUCS_NPCS = [
        [
            'name' => "Wilbert l'Arcaniste",
            'picture' => 'img/chapter1/npc/wilbert-larcaniste.png',
            'thumbnail' => 'img/chapter1/npc/wilbert-larcaniste_thumb.png',
            'description' => "<p>Vous êtes face à un gnome à la barbe hirsute et au regard électrique. Des parchemins roulés débordent de ses poches, et un grimoire flotte près de lui sans qu’il y prête attention.</p><p><em>Ha&nbsp;! Un nouvel esprit avide de vérité&nbsp;? Approchez. Mais sachez que la connaissance coûte… parfois très cher.</em></p>",
            'strength' => 9,
            'dexterity' => 11,
            'constitution' => 9,
            'wisdom' => 14,
            'intelligence' => 16,
            'charisma' => 13,
            'healthMax' => 90,
            'manaMax' => 80,
            'fortune' => 2000,
            'level' => 2,
            'race' => 'race_gnome',
            'profession' => 'profession_arcaniste',
            'reference' => 'npc_wilbert_larcaniste',
        ],
        [
            'name' => 'Pêcheur',
            'picture' => 'img/core/npc/pecheur.png',
            'thumbnail' => 'img/core/npc/pecheur_thumb.png',
            'description' => "<p>Cet homme a l'air pauvre et plutôt mal nourri. Il s'arrête néanmoins en vous voyant vous approcher, et vous regarde avec un sourire timide.</p><p><em>Bonjour, étranger. Belle journée pour la pêche, pas vrai&nbsp;? Vous cherchez du poisson frais&nbsp;? Je peux vous en vendre à un bon prix&nbsp;!</em></p>",
            'strength' => 10,
            'dexterity' => 12,
            'constitution' => 8,
            'wisdom' => 10,
            'intelligence' => 9,
            'charisma' => 9,
            'healthMax' => 80,
            'manaMax' => 45,
            'fortune' => 5,
            'level' => 1,
            'race' => 'race_humain',
            'profession' => 'profession_pecheur',
            'reference' => 'npc_pecheur',
        ],
    ];
}
