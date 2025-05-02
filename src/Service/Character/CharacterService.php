<?php

namespace App\Service\Character;

use App\Entity\Character\Character;
use App\Entity\Character\Npc;
use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Entity\Character\PreGenerated;
use App\Entity\Item\PlayerNpcItem;
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

    public function getPlayerNpc(Player $player, Character $character): PlayerNpc
    {
        $playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->findOneBy(['player' => $player, 'npc' => $character]);
        if(!$playerNpc) {
            if($character instanceof Npc) {
                $character = $this->entityManager->getRepository(Npc::class)->find($character->getId());
            }
            $playerNpc = (new PlayerNpc())
                ->setPlayer($player)
                ->setNpc($character)
                ->setFortune($character->getFortune())
                ->setReputation($this->characterReputationService->calculateInitialReputation($player, $character));
            $this->entityManager->persist($playerNpc);

            foreach($character->getCharacterItems() as $characterItem) {
                $playerNpcItem = (new PlayerNpcItem())
                    ->setItem($characterItem->getItem())
                    ->setPlayerNpc($playerNpc)
                    ->setOriginal(true)
                    ->setHealth(100)
                    ->setCharge(100);
                $this->entityManager->persist($playerNpcItem);
            }
            $this->entityManager->flush();
        }

        return $playerNpc;
    }
}
