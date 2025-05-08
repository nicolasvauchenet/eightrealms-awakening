<?php

namespace App\Service\Character;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Character\PlayerCharacter;
use App\Entity\Character\PreGenerated;
use App\Entity\Item\PlayerCharacterItem;
use Doctrine\ORM\EntityManagerInterface;

readonly class CharacterService
{
    public function __construct(private EntityManagerInterface     $entityManager,
                                private CharacterReputationService $characterReputationService)
    {
    }

    public function getPreGenerated(): array
    {
        return $this->entityManager->getRepository(PreGenerated::class)->findBy([], ['name' => 'ASC']);
    }

    public function getPlayerCharacter(Player $player, Character $character): PlayerCharacter
    {
        $playerCharacter = $this->entityManager->getRepository(PlayerCharacter::class)->findOneBy(['player' => $player, 'character' => $character]);
        if(!$playerCharacter) {
            $character = $this->entityManager->getRepository(Character::class)->find($character->getId());
            $playerCharacter = (new PlayerCharacter())
                ->setPlayer($player)
                ->setCharacter($character)
                ->setFortune($character->getFortune())
                ->setReputation($this->characterReputationService->calculateInitialReputation($player, $character));
            $this->entityManager->persist($playerCharacter);

            foreach($character->getCharacterItems() as $characterItem) {
                $playerCharacterItem = (new PlayerCharacterItem())
                    ->setItem($characterItem->getItem())
                    ->setPlayerCharacter($playerCharacter)
                    ->setOriginal(true)
                    ->setHealth(method_exists($characterItem->getItem(), 'getHealthMax') ? $characterItem->getItem()->getHealthMax() : 100)
                    ->setCharge(method_exists($characterItem->getItem(), 'getChargeMax') ? $characterItem->getItem()->getChargeMax() : 100)
                    ->setQuestItem($characterItem->isQuestItem());
                $this->entityManager->persist($playerCharacterItem);
            }
            $this->entityManager->flush();
        }

        return $playerCharacter;
    }
}
