<?php

namespace App\DataFixtures\Screen;

use App\DataFixtures\Screen\CinematicScreen\CinematicTrait;
use App\Entity\Reward\Reward;
use App\Entity\Screen\CinematicScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CinematicScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    use CinematicTrait;

    public function load(ObjectManager $manager): void
    {
        $allScreens = [
            self::CINEMATIC_SCREENS,
        ];

        foreach($allScreens as $screens) {
            foreach($screens as $data) {
                $screen = new CinematicScreen();
                $screen->setName($data['name'])
                    ->setDescription($data['description'])
                    ->setType('cinematic')
                    ->setActions($data['actions'])
                    ->setReward(isset($data['reward']) ? $this->getReference($data['reward'], Reward::class) : null);
                $manager->persist($screen);
                $this->addReference($data['reference'], $screen);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 30;
    }
}
