<?php

namespace App\Service\Game\Reward;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use App\Entity\Reward\PlayerReward;
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

        if($screen->getReward()) {
            $playerReward = $this->entityManager->getRepository(PlayerReward::class)->findOneBy(['player' => $player, 'reward' => $screen->getReward()]);
            if(!$playerReward) {
                $playerReward = (new PlayerReward())
                    ->setPlayer($player)
                    ->setReward($screen->getReward());
                $this->entityManager->persist($playerReward);
                $this->entityManager->flush();

                if($screen->getReward()->getItems()) {
                    $this->giveItems($screen->getReward()->getItems(), $player);
                }

                $isRewarded = true;
            } else {
                $isRewarded = false;
            }
        }

        return $isRewarded;
    }

    private function giveItems(iterable $items, Player $player): void
    {
        foreach($items as $item) {
            $characterItem = (new CharacterItem())
                ->setCharacter($player)
                ->setItem($item)
                ->setEquipped(false)
                ->setQuestItem(false);
            $this->entityManager->persist($characterItem);
        }
        $this->entityManager->flush();
    }
}
