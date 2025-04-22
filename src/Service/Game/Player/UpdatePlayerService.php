<?php

namespace App\Service\Game\Player;

use App\Entity\Character\Player;
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

        if($location) {
            $player->setCurrentLocation($location);
        }

        $this->entityManager->persist($player);
        $this->entityManager->flush();
    }
}
