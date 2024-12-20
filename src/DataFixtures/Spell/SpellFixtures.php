<?php

namespace App\DataFixtures\Spell;

use App\Entity\Spell\Category;
use App\Entity\Spell\Spell;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SpellFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $spells = [
            [
                'name' => 'Boule de Feu',
                'picture' => 'fire.png',
                'category' => 'category_offensive',
                'description' => "<p>Un sort classique mais puissant, la Boule de Feu projette une explosion incandescente qui inflige d’importants dégâts de feu dans une petite zone. Idéal pour anéantir des groupes d’ennemis regroupés ou pour causer des ravages au milieu d’un champ de bataille. Attention cependant, son coût en mana est conséquent, et il nécessite une bonne maîtrise des sorts offensifs.</p>",
                'manaCost' => 20,
                'target' => 'health',
                'amount' => 50,
                'area' => 1,
                'reference' => 'spell_fireball',
            ],
            [
                'name' => 'Soin',
                'picture' => 'health.png',
                'category' => 'category_defensive',
                'description' => "<p>Ce sort de lumière restaure les points de vie d’une cible, dissipant blessures et douleurs en un instant. Simple mais efficace, il est indispensable pour tout soigneur ou aventurier désireux de maintenir son groupe en vie. Avec un faible coût en mana, il peut être utilisé fréquemment dans les situations critiques.</p>",
                'manaCost' => 15,
                'target' => 'health',
                'amount' => 30,
                'reference' => 'spell_heal',
            ],
            [
                'name' => 'Mur de Glace',
                'picture' => 'water.png',
                'category' => 'category_utility',
                'description' => "<p>Ce sort invoque un mur imposant de glace, bloquant le passage des ennemis et offrant une barrière temporaire. Idéal pour contrôler le champ de bataille, protéger ses alliés ou ralentir les assauts, le Mur de Glace est une solution tactique dans de nombreuses situations.</p>",
                'manaCost' => 25,
                'target' => 'wall',
                'duration' => 2,
                'reference' => 'spell_ice_wall',
            ],
            [
                'name' => 'Éclair',
                'picture' => 'storm.png',
                'category' => 'category_offensive',
                'description' => "<p>Ce sort précis canalise la puissance de la foudre pour frapper une cible unique avec une grande intensité. Rapide et à faible coût en mana, l’Éclair est idéal pour éliminer des ennemis à distance ou pour interrompre leurs actions. Il est parfait pour les mages cherchant un sort rapide et efficace.</p>",
                'manaCost' => 10,
                'target' => 'health',
                'amount' => 50,
                'reference' => 'spell_lightning',
            ],
            [
                'name' => 'Bouclier',
                'picture' => 'shield.png',
                'category' => 'category_defensive',
                'description' => "<p>Le Bouclier est un sort défensif qui augmente considérablement la défense du lanceur pendant une courte durée. En entourant le mage d’une énergie protectrice, il réduit les dégâts reçus, le rendant presque invulnérable face aux attaques les plus puissantes. Un sort clé pour survivre dans les moments de danger.</p>",
                'manaCost' => 10,
                'target' => 'defense',
                'amount' => 30,
                'duration' => 1,
                'reference' => 'spell_shield',
            ],
            [
                'name' => 'Invisibilité',
                'picture' => 'illusion.png',
                'category' => 'category_utility',
                'description' => "<p>En activant ce sort, le lanceur devient totalement invisible aux yeux de ses ennemis, lui permettant de se déplacer ou de se repositionner sans être détecté. Essentiel pour les missions d’infiltration ou pour fuir une situation désespérée, l’Invisibilité est aussi utile qu’impressionnante.</p>",
                'manaCost' => 30,
                'target' => 'visibility',
                'duration' => 3,
                'reference' => 'spell_invisibility',
            ],
            [
                'name' => 'Nova Arcanique',
                'picture' => 'mana.png',
                'category' => 'category_offensive',
                'description' => "<p>Ce sort libère une puissante onde d’énergie magique qui frappe tous les ennemis proches. Infligeant des dégâts significatifs sur une large zone, il est idéal pour neutraliser des groupes d’adversaires en un instant. Attention toutefois à son coût élevé en mana, qui le réserve aux situations critiques.</p>",
                'manaCost' => 35,
                'target' => 'health',
                'amount' => 45,
                'area' => 3,
                'reference' => 'spell_arcane_nova',
            ],
            [
                'name' => 'Explosion de Mana',
                'picture' => 'mana.png',
                'category' => 'category_offensive',
                'description' => "<p>Sort ultime de sacrifice, l’Explosion de Mana consomme tout le mana restant du lanceur pour infliger des dégâts proportionnels à la quantité utilisée. C’est un pari risqué mais souvent dévastateur, capable de retourner le cours d’un combat en un instant. Utilisez-le avec prudence !</p>",
                'manaCost' => 0,
                'target' => 'health',
                'reference' => 'spell_mana_explosion',
            ],
            [
                'name' => 'Racines Enchevêtrantes',
                'picture' => 'nature.png',
                'category' => 'category_utility',
                'description' => "<p>En faisant appel à la nature, ce sort fait surgir des racines qui immobilisent les ennemis dans une zone donnée. Ces racines limitent leurs mouvements et leur capacité à riposter, offrant un contrôle inestimable dans les combats chaotiques ou lors de fuites stratégiques.</p>",
                'manaCost' => 30,
                'target' => 'movement',
                'duration' => 3,
                'area' => 2,
                'reference' => 'spell_entangling_roots',
            ],
            [
                'name' => 'Invocation de Loup',
                'picture' => 'creature.png',
                'category' => 'category_utility',
                'description' => "<p>Ce sort invoque un loup spectral pour se battre aux côtés du lanceur. Fidèle et agressif, ce compagnon combat avec acharnement et peut durer plusieurs tours. L’Invocation de Loup est parfaite pour les druides ou les invocateurs cherchant à renforcer leur présence sur le champ de bataille.</p>",
                'manaCost' => 50,
                'target' => 'health',
                'amount' => 20,
                'duration' => 5,
                'reference' => 'spell_summon_wolf',
            ],
        ];

        foreach($spells as $data) {
            $spell = new Spell();
            $spell->setName($data['name'])
                ->setPicture($data['picture'])
                ->setDescription($data['description'])
                ->setManaCost($data['manaCost'])
                ->setTarget($data['target'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setDuration($data['duration'] ?? null)
                ->setArea($data['area'] ?? null)
                ->setCategory($this->getReference($data['category'], Category::class));
            $manager->persist($spell);
            $this->addReference($data['reference'], $spell);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 16;
    }
}
