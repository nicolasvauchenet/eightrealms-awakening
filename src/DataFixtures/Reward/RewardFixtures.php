<?php

namespace App\DataFixtures\Reward;

use App\DataFixtures\Reward\Combat\Plouc\OreeDuBoisCombatTrait;
use App\DataFixtures\Reward\Combat\PortSaintDoux\AnciensDocksCombatTrait;
use App\DataFixtures\Reward\Misc\MiscTrait;
use App\DataFixtures\Reward\Quest\MainQuestTrait;
use App\DataFixtures\Reward\Quest\SideQuestTrait;
use App\DataFixtures\Reward\QuestCombat\BoisDuPendu\ClairiereDeLOublieQuestCombatTrait;
use App\DataFixtures\Reward\QuestCombat\Plouc\CampementGobelinQuestCombatTrait;
use App\DataFixtures\Reward\QuestCombat\PortSaintDoux\AnciensDocksQuestCombatTrait;
use App\DataFixtures\Reward\QuestCombat\PortSaintDoux\DocksDeLOuestQuestCombatTrait;
use App\DataFixtures\Reward\QuestCombat\SablesChauds\OasisSansNomQuestCombatTrait;
use App\Entity\Location\Location;
use App\Entity\Reward\Reward;
use App\Entity\Reward\RewardItem;
use App\Entity\Reward\RewardLocation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RewardFixtures extends Fixture implements OrderedFixtureInterface
{
    use AnciensDocksCombatTrait;
    use AnciensDocksQuestCombatTrait;
    use DocksDeLOuestQuestCombatTrait;
    use OreeDuBoisCombatTrait;
    use CampementGobelinQuestCombatTrait;
    use ClairiereDeLOublieQuestCombatTrait;
    use OasisSansNomQuestCombatTrait;
    use MainQuestTrait;
    use SideQuestTrait;
    use MiscTrait;

    public function load(ObjectManager $manager): void
    {
        $allRewards = [
            // Divers
            self::MISC_REWARDS,

            // Quêtes
            self::MAIN_QUEST_REWARDS,
            self::SIDE_QUEST_REWARDS,

            // Port Saint-Doux
            self::ANCIENS_DOCKS_COMBAT_REWARDS,
            self::ANCIENS_DOCKS_COMBAT_QUEST_REWARDS,
            self::DOCKS_DE_L_OUEST_COMBAT_QUEST_REWARDS,

            // Plouc
            self::OREE_DU_BOIS_COMBAT_REWARDS,
            self::CAMPEMENT_GOBELIN_COMBAT_QUEST_REWARDS,

            // Bois du Pendu
            self::CLAIRIERE_DE_L_OUBLIE_COMBAT_QUEST_REWARDS,

            // Sables Chauds
            self::OASIS_SANS_NOM_COMBAT_QUEST_REWARDS,
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
                if(isset($data['locations'])) {
                    foreach($data['locations'] as $rewardLocation) {
                        $location = $this->getReference($rewardLocation, Location::class);
                        $rewardLocation = (new RewardLocation())
                            ->setLocation($location);
                        $reward->addRewardLocation($rewardLocation);
                        $manager->persist($rewardLocation);
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
