<?php

namespace App\DataFixtures\Scene;

use App\Entity\Scene\CinematicScene;
use App\Entity\Screen\CinematicScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CinematicSceneFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $scenes = [
            [
                'name' => 'Introduction',
                'description' => "<p>Sur la petite île qui compose le Royaume de l’Île du Nord, un mystère grandit. Le Prince Alaric, parti courageusement explorer le redouté Donjon de l’Âme, n’a plus donné signe de vie.</p><p>Lorsque le Roi Galdric III lui-même a tenté de le secourir, il a disparu à son tour.</p><p>Désormais, les habitants de la capitale, Port Saint-Doux, murmurent des rumeurs inquiétantes : le donjon abriterait un mal ancien réveillé par l’imprudence royale.</p><p>C’est au cœur de Port Saint-Doux, sur la place animée du marché, que votre aventure commence. Entre marchands, gardes bourrus et passants bavards, chaque rencontre pourrait vous guider vers la vérité… ou vous détourner sur un chemin inattendu.</p>",
                'position' => 1,
                'screen' => 'screen_cinematic_introduction',
                'reference' => 'scene_cinematic_introduction',
            ],
            [
                'name' => 'Prison',
                'picture' => 'jail.webp',
                'description' => "<p>Vous vous êtes fait prendre, et vous atterrissez dans les geôles de Port Saint-Doux.</p><p>Vous avez écopé d'une amende de 50 pièces d'or et votre réputation a diminué.</p><p>Vous êtes seul dans votre cellule, si on ne compte pas les rats pour de la compagnie, bien sûr.</p><p>Vous avez faim et soif, vous avez froid, vous êtes fatigué et sale. Votre peine d'une journée et une nuit vient de prendre fin. Vous avez hâte de sortir de cet endroit.</p>",
                'position' => 1,
                'screen' => 'screen_cinematic_jail',
                'reference' => 'scene_cinematic_jail',
            ],
        ];

        foreach($scenes as $data) {
            $scene = new CinematicScene();
            $scene->setName($data['name'])
                ->setPicture($data['picture'] ?? null)
                ->setDescription($data['description'] ?? null)
                ->setPosition($data['position'] ?? null)
                ->setScreen($this->getReference($data['screen'], CinematicScreen::class));
            $manager->persist($scene);
            $this->addReference($data['reference'], $scene);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 50;
    }
}
