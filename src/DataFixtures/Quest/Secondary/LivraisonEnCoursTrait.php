<?php

namespace App\DataFixtures\Quest\Secondary;

trait LivraisonEnCoursTrait
{
    const LIVRAISON_EN_COURS_QUEST_STEPS = [
        [
            'description' => "<p>Gart le Forgeron m'a demandé de livrer un bouclier dans le village de Plouc. Il s'agit d'une commande spéciale pour un client qui n'a pas pu se déplacer pour venir le chercher.</p><p>Le client est un jeune pêcheur qui s'appelle Gérard et il habite dans la première maison à droite en entrant dans le village.</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_1',
        ],
        [
            'description' => "<p>J'ai rencontré Gérard, mais j'ai vite compris qu'il comptait utiliser le bouclier pour un mission suicide&nbsp;:&nbsp;allez chasser une bande de gobelins… Je ne sais ni où ils se trouvent, ni combien ils sont, mais je ne peux pas laisser cet homme y aller comme ça. Je vais trouver ces gobelins.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_2',
        ],
    ];
}
