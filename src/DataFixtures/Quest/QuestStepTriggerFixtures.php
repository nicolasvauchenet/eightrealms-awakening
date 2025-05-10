<?php

namespace App\DataFixtures\Quest;

use App\Entity\Quest\QuestStep;
use App\Entity\Quest\QuestStepTrigger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestStepTriggerFixtures extends Fixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $questStepTriggers = [
            // Objet de quête : Lettre d'Alaric
            [
                'type' => 'add_item',
                'payload' => [
                    'slug' => 'note-dalaric',
                ],
                'questStep' => 'quest_main_step_2',
                'reference' => 'trigger_add_item_lettre_d_alaric',
            ],

            // Dialogue : Théobald Gris-Murmure - Alaric
            [
                'type' => 'dialog_step',
                'payload' => [
                    'slug' => 'theobald-alaric',
                ],
                'questStep' => 'quest_main_step_3',
                'reference' => 'trigger_dialog_step_theobald_gris_murmure_alaric',
            ],

            // Dialogue : Théobald Gris-Murmure - Clé
            [
                'type' => 'dialog_step',
                'payload' => [
                    'slug' => 'theobald-cle',
                ],
                'questStep' => 'quest_main_step_4',
                'reference' => 'trigger_dialog_step_theobald_gris_murmure_cle',
            ],
        ];

        foreach($questStepTriggers as $data) {
            $questStepTrigger = (new QuestStepTrigger())
                ->setType($data['type'])
                ->setPayload($data['payload'])
                ->setConditions($data['conditions'] ?? null)
                ->setQuestStep($this->getReference($data['questStep'], QuestStep::class));
            $manager->persist($questStepTrigger);
            $this->addReference($data['reference'], $questStepTrigger);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 38;
    }
}
