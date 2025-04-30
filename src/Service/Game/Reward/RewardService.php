<?php

namespace App\Service\Game\Reward;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Reward\PlayerReward;
use App\Entity\Reward\RewardItem;
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
            $playerReward = $this->entityManager->getRepository(PlayerReward::class)->findOneBy([
                'player' => $player,
                'reward' => $screen->getReward(),
            ]);

            if(!$playerReward) {
                $playerReward = (new PlayerReward())
                    ->setPlayer($player)
                    ->setReward($screen->getReward());
                $this->entityManager->persist($playerReward);

                // Gérer les items
                if($screen->getReward()->getRewardItems()) {
                    $this->giveItems($screen->getReward()->getRewardItems(), $player);
                }

                // Gérer les couronnes
                if($screen->getReward()->getCrowns()) {
                    $player->setFortune($player->getFortune() + $screen->getReward()->getCrowns());
                }

                // Gérer l'expérience
                if($screen->getReward()->getExperience()) {
                    $player->setExperience($player->getExperience() + $screen->getReward()->getExperience());
                }

                $this->entityManager->persist($player);
                $this->entityManager->flush();

                $isRewarded = true;
            }
        }

        return $isRewarded;
    }

    private function giveItems(iterable $rewardItems, Player $player): void
    {
        /** @var RewardItem $rewardItem */
        foreach($rewardItems as $rewardItem) {
            $item = $rewardItem->getItem();
            $quantity = $rewardItem->getQuantity() ?? 1;

            for($i = 0; $i < $quantity; $i++) {
                $characterItem = (new CharacterItem())
                    ->setCharacter($player)
                    ->setItem($item)
                    ->setEquipped(false)
                    ->setQuestItem(false);
                $this->entityManager->persist($characterItem);
            }
        }
        $this->entityManager->flush();
    }
}
