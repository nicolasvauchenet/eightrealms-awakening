<?php

namespace App\DataFixtures\Scene\DialogueScene;

use App\Entity\Character\Npc;
use App\Entity\Scene\DialogueScene;
use App\Entity\Screen\DialogueScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DialogueSceneFixtures extends Fixture implements OrderedFixtureInterface
{
    use PortSaintDouxTrait;

    public function load(ObjectManager $manager): void
    {
        $scenes = [
            self::SOPHIE_LA_MARCHANDE_START,
            self::SOPHIE_LA_MARCHANDE_HISTORY_START,
            self::ROBERT_LE_GARDE_START,
            self::ROBERT_LE_GARDE_HISTORY_RUMORS_START,
            self::BILO_LE_PASSANT_START,
        ];

        foreach($scenes as $data) {
            $scene = new DialogueScene();
            $scene->setName($data['name'])
                ->setPicture($data['picture'] ?? null)
                ->setDescription($data['description'] ?? null)
                ->setPosition($data['position'] ?? null)
                ->setScreen($this->getReference($data['screen'], DialogueScreen::class))
                ->setNpc($this->getReference($data['npc'], Npc::class));
            $manager->persist($scene);
            $this->addReference($data['reference'], $scene);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 52;
    }
}
