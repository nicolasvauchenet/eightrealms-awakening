<?php

namespace App\Service\Game\Condition\Handler;

use App\Entity\Character\Player;
use App\Entity\Location\CharacterLocation;
use App\Entity\Location\Location;
use Doctrine\ORM\EntityManagerInterface;

class LocationUnknownHandler implements ConditionHandlerInterface
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'location_unknown';
    }

    public function evaluate(Player $player, mixed $value): bool
    {
        $location = $this->em->getRepository(Location::class)->findOneBy(['slug' => $value]);

        return $this->em->getRepository(CharacterLocation::class)->findOneBy([
                'character' => $player,
                'location' => $location,
            ]) === null;
    }
}
