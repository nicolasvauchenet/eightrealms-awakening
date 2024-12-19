<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Ring;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RingFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $rings = [
            [
                'category' => 'category_ring',
                'type' => 'Défensif',
                'name' => 'Anneau de santé',
                'description' => "<p>Cet anneau élégant est orné d’une pierre rouge brillante, symbole de vitalité et de force. Il est enchanté pour renforcer la santé de son porteur, augmentant sa capacité à encaisser les coups et à survivre aux combats les plus acharnés. Connu pour être un bijou prisé des aventuriers intrépides, il offre un avantage stratégique crucial dans les quêtes où la résistance est mise à rude épreuve.</p>",
                'picture' => 'ring.png',
                'buyPrice' => 200,
                'target' => 'health',
                'amount' => 20,
                'reference' => 'ring_health',
            ],
            [
                'category' => 'category_ring',
                'type' => 'Défensif',
                'name' => 'Anneau de magie',
                'description' => "<p>Incrusté d’une pierre bleue étincelante, cet anneau est une véritable source de puissance magique. Il augmente les réserves de mana du porteur, lui permettant de lancer plus de sorts ou de maintenir des incantations prolongées. Les mages et enchanteurs considèrent cet anneau comme un accessoire essentiel pour maximiser leur potentiel arcanique lors des affrontements ou des explorations mystiques.</p>",
                'picture' => 'ring.png',
                'buyPrice' => 200,
                'target' => 'mana',
                'amount' => 20,
                'reference' => 'ring_mana',
            ],
            [
                'category' => 'category_ring',
                'type' => 'Utile',
                'name' => 'Anneau de vision nocturne',
                'description' => "<p>Ce mystérieux anneau, gravé de runes anciennes, confère à son porteur la capacité de voir dans l’obscurité totale. Idéal pour les explorateurs de cavernes ou les voleurs opérant dans l’ombre, il dévoile les secrets cachés et les dangers invisibles. Plus qu’un simple accessoire, cet anneau est un outil précieux pour les missions nécessitant discrétion et précision dans les environnements sombres.</p>",
                'picture' => 'ring.png',
                'buyPrice' => 400,
                'reference' => 'ring_night_vision',
            ],
        ];

        foreach($rings as $data) {
            $ring = new Ring();
            $ring->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setType($data['type'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setBuyPrice($data['buyPrice'])
                ->setTarget($data['target'] ?? null)
                ->setAmount($data['amount'] ?? null);
            $manager->persist($ring);
            $this->addReference($data['reference'], $ring);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 10;
    }
}
