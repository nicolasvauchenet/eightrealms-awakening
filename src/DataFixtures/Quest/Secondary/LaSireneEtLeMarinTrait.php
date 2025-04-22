<?php

namespace App\DataFixtures\Quest\Secondary;

trait LaSireneEtLeMarinTrait
{
    const LA_SIRENE_ET_LE_MARIN_QUEST_STEPS = [
        [
            'description' => "<p>Dans un coin de la Taverne de la Flûte Moisie, une vieille femme nommée Myra m’a parlé d’une ancienne ballade oubliée, capable d’éveiller les souvenirs engloutis. Selon elle, certains vers chantés au bon endroit pourraient réveiller une présence dans les Docks de l’Ouest.</p><p>Je vais explorer le quartier en fredonnant la chanson…</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_la_sirene_et_le_marin',
            'reference' => 'quest_secondary_la_sirene_et_le_marin_step_1',
        ],
        [
            'description' => "<p>En chantant la ballade près du port, une créature est apparue depuis les flots : une Sirène mélancolique. Elle m’a attaqué sans un mot. Après un rude combat, elle m’a parlé d’un objet précieux perdu sur une plage lointaine, dans le Désert des Sables Chauds.</p><p>Je dois retrouver cette plage mystérieuse.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_la_sirene_et_le_marin',
            'reference' => 'quest_secondary_la_sirene_et_le_marin_step_2',
        ],
        [
            'description' => "<p>J’ai traversé plusieurs zones arides du Désert des Sables Chauds. En longeant les dunes, je suis enfin arrivé sur la Plage de la Sirène. Là, j’ai découvert un médaillon enfoui dans le sable, attaché à un squelette blanchi par le temps. Le nom gravé dessus résonne encore dans mon esprit : &laquo;&nbsp;Eryl&nbsp;&raquo;.</p><p>Je devrais rapporter le médaillon à la Sirène.</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_secondary_la_sirene_et_le_marin',
            'reference' => 'quest_secondary_la_sirene_et_le_marin_step_3',
        ],
        [
            'description' => "<p>J’ai montré le médaillon à la Sirène. Elle a disparu dans les flots en me le laissant, probablement en guise de récompense, ou parce qu'elle n'en n'avait cure. Ce médaillon me servira peut-être dans ma préparation pour affronter les ténèbres du Donjon de l’Âme…</p><p>Certains souvenirs ne meurent jamais, ils se chantent.</p>",
            'position' => 4,
            'last' => true,
            'quest' => 'quest_secondary_la_sirene_et_le_marin',
            'reference' => 'quest_secondary_la_sirene_et_le_marin_step_4',
        ],
    ];
}
