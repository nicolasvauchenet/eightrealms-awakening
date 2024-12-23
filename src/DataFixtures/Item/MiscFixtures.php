<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Misc;
use App\Entity\Item\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MiscFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $miscs = [
            // Non quest items
            [
                'category' => 'category_map',
                'name' => "Royaume de l'Île du Nord",
                'type' => 'map',
                'description' => "<p>Cette carte finement tracée dévoile les secrets du petit Royaume de l'Île du Nord. Très pratique pour quiconque souhaite percer les mystères de l'île.</p>",
                'picture' => 'map_royaume-de-lile-du-nord.png',
                'buyPrice' => 50,
                'mandatory' => true,
                'reference' => 'misc_map_royaume_de_lile_du_nord',
            ],
            [
                'category' => 'category_map',
                'name' => 'Port Saint-Doux',
                'type' => 'map',
                'description' => "<p>Ce parchemin révèle les moindres détails de la capitale Port Saint-Doux, ses quais animés, ses marchés colorés et ses ruelles labyrinthiques. Un indispensable pour quiconque souhaite explorer ses richesses ou éviter ses pièges.</p>",
                'picture' => 'map_port-saint-doux.png',
                'buyPrice' => 50,
                'mandatory' => true,
                'reference' => 'misc_map_port_saint_doux',
            ],
            // Quest items
        ];

        foreach($miscs as $data) {
            $misc = new Misc();
            $misc->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setType($data['type'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setBuyPrice($data['buyPrice'])
                ->setTarget($data['target'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setMandatory($data['mandatory']);
            $manager->persist($misc);
            $this->addReference($data['reference'], $misc);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 14;
    }
}
