<?php

namespace App\DataFixtures\Action;

use App\Entity\Action\Action;
use App\Entity\Screen\CinematicScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActionFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $actions = [
            // Transition
            [
                'name' => 'Commencer',
                'type' => 'text',
                'effects' => [
                    'changeLocation' => 'quartier-du-marche',
                ],
                'screen' => 'screen_cinematic_introduction',
                'screenClass' => CinematicScreen::class,
                'reference' => 'action_transition_start',
            ],
        ];

        foreach($actions as $data) {
            $action = new Action();
            $action->setName($data['name'])
                ->setType($data['type'])
                ->setPicture($data['picture'] ?? null)
                ->setRequirements($data['requirements'] ?? null)
                ->setEffects($data['effects'] ?? null)
                ->setScreen($this->getReference($data['screen'], $data['screenClass']) ?? null);
            $manager->persist($action);
            $this->addReference($data['reference'], $action);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 32;
    }
}
