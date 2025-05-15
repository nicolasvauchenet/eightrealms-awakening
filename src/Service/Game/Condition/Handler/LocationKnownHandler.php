<?php

namespace App\Service\Game\Condition\Handler;

use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Location\CharacterLocation;
use Doctrine\ORM\EntityManagerInterface;

readonly class LocationKnownHandler implements ConditionHandlerInterface
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'location_known';
    }

    public function evaluate(Player $player, mixed $value): bool
    {
        $location = $this->em->getRepository(Location::class)->findOneBy(['slug' => $value]);

        return $this->em->getRepository(CharacterLocation::class)->findOneBy([
                'character' => $player,
                'location' => $location,
            ]) !== null;
    }
}
