<?php

namespace App\DataFixtures\Riddle;

use App\DataFixtures\Riddle\RiddleQuestion\BoisDuPendu\BosquetDesDruidesTrait;
use App\Entity\Riddle\Riddle;
use App\Entity\Riddle\RiddleQuestion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RiddleQuestionFixtures extends Fixture implements OrderedFixtureInterface
{
    use BosquetDesDruidesTrait;

    public function load(ObjectManager $manager): void
    {
        $allRiddleQuestions = [
            // Bois du Pendu
            self::BOSQUET_DES_DRUIDES_RIDDLE_QUESTIONS,
        ];

        foreach($allRiddleQuestions as $riddleQuestions) {
            foreach($riddleQuestions as $data) {
                $riddleQuestion = (new RiddleQuestion())
                    ->setPosition($data['position'])
                    ->setPicture($data['picture'] ?? null)
                    ->setText($data['text'])
                    ->setRiddle($this->getReference($data['riddle'], Riddle::class));
                $manager->persist($riddleQuestion);
                $this->addReference($data['reference'], $riddleQuestion);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 42;
    }
}
