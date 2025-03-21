<?php

namespace App\DataFixtures\Screen;

use App\Entity\Screen\CinematicScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CinematicScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            [
                'name' => "L'Aventure commence !",
                'picture' => 'chapter1/screen/introduction.webp',
                'description' => "<p>Sur la petite île qui compose le Royaume de l’Île du Nord, un mystère grandit. Le Prince Alaric, parti courageusement explorer le redouté Donjon de l’Âme, n’a plus donné signe de vie.</p><p>Lorsque le Roi Galdric III lui-même a tenté de le secourir, il a disparu à son tour.</p><p>Désormais, les habitants de la capitale, Port Saint-Doux, murmurent des rumeurs inquiétantes : le donjon abriterait un mal ancien réveillé par l’imprudence royale.</p><p>C’est au cœur de Port Saint-Doux, dans le très animé Quartier du Marché, que votre aventure commence. Entre marchands, gardes bourrus et passants bavards, chaque rencontre pourrait vous guider vers la vérité… ou vous détourner sur un chemin inattendu.</p>",
                'reference' => 'screen_cinematic_introduction',
            ],
            [
                'name' => 'En prison…',
                'picture' => 'core/screen/jail.webp',
                'description' => "<p>Vous vous êtes fait arrêter, et vous atterrissez dans les geôles de Port Saint-Doux.</p><p>Vous êtes seul dans votre cellule, si on ne compte pas les rats pour de la compagnie, bien sûr.</p><p>Vous avez faim et soif, vous avez froid, vous êtes fatigué et sale. Votre peine vient de prendre fin. Vous avez hâte de sortir de cet endroit.</p>",
                'reference' => 'screen_cinematic_jail',
            ],
            [
                'name' => 'Victoire !',
                'picture' => 'core/screen/victory.webp',
                'description' => "<p>Vous sortez vainqueur de ce combat acharné et glorieux.</p><p>Profitez de votre récompense et remettez-vous vite, car d'autres défis vous attendent&nbsp;!</p>",
                'reference' => 'screen_cinematic_victory',
            ],
            [
                'name' => 'Défaite…',
                'picture' => 'core/screen/defeat.webp',
                'description' => "<p>Vous avez été vaincu.</p><p>Mais rassurez-vous&nbsp;:&nbsp;Vous n'en avez pas encore terminé avec les Huit Royaumes&nbsp;! Dans leur grande magnaminité, les Dieux vous offrent une autre chance de sauver le Monde.</p><p>Vous serez ressuscité dans le Temple de la Capitale. Mais cela vous coûtera un peu de Couronnes… Il faut bien que le Grand Prêtre gagne sa vie.</p><p>Maintenant, relevez-vous et entraînez-vous pour être plus fort cette fois-ci&nbsp;!</p>",
                'reference' => 'screen_cinematic_defeat',
            ],
        ];

        foreach($screens as $data) {
            $screen = new CinematicScreen();
            $screen->setName($data['name'])
                ->setPicture($data['picture'] ?? null)
                ->setDescription($data['description']);
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 23;
    }
}
