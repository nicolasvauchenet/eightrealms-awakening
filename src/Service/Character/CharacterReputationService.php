<?php

namespace App\Service\Character;

use App\Entity\Character\Player;
use App\Entity\Character\Character;
use App\Entity\Character\PlayerCharacter;
use Doctrine\ORM\EntityManagerInterface;

class CharacterReputationService
{
    private array $raceAffinities = [
        'humain' => [
            'elfe' => 5,   // Respect pour leur magie et leur sagesse
            'nain' => 4,   // Alliés commerciaux et guerriers
            'orque' => -7, // Ennemis historiques
            'halfelin' => 3,   // Sympas mais peu fiables en guerre
            'gnome' => 2,   // Mal compris, mais utiles en ingénierie
        ],
        'elfe' => [
            'humain' => 5,   // Curiosité et admiration modérée
            'nain' => -5,  // Trop bruyants et rustres
            'orque' => -15, // Haine ancestrale
            'halfelin' => 7,   // Les trouvent doux et équilibrés
            'gnome' => 5,   // Amusants mais fatigants
        ],
        'nain' => [
            'humain' => 5,   // Bonnes affaires, bons alliés
            'elfe' => -5,  // Trop hautains et fragiles
            'orque' => -10, // Ennemis brutaux
            'halfelin' => 5,   // Gens simples, appréciés
            'gnome' => 7,   // Cousins bricoleurs
        ],
        'orque' => [
            'humain' => -5, // Trop fragiles et arrogants
            'elfe' => -20, // Haine profonde
            'nain' => -10, // Guerres de territoire
            'halfelin' => -5,  // Aucune utilité en combat
            'gnome' => -3,  // Comprennent rien à leurs machines
        ],
        'halfelin' => [
            'humain' => 5,   // Bons voisins
            'elfe' => 7,   // Inspiration et paix
            'nain' => 5,   // Bons buveurs, compagnons solides
            'orque' => -10, // Les terrorisent
            'gnome' => 5,   // Drôles et fascinants
        ],
        'gnome' => [
            'humain' => 5,   // Bonnes opportunités commerciales
            'elfe' => 7,   // Apprécient leur vision artistique
            'nain' => 10,   // Partenaires de création technique
            'orque' => -10,  // Détruisent leurs inventions
            'halfelin' => 5,   // Bons camarades de fête
        ],
        'gobelin' => [
            'humain' => -10, // Trop sérieux, pas assez de feu
            'elfe' => -15, // Les méprisent, alors qu’ils s’amusent
            'nain' => -10, // Obsession du contrôle
            'orque' => 7,   // Les respectent comme chefs de guerre
            'halfelin' => -5,  // Bon à taquiner
            'gnome' => -2,  // Amusants mais coincés
        ],
        'sirene' => [
            'humain' => 1,   // Séduction et méfiance
            'elfe' => 5,   // Frères magiques
            'nain' => -4,  // Trop terre à terre
            'orque' => -6,  // Trop brutaux
            'halfelin' => 2,   // Peu menaçants, sympathiques
            'gnome' => 4,   // Intriguée par leur technologie
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
        'ensorceleur' => [
            'barbare' => -6,    // Trop subtils pour ces bêtes enragées, qui préfèrent casser ce qu’ils ne comprennent pas
            'guerrier' => -3,    // Défiance : ils n’aiment pas les tours de passe-passe en pleine mêlée
            'chevalier' => -10,  // Considérés comme manipulateurs, sans honneur, sans loyauté
            'archer' => -2,      // Pas hostiles, mais les évitent comme la peste : un regard suffit à troubler la visée
            'rodeur' => -4,      // Leurs pratiques perturbent l’équilibre naturel, leur présence est dérangeante
            'moine' => -8,       // Antithèse spirituelle : illusion, domination, corruption
            'mage' => -5,        // Ils les voient comme des dégénérés, des hérétiques de l’Art
            'druide' => -10,     // Pervertissent les énergies du vivant pour asservir et séduire
            'mecaniste' => -3,   // Incompréhension totale : ils n’aiment ni le flou, ni les voix dans la tête
            'voleur' => 5,       // Fascination réciproque : ils partagent le goût du contournement et du danger
            'assassin' => 7,     // Partenaires efficaces : la manipulation avant le sang, l’art du contrôle
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

    public function calculateInitialReputation(Player $player, Character $character): int
    {
        $playerRace = $player->getRace()->getSlug();
        $characterRace = $character->getRace()->getSlug();
        $raceRep = $this->raceAffinities[$characterRace][$playerRace] ?? 0;

        if($character->getProfession()) {
            $playerProfession = $player->getProfession()->getSlug();
            $characterProfession = $character->getProfession()->getSlug();
            $professionRep = $this->professionAffinities[$characterProfession][$playerProfession] ?? 0;
        } else {
            $professionRep = 0;
        }

        return max(-20, min(20, $raceRep + $professionRep));
    }

    public function increaseReputationFromQuestReward(Player $player, Character $giver, int $mainBonus = 2, int $locationBonus = 1): void
    {
        // Bonus principal pour le donneur de quête
        $playerCharacter = $this->entityManager->getRepository(PlayerCharacter::class)->findOneBy([
            'player' => $player,
            'character' => $giver,
        ]);
        if(!$playerCharacter) {
            return;
        }
        $rep = $playerCharacter->getReputation() ?? 0;
        $playerCharacter->setReputation(min(20, $rep + $mainBonus));
        $this->entityManager->persist($playerCharacter);

        // Bonus secondaire pour les autres personnages du joueur
        $playerCharacters = $this->entityManager->getRepository(PlayerCharacter::class)->findBy([
            'player' => $player,
        ]);
        foreach($playerCharacters as $otherPlayerCharacter) {
            $character = $otherPlayerCharacter->getCharacter();
            if($character->getId() === $giver->getId()) {
                continue;
            }
            $rep = $otherPlayerCharacter->getReputation() ?? 0;
            $otherPlayerCharacter->setReputation(min(20, $rep + $locationBonus));
            $this->entityManager->persist($otherPlayerCharacter);
        }

        $this->entityManager->flush();
    }

    public function getReputation(Player $player, Character $character): int
    {
        $playerCharacter = $this->entityManager->getRepository(PlayerCharacter::class)->findOneBy([
            'player' => $player,
            'character' => $character,
        ]);
        if(!$playerCharacter) {
            return 0;
        }

        return $playerCharacter->getReputation() ?? 0;
    }
}
