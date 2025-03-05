<?php

namespace App\DataFixtures\Combat;

use App\Entity\Character\Creature;
use App\Entity\Character\Npc;
use App\Entity\Combat\Combat;
use App\Entity\Combat\CreatureCombat;
use App\Entity\Combat\NpcCombat;
use App\Entity\Location\Location;
use App\Entity\Quest\Quest;
use App\Entity\Quest\Step;
use App\Entity\Screen\CombatScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CombatFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $combats = [
            [
                'name' => 'Des rats sur les docks',
                'picture' => 'anciens-docks-rats.webp',
                'thumb' => 'core/creature/thumb_rat.png',
                'description' => "<p>Trois gros rats vous ont repéré et vous attaquent&nbsp;! Vous êtes encerclé. Vous devez vous battre pour vous en sortir.</p>",
                'location' => 'location_zone_anciens_docks',
                'quest' => 'quest_secondary_des_rats_sur_les_docks',
                'step' => 'quest_secondary_des_rats_sur_les_docks_step_1',
                'screen' => 'screen_combat_des_rats_sur_les_docks',
                'creatures' => [
                    'creature_gros_rat',
                    'creature_gros_rat',
                    'creature_gros_rat',
                ],
                'reference' => 'combat_des_rats_sur_les_docks',
            ],
        ];

        foreach($combats as $data) {
            $combat = new Combat();
            $combat->setName($data['name'] ?? null)
                ->setPicture($data['picture'])
                ->setThumb($data['thumb'] ?? null)
                ->setDescription($data['description'])
                ->setLocation($this->getReference($data['location'], Location::class))
                ->setQuest(isset($data['quest']) ? $this->getReference($data['quest'], Quest::class) : null)
                ->setStep(isset($data['step']) ? $this->getReference($data['step'], Step::class) : null)
                ->setCombatScreen($this->getReference($data['screen'], CombatScreen::class));

            if(isset($data['npcs'])) {
                foreach($data['npcs'] as $npcReference) {
                    $npc = $this->getReference($npcReference, Npc::class);
                    $npcCombat = (new NpcCombat())
                        ->setCombat($combat)
                        ->setNpc($npc)
                        ->setHealth($npc->getHealthMax())
                        ->setMana($npc->getManaMax());
                    $manager->persist($npcCombat);
                }
            }

            if(isset($data['creatures'])) {
                foreach($data['creatures'] as $creatureReference) {
                    $creature = $this->getReference($creatureReference, Creature::class);
                    $creatureCombat = (new CreatureCombat())
                        ->setCombat($combat)
                        ->setCreature($creature)
                        ->setHealth($creature->getHealthMax())
                        ->setMana($creature->getManaMax());
                    $manager->persist($creatureCombat);
                }
            }
            $manager->persist($combat);
            $this->addReference($data['reference'], $combat);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 37;
    }
}
