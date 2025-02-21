<?php

namespace App\DataFixtures\Screen;

use App\Entity\Screen\DialogueScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DialogueScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            [
                'name' => 'Discuter avec un PNJ',
                'reference' => 'screen_dialogue',
            ],
            [
                'name' => "Écouter les ragots d'un PNJ",
                'reference' => 'screen_dialogue_rumors',
            ],
        ];

        foreach($screens as $data) {
            $screen = new DialogueScreen();
            $screen->setName($data['name']);
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 25;
    }
}
