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
            'description' => "<p>En explorant les Anciens Docks, j’ai découvert une note étrange, signée du Prince Alaric lui-même. Elle mentionne des druides, des portes et une clé. Ce n’est sûrement pas un hasard…</p><p>Cette piste semble liée à sa disparition. Il va falloir creuser davantage.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_2',
        ],
        [
            'description' => "<p>Théobald Gris-Murmure, un ancien druide du Bois du Pendu, m’a révélé que le Prince Alaric avait tenté de consulter leur cercle avant sa disparition. Il cherchait un ancien rituel en lien avec le Donjon de l’Âme. Une piste… enfin. Je dois aller parler à ces druides…</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_3',
        ],
        [
            'description' => "<p>Théobald m’a également parlé d'une &laquo;clé&raquo;, qui permettrait d'ouvrir &laquo;le Tombeau&raquo;. Je n'ai pas tout compris, mais ce renseignement pourrait être utile, voire crucial pour la suite…</p>",
            'position' => 4,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_4',
        ],
        [
            'description' => "<p>J'ai retrouvé un médaillon étrange, orné de motifs étranges. Il semble avoir une certaine importance, mais je ne sais pas encore laquelle.</p>",
            'position' => 5,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_5',
        ],
    ];
}
