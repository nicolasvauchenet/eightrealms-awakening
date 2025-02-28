<?php

namespace App\Service\Location;

use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Location\PlayerLocation;
use Doctrine\ORM\EntityManagerInterface;

readonly class LocationService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function addLocation(Location $location, Player $player): bool
    {
        $playerLocation = $this->entityManager->getRepository(PlayerLocation::class)->findOneBy(['location' => $location, 'player' => $player]);
        if(!$playerLocation) {
            $playerLocation = (new PlayerLocation())
                ->setLocation($location)
                ->setPlayer($player);
            $this->entityManager->persist($playerLocation);
            $this->entityManager->flush();

            return true;
        }

        return false;
    }
}
