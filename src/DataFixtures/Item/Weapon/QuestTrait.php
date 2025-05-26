<?php

namespace App\DataFixtures\Item\Weapon;

trait QuestTrait
{
    const QUEST_WEAPONS = [
        [
            'name' => "Croc d'Askalor",
            'picture' => 'croc-daskalor.png',
            'description' => "<p>Forgé dans la douleur, sanctifié dans le sang, le Croc d’Askalor est une lame d’obsidienne noire, incrustée de runes rouges qui palpitent lentement. Arrachée à la gueule d’un dragon oublié, elle fut l’instrument du pacte entre Galdric Ier et Nashoré. Son fil irrégulier déchire chair et esprit, et son porteur entend parfois, dans le silence, un murmure guttural lui promettant grandeur… ou damnation. Ce n’est pas qu’une arme. C’est un avertissement.</p>",
            'type' => 'Arme de mêlée légendaire',
            'price' => 8000,
            'category' => 'category_weapon',
            'healthMax' => 1000,
            'damage' => 20,
            'range' => 1,
            'magical' => true,
            'effect' => 'possession-nashore',
            'requiredLevel' => 10,
            'legendaryBonus' => [
                'against' => 'creature_demon',
                'extra_damage' => 20,
            ],
            'reference' => 'weapon_quest_croc_daskalor',
        ],
    ];
}
