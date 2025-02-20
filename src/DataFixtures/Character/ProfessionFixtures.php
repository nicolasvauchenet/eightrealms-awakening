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
                'description' => "<p>Le Guerrier est un maître des armes lourdes et du combat rapproché.</p>",
                'type' => 'fight',
                'reference' => 'profession_guerrier',
            ],
            [
                'name' => 'Barbare',
                'description' => "<p>Le Barbare est un combattant sauvage, privilégiant la force brute et le combat féroce.</p>",
                'type' => 'fight',
                'reference' => 'profession_barbare',
            ],
            [
                'name' => 'Chevalier',
                'description' => "<p>Le Chevalier est un protecteur lourdement armé, incarnant la loyauté et l'honneur.</p>",
                'type' => 'fight',
                'reference' => 'profession_chevalier',
            ],
            [
                'name' => 'Archer',
                'description' => "<p>L'Archer est un expert des arcs et des armes de jet, maîtrisant le combat à distance.</p>",
                'type' => 'fight',
                'reference' => 'profession_archer',
            ],
            [
                'name' => 'Rôdeur',
                'description' => "<p>Le Rôdeur est un combattant agile et polyvalent, souvent associé à la nature.</p>",
                'type' => 'fight',
                'reference' => 'profession_rodeur',
            ],
            [
                'name' => 'Moine',
                'description' => "<p>Le Moine est un spécialiste des arts martiaux, combinant agilité et discipline spirituelle.</p>",
                'type' => 'fight',
                'reference' => 'profession_moine',
            ],

            // Classes magiques
            [
                'name' => 'Mage',
                'description' => "<p>Le Mage est un maître des sorts destructeurs et des arcanes.</p>",
                'type' => 'magic',
                'reference' => 'profession_mage',
            ],
            [
                'name' => 'Druide',
                'description' => "<p>Le Druide protège la nature et contrôle les éléments avec des pouvoirs mystiques.</p>",
                'type' => 'magic',
                'reference' => 'profession_druide',
            ],

            // Classes furtives
            [
                'name' => 'Voleur',
                'description' => "<p>Le Voleur est un maître de la discrétion, de la subtilité et des attaques sournoises.</p>",
                'type' => 'stealth',
                'reference' => 'profession_voleur',
            ],

            // Classes spécialisées
            [
                'name' => 'Mécaniste',
                'description' => "<p>Le Mécaniste est un inventeur ingénieux, utilisant des gadgets et des mécanismes en combat.</p>",
                'type' => 'specialized',
                'reference' => 'profession_mecaniste',
            ],

            // Classes PNJ
            [
                'name' => 'Marchand',
                'description' => "<p>Le Marchand est un commerçant itinérant, vendant des biens et des services aux aventuriers.</p>",
                'type' => 'pnj',
                'reference' => 'profession_marchand',
            ],
            [
                'name' => 'Garde',
                'description' => "<p>Le Garde est un protecteur de la paix, veillant sur la sécurité des citoyens.</p>",
                'type' => 'pnj',
                'reference' => 'profession_garde',
            ],
            [
                'name' => 'Passant',
                'description' => "<p>Le Passant est un voyageur anonyme, croisant la route des aventuriers.</p>",
                'type' => 'pnj',
                'reference' => 'profession_passant',
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
