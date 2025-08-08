<?php

namespace App\Service\Character;

use App\Entity\Character\Player;
use App\Entity\Reward\PlayerReward;
use App\Entity\Reward\Reward;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;

readonly class DeleteCharacterService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private FileUploaderService $fileUploaderService
    ) {
    }

    public function deleteCharacter(Player $character): void
    {
        $this->deleteCharacterItems($character);
        $this->deleteCharacterSpells($character);
        $this->deleteCharacterRewards($character);

        $this->fileUploaderService->remove('character', $character->getPicture());
        $this->entityManager->remove($character);
        $this->entityManager->flush();
    }

    private function deleteCharacterItems(Player $character): void
    {
        foreach ($character->getCharacterItems() as $characterItem) {
            $character->removeCharacterItem($characterItem);
            $this->entityManager->remove($characterItem);
        }
    }

    private function deleteCharacterSpells(Player $character): void
    {
        foreach ($character->getCharacterSpells() as $characterSpell) {
            $character->removeCharacterSpell($characterSpell);
            $this->entityManager->remove($characterSpell);
        }
    }

    private function deleteCharacterRewards(Player $character): void
    {
        foreach (
            $this->entityManager->getRepository(PlayerReward::class)->findBy(['player' => $character]) as $playerReward
        ) {
            $this->entityManager->remove($playerReward);
        }
    }
}
