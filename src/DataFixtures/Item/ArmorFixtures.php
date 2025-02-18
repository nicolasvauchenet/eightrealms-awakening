<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Armor;
use App\Entity\Item\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArmorFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $armors = [
            [
                'category' => 'category_armor',
                'name' => 'Robe de mage',
                'description' => "<p>Légère et souple, cette robe est conçue pour les mages qui privilégient la magie à la défense physique. Ses tissus enchâssés de motifs mystiques offrent une protection minimale, mais permettent une concentration optimale pour canaliser les énergies magiques.</p>",
                'picture' => 'armor_robe_mage.png',
                'type' => 'Légère',
                'defense' => 1,
                'price' => 100,
                'reference' => 'armor_mage',
            ],
            [
                'category' => 'category_armor',
                'name' => 'Robe de druide',
                'description' => "<p>Confectionnée à partir de matériaux naturels, cette robe reflète l’harmonie avec la nature propre aux druides. Bien qu’elle offre peu de protection physique, elle symbolise un lien puissant avec les forces élémentaires et la faune environnante.</p>",
                'picture' => 'armor_robe_druid.png',
                'type' => 'Légère',
                'defense' => 1,
                'price' => 100,
                'reference' => 'armor_druid',
            ],
            [
                'category' => 'category_armor',
                'name' => 'Armure de cuir',
                'description' => "<p>Pratique et résistante, cette armure est fabriquée à partir de cuir tanné de haute qualité. Elle offre une protection modérée tout en conservant une grande mobilité, en faisant le choix favori des éclaireurs et des voleurs.</p>",
                'picture' => 'armor_leather.png',
                'type' => 'Légère',
                'defense' => 2,
                'price' => 100,
                'reference' => 'armor_leather',
            ],
            [
                'category' => 'category_armor',
                'name' => 'Armure de fer',
                'description' => "<p>Robuste et fiable, cette armure forgée en fer protège efficacement contre les attaques physiques. Bien qu’un peu lourde, elle constitue un excellent compromis entre défense et maniabilité pour les guerriers débutants.</p>",
                'picture' => 'armor_iron.png',
                'type' => 'Lourde',
                'defense' => 4,
                'price' => 200,
                'reference' => 'armor_iron',
            ],
            [
                'category' => 'category_armor',
                'name' => "Armure d'acier",
                'description' => "<p>Fabriquée avec un acier poli, cette armure offre une défense solide tout en étant élégante. Elle est conçue pour les combattants expérimentés qui recherchent un équilibre parfait entre protection et mobilité sur le champ de bataille.</p>",
                'picture' => 'armor_steel.png',
                'type' => 'Lourde',
                'defense' => 6,
                'price' => 300,
                'reference' => 'armor_steel',
            ],
            [
                'category' => 'category_armor',
                'name' => 'Armure de plates',
                'description' => "<p>Véritable rempart ambulant, cette armure de plates offre une protection maximale. Idéale pour les chevaliers et les tanks, elle est lourde mais quasi impénétrable, capable de résister aux coups les plus puissants.</p>",
                'picture' => 'armor_plates.png',
                'type' => 'Lourde',
                'defense' => 8,
                'price' => 400,
                'reference' => 'armor_plates',
            ],
        ];

        foreach($armors as $data) {
            $armor = new Armor();
            $armor->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setType($data['type'])
                ->setDefense($data['defense'])
                ->setPrice($data['price']);
            $manager->persist($armor);
            $this->addReference($data['reference'], $armor);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 6;
    }
}
