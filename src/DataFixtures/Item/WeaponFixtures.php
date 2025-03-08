<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class WeaponFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $weapons = [
            // Mêlée
            [
                'category' => 'category_weapon',
                'name' => 'Dague',
                'description' => "<p>Arme légère et rapide, cette dague est parfaite pour les attaques furtives ou les combats rapprochés. Facile à manier, elle est souvent utilisée par les voleurs et les assassins. Bien qu’elle inflige des dégâts modestes, sa rapidité d’exécution en fait une arme redoutable pour les frappes précises.</p>",
                'picture' => 'dagger.png',
                'type' => 'Arme de mêlée',
                'damage' => 4,
                'health' => 5,
                'price' => 50,
                'reference' => 'weapon_dagger',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Épée courte',
                'description' => "<p>Une arme polyvalente, adaptée à la fois aux débutants et aux guerriers expérimentés. Légère et maniable, cette épée offre un bon équilibre entre rapidité et puissance. Elle est un choix fiable pour ceux qui recherchent une arme efficace sans trop sacrifier leur mobilité.</p>",
                'picture' => 'sword_short.png',
                'type' => 'Arme de mêlée',
                'damage' => 6,
                'health' => 10,
                'price' => 150,
                'reference' => 'weapon_shortsword',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Épée longue',
                'description' => "<p>Plus imposante que l’épée courte, cette arme est conçue pour infliger des dégâts supérieurs tout en conservant une maniabilité correcte. Utilisée par les chevaliers et les soldats, elle excelle dans les combats au corps à corps grâce à sa portée et à sa puissance.</p>",
                'picture' => 'sword_long.png',
                'type' => 'Arme de mêlée',
                'damage' => 8,
                'health' => 15,
                'price' => 300,
                'reference' => 'weapon_longsword',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Hache de Guerre',
                'description' => "<p>Forgée pour le combat, cette hache est capable de trancher armures et boucliers avec une efficacité brutale. Bien qu’elle exige une certaine force pour être maniée correctement, elle est une arme redoutée pour ses dégâts impressionnants et son impact visuel intimidant.</p>",
                'picture' => 'ax_war.png',
                'type' => 'Arme de mêlée',
                'damage' => 8,
                'health' => 15,
                'price' => 500,
                'reference' => 'weapon_warax',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Marteau de Guerre',
                'description' => "<p>Arme lourde et puissante, ce marteau est conçu pour écraser les défenses ennemies. Chaque coup porté par ce marteau inflige des dégâts dévastateurs, particulièrement efficaces contre les armures lourdes. Les guerriers qui manient cette arme sont souvent craints sur le champ de bataille.</p>",
                'picture' => 'hammer_war.png',
                'type' => 'Arme de mêlée',
                'damage' => 8,
                'health' => 15,
                'price' => 500,
                'reference' => 'weapon_warhammer',
            ],

            // Distance
            [
                'category' => 'category_weapon',
                'name' => 'Arc court',
                'description' => "<p>Compact et rapide, cet arc est idéal pour les combats à distance rapprochée. Conçu pour la vitesse et la précision, il permet de tirer rapidement sur des cibles sans nécessiter un grand espace. Il est souvent utilisé par les éclaireurs et les archers débutants.</p>",
                'picture' => 'bow_short.png',
                'type' => 'Arme de jet',
                'damage' => 6,
                'range' => 5,
                'health' => 10,
                'price' => 150,
                'reference' => 'weapon_shortbow',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Arc long',
                'description' => "<p>Ce puissant arc est capable de décocher des flèches à grande distance avec une force remarquable. Idéal pour les archers aguerris, il offre une portée supérieure, permettant d’abattre les ennemis avant même qu’ils ne puissent riposter. Un incontournable pour les combats à longue distance.</p>",
                'picture' => 'bow_long.png',
                'type' => 'Arme de jet',
                'damage' => 8,
                'range' => 10,
                'health' => 15,
                'price' => 500,
                'reference' => 'weapon_longbow',
            ],

            // Enchantée
            [
                'category' => 'category_weapon',
                'name' => 'Épée longue de foudre',
                'description' => "<p>Forgée dans un alliage de métal et de magie, cette épée est capable de canaliser l’énergie électrique pour infliger des dégâts dévastateurs. Son apparence imposante et son pouvoir destructeur en font une arme redoutée des mages de combat et des guerriers magiques.</p>",
                'picture' => 'sword_long_enchanted.png',
                'type' => 'Arme de mêlée enchantée',
                'damage' => 8,
                'target' => 'damage',
                'amount' => 5,
                'health' => 15,
                'price' => 1500,
                'reference' => 'weapon_longsword_storm',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Arc long de foudre',
                'description' => "<p>Cet arc magique est capable de lancer des éclairs à grande distance, infligeant des dégâts électriques à ses cibles. Idéal pour les mages de combat et les archers magiques, il offre une portée supérieure et une puissance dévastatrice. Un choix incontournable pour ceux qui maîtrisent la magie élémentaire.</p>",
                'picture' => 'bow_long_enchanted.png',
                'type' => 'Arme de jet enchantée',
                'damage' => 8,
                'range' => 10,
                'target' => 'damage',
                'amount' => 5,
                'health' => 15,
                'price' => 1500,
                'reference' => 'weapon_longbow_storm',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Pistolet de foudre',
                'description' => "<p>Cette arme magique, en forme de pistolet, canalise l’énergie électrique pour lancer de petits éclairs. Redoutable à distance, elle est prisée des mages de combat et des ingénieurs pour son style moderne et ses capacités destructrices. Son rayon d’action en fait une arme unique dans les affrontements stratégiques.</p>",
                'picture' => 'gun.png',
                'type' => 'Arme de poing enchantée',
                'damage' => 5,
                'range' => 8,
                'target' => 'damage',
                'amount' => 5,
                'health' => 10,
                'price' => 2000,
                'reference' => 'weapon_gunstorm',
            ],
        ];

        foreach($weapons as $data) {
            $weapon = new Weapon();
            $weapon->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setType($data['type'])
                ->setDamage($data['damage'])
                ->setTarget($data['target'] ?? null)
                ->setEffect($data['effect'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setRange($data['range'] ?? null)
                ->setHealth($data['health'])
                ->setPrice($data['price']);
            $manager->persist($weapon);
            $this->addReference($data['reference'], $weapon);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 8;
    }
}
