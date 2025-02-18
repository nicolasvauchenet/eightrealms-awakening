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
                'category' => 'category_gift',
                'name' => 'Bouquet de fleurs',
                'description' => "<p>Un charmant bouquet parfumé, parfait pour offrir ou égayer une journée.</p>",
                'picture' => 'flowers.png',
                'type' => 'gift',
                'price' => 10,
                'reference' => 'gift_flowers',
            ],
            [
                'category' => 'category_gift',
                'name' => 'Anneau de cuivre',
                'description' => "<p>Simple et modeste, cet anneau en cuivre est un bijou abordable au charme rustique.</p>",
                'picture' => 'ring_copper.png',
                'type' => 'gift',
                'price' => 10,
                'reference' => 'ring_copper',
            ],
            [
                'category' => 'category_gift',
                'name' => "Anneau d'argent",
                'description' => "<p>Raffiné et élégant, cet anneau en argent ajoute une touche de classe.</p>",
                'picture' => 'ring_silver.png',
                'type' => 'gift',
                'price' => 100,
                'reference' => 'ring_silver',
            ],
            [
                'category' => 'category_gift',
                'name' => 'Anneau en or',
                'description' => "<p>Symbole de richesse et de prestige, cet anneau en or brille d’élégance.</p>",
                'picture' => 'ring_gold.png',
                'type' => 'gift',
                'price' => 200,
                'reference' => 'ring_gold',
            ],
        ];

        foreach($gifts as $data) {
            $gift = new Gift();
            $gift->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setType($data['type'])
                ->setPrice($data['price']);
            $manager->persist($gift);
            $this->addReference($data['reference'], $gift);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 16;
    }
}
