<?php

namespace App\DataFixtures\Action;

use App\Entity\Action\TransitionAction;
use App\Entity\Scene\CinematicScene;
use App\Entity\Scene\PlaceScene;
use App\Entity\Screen\PlaceScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TransitionActionFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $actions = [
            [
                'label' => 'Commencer',
                'scene' => 'scene_cinematic_introduction',
                'sceneClass' => CinematicScene::class,
                'targetScene' => 'scene_place_quartier_du_marche',
                'targetSceneClass' => PlaceScene::class,
                'targetScreen' => 'screen_place_quartier_du_marche',
                'targetScreenClass' => PlaceScreen::class,
                'reference' => 'action_transition_start',
            ],
            [
                'label' => 'Continuer',
                'scene' => 'scene_cinematic_jail',
                'sceneClass' => CinematicScene::class,
                'targetScene' => 'scene_place_quartier_du_marche',
                'targetSceneClass' => PlaceScene::class,
                'targetScreen' => 'screen_place_quartier_du_marche',
                'targetScreenClass' => PlaceScreen::class,
                'reference' => 'action_transition_jail',
            ],
        ];

        foreach($actions as $data) {
            $action = new TransitionAction();
            $action->setLabel($data['label'])
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
        return 60;
    }
}
