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
                'type' => 'Combat',
                'reference' => 'profession_guerrier',
            ],
            [
                'name' => 'Barbare',
                'description' => "Le Barbare est un combattant sauvage, privilégiant la force brute et le combat féroce.",
                'type' => 'Combat',
                'reference' => 'profession_barbare',
            ],
            [
                'name' => 'Chevalier',
                'description' => "Le Chevalier est un protecteur lourdement armé, incarnant la loyauté et l'honneur.",
                'type' => 'Combat',
                'reference' => 'profession_chevalier',
            ],
            [
                'name' => 'Archer',
                'description' => "L'Archer est un expert des arcs et des armes de jet, maîtrisant le combat à distance.",
                'type' => 'Combat',
                'reference' => 'profession_archer',
            ],
            [
                'name' => 'Rôdeur',
                'description' => "Le Rôdeur est un combattant agile et polyvalent, souvent associé à la nature.",
                'type' => 'Combat',
                'reference' => 'profession_rodeur',
            ],
            [
                'name' => 'Moine',
                'description' => "Le Moine est un spécialiste des arts martiaux, combinant agilité et discipline spirituelle.",
                'type' => 'Combat',
                'reference' => 'profession_moine',
            ],
            // Classes magiques
            [
                'name' => 'Mage',
                'description' => "Le Mage est un maître des sorts destructeurs et des arcanes.",
                'type' => 'Magie',
                'reference' => 'profession_mage',
            ],
            [
                'name' => 'Nécromancien',
                'description' => "Le Nécromancien manipule les morts et les énergies sombres pour vaincre ses ennemis.",
                'type' => 'Magie',
                'reference' => 'profession_necromancien',
            ],
            [
                'name' => 'Prêtre',
                'description' => "Le Prêtre est un soigneur et défenseur des causes divines.",
                'type' => 'Magie',
                'reference' => 'profession_pretre',
            ],
            [
                'name' => 'Druide',
                'description' => "Le Druide protège la nature et contrôle les éléments avec des pouvoirs mystiques.",
                'type' => 'Magie',
                'reference' => 'profession_druide',
            ],
            [
                'name' => 'Ensorceleur',
                'description' => "L'Ensorceleur est un lanceur de sorts intuitif, héritier d’un pouvoir magique inné.",
                'type' => 'Magie',
                'reference' => 'profession_ensorceleur',
            ],
            // Classes furtives
            [
                'name' => 'Voleur',
                'description' => "Le Voleur est un maître de la discrétion, de la subtilité et des attaques sournoises.",
                'type' => 'Furtivité',
                'reference' => 'profession_voleur',
            ],
            [
                'name' => 'Assassin',
                'description' => "L'Assassin est un tueur silencieux et précis, spécialisé dans les coups critiques.",
                'type' => 'Furtivité',
                'reference' => 'profession_assassin',
            ],
            [
                'name' => 'Barde',
                'description' => "Le Barde est un combattant polyvalent utilisant la musique et le charme pour inspirer ou perturber.",
                'type' => 'Furtivité',
                'reference' => 'profession_barde',
            ],
            // Classes spécialisées
            [
                'name' => 'Paladin',
                'description' => "Le Paladin est un chevalier sacré, mélangeant compétences martiales et pouvoirs divins.",
                'type' => 'Combat',
                'reference' => 'profession_paladin',
            ],
            [
                'name' => 'Chasseur de primes',
                'description' => "Le Chasseur de primes est un traqueur expert et stratège redoutable.",
                'type' => 'Combat',
                'reference' => 'profession_chasseur_de_primes',
            ],
            [
                'name' => 'Mécaniste',
                'description' => "Le Mécaniste est un inventeur ingénieux, utilisant des gadgets et des mécanismes en combat.",
                'type' => 'Spécialisé',
                'reference' => 'profession_mecaniste',
            ],
            // Classes PNJ
            [
                'name' => 'Marchand',
                'description' => "Le Marchand est un commerçant itinérant, vendant des biens et des services aux aventuriers.",
                'type' => 'Commerce',
                'reference' => 'profession_marchand',
            ],
            [
                'name' => 'Garde',
                'description' => "Le Garde est un protecteur de la paix, veillant sur la sécurité des citoyens.",
                'type' => 'Combat',
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
