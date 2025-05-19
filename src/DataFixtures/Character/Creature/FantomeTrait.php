<?php

namespace App\DataFixtures\Character\Creature;

trait FantomeTrait
{
    const FANTOME_CREATURES = [
        [
            'name' => 'Fantôme',
            'picture' => 'img/core/creature/fantome.png',
            'thumbnail' => 'img/core/creature/fantome_thumb.png',
            'description' => "<p>Une forme pâle flotte devant vous, les pieds juste au-dessus du sol… Sa tête penche sur le côté. Ses yeux vides vous fixent et semblent regarder à l'intérieur de vous.</p>",
            'strength' => 7,
            'dexterity' => 12,
            'constitution' => 10,
            'wisdom' => 14,
            'intelligence' => 12,
            'charisma' => 8,
            'healthMax' => 90,
            'manaMax' => 40,
            'fortune' => 0,
            'level' => 5,
            'race' => 'race_fantome',
            'reference' => 'creature_fantome',
        ],
        [
            'name' => 'Âme en peine',
            'picture' => 'img/core/creature/ame-en-peine.png',
            'thumbnail' => 'img/core/creature/ame-en-peine_thumb.png',
            'description' => "<p>Une forme pâle flotte devant vous, les pieds juste au-dessus du sol… Sa tête penche sur le côté. Ses yeux vides vous fixent et semblent regarder à l'intérieur de vous.</p>",
            'strength' => 7,
            'dexterity' => 12,
            'constitution' => 10,
            'wisdom' => 14,
            'intelligence' => 12,
            'charisma' => 8,
            'healthMax' => 90,
            'manaMax' => 40,
            'fortune' => 0,
            'level' => 5,
            'race' => 'race_fantome',
            'reference' => 'creature_ame-en-peine',
        ],
        [
            'name' => 'Gérome le Pendu',
            'picture' => 'img/chapter1/creature/gerome-le-pendu.png',
            'thumbnail' => 'img/chapter1/creature/gerome-le-pendu_thumb.png',
            'description' => "<p>Une forme spectrale, ou ce qui reste d'un homme, à la nuque tordue, flotte lentement au-dessus de la vase. Sa silhouette conserve les traces de sa pendaison&nbsp;: corde effilochée, peau violacée, regard brisé. Pourtant, dans ses yeux troubles, il reste une lueur… une mémoire incomplète.</p><p>Il ne semble pas hostile. Pas pour le moment, en tout cas.</p>",
            'strength' => 9,
            'dexterity' => 12,
            'constitution' => 12,
            'wisdom' => 15,
            'intelligence' => 13,
            'charisma' => 10,
            'healthMax' => 120,
            'manaMax' => 65,
            'fortune' => 0,
            'level' => 6,
            'race' => 'race_fantome',
            'reference' => 'creature_gerome_le_pendu',
        ],
    ];
}
