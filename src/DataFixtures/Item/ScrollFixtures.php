<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Scroll;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ScrollFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $scrolls = [
            // Offensif
            [
                'category' => 'category_scroll',
                'name' => 'Parchemin de boule de feu',
                'description' => "<p>Ce parchemin ancien est gravé de symboles flamboyants qui s’illuminent lorsqu’il est utilisé. Lorsqu’il est activé, il libère une boule de feu destructrice qui explose sur une large zone, infligeant des dégâts de feu dévastateurs aux ennemis. Ce parchemin est une arme redoutable pour renverser le cours d’un combat ou neutraliser des groupes d’adversaires en un instant.</p>",
                'picture' => 'scroll.png',
                'type' => 'Offensif',
                'target' => 'health',
                'amount' => 50,
                'area' => 3,
                'price' => 300,
                'reference' => 'scroll_fireball',
            ],

            // Défensif
            [
                'category' => 'category_scroll',
                'name' => 'Parchemin de soin',
                'description' => "<p>Rédigé avec une encre dorée sur un papier délicatement tissé, ce parchemin est une bénédiction pour les aventuriers blessés. En le lisant, une douce lueur enveloppe la cible, guérissant efficacement les blessures et restaurant sa vitalité. Essentiel pour les guérisseurs et les équipes cherchant à survivre aux dangers des donjons.</p>",
                'picture' => 'scroll.png',
                'type' => 'Défensif',
                'target' => 'health',
                'amount' => 50,
                'price' => 300,
                'reference' => 'scroll_heal',
            ],
            [
                'category' => 'category_scroll',
                'name' => 'Parchemin de barrière',
                'description' => "<p>Ce parchemin mystique est orné de runes protectrices qui brillent d’une lueur bleutée lorsqu’il est activé. En le déployant, il crée une barrière magique qui empêche les attaques ennemies de toucher sa cible, offrant une protection fiable contre les dégâts. Idéal pour les aventuriers cherchant à renforcer leur défense ou à protéger des alliés vulnérables.</p>",
                'picture' => 'scroll.png',
                'type' => 'Défensif',
                'target' => 'defense',
                'amount' => 30,
                'price' => 300,
                'reference' => 'scroll_barrier',
            ],

            // Utile
            [
                'category' => 'category_scroll',
                'name' => 'Parchemin de crochetage',
                'description' => "<p>Ce parchemin utilitaire, parsemé de dessins complexes de serrures et de clés, est l’allié parfait des aventuriers en quête de trésors cachés. Une fois utilisé, il déverrouille magiquement n’importe quelle serrure, même les plus complexes, offrant un accès rapide et silencieux aux zones verrouillées. Idéal pour les voleurs ou les explorateurs en quête d’artefacts précieux.</p>",
                'picture' => 'scroll.png',
                'type' => 'Utile',
                'effect' => 'unlock',
                'price' => 300,
                'reference' => 'scroll_lockpick',
            ],
        ];

        foreach($scrolls as $data) {
            $scroll = new Scroll();
            $scroll->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setType($data['type'])
                ->setTarget($data['target'] ?? null)
                ->setEffect($data['effect'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setArea($data['area'] ?? null)
                ->setDuration($data['duration'] ?? null)
                ->setPrice($data['price']);
            $manager->persist($scroll);
            $this->addReference($data['reference'], $scroll);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 12;
    }
}
