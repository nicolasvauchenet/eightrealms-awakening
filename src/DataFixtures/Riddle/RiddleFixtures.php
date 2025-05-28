<?php

namespace App\DataFixtures\Riddle;

use App\DataFixtures\Riddle\Riddle\BoisDuPendu\BosquetDesDruidesTrait;
use App\DataFixtures\Riddle\Riddle\BoisDuPendu\ClairiereDeLOublieTrait;
use App\DataFixtures\Riddle\Riddle\BoisDuPendu\CriqueDuPenduTrait;
use App\DataFixtures\Riddle\Riddle\MontsTerribles\GouffreDAskalorTrait;
use App\DataFixtures\Riddle\Riddle\PortSaintDoux\DocksDeLouestTrait;
use App\DataFixtures\Riddle\Riddle\SablesChauds\PlageDeLaSireneTrait;
use App\Entity\Quest\QuestStep;
use App\Entity\Riddle\Riddle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RiddleFixtures extends Fixture implements OrderedFixtureInterface
{
    use DocksDeLouestTrait;
    use ClairiereDeLOublieTrait;
    use BosquetDesDruidesTrait;
    use CriqueDuPenduTrait;
    use PlageDeLaSireneTrait;
    use GouffreDAskalorTrait;

    public function load(ObjectManager $manager): void
    {
        $allRiddles = [
            // Port Saint-Doux
            self::DOCKS_DE_L_OUEST_RIDDLES,

            // Bois du Pendu
            self::CLAIRIERE_DE_L_OUBLIE_RIDDLES,
            self::CRIQUE_DU_PENDU_RIDDLES,
            self::BOSQUET_DES_DRUIDES_RIDDLES,

            // Sables Chauds
            self::PLAGE_DE_LA_SIRENE_RIDDLES,

            // Monts Terribles
            self::GOUFFRE_D_ASKALOR_RIDDLES,
        ];

        foreach($allRiddles as $riddles) {
            foreach($riddles as $data) {
                $riddle = (new Riddle())
                    ->setName($data['name'])
                    ->setPicture($data['picture'] ?? null)
                    ->setThumbnail($data['thumbnail'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setCharacteristic($data['characteristic'] ?? null)
                    ->setDifficulty($data['difficulty'] ?? null)
                    ->setSuccessEffects($data['successEffects'] ?? null)
                    ->setSuccessDescription($data['successDescription'] ?? null)
                    ->setFailureEffects($data['failureEffects'] ?? null)
                    ->setFailureDescription($data['failureDescription'] ?? null)
                    ->setRepeatOnFailure($data['repeatOnFailure'])
                    ->setRedirectToDialog(($data['redirectToDialog'] ?? null))
                    ->setResolverKey($data['resolverKey'] ?? null)
                    ->setQuestStep(isset($data['questStep']) ? $this->getReference($data['questStep'], QuestStep::class) : null)
                    ->setTargetCharacter(isset($data['targetCharacter']) ? $this->getReference($data['targetCharacter'], $data['targetCharacterClass']) : null);
                $manager->persist($riddle);
                $this->addReference($data['reference'], $riddle);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 39;
    }
}
