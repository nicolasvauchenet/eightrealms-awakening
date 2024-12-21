<?php

namespace App\DataFixtures\Screen\DialogueScreen;

use App\Entity\Character\Npc;
use App\Entity\Screen\DialogueScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DialogueScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    use PortSaintDouxTrait;

    public function load(ObjectManager $manager): void
    {
        $screens = [
            self::SOPHIE_LA_MARCHANDE,
            self::ROBERT_LE_GARDE,
            self::BILO_LE_PASSANT,
        ];

        foreach($screens as $data) {
            $screen = new DialogueScreen();
            $screen->setName($data['name'])
                ->setNpc($this->getReference($data['npc'], Npc::class));
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 22;
    }
}
