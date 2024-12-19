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
            // Non magical weapons
            [
                'category' => 'category_weapon',
                'name' => 'Dague',
                'type' => 'Mêlée',
                'description' => "<p>Arme légère et rapide, cette dague est parfaite pour les attaques furtives ou les combats rapprochés. Facile à manier, elle est souvent utilisée par les voleurs et les assassins. Bien qu’elle inflige des dégâts modestes, sa rapidité d’exécution en fait une arme redoutable pour les frappes précises.</p>",
                'picture' => 'dagger.png',
                'health' => 20,
                'buyPrice' => 25,
                'damage' => 4,
                'reference' => 'weapon_dagger',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Épée courte',
                'type' => 'Mêlée',
                'description' => "<p>Une arme polyvalente, adaptée à la fois aux débutants et aux guerriers expérimentés. Légère et maniable, cette épée offre un bon équilibre entre rapidité et puissance. Elle est un choix fiable pour ceux qui recherchent une arme efficace sans trop sacrifier leur mobilité.</p>",
                'picture' => 'sword_short.png',
                'health' => 20,
                'buyPrice' => 50,
                'damage' => 6,
                'reference' => 'weapon_shortsword',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Épée longue',
                'type' => 'Mêlée',
                'description' => "<p>Plus imposante que l’épée courte, cette arme est conçue pour infliger des dégâts supérieurs tout en conservant une maniabilité correcte. Utilisée par les chevaliers et les soldats, elle excelle dans les combats au corps à corps grâce à sa portée et à sa puissance.</p>",
                'picture' => 'sword_long.png',
                'health' => 30,
                'buyPrice' => 100,
                'damage' => 8,
                'reference' => 'weapon_longsword',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Hache de Guerre',
                'type' => 'Mêlée',
                'description' => "<p>Forgée pour le combat, cette hache est capable de trancher armures et boucliers avec une efficacité brutale. Bien qu’elle exige une certaine force pour être maniée correctement, elle est une arme redoutée pour ses dégâts impressionnants et son impact visuel intimidant.</p>",
                'picture' => 'ax_war.png',
                'health' => 90,
                'buyPrice' => 100,
                'damage' => 8,
                'reference' => 'weapon_warax',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Marteau de Guerre',
                'type' => 'Mêlée',
                'description' => "<p>Arme lourde et puissante, ce marteau est conçu pour écraser les défenses ennemies. Chaque coup porté par ce marteau inflige des dégâts dévastateurs, particulièrement efficaces contre les armures lourdes. Les guerriers qui manient cette arme sont souvent craints sur le champ de bataille.</p>",
                'picture' => 'hammer_war.png',
                'health' => 90,
                'buyPrice' => 100,
                'damage' => 8,
                'reference' => 'weapon_warhammer',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Arc court',
                'type' => 'Distance',
                'description' => "<p>Compact et rapide, cet arc est idéal pour les combats à distance rapprochée. Conçu pour la vitesse et la précision, il permet de tirer rapidement sur des cibles sans nécessiter un grand espace. Il est souvent utilisé par les éclaireurs et les archers débutants.</p>",
                'picture' => 'bow_short.png',
                'health' => 10,
                'buyPrice' => 50,
                'damage' => 6,
                'range' => 50,
                'reference' => 'weapon_shortbow',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Arc long',
                'type' => 'Distance',
                'description' => "<p>Ce puissant arc est capable de décocher des flèches à grande distance avec une force remarquable. Idéal pour les archers aguerris, il offre une portée supérieure, permettant d’abattre les ennemis avant même qu’ils ne puissent riposter. Un incontournable pour les combats à longue distance.</p>",
                'picture' => 'bow_long.png',
                'health' => 20,
                'buyPrice' => 100,
                'damage' => 8,
                'range' => 100,
                'reference' => 'weapon_longbow',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Pistolet de foudre',
                'type' => 'Distance',
                'description' => "<p>Cette arme magique, en forme de pistolet, canalise l’énergie électrique pour lancer de petits éclairs. Redoutable à distance, elle est prisée des mages de combat et des ingénieurs pour son style moderne et ses capacités destructrices. Son rayon d’action en fait une arme unique dans les affrontements stratégiques.</p>",
                'picture' => 'gun.png',
                'health' => 50,
                'buyPrice' => 200,
                'damage' => 8,
                'range' => 150,
                'reference' => 'weapon_gunstorm',
            ],
            // Magical weapons
            [
                'category' => 'category_weapon',
                'name' => 'Baguette de feu',
                'type' => 'Offensif',
                'description' => "<p>Petite et élégante, cette baguette est imprégnée de l’essence du feu. Elle permet à son porteur de projeter des boules de feu incandescentes, infligeant des dégâts aux ennemis sur une zone ciblée. Compacte et facile à manier, elle est idéale pour les mages débutants cherchant une arme offensive efficace.</p>",
                'picture' => 'magical_wand.png',
                'health' => 20,
                'buyPrice' => 200,
                'damage' => 2,
                'target' => 'health',
                'amount' => 10,
                'area' => 1,
                'charge' => 10,
                'rechargeCost' => 100,
                'reference' => 'magical_firewand',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Baguette de glace',
                'type' => 'Offensif',
                'description' => "<p>Cette baguette scintille d’un éclat glacial, ses gravures évoquant les vents hurlants des montagnes enneigées. Conçue pour lancer des boules de glace perçantes, elle ralentit les ennemis tout en infligeant des dégâts. Une arme précieuse pour ceux qui aiment contrôler leurs adversaires.</p>",
                'picture' => 'magical_wand.png',
                'health' => 20,
                'buyPrice' => 200,
                'damage' => 2,
                'target' => 'health',
                'amount' => 10,
                'area' => 1,
                'charge' => 10,
                'rechargeCost' => 100,
                'reference' => 'magical_icewand',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Baguette de foudre',
                'type' => 'Offensif',
                'description' => "<p>Fendue par des éclairs miniatures qui dansent autour d’elle, cette baguette canalise l’énergie de la foudre. Capable de lancer des éclairs rapides et précis, elle est redoutable contre les ennemis regroupés. Parfaite pour les mages recherchant rapidité et impact.</p>",
                'picture' => 'magical_wand.png',
                'health' => 20,
                'buyPrice' => 200,
                'damage' => 2,
                'target' => 'health',
                'amount' => 10,
                'area' => 1,
                'charge' => 10,
                'rechargeCost' => 100,
                'reference' => 'magical_stormwand',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Bâton de feu',
                'type' => 'Offensif',
                'description' => "<p>Plus puissant que la baguette de feu, ce bâton est orné de runes flamboyantes qui brillent dans l’obscurité. Il permet de lancer des boules de feu destructrices, infligeant des dégâts importants. Arme favorite des mages de combat, il est un symbole de destruction maîtrisée.</p>",
                'picture' => 'magical_stick.png',
                'health' => 30,
                'buyPrice' => 400,
                'damage' => 4,
                'target' => 'health',
                'amount' => 20,
                'area' => 1,
                'charge' => 10,
                'rechargeCost' => 200,
                'reference' => 'magical_firestick',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Bâton de glace',
                'type' => 'Offensif',
                'description' => "<p>Ce bâton glacé, entouré d’un halo de brume, amplifie la puissance des sorts de glace. Chaque boule de glace projetée par cet artefact transperce les défenses ennemies et fige leur élan. Un outil essentiel pour les mages tactiques aimant semer le chaos dans les rangs adverses.</p>",
                'picture' => 'magical_stick.png',
                'health' => 30,
                'buyPrice' => 400,
                'damage' => 4,
                'target' => 'health',
                'amount' => 20,
                'area' => 1,
                'charge' => 10,
                'rechargeCost' => 200,
                'reference' => 'magical_icestick',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Bâton de foudre',
                'type' => 'Offensif',
                'description' => "<p>Chargé d’électricité pure, ce bâton crépite en permanence, promettant une puissance dévastatrice. Avec sa capacité à projeter de puissants éclairs, il est une arme redoutée sur le champ de bataille. Les mages qui le manient s’imposent souvent comme des figures dominantes dans les combats.</p>",
                'picture' => 'magical_stick.png',
                'health' => 30,
                'buyPrice' => 400,
                'damage' => 4,
                'target' => 'health',
                'amount' => 20,
                'area' => 1,
                'charge' => 10,
                'rechargeCost' => 200,
                'reference' => 'magical_stormstick',
            ],
            [
                'category' => 'category_weapon',
                'name' => 'Bâton de soin',
                'type' => 'Défensif',
                'description' => "<p>Ce bâton en bois poli émet une douce lueur apaisante. Il est conçu pour soigner les blessures, rétablissant la santé de ses alliés. Un outil indispensable pour les guérisseurs, il symbolise la compassion et le dévouement dans les moments les plus critiques.</p>",
                'picture' => 'magical_stick.png',
                'health' => 30,
                'buyPrice' => 400,
                'damage' => 4,
                'target' => 'health',
                'amount' => 10,
                'charge' => 10,
                'rechargeCost' => 200,
                'reference' => 'magical_healstick',
            ],
        ];

        foreach($weapons as $data) {
            $weapon = new Weapon();
            $weapon->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setType($data['type'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setHealth($data['health'])
                ->setBuyPrice($data['buyPrice'])
                ->setDamage($data['damage'])
                ->setRange($data['range'] ?? null)
                ->setTarget($data['target'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setDuration($data['duration'] ?? null)
                ->setArea($data['area'] ?? null)
                ->setCharge($data['charge'] ?? null)
                ->setRechargeCost($data['rechargeCost'] ?? null);
            $manager->persist($weapon);
            $this->addReference($data['reference'], $weapon);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 13;
    }
}
