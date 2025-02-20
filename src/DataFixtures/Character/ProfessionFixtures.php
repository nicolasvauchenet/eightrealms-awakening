<?php

namespace App\DataFixtures\Character;

use App\Entity\Character\Profession;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProfessionFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $professions = [
            // Classes de combat physique
            [
                'name' => 'Guerrier',
                'description' => "Le Guerrier est un maître des armes lourdes et du combat rapproché.",
                'type' => 'fight',
                'reference' => 'profession_guerrier',
            ],
            [
                'name' => 'Barbare',
                'description' => "Le Barbare est un combattant sauvage, privilégiant la force brute et le combat féroce.",
                'type' => 'fight',
                'reference' => 'profession_barbare',
            ],
            [
                'name' => 'Chevalier',
                'description' => "Le Chevalier est un protecteur lourdement armé, incarnant la loyauté et l'honneur.",
                'type' => 'fight',
                'reference' => 'profession_chevalier',
            ],
            [
                'name' => 'Archer',
                'description' => "L'Archer est un expert des arcs et des armes de jet, maîtrisant le combat à distance.",
                'type' => 'fight',
                'reference' => 'profession_archer',
            ],
            [
                'name' => 'Rôdeur',
                'description' => "Le Rôdeur est un combattant agile et polyvalent, souvent associé à la nature.",
                'type' => 'fight',
                'reference' => 'profession_rodeur',
            ],
            [
                'name' => 'Moine',
                'description' => "Le Moine est un spécialiste des arts martiaux, combinant agilité et discipline spirituelle.",
                'type' => 'fight',
                'reference' => 'profession_moine',
            ],

            // Classes magiques
            [
                'name' => 'Mage',
                'description' => "Le Mage est un maître des sorts destructeurs et des arcanes.",
                'type' => 'magic',
                'reference' => 'profession_mage',
            ],
            [
                'name' => 'Druide',
                'description' => "Le Druide protège la nature et contrôle les éléments avec des pouvoirs mystiques.",
                'type' => 'magic',
                'reference' => 'profession_druide',
            ],

            // Classes furtives
            [
                'name' => 'Voleur',
                'description' => "Le Voleur est un maître de la discrétion, de la subtilité et des attaques sournoises.",
                'type' => 'stealth',
                'reference' => 'profession_voleur',
            ],

            // Classes spécialisées
            [
                'name' => 'Mécaniste',
                'description' => "Le Mécaniste est un inventeur ingénieux, utilisant des gadgets et des mécanismes en combat.",
                'type' => 'specialized',
                'reference' => 'profession_mecaniste',
            ],

            // Classes PNJ
            [
                'name' => 'Marchand',
                'description' => "Le Marchand est un commerçant itinérant, vendant des biens et des services aux aventuriers.",
                'type' => 'pnj',
                'reference' => 'profession_marchand',
            ],
            [
                'name' => 'Garde',
                'description' => "Le Garde est un protecteur de la paix, veillant sur la sécurité des citoyens.",
                'type' => 'pnj',
                'reference' => 'profession_garde',
            ],
        ];

        foreach($professions as $data) {
            $profession = new Profession();
            $profession->setName($data['name'])
                ->setDescription($data['description'])
                ->setType($data['type']);
            $manager->persist($profession);
            $this->addReference($data['reference'], $profession);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 3;
    }
}
