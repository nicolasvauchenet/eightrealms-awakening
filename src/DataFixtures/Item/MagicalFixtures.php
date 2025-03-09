<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Magical;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MagicalFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $magicals = [
            // Offensif
            [
                'category' => 'category_magical',
                'name' => 'Baguette de feu',
                'description' => "<p>Petite et élégante, cette baguette est imprégnée de l’essence du feu. Elle permet à son porteur de projeter des boules de feu incandescentes, infligeant des dégâts aux ennemis sur une zone ciblée. Compacte et facile à manier, elle est idéale pour les mages débutants cherchant une arme offensive efficace.</p>",
                'picture' => 'magical_wand.png',
                'type' => 'Offensif',
                'target' => 'health',
                'amount' => 10,
                'area' => 1,
                'charge' => 25,
                'price' => 250,
                'reference' => 'magical_firewand',
            ],
            [
                'category' => 'category_magical',
                'name' => 'Baguette de glace',
                'description' => "<p>Cette baguette scintille d’un éclat glacial, ses gravures évoquant les vents hurlants des montagnes enneigées. Conçue pour lancer des boules de glace perçantes, elle ralentit les ennemis tout en infligeant des dégâts. Une arme précieuse pour ceux qui aiment contrôler leurs adversaires.</p>",
                'picture' => 'magical_wand.png',
                'type' => 'Offensif',
                'target' => 'health',
                'amount' => 10,
                'area' => 1,
                'charge' => 25,
                'price' => 250,
                'reference' => 'magical_icewand',
            ],
            [
                'category' => 'category_magical',
                'name' => 'Baguette de foudre',
                'description' => "<p>Fendue par des éclairs miniatures qui dansent autour d’elle, cette baguette canalise l’énergie de la foudre. Capable de lancer des éclairs rapides et précis, elle est redoutable contre les ennemis regroupés. Parfaite pour les mages recherchant rapidité et impact.</p>",
                'picture' => 'magical_wand.png',
                'type' => 'Offensif',
                'target' => 'health',
                'amount' => 10,
                'area' => 1,
                'charge' => 25,
                'price' => 250,
                'reference' => 'magical_stormwand',
            ],
            [
                'category' => 'category_magical',
                'name' => 'Bâton de feu',
                'description' => "<p>Plus puissant que la baguette de feu, ce bâton est orné de runes flamboyantes qui brillent dans l’obscurité. Il permet de lancer des boules de feu destructrices, infligeant des dégâts importants. Arme favorite des mages de combat, il est un symbole de destruction maîtrisée.</p>",
                'picture' => 'magical_stick.png',
                'type' => 'Offensif',
                'target' => 'health',
                'amount' => 20,
                'area' => 3,
                'charge' => 50,
                'price' => 650,
                'reference' => 'magical_firestick',
            ],
            [
                'category' => 'category_magical',
                'name' => 'Bâton de glace',
                'description' => "<p>Ce bâton glacé, entouré d’un halo de brume, amplifie la puissance des sorts de glace. Chaque boule de glace projetée par cet artefact transperce les défenses ennemies et fige leur élan. Un outil essentiel pour les mages tactiques aimant semer le chaos dans les rangs adverses.</p>",
                'picture' => 'magical_stick.png',
                'type' => 'Offensif',
                'target' => 'health',
                'amount' => 20,
                'area' => 3,
                'charge' => 50,
                'price' => 650,
                'reference' => 'magical_icestick',
            ],
            [
                'category' => 'category_magical',
                'name' => 'Bâton de foudre',
                'description' => "<p>Chargé d’électricité pure, ce bâton crépite en permanence, promettant une puissance dévastatrice. Avec sa capacité à projeter de puissants éclairs, il est une arme redoutée sur le champ de bataille. Les mages qui le manient s’imposent souvent comme des figures dominantes dans les combats.</p>",
                'picture' => 'magical_stick.png',
                'type' => 'Offensif',
                'target' => 'health',
                'amount' => 20,
                'area' => 3,
                'charge' => 50,
                'price' => 650,
                'reference' => 'magical_stormstick',
            ],

            // Défensif
            [
                'category' => 'category_magical',
                'name' => 'Bâton de soin',
                'description' => "<p>Ce bâton en bois poli émet une douce lueur apaisante. Il est conçu pour soigner les blessures, rétablissant la santé de ses alliés. Un outil indispensable pour les guérisseurs, il symbolise la compassion et le dévouement dans les moments les plus critiques.</p>",
                'picture' => 'magical_stick.png',
                'type' => 'Défensif',
                'target' => 'health',
                'amount' => 20,
                'charge' => 50,
                'price' => 500,
                'reference' => 'magical_healstick',
            ],
            [
                'category' => 'category_magical',
                'name' => 'Bâton de protection',
                'description' => "<p>Ce bâton magique projette un champ de force protecteur autour de son porteur. Il absorbe les dégâts et renvoie les attaques ennemies, protégeant efficacement contre les attaques physiques et magiques. Un atout majeur pour les défenseurs cherchant à protéger leurs alliés.</p>",
                'picture' => 'magical_shield.png',
                'type' => 'Défensif',
                'target' => 'defense',
                'amount' => 20,
                'charge' => 50,
                'price' => 500,
                'reference' => 'magical_protectionstick',
            ],
        ];

        foreach($magicals as $data) {
            $magical = new Magical();
            $magical->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setType($data['type'])
                ->setTarget($data['target'] ?? null)
                ->setEffect($data['effect'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setArea($data['area'] ?? null)
                ->setDuration($data['duration'] ?? null)
                ->setCharge($data['charge'] ?? null)
                ->setPrice($data['price']);
            $manager->persist($magical);
            $this->addReference($data['reference'], $magical);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 9;
    }
}
