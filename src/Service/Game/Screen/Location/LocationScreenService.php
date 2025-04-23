<?php

namespace App\Service\Game\Screen\Location;

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
            $this->createScreenActions($screen, $location);

            $this->entityManager->persist($screen);
            $this->entityManager->flush();
        }

        return $screen;
    }

    private function createScreenActions(LocationScreen $screen, Location $location): void
    {
        switch($location->getType()) {
            case 'location':
                if($location->getChildren()) {
                    $screen->setActions([
                        'footer' => [
                            [
                                'type' => 'location',
                                'slug' => $location->getChildren()->first()->getSlug(),
                                'label' => 'Explorer',
                                'thumbnail' => 'walk.png',
                            ],
                        ],
                    ]);
                }
                break;
            default:
                break;
        }
    }
}
