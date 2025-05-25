<?php

namespace App\DataFixtures\Item\Misc;

trait QuestTrait
{
    const QUEST_MISC_ITEMS = [
        [
            'name' => "Croc d'Askalor",
            'picture' => 'img/chapter1/item/misc/croc-daskalor.png',
            'description' => "<p>Longue dent noire comme la nuit, arrachée à la gueule d’un dragon oublié, le Croc d’Askalor suinte encore l’écho des pactes interdits. Il fut l’outil par lequel Galdric Ier lia son destin à celui de Nashoré. Forgé dans la douleur, sanctifié dans le sang, le Croc d’Askalor n’est ni une arme, ni une clef… mais un témoignage gravé dans l’os, une mémoire figée. Son contact provoque des visions de flammes et de chaînes, et certains prétendent entendre, dans le silence, un murmure guttural leur promettant grandeur… ou damnation.</p>",
            'type' => 'utile',
            'price' => 8000,
            'category' => 'category_misc',
            'effect' => 'possession-nashore',
            'reference' => 'misc_quest_croc_daskalor',
        ],
    ];
}
