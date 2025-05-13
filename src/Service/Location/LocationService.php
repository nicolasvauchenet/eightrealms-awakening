<?php

namespace App\Service\Location;

use App\Entity\Character\Player;
use App\Entity\Location\CharacterLocation;
use App\Entity\Location\Location;
use Doctrine\ORM\EntityManagerInterface;

readonly class LocationService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function revealLocation(Player $player, string|array $slugOrPath): void
    {
        $slugs = is_array($slugOrPath) ? $slugOrPath : [$slugOrPath];
        foreach($slugs as $slug) {
            $location = $this->entityManager->getRepository(Location::class)->findOneBy(['slug' => $slug]);
            if(!$location) {
                continue;
            }

            $existing = $this->entityManager->getRepository(CharacterLocation::class)->findOneBy([
                'character' => $player,
                'location' => $location,
            ]);

            if(!$existing) {
                $characterLocation = (new CharacterLocation())
                    ->setCharacter($player)
                    ->setLocation($location);
                $this->entityManager->persist($characterLocation);
            }
        }
    }
}
