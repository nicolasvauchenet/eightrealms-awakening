<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Amulet;
use App\Entity\Item\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AmuletFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $amulets = [
            // Défensif
            [
                'category' => 'category_amulet',
                'name' => 'Amulette de santé',
                'description' => "<p>Bijou orné de symboles anciens, cette amulette est réputée pour ses pouvoirs curatifs. Forgée par des mages alchimistes, elle renforce la vitalité et la résilience du porteur. Idéale pour les aventuriers, elle inspire sécurité et robustesse face aux défis les plus dangereux.</p>",
                'picture' => 'amulet.png',
                'type' => 'Défensif',
                'target' => 'health',
                'amount' => 20,
                'price' => 500,
                'reference' => 'amulet_health',
            ],
            [
                'category' => 'category_amulet',
                'name' => 'Amulette de magie',
                'description' => "<p>Ciselée avec des cristaux lumineux, cette amulette amplifie les réserves de mana de son porteur. Créée par le Conseil des Mages, elle est imprégnée d’une énergie arcanique, offrant aux magiciens une puissance accrue pour leurs sorts les plus complexes.</p>",
                'picture' => 'amulet.png',
                'type' => 'Défensif',
                'target' => 'mana',
                'amount' => 20,
                'price' => 500,
                'reference' => 'amulet_mana',
            ],
            [
                'category' => 'category_amulet',
                'name' => 'Amulette de protection',
                'description' => "<p>Cette amulette est un talisman de protection, forgé dans un alliage de métaux rares. Elle renforce les défenses naturelles de son porteur, le protégeant des attaques ennemies. Idéale pour les guerriers, elle inspire confiance et courage face aux adversaires les plus redoutables.</p>",
                'picture' => 'amulet.png',
                'type' => 'Défensif',
                'target' => 'defense',
                'amount' => 5,
                'price' => 500,
                'reference' => 'amulet_protection',
            ],

            // Quête
            [
                'category' => 'category_amulet',
                'name' => 'Médaillon des Vents',
                'description' => "<p>Un médaillon ancestral orné de symboles runiques liés aux esprits des vents. On raconte qu'il permet à son porteur d'invoquer une brise salvatrice en cas de danger, et qu'il pourrait être la clé pour pénétrer le Donjon de l’Âme.</p>",
                'picture' => 'amulet.png',
                'type' => 'Défensif',
                'target' => 'defense',
                'amount' => 20,
                'price' => 2000,
                'reference' => 'amulet_medaillon_des_vents',
            ],
        ];

        foreach($amulets as $data) {
            $amulet = new Amulet();
            $amulet->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setType($data['type'])
                ->setTarget($data['target'] ?? null)
                ->setEffect($data['effect'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setPrice($data['price']);
            $manager->persist($amulet);
            $this->addReference($data['reference'], $amulet);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 11;
    }
}
