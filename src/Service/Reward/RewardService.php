<?php

namespace App\Service\Reward;

use App\Entity\Character\Player;
use App\Entity\Reward\PlayerReward;
use App\Entity\Reward\Reward;
use App\Entity\Reward\RewardItem;
use App\Entity\Screen\Screen;
use App\Service\Item\CharacterInventoryService;
use App\Service\Location\LocationService;
use Doctrine\ORM\EntityManagerInterface;

readonly class RewardService
{
    public function __construct(
        private EntityManagerInterface    $entityManager,
        private CharacterInventoryService $inventoryService,
        private LocationService           $locationService,
    )
    {
    }

    public function giveRewardByScreen(Screen $screen, Player $player): bool
    {
        $reward = $screen->getReward();
        if(!$reward) {
            return false;
        }

        return $this->giveReward($reward, $player);
    }

    public function giveReward(Reward $reward, Player $player): bool
    {
        $playerReward = $this->entityManager->getRepository(PlayerReward::class)->findOneBy([
            'player' => $player,
            'reward' => $reward,
        ]);

        if($playerReward) {
            return false;
        }

        $playerReward = (new PlayerReward())
            ->setPlayer($player)
            ->setReward($reward);
        $this->entityManager->persist($playerReward);

        if($reward->getRewardItems()) {
            $this->giveItems($reward->getRewardItems(), $player);
        }

        if($reward->getRewardLocations()) {
            $this->revealLocations($reward->getRewardLocations(), $player);
        }

        if($reward->getCrowns()) {
            $player->setFortune($player->getFortune() + $reward->getCrowns());
        }

        if($reward->getExperience()) {
            $player->setExperience($player->getExperience() + $reward->getExperience());
        }

        $this->entityManager->persist($player);
        $this->entityManager->flush();

        return true;
    }

    private function giveItems(iterable $rewardItems, Player $player): void
    {
        /** @var RewardItem $rewardItem */
        foreach($rewardItems as $rewardItem) {
            $item = $rewardItem->getItem();
            $quantity = $rewardItem->getQuantity() ?? 1;
            $isQuestItem = $rewardItem->isQuestItem();

            for($i = 0; $i < $quantity; $i++) {
                $this->inventoryService->addItem($player, $item->getSlug(), $isQuestItem);
            }
        }
    }

    private function revealLocations(iterable $rewardLocations, Player $player): void
    {
        foreach($rewardLocations as $rewardLocation) {
            $this->locationService->revealLocation($player, $rewardLocation->getLocation()->getSlug());
        }
    }
}
