<?php

namespace App\DataFixtures\Action\TradeAction;

use App\Entity\Action\TradeAction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TradeActionFixtures extends Fixture implements OrderedFixtureInterface
{
    use SophieLaMarchandeTrait;

    public function load(ObjectManager $manager): void
    {
        $actions = [
            self::SOPHIE_LA_MARCHANDE_RETURN,
            self::SOPHIE_LA_MARCHANDE_EXIT,
        ];

        foreach($actions as $data) {
            $action = new TradeAction();
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
        return 63;
    }
}
