<?php

namespace App\DataFixtures\Combat;

use App\DataFixtures\Combat\BoisDuPendu\ClairiereDeLOublieTrait;
use App\DataFixtures\Combat\BoisDuPendu\CriqueDuPenduTrait;
use App\DataFixtures\Combat\Plouc\BoisDesRelentsTrait;
use App\DataFixtures\Combat\PortSaintDoux\AnciensDocksTrait;
use App\DataFixtures\Combat\PortSaintDoux\DocksDeLOuestTrait;
use App\DataFixtures\Combat\SablesChauds\OasisSansNomTrait;
use App\DataFixtures\Combat\SablesChauds\PlageDeLaSireneTrait;
use App\Entity\Combat\Combat;
use App\Entity\Combat\CombatEnemy;
use App\Entity\Location\Location;
use App\Entity\Quest\QuestStep;
use App\Entity\Reward\Reward;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CombatFixtures extends Fixture implements OrderedFixtureInterface
{
    use AnciensDocksTrait;
    use DocksDeLOuestTrait;
    use BoisDesRelentsTrait;
    use ClairiereDeLOublieTrait;
    use CriqueDuPenduTrait;
    use OasisSansNomTrait;
    use PlageDeLaSireneTrait;

    public function load(ObjectManager $manager): void
    {
        $combatLocations = [
            // Port Saint-Doux
            self::ANCIENS_DOCKS_COMBATS,
            self::DOCKS_DE_L_OUEST_COMBATS,

            // Plouc
            self::BOIS_DES_RELENTS_COMBATS,

            // Bois du Pendu
            self::CLAIRIERE_DE_L_OUBLIE_COMBATS,
            self::CRIQUE_DU_PENDU_COMBATS,

            // Sables Chauds
            self::OASIS_SANS_NOM_COMBATS,
            self::PLAGE_DE_LA_SIRENE_COMBATS,
        ];

        foreach($combatLocations as $combats) {
            foreach($combats as $data) {
                $combat = new Combat();
                $combat->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setThumbnail($data['thumbnail'] ?? null)
                    ->setDescription($data['description'])
                    ->setConditions($data['conditions'] ?? null)
                    ->setVictoryDescription($data['victoryDescription'] ?? null)
                    ->setDefeatDescription($data['defeatDescription'] ?? null)
                    ->setRedirectToDialog($data['redirectToDialog'] ?? null)
                    ->setReward(isset($data['reward']) ? $this->getReference($data['reward'], Reward::class) : null)
                    ->setLocation(isset($data['location']) ? $this->getReference($data['location'], Location::class) : null)
                    ->setQuestStep(isset($data['questStep']) ? $this->getReference($data['questStep'], QuestStep::class) : null);
                if(isset($data['enemies'])) {
                    foreach($data['enemies'] as $key => $enemy) {
                        $enemy = $this->getReference($enemy['enemy'], $enemy['enemyClass']);
                        $enemyCombat = (new CombatEnemy())
                            ->setCombat($combat)
                            ->setEnemy($enemy)
                            ->setPosition($key + 1)
                            ->setHealth($enemy->getHealthMax())
                            ->setMana($enemy->getManaMax());
                        $manager->persist($enemyCombat);
                    }
                }
                $manager->persist($combat);
                $this->addReference($data['reference'], $combat);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 36;
    }
}
