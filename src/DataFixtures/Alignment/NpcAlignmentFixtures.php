<?php

namespace App\DataFixtures\Alignment;

use App\DataFixtures\Alignment\NpcAlignment\BoisDuPendu\BosquetDesDruidesTrait;
use App\Entity\Alignment\Alignment;
use App\Entity\Alignment\CharacterAlignment;
use App\Entity\Character\Npc;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class NpcAlignmentFixtures extends Fixture implements OrderedFixtureInterface
{
    use BosquetDesDruidesTrait;

    public function load(ObjectManager $manager): void
    {
        $allNpcAlignments = [
            // Bois du Pendu
            self::BOSQUET_DES_DRUIDES_NPC_ALIGNMENTS,
        ];

        foreach($allNpcAlignments as $npcAlignments) {
            foreach($npcAlignments as $data) {
                $characterAlignment = (new CharacterAlignment())
                    ->setCharacter($this->getReference($data['character'], Npc::class))
                    ->setAlignment($this->getReference($data['alignment'], Alignment::class));
                $manager->persist($characterAlignment);
                $this->addReference('npc_alignment_' . $data['reference'], $characterAlignment);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 42;
    }
}
