<?php

namespace App\DataFixtures\Location;

use App\DataFixtures\Location\Location\BoisDuPenduTrait;
use App\DataFixtures\Location\Location\ExternalTrait;
use App\DataFixtures\Location\Location\MontsTerriblesTrait;
use App\DataFixtures\Location\Location\PloucTrait;
use App\DataFixtures\Location\Location\PortSaintDouxTrait;
use App\DataFixtures\Location\Location\RealmTrait;
use App\DataFixtures\Location\Location\SablesChaudsTrait;
use App\Entity\Item\Map;
use App\Entity\Location\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LocationFixtures extends Fixture implements OrderedFixtureInterface
{
    use RealmTrait;
    use PortSaintDouxTrait;
    use PloucTrait;
    use BoisDuPenduTrait;
    use SablesChaudsTrait;
    use MontsTerriblesTrait;
    use ExternalTrait;

    public function load(ObjectManager $manager): void
    {
        $locations = [
            self::REALM_LOCATION,
            self::PORT_SAINT_DOUX_LOCATIONS,
            self::PLOUC_LOCATIONS,
            self::BOIS_DU_PENDU_LOCATIONS,
            self::SABLES_CHAUDS_LOCATIONS,
            self::MONTS_TERRIBLES_LOCATIONS,
            self::EXTERNAL_LOCATIONS,
        ];

        foreach($locations as $locationData) {
            foreach($locationData as $data) {
                $location = new Location();
                $location->setName($data['name'])
                    ->setPicture($data['picture'] ?? null)
                    ->setDescription($data['description'])
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
        return 25;
    }
}
