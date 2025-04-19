<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Gift;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GiftFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $gifts = [
            [
                'name' => 'Bouquet de fleurs',
                'picture' => 'flowers.png',
                'description' => "<p>Un charmant bouquet parfumé, parfait pour offrir ou égayer une journée.</p>",
                'type' => 'gift',
                'price' => 10,
                'category' => 'category_gift',
                'reputation' => 1,
                'reference' => 'gift_flowers',
            ],
            [
                'name' => 'Anneau de cuivre',
                'picture' => 'ring_copper.png',
                'description' => "<p>Simple et modeste, cet anneau en cuivre est un bijou abordable au charme rustique.</p>",
                'type' => 'gift',
                'price' => 10,
                'category' => 'category_gift',
                'reputation' => 1,
                'reference' => 'ring_copper',
            ],
            [
                'name' => "Anneau d'argent",
                'picture' => 'ring_silver.png',
                'description' => "<p>Raffiné et élégant, cet anneau en argent ajoute une touche de classe.</p>",
                'type' => 'gift',
                'price' => 100,
                'category' => 'category_gift',
                'reputation' => 2,
                'reference' => 'ring_silver',
            ],
            [
                'name' => 'Anneau en or',
                'picture' => 'ring_gold.png',
                'description' => "<p>Symbole de richesse et de prestige, cet anneau en or brille d’élégance.</p>",
                'type' => 'gift',
                'price' => 200,
                'category' => 'category_gift',
                'reputation' => 5,
                'reference' => 'ring_gold',
            ],
        ];

        foreach($gifts as $data) {
            $gift = new Gift();
            $gift->setName($data['name'])
                ->setPicture($data['picture'])
                ->setDescription($data['description'])
                ->setType($data['type'])
                ->setCategory($this->getReference($data['category'], Category::class))
                ->setPrice($data['price'])
                ->setReputation($data['reputation']);
            $manager->persist($gift);
            $this->addReference($data['reference'], $gift);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 11;
    }
}
