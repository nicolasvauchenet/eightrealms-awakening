<?php

namespace App\DataFixtures\Location;

use App\DataFixtures\Location\Location\BoisDuPendu\BoisDuPenduTrait;
use App\DataFixtures\Location\Location\BoisDuPendu\BosquetDesDruidesTrait;
use App\DataFixtures\Location\Location\BoisDuPendu\ClairiereDeLOublieTrait;
use App\DataFixtures\Location\Location\BoisDuPendu\CriqueDuPenduTrait;
use App\DataFixtures\Location\Location\DonjonDeLAme\AntichambreDuRoiTrait;
use App\DataFixtures\Location\Location\DonjonDeLAme\CrypteInverseeTrait;
use App\DataFixtures\Location\Location\DonjonDeLAme\DonjonDeLAmeTrait;
use App\DataFixtures\Location\Location\DonjonDeLAme\EntreeDuDonjonTrait;
use App\DataFixtures\Location\Location\DonjonDeLAme\HallDEntreeTrait;
use App\DataFixtures\Location\Location\DonjonDeLAme\SalleDesChainesTrait;
use App\DataFixtures\Location\Location\DonjonDeLAme\SalleDesMurmuresTrait;
use App\DataFixtures\Location\Location\DonjonDeLAme\SalleDuMiroirTrait;
use App\DataFixtures\Location\Location\DonjonDeLAme\TombeauDeGaldricPremierTrait;
use App\DataFixtures\Location\Location\ExternalTrait;
use App\DataFixtures\Location\Location\MontsTerribles\ColDuVentNoirTrait;
use App\DataFixtures\Location\Location\MontsTerribles\GouffreDAskalorTrait;
use App\DataFixtures\Location\Location\MontsTerribles\GrotteDesEchosTrait;
use App\DataFixtures\Location\Location\MontsTerribles\MontsTerriblesTrait;
use App\DataFixtures\Location\Location\MontsTerribles\RefugeDuBoucBoiteuxTrait;
use App\DataFixtures\Location\Location\MontsTerribles\RocherDuDragonTrait;
use App\DataFixtures\Location\Location\Plouc\BoisDesRelents\BoisDesRelentsTrait;
use App\DataFixtures\Location\Location\Plouc\BoisDesRelents\CampementGobelinTrait;
use App\DataFixtures\Location\Location\Plouc\BoisDesRelents\OreeDuBoisTrait;
use App\DataFixtures\Location\Location\Plouc\PloucTrait;
use App\DataFixtures\Location\Location\PortSaintDoux\AnciensDocksTrait;
use App\DataFixtures\Location\Location\PortSaintDoux\DocksDeLOuestTrait;
use App\DataFixtures\Location\Location\PortSaintDoux\NouvelleVilleTrait;
use App\DataFixtures\Location\Location\PortSaintDoux\PortSaintDouxTrait;
use App\DataFixtures\Location\Location\PortSaintDoux\QuartierDesChauvesTrait;
use App\DataFixtures\Location\Location\PortSaintDoux\QuartierDesPloucsTrait;
use App\DataFixtures\Location\Location\PortSaintDoux\QuartierDuMarcheTrait;
use App\DataFixtures\Location\Location\PortSaintDoux\VieilleVilleTrait;
use App\DataFixtures\Location\Location\RealmTrait;
use App\DataFixtures\Location\Location\SablesChauds\CampAbandonneTrait;
use App\DataFixtures\Location\Location\SablesChauds\OasisSansNomTrait;
use App\DataFixtures\Location\Location\SablesChauds\PlageDeLaSireneTrait;
use App\DataFixtures\Location\Location\SablesChauds\SablesChaudsTrait;
use App\Entity\Item\Map;
use App\Entity\Location\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LocationFixtures extends Fixture implements OrderedFixtureInterface
{
    use RealmTrait;
    use PortSaintDouxTrait;
    use AnciensDocksTrait;
    use DocksDeLOuestTrait;
    use QuartierDesChauvesTrait;
    use QuartierDesPloucsTrait;
    use QuartierDuMarcheTrait;
    use VieilleVilleTrait;
    use NouvelleVilleTrait;
    use PloucTrait;
    use BoisDesRelentsTrait;
    use OreeDuBoisTrait;
    use CampementGobelinTrait;
    use BoisDuPenduTrait;
    use ClairiereDeLOublieTrait;
    use BosquetDesDruidesTrait;
    use CriqueDuPenduTrait;
    use SablesChaudsTrait;
    use CampAbandonneTrait;
    use OasisSansNomTrait;
    use PlageDeLaSireneTrait;
    use MontsTerriblesTrait;
    use ColDuVentNoirTrait;
    use GouffreDAskalorTrait;
    use GrotteDesEchosTrait;
    use RefugeDuBoucBoiteuxTrait;
    use RocherDuDragonTrait;
    use DonjonDeLAmeTrait;
    use EntreeDuDonjonTrait;
    use HallDEntreeTrait;
    use SalleDesChainesTrait;
    use SalleDuMiroirTrait;
    use SalleDesMurmuresTrait;
    use CrypteInverseeTrait;
    use AntichambreDuRoiTrait;
    use TombeauDeGaldricPremierTrait;
    use ExternalTrait;

    public function load(ObjectManager $manager): void
    {
        $locations = [
            // Royaume
            self::REALM_LOCATION,

            // Port Saint-Doux
            self::PORT_SAINT_DOUX_LOCATIONS,
            self::QUARTIER_DU_MARCHE_LOCATIONS,
            self::QUARTIER_DES_PLOUCS_LOCATIONS,
            self::VIEILLE_VILLE_LOCATIONS,
            self::QUARTIER_DES_CHAUVES_LOCATIONS,
            self::DOCKS_DE_L_OUEST_LOCATIONS,
            self::ANCIENS_DOCKS_LOCATIONS,
            self::NOUVELLE_VILLE_LOCATIONS,

            // Plouc
            self::PLOUC_LOCATIONS,
            self::BOIS_DES_RELENTS_LOCATIONS,
            self::OREE_DU_BOIS_LOCATIONS,
            self::CAMPEMENT_GOBELIN_LOCATIONS,

            // Sables Chauds
            self::SABLES_CHAUDS_LOCATIONS,
            self::CAMP_ABANDONNE_LOCATIONS,
            self::OASIS_SANS_NOM_LOCATIONS,
            self::PLAGE_DE_LA_SIRENE_LOCATIONS,

            // Bois du Pendu
            self::BOIS_DU_PENDU_LOCATIONS,
            self::CLAIRIERE_DE_L_OUBLIE_LOCATIONS,
            self::CRIQUE_DU_PENDU_LOCATIONS,
            self::BOSQUET_DES_DRUIDES_LOCATIONS,

            // Monts Terribles
            self::MONTS_TERRIBLES_LOCATIONS,
            self::COL_DU_VENT_NOIR_LOCATIONS,
            self::GROTTE_DES_ECHOS_LOCATIONS,
            self::REFUGE_DU_BOUC_BOITEUX_LOCATIONS,
            self::GOUFFRE_D_ASKALOR_LOCATIONS,
            self::ROCHER_DU_DRAGON_LOCATIONS,

            // Donjon de l'Âme
            self::DONJON_DE_L_AME_LOCATIONS,
            self::ENTREE_DU_DONJON_LOCATIONS,
            self::HALL_D_ENTREE_LOCATIONS,
            self::SALLE_DES_CHAINES_LOCATIONS,
            self::SALLE_DU_MIROIR_LOCATIONS,
            self::SALLE_DES_MURMURES_LOCATIONS,
            self::CRYPTE_INVERSEE_LOCATIONS,
            self::ANTICHAMBRE_DU_ROI_LOCATIONS,
            self::TOMBEAU_DE_GALDRIC_PREMIER_LOCATIONS,

            // Externes - Rencontres
            self::EXTERNAL_LOCATIONS,
        ];

        foreach($locations as $locationData) {
            foreach($locationData as $data) {
                $location = new Location();
                $location->setName($data['name'])
                    ->setPicture($data['picture'] ?? null)
                    ->setDescription($data['description'])
                    ->setDescriptionAlt($data['descriptionAlt'] ?? null)
                    ->setType($data['type'])
                    ->setThumbnail($data['thumbnail'] ?? null)
                    ->setParent(isset($data['parent']) ? $this->getReference($data['parent'], Location::class) : null)
                    ->setMap(isset($data['map']) ? $this->getReference($data['map'], Map::class) : null);
                $manager->persist($location);
                $this->addReference($data['reference'], $location);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 27;
    }
}
