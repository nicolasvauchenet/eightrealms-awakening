<?php

namespace App\DataFixtures\Action\CombatAction;

use App\Entity\Action\CombatAction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CombatActionFixtures extends Fixture implements OrderedFixtureInterface
{
    use RatsTrait;

    public function load(ObjectManager $manager): void
    {
        $actions = [
            self::ANCIENS_DOCKS_RATS_COMBAT,
            self::ANCIENS_DOCKS_RATS_FLEE,
        ];

        foreach($actions as $data) {
            $action = new CombatAction();
            $action->setLabel($data['label'])
                ->setPicture($data['picture'] ?? null)
                ->setActionRequirements($data['actionRequirements'] ?? null)
                ->setActionEffects($data['actionEffects'] ?? null)
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
        return 64;
    }
}
