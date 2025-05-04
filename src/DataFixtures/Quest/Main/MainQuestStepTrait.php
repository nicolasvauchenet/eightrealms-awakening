<?php

namespace App\DataFixtures\Quest\Main;

trait MainQuestStepTrait
{
    const MAIN_QUEST_STEPS = [
        [
            'description' => "<p>Le Royaume de l’Île du Nord est plongé dans le doute depuis la disparition du Prince Alaric, parti explorer le mystérieux Donjon de l’Âme pour prouver sa bravoure. Lorsque le Roi Galdric III a tenté de le retrouver, il n’est jamais revenu non plus… Et depuis le Royaume est sans tête et la tension est palpable au sein du peuple de l'Île.</p><p>Je ne sais absolument pas par quoi commencer… Il va falloir trouver des indices.</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_1',
        ],
        [
            'description' => "<p>Un ancien druide du Bois du Pendu m’a révélé que le Prince Alaric avait consulté leur cercle avant sa disparition. Il cherchait un ancien rituel en lien avec le Donjon de l’Âme. Une piste… enfin.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_2',
        ],
        [
            'description' => "<p>J'ai retrouvé un médaillon en or, orné de motifs étranges et de pierres précieuses. Il semble avoir une certaine importance, mais je ne sais pas encore laquelle.</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_3',
        ],
    ];
}
