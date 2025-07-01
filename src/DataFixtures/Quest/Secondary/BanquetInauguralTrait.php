<?php

namespace App\DataFixtures\Quest\Secondary;

trait BanquetInauguralTrait
{
    const BANQUET_INAUGURAL_QUEST_STEPS = [
        [
            'description' => "<p>J’ai entendu parler d’un grand banquet organisé par le Maire dans la Mairie du Quartier des Chauves. Il paraît que tout le monde est invité, même les pêcheurs. Ce serait l’inauguration officielle de la Nouvelle Ville.</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_banquet_inaugural',
            'reference' => 'quest_secondary_banquet_inaugural_step_1',
        ],
        [
            'description' => "<p>Le banquet bat son plein à la Mairie. La foule est bigarrée, les visages connus défilent. En observant le Maire, j’ai remarqué une amulette autour de son cou. Elle a un éclat étrange, presque familier. Il faudrait que je trouve un moyen de lui en parler discrètement.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_banquet_inaugural',
            'reference' => 'quest_secondary_banquet_inaugural_step_2',
        ],
        [
            'description' => "<p>J’ai réussi à discuter avec le Maire à propos de son amulette. Selon lui, elle lui a été offerte par le Roi Galdric Ier en personne, comme symbole de confiance. Il en parle avec emphase, mais je ne suis pas sûr de pouvoir le croire… Peut-être devrais-je interroger un érudit à ce sujet.</p>",
            'position' => 3,
            'last' => true,
            'quest' => 'quest_secondary_banquet_inaugural',
            'reference' => 'quest_secondary_banquet_inaugural_step_3',
        ],
    ];
}
