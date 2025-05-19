<?php

namespace App\DataFixtures\Riddle;

use App\DataFixtures\Riddle\RiddleTrigger\BoisDuPendu\ClairiereDeLOublieTrait;
use App\DataFixtures\Riddle\RiddleTrigger\BoisDuPendu\CriqueDuPenduTrait;
use App\DataFixtures\Riddle\RiddleTrigger\PortSaintDoux\DocksDeLOuestTrait;
use App\DataFixtures\Riddle\RiddleTrigger\SablesChauds\PlageDeLaSireneTrait;
use App\Entity\Riddle\Riddle;
use App\Entity\Riddle\RiddleTrigger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RiddleTriggerFixtures extends Fixture implements OrderedFixtureInterface
{
    use DocksDeLOuestTrait;
    use ClairiereDeLOublieTrait;
    use CriqueDuPenduTrait;
    use PlageDeLaSireneTrait;

    public function load(ObjectManager $manager): void
    {
        $allRiddleTriggers = [
            // Port Saint-Doux
            self::DOCKS_DE_L_OUEST_RIDDLE_TRIGGERS,

            // Bois du Pendu
            self::CLAIRIERE_DE_L_OUBLIE_RIDDLE_TRIGGERS,
            self::CRIQUE_DU_PENDU_RIDDLE_TRIGGERS,

            // Sables Chauds
            self::PLAGE_DE_LA_SIRENE_RIDDLE_TRIGGERS,
        ];

        foreach($allRiddleTriggers as $riddleTriggers) {
            foreach($riddleTriggers as $data) {
                $riddleTrigger = (new RiddleTrigger())
                    ->setType($data['type'])
                    ->setPayload($data['payload'])
                    ->setAction($data['action'] ?? null)
                    ->setConditions($data['conditions'] ?? null)
                    ->setRiddle($this->getReference($data['riddle'], Riddle::class));
                $manager->persist($riddleTrigger);
                $this->addReference($data['reference'], $riddleTrigger);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 40;
    }
}
