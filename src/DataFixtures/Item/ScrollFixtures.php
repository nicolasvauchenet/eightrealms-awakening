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
                'name' => 'Boule de feu',
                'description' => "<p>Ce parchemin ancien est gravé de symboles flamboyants qui s’illuminent lorsqu’il est utilisé. Lorsqu’il est activé, il libère une boule de feu destructrice qui explose sur une large zone, infligeant des dégâts de feu dévastateurs aux ennemis. Ce parchemin est une arme redoutable pour renverser le cours d’un combat ou neutraliser des groupes d’adversaires en un instant.</p>",
                'picture' => 'scroll.png',
                'type' => 'Offensif',
                'target' => 'health',
                'amount' => 30,
                'area' => 3,
                'price' => 500,
                'reference' => 'scroll_fireball',
            ],
            [
                'category' => 'category_scroll',
                'name' => 'Déconcentration',
                'description' => "<p>Ce parchemin mystique est orné de runes tourbillonnantes qui dansent à la surface du papier. Lorsqu’il est activé, il crée une onde de choc magique qui perturbe les sens des ennemis, les désorientant et diminuant leur réserve magique. Idéal pour les aventuriers cherchant à affaiblir les magiciens ou à échapper à des situations périlleuses.</p>",
                'picture' => 'scroll.png',
                'type' => 'Offensif',
                'target' => 'mana',
                'amount' => 30,
                'area' => 3,
                'price' => 500,
                'reference' => 'scroll_deconcentration',
            ],

            // Défensif
            [
                'category' => 'category_scroll',
                'name' => 'Soin',
                'description' => "<p>Rédigé avec une encre dorée sur un papier délicatement tissé, ce parchemin est une bénédiction pour les aventuriers blessés. En le lisant, une douce lueur enveloppe la cible, guérissant efficacement les blessures et restaurant sa vitalité. Essentiel pour les guérisseurs et les équipes cherchant à survivre aux dangers des donjons.</p>",
                'picture' => 'scroll.png',
                'type' => 'Défensif',
                'target' => 'health',
                'amount' => 30,
                'price' => 500,
                'reference' => 'scroll_heal',
            ],
            [
                'category' => 'category_scroll',
                'name' => 'Concentration',
                'description' => "<p>Ce parchemin mystique est orné de symboles hypnotiques qui captivent l’attention de ceux qui le regardent. En le lisant, il renforce la concentration de la cible, augmentant sa capacité ésotérique et lui permettant de maintenir un combat magique plus longtemps. Idéal pour les mages et les aventuriers cherchant à renforcer leur défense contre les sorts ennemis.</p>",
                'picture' => 'scroll.png',
                'type' => 'Défensif',
                'target' => 'mana',
                'amount' => 30,
                'price' => 500,
                'reference' => 'scroll_concentration',
            ],
            [
                'category' => 'category_scroll',
                'name' => 'Puissance',
                'description' => "<p>Le bras de l’homme est faible, mais son esprit est puissant. Ce parchemin mystique, gravé de runes de force, renforce la puissance de la cible, augmentant sa force physique et lui permettant de porter des coups plus dévastateurs. Idéal pour les guerriers et les aventuriers cherchant à renverser le cours d’un combat ou à briser la défense de leurs ennemis.</p>",
                'picture' => 'scroll.png',
                'type' => 'Défensif',
                'target' => 'damage',
                'amount' => 10,
                'duration' => 3,
                'price' => 800,
                'reference' => 'scroll_power',
            ],
            [
                'category' => 'category_scroll',
                'name' => 'Barrière',
                'description' => "<p>Ce parchemin mystique est orné de runes protectrices qui brillent d’une lueur bleutée lorsqu’il est activé. En le déployant, il crée une barrière magique qui empêche les attaques ennemies de toucher sa cible, offrant une protection fiable contre les dégâts. Idéal pour les aventuriers cherchant à renforcer leur défense ou à protéger des alliés vulnérables.</p>",
                'picture' => 'scroll.png',
                'type' => 'Défensif',
                'target' => 'defense',
                'amount' => 10,
                'duration' => 3,
                'price' => 800,
                'reference' => 'scroll_barrier',
            ],

            // Utile
            [
                'category' => 'category_scroll',
                'name' => 'Invisibilité',
                'description' => "<p>Une fois activé, ce parchemin mystique enveloppe son utilisateur d’un voile d’ombre, le rendant invisible aux yeux de ses ennemis. Idéal pour les voleurs, les espions ou les aventuriers cherchant à échapper à des situations périlleuses, l’Invisibilité est une arme redoutable pour ceux qui savent l’utiliser à bon escient.</p>",
                'picture' => 'scroll.png',
                'type' => 'Utile',
                'effect' => 'invisibility',
                'duration' => 3,
                'price' => 800,
                'reference' => 'scroll_invisibility',
            ],
            [
                'category' => 'category_scroll',
                'name' => 'Crochetage',
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
