<?php

namespace App\DataFixtures\Reward;

use App\DataFixtures\Reward\Combat\CombatTrait;
use App\DataFixtures\Reward\Combat\CombatQuestTrait;
use App\DataFixtures\Reward\Misc\MiscTrait;
use App\DataFixtures\Reward\Quest\QuestTrait;
use App\Entity\Reward\Reward;
use App\Entity\Reward\RewardItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RewardFixtures extends Fixture implements OrderedFixtureInterface
{
    use MiscTrait;
    use CombatTrait;
    use CombatQuestTrait;
    use QuestTrait;

    public function load(ObjectManager $manager): void
    {
        $allRewards = [
            // Misc
            self::MISC_REWARDS,

            // Combat
            self::COMBAT_REWARDS,

            // Quest
            self::COMBAT_QUEST_REWARDS,
            self::QUEST_REWARDS,
        ];

        foreach($allRewards as $rewards) {
            foreach($rewards as $data) {
                $reward = (new Reward())
                    ->setPicture($data['picture'] ?? 'chest.png');

                if(isset($data['items'])) {
                    foreach($data['items'] as $rewardItemData) {
                        $item = $this->getReference($rewardItemData['item'], $rewardItemData['itemClass']);
                        $quantity = $rewardItemData['quantity'] ?? 1;

                        $rewardItem = (new RewardItem())
                            ->setItem($item)
                            ->setQuantity($quantity)
                            ->setQuestItem($rewardItemData['questItem'] ?? false);
                        $reward->addRewardItem($rewardItem);
                        $manager->persist($rewardItem);
                    }
                }
                $reward->setCrowns($data['crowns'] ?? null);
                $reward->setExperience($data['experience'] ?? null);
                $manager->persist($reward);
                $this->addReference($data['reference'], $reward);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 29;
    }
}
