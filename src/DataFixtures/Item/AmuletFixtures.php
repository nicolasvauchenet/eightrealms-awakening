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
            [
                'category' => 'category_amulet',
                'type' => 'Défensif',
                'name' => 'Amulette de santé',
                'description' => "<p>Bijou orné de symboles anciens, cette amulette est réputée pour ses pouvoirs curatifs. Forgée par des mages alchimistes, elle renforce la vitalité et la résilience du porteur. Idéale pour les aventuriers, elle inspire sécurité et robustesse face aux défis les plus dangereux.</p>",
                'picture' => 'amulet.png',
                'buyPrice' => 200,
                'target' => 'health',
                'amount' => 20,
                'reference' => 'amulet_health',
            ],
            [
                'category' => 'category_amulet',
                'type' => 'Défensif',
                'name' => 'Amulette de magie',
                'description' => "<p>Ciselée avec des cristaux lumineux, cette amulette amplifie les réserves de mana de son porteur. Créée par le Conseil des Mages, elle est imprégnée d’une énergie arcanique, offrant aux magiciens une puissance accrue pour leurs sorts les plus complexes.</p>",
                'picture' => 'amulet.png',
                'buyPrice' => 200,
                'target' => 'mana',
                'amount' => 20,
                'reference' => 'amulet_mana',
            ],
        ];

        foreach($amulets as $data) {
            $amulet = new Amulet();
            $amulet->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setType($data['type'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setBuyPrice($data['buyPrice'])
                ->setTarget($data['target'] ?? null)
                ->setAmount($data['amount'] ?? null);
            $manager->persist($amulet);
            $this->addReference($data['reference'], $amulet);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 7;
    }
}
