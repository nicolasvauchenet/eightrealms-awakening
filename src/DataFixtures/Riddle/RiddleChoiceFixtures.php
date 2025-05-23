<?php

namespace App\DataFixtures\Riddle;

use App\DataFixtures\Riddle\RiddleChoice\BoisDuPendu\BosquetDesDruidesTrait;
use App\Entity\Riddle\RiddleChoice;
use App\Entity\Riddle\RiddleQuestion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RiddleChoiceFixtures extends Fixture implements OrderedFixtureInterface
{
    use BosquetDesDruidesTrait;

    public function load(ObjectManager $manager): void
    {
        $allRiddleChoices = [
            // Bois du Pendu
            self::BOSQUET_DES_DRUIDES_RIDDLE_CHOICES,
        ];

        foreach($allRiddleChoices as $riddleChoices) {
            foreach($riddleChoices as $data) {
                $riddleChoice = (new RiddleChoice())
                    ->setPosition($data['position'])
                    ->setText($data['text'])
                    ->setMarker($data['marker'])
                    ->setRiddleQuestion($this->getReference($data['riddleQuestion'], RiddleQuestion::class))
                    ->setNextRiddleQuestion(isset($data['nextRiddleQuestion']) ? $this->getReference($data['nextRiddleQuestion'], RiddleQuestion::class) : null);
                $manager->persist($riddleChoice);
                $this->addReference($data['reference'], $riddleChoice);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 43;
    }
}
