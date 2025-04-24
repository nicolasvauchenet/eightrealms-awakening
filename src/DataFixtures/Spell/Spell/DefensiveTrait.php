<?php

namespace App\DataFixtures\Spell\Spell;

trait DefensiveTrait
{
    const DEFENSIVE_SPELLS = [
        // Buffs
        [
            'name' => 'Force de géant',
            'description' => "<p>La Force de géant est un sort défensif qui augmente considérablement la force du lanceur pendant une courte durée. En canalisant l'énergie des géants, il permet au mage de porter des coups dévastateurs, rendant ses attaques presque irrésistibles. Un sort clé pour les mages désireux d'augmenter leur puissance offensive.</p>",
            'type' => 'defensive',
            'manaCost' => 10,
            'target' => 'damage',
            'amount' => 5,
            'duration' => 1,
            'category' => 'category_weapon',
            'reference' => 'spell_giantstrength',
        ],
        [
            'name' => 'Bouclier',
            'description' => "<p>Le Bouclier est un sort défensif qui augmente considérablement la défense du lanceur pendant une courte durée. En entourant le mage d’une énergie protectrice, il réduit les dégâts reçus, le rendant presque invulnérable face aux attaques les plus puissantes. Un sort clé pour survivre dans les moments de danger.</p>",
            'type' => 'defensive',
            'manaCost' => 10,
            'target' => 'defense',
            'amount' => 5,
            'duration' => 1,
            'category' => 'category_shield',
            'reference' => 'spell_shield',
        ],

        // Restoration
        [
            'name' => 'Soin',
            'description' => "<p>Ce sort de lumière restaure les points de vie d’une cible, dissipant blessures et douleurs en un instant. Simple mais efficace, il est indispensable pour tout soigneur ou aventurier désireux de maintenir son groupe en vie. Avec un faible coût en mana, il peut être utilisé fréquemment dans les situations critiques.</p>",
            'type' => 'defensive',
            'manaCost' => 10,
            'target' => 'health',
            'amount' => 20,
            'category' => 'category_restoration',
            'reference' => 'spell_healrestore',
        ],
        [
            'name' => 'Recharge',
            'description' => "<p>Ce sort de lumière restaure les points de mana d’une cible, dissipant la fatigue et la lassitude en un instant. Simple mais efficace, il est indispensable pour tout soigneur ou aventurier désireux de maintenir son groupe en vie. Avec un faible coût en mana, il peut être utilisé fréquemment dans les situations critiques.</p>",
            'type' => 'defensive',
            'manaCost' => 10,
            'target' => 'mana',
            'amount' => 20,
            'category' => 'category_restoration',
            'reference' => 'spell_manarestore',
        ],
    ];
}
