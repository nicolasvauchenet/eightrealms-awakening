<?php

namespace App\DataFixtures\Action\PlaceAction;

use App\Entity\Action\PlaceAction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlaceActionFixtures extends Fixture implements OrderedFixtureInterface
{
    use QuartierDuMarcheTrait;

    public function load(ObjectManager $manager): void
    {
        $actions = [
            self::SOPHIE_LA_MARCHANDE,
            self::ROBERT_LE_GARDE,
            self::BILO_LE_PASSANT,
        ];

        foreach($actions as $data) {
            $action = new PlaceAction();
            $action->setLabel($data['label'])
                ->setPicture($data['picture'] ?? null)
                ->setScene($this->getReference($data['scene'], $data['sceneClass']))
                ->setTargetScene(isset($data['targetScene']) ? $this->getReference($data['targetScene'], $data['targetSceneClass']) : null)
                ->setTargetScreen(isset($data['targetScreen']) ? $this->getReference($data['targetScreen'], $data['targetScreenClass']) : null);
            $manager->persist($action);
            $this->addReference($data['reference'], $action);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 98;
    }
}
