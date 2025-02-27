<?php

namespace App\Service\Dialogue;

use App\Entity\Character\PlayerNpc;
use App\Entity\Dialogue\Dialogue;
use Doctrine\ORM\EntityManagerInterface;

readonly class DialogueService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function getCurrentDialogue(PlayerNpc $playerNpc, ?string $type = 'dialogue'): ?Dialogue
    {
        $dialogue = $this->entityManager->getRepository(Dialogue::class)->findOneBy(['npc' => $playerNpc->getNpc(), 'type' => $type, 'parent' => null]);
        if($dialogue === null) {
            return null;
        }

        if($playerNpc->getLastDialogue() === $dialogue) {
            return null;
        }

        return $dialogue;
    }
}
