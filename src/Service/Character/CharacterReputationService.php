<?php

namespace App\Service\Character;

use App\Entity\Character\Player;
use App\Entity\Character\Npc;
use App\Entity\Character\PlayerNpc;
use App\Entity\Location\CharacterLocation;
use Doctrine\ORM\EntityManagerInterface;

class CharacterReputationService
{
    private array $raceAffinities = [
        'humain' => [
            'elfe' => 5,   // Respect pour leur magie et leur sagesse
            'nain' => 4,   // Alliés commerciaux et guerriers
            'orque' => -10, // Ennemis historiques
            'halfelin' => 3,   // Sympas mais peu fiables en guerre
            'gnome' => 2,   // Mal compris, mais utiles en ingénierie
            'rat' => -15, // Nuisibles, vecteurs de maladie
            'gobelin' => -8,  // Trop instables pour être dignes de confiance
            'sirene' => -2,  // Méfiance teintée de fascination
        ],
        'elfe' => [
            'humain' => 4,   // Curiosité et admiration modérée
            'nain' => -4,  // Trop bruyants et rustres
            'orque' => -15, // Haine ancestrale
            'halfelin' => 5,   // Les trouvent doux et équilibrés
            'gnome' => 2,   // Amusants mais fatigants
            'rat' => -20, // Créatures abjectes
            'gobelin' => -12, // Incontrôlables et chaotiques
            'sirene' => 6,   // Connexion naturelle et magique
        ],
        'nain' => [
            'humain' => 3,   // Bonnes affaires, bons alliés
            'elfe' => -5,  // Trop hautains et fragiles
            'orque' => -12, // Ennemis brutaux
            'halfelin' => 4,   // Gens simples, appréciés
            'gnome' => 6,   // Cousins bricoleurs
            'rat' => -10, // Infestations de tunnels
            'gobelin' => -15, // Hantent les cavernes et volent les outils
            'sirene' => -3,  // Pas dignes de confiance
        ],
        'orque' => [
            'humain' => -10, // Trop fragiles et arrogants
            'elfe' => -20, // Haine profonde
            'nain' => -15, // Guerres de territoire
            'halfelin' => -5,  // Aucune utilité en combat
            'gnome' => -3,  // Comprennent rien à leurs machines
            'rat' => 6,   // Respect pour leur ruse et survie
            'gobelin' => 10,  // Partagent une culture de guerre et de chaos
            'sirene' => 2,   // Intrigantes, mais faibles
        ],
        'halfelin' => [
            'humain' => 5,   // Bons voisins
            'elfe' => 6,   // Inspiration et paix
            'nain' => 4,   // Bons buveurs, compagnons solides
            'orque' => -12, // Les terrorisent
            'gnome' => 3,   // Drôles et fascinants
            'rat' => -10, // Mangent les provisions
            'gobelin' => -7,  // Trop dangereux et imprévisibles
            'sirene' => 1,   // Légendaires, rarement vues
        ],
        'gnome' => [
            'humain' => 2,   // Bonnes opportunités commerciales
            'elfe' => 4,   // Apprécient leur vision artistique
            'nain' => 7,   // Partenaires de création technique
            'orque' => -8,  // Détruisent leurs inventions
            'halfelin' => 5,   // Bons camarades de fête
            'rat' => -6,  // Bouffent les câbles
            'gobelin' => -9,  // Copient sans comprendre
            'sirene' => 3,   // Objets d’étude magico-scientifique
        ],
        'rat' => [
            'humain' => -15, // Odeur de bottes et de poison
            'elfe' => -18, // Les pourchassent comme des bêtes
            'nain' => -10, // Collapsent les tunnels
            'orque' => 5,   // Alliés de circonstance
            'halfelin' => -12, // Trop gentils, donc dangereux
            'gnome' => -6,  // Machines qui font "piège"
            'gobelin' => 8,   // Frères de chaos et de souterrain
            'sirene' => -4,  // Odeur d’eau salée, incompréhensible
        ],
        'gobelin' => [
            'humain' => -10, // Trop sérieux, pas assez de feu
            'elfe' => -15, // Les méprisent, alors qu’ils s’amusent
            'nain' => -10, // Obsession du contrôle
            'orque' => 7,   // Les respectent comme chefs de guerre
            'halfelin' => -5,  // Bon à taquiner
            'gnome' => -2,  // Amusants mais coincés
            'rat' => 10,  // Meilleurs potes de tunnels
            'sirene' => -3,  // Trop calmes
        ],
        'sirene' => [
            'humain' => 1,   // Séduction et méfiance
            'elfe' => 5,   // Frères magiques
            'nain' => -4,  // Trop terre à terre
            'orque' => -6,  // Trop brutaux
            'halfelin' => 2,   // Peu menaçants, sympathiques
            'gnome' => 4,   // Intrigués par leur technologie
            'rat' => -12, // Contaminent les eaux
            'gobelin' => -5,  // Trop chaotiques
        ],
    ];

    private array $professionAffinities = [
        // Spécialistes
        'pretre' => [
            'barbare' => 0,     // Trop sauvages pour comprendre la foi
            'guerrier' => 0,    // Respect pour leur discipline, mais peu spirituels
            'chevalier' => 6,   // Dévotion, sacrifice, devoir
            'archer' => 0,      // Discrets, mais peu portés sur la spiritualité
            'rodeur' => 0,      // Trop solitaires pour la communauté religieuse
            'moine' => 0,       // Frères spirituels dans une autre tradition
            'mage' => 0,        // Trop théoriques, manquent de foi
            'druide' => -2,     // Païens, trop proches de la nature brute
            'mecaniste' => 0,   // Machines n’ont pas d’âme
            'voleur' => -6,     // Symboles vivants du péché
            'assassin' => -10,  // Incarnation du mal, tue sans remords
        ],
        'devineresse' => [
            'barbare' => 0,     // Les visions rebondissent sur leur crâne
            'guerrier' => 0,    // Terre à terre, peu réceptif
            'chevalier' => 0,   // Trop rigide, peur de ce qu’ils ne contrôlent pas
            'archer' => 0,      // Peu d’interactions, mais pas hostiles
            'rodeur' => 0,      // Trop silencieux pour qu’elle les lise bien
            'moine' => 0,       // Un lien mystique flou
            'mage' => 0,        // Deux formes de connaissance parallèles
            'druide' => 3,      // Connexions mystiques naturelles
            'mecaniste' => 1,   // Fascination réciproque, malgré l'incompréhension
            'voleur' => 0,      // Difficiles à cerner, mais intéressants
            'assassin' => 0,    // Troublants, mais lisibles
        ],

        // Marchands et artisans
        'marchand' => [
            'barbare' => 0,     // Infréquentables, mais bons débiteurs de dettes
            'guerrier' => 3,    // Bons clients pour les armes et l’équipement
            'chevalier' => 5,   // Clients nobles, solvables
            'archer' => 0,      // Achètent peu, vivent dans les bois
            'rodeur' => 0,      // Pas très fidèles comme clients
            'moine' => 0,       // Pauvres, mais honnêtes
            'mage' => 1,        // Bons acheteurs d’objets rares
            'druide' => 0,      // N’ont besoin de rien, ni de monnaie
            'mecaniste' => 0,   // Matériel de niche, mais précieux
            'voleur' => -6,     // Perte sèche, vol assuré
            'assassin' => 0,    // Clients dangereux, mais solvables
        ],
        'forgeron' => [
            'barbare' => 0,     // Ils cassent plus qu’ils n’entretiennent
            'guerrier' => 6,    // Clients fidèles et reconnaissants
            'chevalier' => 4,   // Exigeants, mais payent bien
            'archer' => 0,      // Peu demandeurs, armes légères
            'rodeur' => 0,      // Trop loin pour venir souvent
            'moine' => 0,       // Peu portés sur l’armement
            'mage' => -1,       // Ne respectent pas le travail des mains
            'druide' => 0,      // N’utilisent pas de métal
            'mecaniste' => 4,   // Collaboration technique passionnée
            'voleur' => 0,      // Bon débouché... quand ils paient
            'assassin' => 0,    // Demande d’armes discrètes, rarement
        ],
        'tavernier' => [
            'barbare' => 6,     // Font sauter le chiffre d’affaires à eux seuls
            'guerrier' => 4,    // Bons consommateurs, bons vivants
            'chevalier' => 3,   // Boivent peu, mais bien
            'archer' => 0,      // Clients discrets, pas dérangeants
            'rodeur' => 0,      // Ne restent jamais longtemps
            'moine' => 0,       // Ne boivent pas, mais respectés
            'mage' => 0,        // Boivent rarement, parlent trop
            'druide' => 0,      // Préfèrent l’eau de source au vin
            'mecaniste' => 0,   // Distraits mais bons clients
            'voleur' => 3,      // Présents chaque nuit, bon débit
            'assassin' => 0,    // Clients qui veulent être oubliés
        ],
        'arcaniste' => [
            'barbare' => 0,     // Trop rustiques pour échanger
            'guerrier' => 0,    // Ne comprennent pas les subtilités
            'chevalier' => 1,   // Clients intéressants mais rigides
            'archer' => 0,      // Peu d’intérêt commun
            'rodeur' => 0,      // Peu bavards, trop imprévisibles
            'moine' => 0,       // Peuvent impressionner par leur sagesse
            'mage' => 6,        // Alliés naturels dans la recherche magique
            'druide' => 0,      // Peu de contact, mais du respect
            'mecaniste' => 5,   // Compagnons de travail idéaux
            'voleur' => -4,     // Ne respectent pas leur savoir
            'assassin' => 0,    // Clients rares mais intéressés
        ],

        // PNJ de l’ordre et du chaos
        'garde' => [
            'barbare' => -5,    // Semblent chercher les ennuis
            'guerrier' => 0,    // Frères d’armes respectables
            'chevalier' => 10,  // Modèle de justice
            'archer' => 0,      // Peu d’interaction
            'rodeur' => 0,      // Paranoïa envers leur discrétion
            'moine' => 0,       // Respectés mais peu utiles
            'mage' => 0,        // Peu fiables en combat réel
            'druide' => 0,      // Respectés, mais pas compris
            'mecaniste' => 0,   // Gadgets bizarres, mais utiles parfois
            'voleur' => -10,    // À arrêter à vue
            'assassin' => -12,  // Priorité numéro 1
        ],

        // Vie rurale ou mystique
        'pecheur' => [
            'barbare' => -2,    // Volent ou piétinent les filets
            'guerrier' => 0,    // Peu de lien
            'chevalier' => 0,   // Impressionnants, mais distants
            'archer' => 0,      // Chassent parfois sur les mêmes rives
            'rodeur' => 0,      // Invisibles, mais discrets
            'moine' => 0,       // Paisibles, bien vus
            'mage' => 0,        // N’achètent jamais de poisson
            'druide' => 3,      // Protecteurs de l’eau
            'mecaniste' => 0,   // Peu d’intérêt commun
            'voleur' => -1,     // Chipent les prises
            'assassin' => 0,    // Fait frémir quand il approche
        ],
        'passant' => [
            'barbare' => 0,     // Curiosité mêlée de crainte
            'guerrier' => 0,    // Impressionnés
            'chevalier' => 2,   // Figure de protection
            'archer' => 0,      // Peu connus
            'rodeur' => 0,      // Presque invisibles
            'moine' => 0,       // Rassurants
            'mage' => 0,        // Mystérieux, intrigants
            'druide' => 0,      // Étranges, mais polis
            'mecaniste' => 0,   // Trop techniques
            'voleur' => 0,      // Souvent méfiance
            'assassin' => 0,    // Inconfortable présence
        ],
    ];

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function calculateInitialReputation(Player $player, Npc $npc): int
    {
        $playerRace = $player->getRace()->getSlug();
        $npcRace = $npc->getRace()->getSlug();

        $playerProfession = $player->getProfession()->getSlug();
        $npcProfession = $npc->getProfession()->getSlug();

        $raceRep = $this->raceAffinities[$npcRace][$playerRace] ?? 0;
        $professionRep = $this->professionAffinities[$npcProfession][$playerProfession] ?? 0;

        return max(-20, min(20, $raceRep + $professionRep));
    }

    public function increaseReputationFromQuestReward(Player $player, Npc $giver, int $mainBonus = 2, int $locationBonus = 1): void
    {
        $em = $this->entityManager;

        // Bonus principal pour le donneur de quête
        $playerNpc = $em->getRepository(PlayerNpc::class)->findOneBy([
            'player' => $player,
            'npc' => $giver,
        ]);

        if($playerNpc) {
            $rep = $playerNpc->getReputation() ?? 0;
            $playerNpc->setReputation(min(20, $rep + $mainBonus));
            $em->persist($playerNpc);
        }

        // Trouver le lieu du PNJ via CharacterLocation
        $giverCharacterLocation = $em->getRepository(CharacterLocation::class)->findOneBy([
            'character' => $giver,
        ]);

        if(!$giverCharacterLocation) {
            return;
        }

        $location = $giverCharacterLocation->getLocation();

        // Trouver tous les PNJ du joueur dans ce lieu
        $playerNpcs = $em->getRepository(PlayerNpc::class)->findBy([
            'player' => $player,
        ]);

        foreach($playerNpcs as $otherPlayerNpc) {
            $npc = $otherPlayerNpc->getNpc();

            if($npc->getId() === $giver->getId()) {
                continue;
            }

            $npcLocation = $em->getRepository(CharacterLocation::class)->findOneBy([
                'character' => $npc,
            ]);

            if($npcLocation && $npcLocation->getLocation()?->getId() === $location->getId()) {
                $rep = $otherPlayerNpc->getReputation() ?? 0;
                $otherPlayerNpc->setReputation(min(20, $rep + $locationBonus));
                $em->persist($otherPlayerNpc);
            }
        }
    }
}
