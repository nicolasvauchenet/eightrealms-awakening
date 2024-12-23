<?php

namespace App\DataFixtures\Action\DialogueAction;

use App\Entity\Action\DialogueAction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DialogueActionFixtures extends Fixture implements OrderedFixtureInterface
{
    use SophieLaMarchandeTrait;
    use RobertLeGardeTrait;
    use BiloLePassantTrait;

    public function load(ObjectManager $manager): void
    {
        $actions = [
            self::SOPHIE_LA_MARCHANDE_TRADE,
            self::SOPHIE_LA_MARCHANDE_HISTORY,
            self::SOPHIE_LA_MARCHANDE_HISTORY_RETURN,
            self::SOPHIE_LA_MARCHANDE_HISTORY_EXIT,
            self::SOPHIE_LA_MARCHANDE_STEAL,
            self::SOPHIE_LA_MARCHANDE_EXIT,
            self::ROBERT_LE_GARDE_HISTORY,
            self::ROBERT_LE_GARDE_ATTACK,
            self::ROBERT_LE_GARDE_HISTORY_RETURN,
            self::ROBERT_LE_GARDE_HISTORY_EXIT,
            self::ROBERT_LE_GARDE_RUMORS,
            self::ROBERT_LE_GARDE_RUMORS_2,
            self::ROBERT_LE_GARDE_RUMORS_2_ACCEPT,
            self::ROBERT_LE_GARDE_RUMORS_2_ACCEPT_RETURN,
            self::ROBERT_LE_GARDE_RUMORS_2_ACCEPT_EXIT,
            self::ROBERT_LE_GARDE_RUMORS_2_DECLINE,
            self::ROBERT_LE_GARDE_RUMORS_2_DECLINE_RETURN,
            self::ROBERT_LE_GARDE_RUMORS_2_DECLINE_EXIT,
            self::ROBERT_LE_GARDE_RUMORS_RETURN,
            self::ROBERT_LE_GARDE_RUMORS_EXIT,
            self::ROBERT_LE_GARDE_EXIT,
            self::BILO_LE_PASSANT_HISTORY,
            self::BILO_LE_PASSANT_HISTORY_RETURN,
            self::BILO_LE_PASSANT_HISTORY_EXIT,
            self::BILO_LE_PASSANT_RUMORS,
            self::BILO_LE_PASSANT_RUMORS_2,
            self::BILO_LE_PASSANT_RUMORS_2_ACCEPT,
            self::BILO_LE_PASSANT_RUMORS_2_ACCEPT_RETURN,
            self::BILO_LE_PASSANT_RUMORS_2_ACCEPT_EXIT,
            self::BILO_LE_PASSANT_RUMORS_2_DECLINE,
            self::BILO_LE_PASSANT_RUMORS_2_DECLINE_RETURN,
            self::BILO_LE_PASSANT_RUMORS_2_DECLINE_EXIT,
            self::BILO_LE_PASSANT_RUMORS_RETURN,
            self::BILO_LE_PASSANT_RUMORS_EXIT,
            self::BILO_LE_PASSANT_STEAL,
            self::BILO_LE_PASSANT_EXIT,
        ];

        foreach($actions as $data) {
            $action = new DialogueAction();
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
        return 62;
    }
}
