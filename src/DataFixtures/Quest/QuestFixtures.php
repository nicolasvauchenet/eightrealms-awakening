<?php

namespace App\DataFixtures\Quest;

use App\DataFixtures\Quest\Main\MainQuestTrait;
use App\DataFixtures\Quest\Secondary\SecondaryQuestTrait;
use App\Entity\Quest\Quest;
use App\Entity\Reward\Reward;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestFixtures extends Fixture implements OrderedFixtureInterface
{
    use MainQuestTrait;
    use SecondaryQuestTrait;

    public function load(ObjectManager $manager): void
    {
        $allQuests = [
            // Principale
            self::MAIN_QUEST,

            // Secondaires
            self::SECONDARY_QUESTS,
        ];

        foreach($allQuests as $quests) {
            foreach($quests as $data) {
                $quest = new Quest();
                $quest->setName($data['name'])
                    ->setType($data['type'])
                    ->setReward(isset($data['reward']) ? $this->getReference($data['reward'], Reward::class) : null);
                $manager->persist($quest);
                $this->addReference($data['reference'], $quest);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 28;
    }
}
