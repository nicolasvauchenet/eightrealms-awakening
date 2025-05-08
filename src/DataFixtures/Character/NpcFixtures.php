<?php

namespace App\DataFixtures\Character;

use App\DataFixtures\Character\Npc\BoisDuPendu\BosquetDesDruidesTrait;
use App\DataFixtures\Character\Npc\BoisDuPendu\ClairiereDeLOublieTrait;
use App\DataFixtures\Character\Npc\MontsTerribles\ColDuVentNoirTrait;
use App\DataFixtures\Character\Npc\Plouc\PloucTrait;
use App\DataFixtures\Character\Npc\PortSaintDoux\DocksDeLOuestTrait;
use App\DataFixtures\Character\Npc\PortSaintDoux\QuartierDesPloucsTrait;
use App\DataFixtures\Character\Npc\PortSaintDoux\QuartierDuMarcheTrait;
use App\DataFixtures\Character\Npc\PortSaintDoux\VieilleVilleTrait;
use App\DataFixtures\Character\Npc\SablesChauds\CampAbandonneTrait;
use App\DataFixtures\Character\Npc\SablesChauds\OasisSansNomTrait;
use App\Entity\Character\Npc;
use App\Entity\Character\Profession;
use App\Entity\Character\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class NpcFixtures extends Fixture implements OrderedFixtureInterface
{
    use DocksDeLOuestTrait;
    use QuartierDesPloucsTrait;
    use QuartierDuMarcheTrait;
    use VieilleVilleTrait;
    use PloucTrait;
    use ClairiereDeLOublieTrait;
    use BosquetDesDruidesTrait;
    use ColDuVentNoirTrait;
    use CampAbandonneTrait;
    use OasisSansNomTrait;

    public function load(ObjectManager $manager): void
    {
        $allCharacters = [
            // Port Saint-Doux
            self::DOCKS_DE_L_OUEST_NPCS,
            self::QUARTIER_DES_PLOUCS_NPCS,
            self::QUARTIER_DU_MARCHE_NPCS,
            self::VIEILLE_VILLE_NPCS,

            // Plouc
            self::PLOUC_NPCS,

            // Bois du Pendu
            self::CLAIRIERE_DE_L_OUBLIE_NPCS,
            self::BOSQUET_DES_DRUIDES_NPCS,

            // Monts Terribles
            self::COL_DU_VENT_NOIR_NPCS,

            // Sables Chauds
            self::CAMP_ABANDONNE_NPCS,
            self::OASIS_SANS_NOM_NPCS,
        ];

        foreach($allCharacters as $characters) {
            foreach($characters as $data) {
                $character = new Npc();
                $character->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setPictureAngry($data['picture_angry'] ?? null)
                    ->setThumbnail($data['thumbnail'])
                    ->setDescription($data['description'])
                    ->setDescriptionAngry($data['description_angry'] ?? null)
                    ->setStrength($data['strength'])
                    ->setDexterity($data['dexterity'])
                    ->setConstitution($data['constitution'])
                    ->setWisdom($data['wisdom'])
                    ->setIntelligence($data['intelligence'])
                    ->setCharisma($data['charisma'])
                    ->setHealthMax($data['healthMax'])
                    ->setManaMax($data['manaMax'])
                    ->setFortune($data['fortune'])
                    ->setLevel($data['level'])
                    ->setRace($this->getReference($data['race'], Race::class))
                    ->setProfession($this->getReference($data['profession'], Profession::class));
                $manager->persist($character);
                $this->addReference($data['reference'], $character);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 5;
    }
}
