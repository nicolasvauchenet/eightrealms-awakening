<?php

namespace App\Service\Dialogue;

use App\Entity\Character\PlayerNpc;
use App\Entity\Dialogue\Dialogue;
use App\Entity\Quest\PlayerQuest;
use App\Entity\Quest\Quest;
use Doctrine\ORM\EntityManagerInterface;

readonly class DialogueService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function getCurrentDialogue(PlayerNpc $playerNpc, ?string $type = 'dialogue'): ?Dialogue
    {
        $dialogue = $this->entityManager->getRepository(Dialogue::class)->findOneBy([
            'npc' => $playerNpc->getNpc(),
            'type' => $type,
        ]);

        if($dialogue === null || $playerNpc->getLastDialogue() === $dialogue) {
            return null;
        }

        if(!$dialogue->getParent()) {
            if($this->validateDialogueConditions($dialogue, $playerNpc)) {
                return $dialogue;
            }
        }

        $childrenDialogues = $this->entityManager->getRepository(Dialogue::class)->findBy([
            'parent' => $dialogue,
        ]);

        foreach($childrenDialogues as $childDialogue) {
            if($this->validateDialogueConditions($childDialogue, $playerNpc)) {
                return $childDialogue;
            }
        }

        return $dialogue;
    }

    private function validateDialogueConditions(Dialogue $dialogue, PlayerNpc $playerNpc): bool
    {
        $conditions = $dialogue->getConditions();

        if(!$conditions) {
            return true;
        }

        foreach($conditions as $condition => $value) {
            $quest = $this->entityManager->getRepository(Quest::class)->find($value);
            $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
                'player' => $playerNpc->getPlayer(),
                'quest' => $quest,
            ]);

            switch($condition) {
                case 'hasQuest':
                    if(!$playerQuest) {
                        return false;
                    }
                    break;
                case 'hasNoQuest':
                    if($playerQuest) {
                        return false;
                    }
                    break;
                case 'completedQuest':
                    if(!$playerQuest || $playerQuest->getStatus() !== 'completed') {
                        return false;
                    }
                    break;
                default:
                    break;
            }
        }

        return true;
    }
}
