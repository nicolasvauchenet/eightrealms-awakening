<?php

namespace App\DataFixtures\Location;

use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Location\PlayerLocation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlayerLocationFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $playerLocations = [
            [
                'player' => 'player_aldrin',
                'location' => 'location_realm_royaume_de_l_ile_du_nord',
                'reference' => 'player_location_realm_royaume_de_l_ile_du_nord',
            ],
            [
                'player' => 'player_aldrin',
                'location' => 'location_port_saint_doux',
                'reference' => 'player_location_port_saint_doux',
            ],
            [
                'player' => 'player_aldrin',
                'location' => 'location_zone_quartier_du_marche',
                'reference' => 'player_location_zone_quartier_du_marche',
            ],
        ];

        foreach($playerLocations as $data) {
            $playerLocation = new PlayerLocation();
            $playerLocation->setPlayer($this->getReference($data['player'], Player::class));
            $playerLocation->setLocation($this->getReference($data['location'], Location::class));
            $manager->persist($playerLocation);
            $this->addReference($data['reference'], $playerLocation);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 92;
    }
}
