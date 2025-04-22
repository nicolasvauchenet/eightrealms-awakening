<?php

namespace App\Service\Game\Screen;

use App\Entity\Location\Location;
use App\Entity\Screen\LocationScreen;
use Doctrine\ORM\EntityManagerInterface;

readonly class LocationScreenService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function getLocationScreen(Location $location): LocationScreen
    {
        $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $location]);
        if(!$screen) {
            $screen = (new LocationScreen())
                ->setName($location->getName())
                ->setPicture($location->getPicture())
                ->setDescription($location->getDescription())
                ->setType('location')
                ->setLocation($location);
            $this->entityManager->persist($screen);
        }

        return $screen;
    }
}
