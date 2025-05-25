<?php

namespace App\Service\Riddle\Resolver;

use App\Entity\Alignment\CharacterAlignment;
use App\Entity\Character\Player;
use App\Entity\Riddle\Riddle;
use Doctrine\ORM\EntityManagerInterface;

readonly class AlignmentMatchResolver implements RiddleResolverInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function supports(Riddle $riddle): bool
    {
        return $riddle->getType() === 'test' && $riddle->getTargetCharacter() !== null;
    }

    public function resolve(Riddle $riddle, Player $player): bool
    {
        $playerAlignment = $player->getPlayerAlignment();
        if(!$playerAlignment || !$playerAlignment->getAlignment()) {
            return false;
        }

        $targetCharacter = $riddle->getTargetCharacter();
        $targetAlignment = $this->entityManager->getRepository(CharacterAlignment::class)->findOneBy(['character' => $targetCharacter]);

        if(!$targetAlignment) {
            return false;
        }

        return $playerAlignment->getAlignment()->getSlug() === $targetAlignment->getAlignment()->getSlug();
    }
}
