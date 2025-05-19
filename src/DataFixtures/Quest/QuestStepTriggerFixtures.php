<?php

namespace App\DataFixtures\Quest;

use App\DataFixtures\Quest\QuestStepTrigger\BoisDuPendu\BosquetDesDruidesTrait;
use App\DataFixtures\Quest\QuestStepTrigger\BoisDuPendu\ClairiereDeLOublieTrait;
use App\DataFixtures\Quest\QuestStepTrigger\BoisDuPendu\CriqueDuPenduTrait;
use App\DataFixtures\Quest\QuestStepTrigger\Plouc\CampementGobelinTrait;
use App\DataFixtures\Quest\QuestStepTrigger\PortSaintDoux\AnciensDocksTrait;
use App\DataFixtures\Quest\QuestStepTrigger\PortSaintDoux\QuartierDesPloucsTrait;
use App\Entity\Quest\QuestStep;
use App\Entity\Quest\QuestStepTrigger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestStepTriggerFixtures extends Fixture implements OrderedFixtureInterface
{

    use AnciensDocksTrait;
    use QuartierDesPloucsTrait;
    use CampementGobelinTrait;
    use ClairiereDeLOublieTrait;
    use BosquetDesDruidesTrait;
    use CriqueDuPenduTrait;

    public function load(ObjectManager $manager): void
    {
        $allQuestStepTriggers = [
            // Port Saint-Doux
            self::ANCIENS_DOCKS_QUEST_STEP_TRIGGERS,
            self::QUARTIER_DES_PLOUCS_QUEST_STEP_TRIGGERS,

            // Plouc
            self::CAMPEMENT_GOBELIN_QUEST_STEP_TRIGGERS,

            // Bois du Pendu
            self::CLAIRIERE_DE_L_OUBLIE_QUEST_STEP_TRIGGERS,
            self::BOSQUET_DES_DRUIDES_QUEST_STEP_TRIGGERS,
            self::CRIQUE_DU_PENDU_QUEST_STEP_TRIGGERS,
        ];

        foreach($allQuestStepTriggers as $questStepTriggers) {
            foreach($questStepTriggers as $data) {
                $questStepTrigger = (new QuestStepTrigger())
                    ->setType($data['type'])
                    ->setPayload($data['payload'])
                    ->setConditions($data['conditions'] ?? null)
                    ->setQuestStep($this->getReference($data['questStep'], QuestStep::class));
                $manager->persist($questStepTrigger);
                $this->addReference($data['reference'], $questStepTrigger);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 38;
    }
}
