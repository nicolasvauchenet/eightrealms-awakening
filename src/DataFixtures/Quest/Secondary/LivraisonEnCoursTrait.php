<?php

namespace App\DataFixtures\Quest\Secondary;

trait LivraisonEnCoursTrait
{
    const LIVRAISON_EN_COURS_QUEST_STEPS = [
        [
            'description' => "<p>Gart le Forgeron m'a demandé de livrer un bouclier dans le village de Plouc. Il s'agit d'une commande spéciale pour un client qui n'est jamais venu le chercher.</p><p>Le client est un vieux pêcheur qui s'appelle Gérard et il habite dans la première maison à droite en entrant dans le village.</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_1',
        ],
        [
            'description' => "<p>J'ai livré le bouclier à Gérard. Je peux retourner en ville. Une mission rapide et facile, comme je les aime.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_2',
        ],
        [
            'description' => "<p>J'ai discuté avec Gérard, et j'ai vite compris qu'il comptait utiliser le bouclier pour un mission suicide&nbsp;:&nbsp;aller chasser une bande de gobelins qui campent dans le Bois de Relents, aux abords du village… Je ne sais pas combien ils sont, mais je ne peux pas laisser cet homme y aller comme ça. Je vais trouver ces gobelins.</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_3',
        ],
        [
            'description' => "<p>J'ai discuté avec Gérard, et j'ai vite compris qu'il comptait utiliser le bouclier pour un mission suicide&nbsp;:&nbsp;aller chasser une bande de gobelins… Ils sont fous ces pêcheurs.</p>",
            'position' => 4,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_4',
        ],
        [
            'description' => "<p>Sur le chemin indiqué par Gérard, j'ai été attaqué par des éclaireurs gobelins. Après les avoir vaincus, j'ai découvert un campement caché dans les bois. Ces gobelins semblent vivre là depuis un moment. Je dois décider si je tente de parlementer avec leur chef ou si je les élimine tous.</p>",
            'position' => 5,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_5',
        ],
        [
            'description' => "<p>J'ai nettoyé le camp des gobelins. Je vais retourner informer Gérard.</p>",
            'position' => 6,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_6',
        ],
        [
            'description' => "<p>J'ai parlé avec le chef des gobelins. Ils se disent affamés et rejetés par les pêcheurs. J'ai accepté de retourner au village pour tenter d'organiser une discussion. Gérard ne sera sûrement pas d'accord, mais peut-être qu'un mensonge convaincant pourrait le faire changer d'avis…</p>",
            'position' => 7,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_7',
        ],
        [
            'description' => "<p>Les pêcheurs ont accepté la proposition de paix avec les gobelins, sous conditions, mais l'espoir est permis. Je vais retourner informer le chef gobelin.</p>",
            'position' => 8,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_8',
        ],
        [
            'description' => "<p>Gérard est têtu et ne veut pas entendre parler de paix avec les gobelins. Tant pis, je n'ai pas le temps de discuter. Je lui ai rendu le bouclier et j'ai quitté ce village de fous.</p>",
            'position' => 9,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_9',
        ],
        [
            'description' => "<p>Je suis retourné au campement gobelin, pour les informer et les mettre en garde. Le chef gobelin m’a remercié, il m'a offert un anneau magique et une information étrange sur un vieil homme qu’ils ont aperçu dans la forêt, qui parlait seul et se dirigeait vers le Col du Vent Noir. Était-ce le Roi&nbsp;? Je n'en sais pas plus. Je retournerai peut-être à Plouc un jour, pour voir si tout se passe bien…</p>",
            'position' => 10,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_10',
        ],
        [
            'description' => "<p>Je vais retourner voir Gart à Port Saint-Doux.</p>",
            'position' => 11,
            'last' => false,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_11',
        ],
        [
            'description' => "<p>Je suis retourné voir le forgeron. Il m’a remercié pour la livraison et m'a offert une belle récompense. Cette course m'aura permis de découvrir le Royaume un peu plus.</p>",
            'position' => 12,
            'last' => true,
            'quest' => 'quest_secondary_livraison_en_cours',
            'reference' => 'quest_secondary_livraison_en_cours_step_12',
        ],
    ];
}
