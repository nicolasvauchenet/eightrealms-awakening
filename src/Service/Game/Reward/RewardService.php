<?php

namespace App\Service\Game\Reward;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use App\Entity\Screen\Screen;
use Doctrine\ORM\EntityManagerInterface;

readonly class RewardService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function giveReward(Screen $screen, Player $player): bool
    {
        $isRewarded = false;

        if(isset($screen->getActions()['reward'])) {
            if(isset($screen->getActions()['reward']['items'])) {
                $this->giveItems($screen->getActions()['reward']['items'], $player);
                $isRewarded = true;
            }
        }

        $screen->setRewarded($isRewarded);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $isRewarded;
    }

    private function giveItems(array $items, Player $player): void
    {
        foreach($items as $itemSlug) {
            $item = $this->entityManager->getRepository(Item::class)->findOneBy(['slug' => $itemSlug]);
            $characterItem = (new CharacterItem())
                ->setCharacter($player)
                ->setItem($item)
                ->setEquipped(false)
                ->setQuestItem(false);
            $this->entityManager->persist($characterItem);
            $this->entityManager->flush();
        }
    }
}
