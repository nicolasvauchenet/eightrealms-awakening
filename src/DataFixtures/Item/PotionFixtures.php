<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Potion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PotionFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $potions = [
            [
                'category' => 'category_potion',
                'name' => 'Potion de soin léger',
                'type' => 'Défensif',
                'description' => "<p>Cette potion, contenue dans un petit flacon en verre, est composée d’un liquide rouge vif. Elle est idéale pour les blessures superficielles ou en cas de faiblesse légère. Rapide à consommer et facile à transporter, elle est souvent utilisée par les aventuriers en début de carrière ou dans les situations d’urgence mineures.</p>",
                'picture' => 'potion_health.png',
                'buyPrice' => 50,
                'target' => 'health',
                'amount' => 10,
                'reference' => 'potion_lighthealing',
            ],
            [
                'category' => 'category_potion',
                'name' => 'Potion de soin',
                'type' => 'Défensif',
                'description' => "<p>Élaborée à partir d’herbes rares et d’essences curatives, cette potion rouge est un incontournable pour restaurer une santé significative. Son efficacité en fait un choix prisé des guerriers et aventuriers confrontés à des combats intenses. Elle peut faire la différence entre la vie et la mort lors des batailles prolongées.</p>",
                'picture' => 'potion_health.png',
                'buyPrice' => 100,
                'target' => 'health',
                'amount' => 50,
                'reference' => 'potion_healing',
            ],
            [
                'category' => 'category_potion',
                'name' => 'Potion de magie légère',
                'type' => 'Défensif',
                'description' => "<p>Un liquide bleu translucide remplit ce flacon délicat. Cette potion régénère une petite quantité de mana, permettant aux utilisateurs de magie de continuer à lancer leurs sorts. Très appréciée par les magiciens novices, elle est parfaite pour les situations où la magie doit être conservée avec parcimonie.</p>",
                'picture' => 'potion_mana.png',
                'buyPrice' => 50,
                'target' => 'mana',
                'amount' => 10,
                'reference' => 'potion_lightmana',
            ],
            [
                'category' => 'category_potion',
                'name' => 'Potion de magie',
                'type' => 'Défensif',
                'description' => "<p>Cette potion bleu profond est enrichie d’énergies arcanes concentrées. Elle offre une régénération significative de mana, permettant aux magiciens expérimentés de restaurer leurs capacités en plein combat. Essentielle pour les longues quêtes ou les affrontements où la magie est indispensable.</p>",
                'picture' => 'potion_mana.png',
                'buyPrice' => 100,
                'target' => 'mana',
                'amount' => 50,
                'reference' => 'potion_mana',
            ],
            [
                'category' => 'category_potion',
                'name' => "Potion d'invisibilité",
                'type' => 'Utile',
                'description' => "<p>Une potion mystérieuse, contenue dans un flacon scintillant, qui émet une légère brume argentée. Lorsqu’elle est consommée, elle rend son utilisateur complètement invisible pendant trois tours, lui permettant d’échapper à ses ennemis ou de préparer des attaques furtives. Cette potion est un atout stratégique dans les situations où la discrétion est essentielle.</p>",
                'picture' => 'potion_util.png',
                'buyPrice' => 100,
                'duration' => 3,
                'reference' => 'potion_invisibility',
            ],
        ];

        foreach($potions as $data) {
            $potion = new Potion();
            $potion->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setType($data['type'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setBuyPrice($data['buyPrice'])
                ->setTarget($data['target'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setDuration($data['duration'] ?? null);
            $manager->persist($potion);
            $this->addReference($data['reference'], $potion);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 9;
    }
}
