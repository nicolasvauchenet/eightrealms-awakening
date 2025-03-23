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
            // Combats de quête
            [
                'name' => 'Des rats sur les docks',
                'picture' => 'combat-quete-anciens-docks-rats.webp',
                'thumb' => 'core/creature/rat_thumb.png',
                'description' => "<p>Un groupe de gros rats vous a repéré et vous attaque&nbsp;! Vous êtes encerclé. Vous devez vous battre pour vous en sortir.</p>",
                'location' => 'location_zone_anciens_docks',
                'quest' => 'quest_secondary_des_rats_sur_les_docks',
                'step' => 'quest_secondary_des_rats_sur_les_docks_step_1',
                'screen' => 'screen_combat_une_bande_de_rats',
                'creatures' => [
                    'creature_gros_rat',
                    'creature_rat_geant',
                    'creature_gros_rat',
                ],
                'reference' => 'combat_des_rats_sur_les_docks',
            ],

            // Combats de zone
            [
                'name' => 'Une bande de rats sur les docks',
                'picture' => 'combat-anciens-docks-rats.webp',
                'thumb' => 'core/creature/rat_thumb.png',
                'description' => "<p>Un groupe de gros rats vous a repéré et vous attaque&nbsp;! Vous êtes encerclé. Vous devez vous battre pour vous en sortir.</p>",
                'location' => 'location_zone_anciens_docks',
                'screen' => 'screen_combat_une_bande_de_rats',
                'creatures' => [
                    'creature_gros_rat',
                    'creature_gros_rat',
                    'creature_gros_rat',
                ],
                'reward' => [
                    'xp' => 20,
                    'crown' => 20,
                ],
                'reference' => 'combat_une_bande_de_rats_sur_les_docks',
            ],
            [
                'name' => 'Des malfrats vous accostent',
                'picture' => 'combat-docks-de-louest-malfrats.webp',
                'thumb' => 'core/npc/chef-malfrat_thumb.png',
                'description' => "<p>Une bande de malfrats vous barre la route. Leur chef vous regarde avec un sourire mauvais, et semble prêt à vous attaquer si vous ne lui donnez pas ce qu'il veut.</p><p><em>Alors, mon gars, tu vas nous donner tout ce que tu as, ou on va devoir te le prendre&nbsp;!</em></p>",
                'location' => 'location_zone_docks_de_l_ouest',
                'screen' => 'screen_combat_malfrats_docks_de_l_ouest',
                'npcs' => [
                    'npc_sbire',
                    'npc_malfrat',
                    'npc_sbire',
                ],
                'reward' => [
                    'xp' => 50,
                    'crown' => 50,
                ],
                'reference' => 'combat_des_malfrats_vous_accostent_docks_de_l_ouest',
            ],

            // Combats aléatoires
            [
                'name' => 'Des rats vous attaquent',
                'picture' => 'combat-plain-rats.webp',
                'thumb' => 'core/creature/rat_thumb.png',
                'description' => "<p>Un groupe de gros rats vous a repéré et vous attaque&nbsp;! Vous êtes encerclé. Vous devez vous battre pour vous en sortir.</p>",
                'location' => 'location_plain',
                'screen' => 'screen_combat_une_bande_de_rats',
                'creatures' => [
                    'creature_gros_rat',
                    'creature_gros_rat',
                    'creature_gros_rat',
                ],
                'reward' => [
                    'xp' => 20,
                    'crown' => 20,
                ],
                'reference' => 'combat_des_rats_vous_attaquent_plaine',
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
                ->setCombatScreen($this->getReference($data['screen'], CombatScreen::class))
                ->setReward($data['reward'] ?? null);

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
