<?php

namespace App\DataFixtures\Spell\Spell;

trait OffensiveTrait
{
    const OFFENSIVE_SPELLS = [
        [
            'name' => 'Boule de Feu',
            'description' => "<p>Un sort classique mais puissant, la Boule de Feu projette une explosion incandescente qui inflige d’importants dégâts de feu dans une petite zone. Idéal pour anéantir des groupes d’ennemis regroupés ou pour causer des ravages au milieu d’un champ de bataille. Attention cependant, son coût en mana est conséquent, et il nécessite une bonne maîtrise des sorts offensifs.</p>",
            'type' => 'offensive',
            'manaCost' => 5,
            'target' => 'damage',
            'amount' => 10,
            'area' => 1,
            'category' => 'category_fire',
            'reference' => 'spell_fireball',
        ],
        [
            'name' => 'Boule de Glace',
            'description' => "<p>Un sort classique mais puissant, la Boule de Glace projette une explosion glaciale qui inflige d’importants dégâts de froid dans une petite zone. Idéal pour anéantir des groupes d’ennemis regroupés ou pour causer des ravages au milieu d’un champ de bataille. Attention cependant, son coût en mana est conséquent, et il nécessite une bonne maîtrise des sorts offensifs.</p>",
            'type' => 'offensive',
            'manaCost' => 5,
            'target' => 'damage',
            'amount' => 10,
            'area' => 1,
            'category' => 'category_water',
            'reference' => 'spell_iceball',
        ],
        [
            'name' => 'Éclair',
            'description' => "<p>Ce sort précis canalise la puissance de la foudre pour frapper une cible unique avec une grande intensité. Rapide et à faible coût en mana, l’Éclair est idéal pour éliminer des ennemis à distance ou pour interrompre leurs actions. Il est parfait pour les mages cherchant un sort rapide et efficace.</p>",
            'type' => 'offensive',
            'manaCost' => 5,
            'target' => 'damage',
            'amount' => 10,
            'area' => 1,
            'category' => 'category_storm',
            'reference' => 'spell_lightning',
        ],
        [
            'name' => 'Nova Arcanique',
            'description' => "<p>Ce sort libère une puissante onde d’énergie magique qui frappe tous les ennemis proches. Infligeant des dégâts significatifs sur une large zone, il est idéal pour neutraliser des groupes d’adversaires en un instant. Attention toutefois à son coût élevé en mana, qui le réserve aux situations critiques.</p>",
            'type' => 'offensive',
            'manaCost' => 5,
            'target' => 'damage',
            'amount' => 10,
            'area' => 1,
            'category' => 'category_mana',
            'reference' => 'spell_arcane_nova',
        ],
        [
            'name' => 'Explosion de Mana',
            'description' => "<p>Sort ultime de sacrifice, l’Explosion de Mana consomme tout le mana restant du lanceur pour infliger des dégâts proportionnels à la quantité utilisée. C’est un pari risqué mais souvent dévastateur, capable de retourner le cours d’un combat en un instant. Utilisez-le avec prudence !</p>",
            'type' => 'offensive',
            'manaCost' => 0,
            'target' => 'damage',
            'amount' => 0,
            'area' => 1,
            'category' => 'category_mana',
            'reference' => 'spell_mana_explosion',
        ],
    ];
}
