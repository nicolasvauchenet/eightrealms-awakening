<?php

namespace App\Service\Game\Player;

use App\Entity\Character\Player;
use App\Entity\Location\CharacterLocation;
use App\Entity\Location\Location;
use App\Entity\Screen\Screen;
use Doctrine\ORM\EntityManagerInterface;

readonly class UpdatePlayerService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function updatePlayerScreen(Player $player, Screen $screen, ?Location $location = null): void
    {
        $player->setCurrentScreen($screen);
        $this->entityManager->persist($player);
        $this->entityManager->flush();

        if($location) {
            $this->updatePlayerLocations($player, $location);
        }
    }

    private function updatePlayerLocations(Player $player, Location $location): void
    {
        $player->setCurrentLocation($location);

        if(in_array($location->getType(), ['location', 'zone'], true)) {
            $alreadyDiscovered = $this->entityManager->getRepository(CharacterLocation::class)
                ->findOneBy([
                    'character' => $player,
                    'location' => $location,
                ]);

            if(!$alreadyDiscovered) {
                $characterLocation = (new CharacterLocation())
                    ->setCharacter($player)
                    ->setLocation($location);
                $this->entityManager->persist($characterLocation);
            }
        }

        $this->entityManager->persist($player);
        $this->entityManager->flush();
    }
}
