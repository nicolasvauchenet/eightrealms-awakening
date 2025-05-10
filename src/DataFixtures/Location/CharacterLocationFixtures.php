<?php

namespace App\DataFixtures\Location;

use App\DataFixtures\Location\CharacterLocation\BoisDuPendu\BosquetDesDruidesTrait;
use App\DataFixtures\Location\CharacterLocation\BoisDuPendu\ClairiereDeLOublieTrait;
use App\DataFixtures\Location\CharacterLocation\Plouc\PloucTrait;
use App\DataFixtures\Location\CharacterLocation\PortSaintDoux\DocksDeLOuestTrait;
use App\DataFixtures\Location\CharacterLocation\PortSaintDoux\QuartierDesPloucsTrait;
use App\DataFixtures\Location\CharacterLocation\PortSaintDoux\QuartierDuMarcheTrait;
use App\DataFixtures\Location\CharacterLocation\PortSaintDoux\VieilleVilleTrait;
use App\DataFixtures\Location\CharacterLocation\SablesChauds\CampAbandonneTrait;
use App\DataFixtures\Location\CharacterLocation\SablesChauds\OasisSansNomTrait;
use App\Entity\Location\CharacterLocation;
use App\Entity\Location\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CharacterLocationFixtures extends Fixture implements OrderedFixtureInterface
{
    use QuartierDuMarcheTrait;
    use VieilleVilleTrait;
    use DocksDeLOuestTrait;
    use QuartierDesPloucsTrait;
    use PloucTrait;
    use ClairiereDeLOublieTrait;
    use BosquetDesDruidesTrait;
    use CampAbandonneTrait;
    use OasisSansNomTrait;

    public function load(ObjectManager $manager): void
    {
        $locationCharacters = [
            // Port Saint-Doux
            self::QUARTIER_DU_MARCHE_NPCS,
            self::VIEILLE_VILLE_NPCS,
            self::DOCKS_DE_L_OUEST_NPCS,
            self::QUARTIER_DES_PLOUCS_NPCS,

            // Plouc
            self::PLOUC_NPCS,

            // Bois du Pendu
            self::CLAIRIERE_DE_L_OUBLIE_NPCS,
            self::BOSQUET_DES_DRUIDES_NPCS,

            // Sables Chauds
            self::CAMP_ABANDONNE_NPCS,
            self::OASIS_SANS_NOM_NPCS,
        ];

        foreach($locationCharacters as $locationCharacter) {
            foreach($locationCharacter as $data) {
                $characterLocation = new CharacterLocation();
                $characterLocation->setCharacter($this->getReference($data['character'], $data['characterClass']))
                    ->setLocation($this->getReference($data['location'], Location::class))
                    ->setConditions($data['conditions'] ?? null);
                $manager->persist($characterLocation);
                $this->addReference($data['reference'], $characterLocation);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 28;
    }
}
