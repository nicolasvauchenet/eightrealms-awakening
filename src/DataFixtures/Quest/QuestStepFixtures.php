<?php

namespace App\DataFixtures\Quest;

use App\DataFixtures\Quest\Main\MainQuestStepTrait;
use App\DataFixtures\Quest\Secondary\BagarreBizarreTrait;
use App\DataFixtures\Quest\Secondary\DesRatsSurLesDocksTrait;
use App\DataFixtures\Quest\Secondary\LaFiolePerdueTrait;
use App\DataFixtures\Quest\Secondary\LaSireneEtLeMarinTrait;
use App\DataFixtures\Quest\Secondary\LivraisonEnCoursTrait;
use App\Entity\Quest\Quest;
use App\Entity\Quest\QuestStep;
use App\Entity\Reward\Reward;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestStepFixtures extends Fixture implements OrderedFixtureInterface
{
    use MainQuestStepTrait;
    use BagarreBizarreTrait;
    use DesRatsSurLesDocksTrait;
    use LaFiolePerdueTrait;
    use LaSireneEtLeMarinTrait;
    use LivraisonEnCoursTrait;

    public function load(ObjectManager $manager): void
    {
        $allQuestSteps = [
            // Principale
            self::MAIN_QUEST_STEPS,

            // Secondaires
            self::BAGARRE_BIZARRE_QUEST_STEPS,
            self::DES_RATS_SUR_LES_DOCKS_QUEST_STEPS,
            self::LA_FIOLE_PERDUE_QUEST_STEPS,
            self::LA_SIRENE_ET_LE_MARIN_QUEST_STEPS,
            self::LIVRAISON_EN_COURS_QUEST_STEPS,
        ];

        foreach($allQuestSteps as $questSteps) {
            foreach($questSteps as $data) {
                $questStep = new QuestStep();
                $questStep->setDescription($data['description'])
                    ->setPosition($data['position'])
                    ->setLast($data['last'])
                    ->setQuest($this->getReference($data['quest'], Quest::class))
                    ->setReward(isset($data['reward']) ? $this->getReference($data['reward'], Reward::class) : null)
                    ->setGiver(isset($data['giver']) ? $this->getReference($data['giver'], $data['giverClass']) : null);
                $manager->persist($questStep);
                $this->addReference($data['reference'], $questStep);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 30;
    }
}
