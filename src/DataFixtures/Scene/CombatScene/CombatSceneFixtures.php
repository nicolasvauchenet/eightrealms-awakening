<?php

namespace App\DataFixtures\Scene\CombatScene;

use App\Entity\Character\Creature;
use App\Entity\Character\Npc;
use App\Entity\Scene\CombatScene;
use App\Entity\Scene\CombatSceneCreature;
use App\Entity\Scene\CombatSceneNpc;
use App\Entity\Screen\CombatScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CombatSceneFixtures extends Fixture implements OrderedFixtureInterface
{
    use AnciensDocksTrait;

    public function load(ObjectManager $manager): void
    {
        $scenes = [
            self::RATS,
        ];

        foreach($scenes as $data) {
            $scene = new CombatScene();
            $scene->setName($data['name'])
                ->setPicture($data['picture'] ?? null)
                ->setDescription($data['description'] ?? null)
                ->setPosition($data['position'] ?? null)
                ->setScreen($this->getReference($data['screen'], CombatScreen::class));
            if(isset($data['npcs'])) {
                foreach($data['npcs'] as $npc) {
                    $combatSceneNpc = (new CombatSceneNpc())
                        ->setScene($scene)
                        ->setNpc($this->getReference($npc['npc'], Npc::class))
                        ->setAlive(true);
                    if(isset($npc['crownReward'])) {
                        $combatSceneNpc->setCrownReward($npc['crownReward']);
                    }
                    if(isset($npc['xpReward'])) {
                        $combatSceneNpc->setXpReward($npc['xpReward']);
                    }
                    $manager->persist($combatSceneNpc);
                }
            }
            if(isset($data['creatures'])) {
                foreach($data['creatures'] as $creature) {
                    $combatSceneCreature = (new CombatSceneCreature())
                        ->setScene($scene)
                        ->setCreature($this->getReference($creature['creature'], Creature::class))
                        ->setAlive(true);
                    if(isset($creature['crownReward'])) {
                        $combatSceneCreature->setCrownReward($creature['crownReward']);
                    }
                    if(isset($creature['xpReward'])) {
                        $combatSceneCreature->setXpReward($creature['xpReward']);
                    }
                    $manager->persist($combatSceneCreature);
                }
            }
            $manager->persist($scene);
            $this->addReference($data['reference'], $scene);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 54;
    }
}
