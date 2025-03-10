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
            // Offensif
            [
                'name' => 'Boule de Feu',
                'category' => 'category_fire',
                'description' => "<p>Un sort classique mais puissant, la Boule de Feu projette une explosion incandescente qui inflige d’importants dégâts de feu dans une petite zone. Idéal pour anéantir des groupes d’ennemis regroupés ou pour causer des ravages au milieu d’un champ de bataille. Attention cependant, son coût en mana est conséquent, et il nécessite une bonne maîtrise des sorts offensifs.</p>",
                'type' => 'Offensif',
                'mana' => 5,
                'target' => 'damage',
                'amount' => 10,
                'area' => 1,
                'reference' => 'spell_fireball',
            ],
            [
                'name' => 'Boule de Glace',
                'category' => 'category_water',
                'description' => "<p>Un sort classique mais puissant, la Boule de Glace projette une explosion glaciale qui inflige d’importants dégâts de froid dans une petite zone. Idéal pour anéantir des groupes d’ennemis regroupés ou pour causer des ravages au milieu d’un champ de bataille. Attention cependant, son coût en mana est conséquent, et il nécessite une bonne maîtrise des sorts offensifs.</p>",
                'type' => 'Offensif',
                'mana' => 5,
                'target' => 'damage',
                'amount' => 10,
                'area' => 1,
                'reference' => 'spell_iceball',
            ],
            [
                'name' => 'Éclair',
                'category' => 'category_storm',
                'description' => "<p>Ce sort précis canalise la puissance de la foudre pour frapper une cible unique avec une grande intensité. Rapide et à faible coût en mana, l’Éclair est idéal pour éliminer des ennemis à distance ou pour interrompre leurs actions. Il est parfait pour les mages cherchant un sort rapide et efficace.</p>",
                'type' => 'Offensif',
                'mana' => 5,
                'target' => 'damage',
                'amount' => 10,
                'area' => 1,
                'reference' => 'spell_lightning',
            ],
            [
                'name' => 'Nova Arcanique',
                'category' => 'category_mana',
                'description' => "<p>Ce sort libère une puissante onde d’énergie magique qui frappe tous les ennemis proches. Infligeant des dégâts significatifs sur une large zone, il est idéal pour neutraliser des groupes d’adversaires en un instant. Attention toutefois à son coût élevé en mana, qui le réserve aux situations critiques.</p>",
                'type' => 'Offensif',
                'mana' => 5,
                'target' => 'damage',
                'amount' => 10,
                'area' => 1,
                'reference' => 'spell_arcane_nova',
            ],
            [
                'name' => 'Explosion de Mana',
                'category' => 'category_mana',
                'description' => "<p>Sort ultime de sacrifice, l’Explosion de Mana consomme tout le mana restant du lanceur pour infliger des dégâts proportionnels à la quantité utilisée. C’est un pari risqué mais souvent dévastateur, capable de retourner le cours d’un combat en un instant. Utilisez-le avec prudence !</p>",
                'type' => 'Offensif',
                'mana' => 0,
                'target' => 'damage',
                'amount' => 0,
                'area' => 1,
                'reference' => 'spell_mana_explosion',
            ],

            // Défensif
            [
                'name' => 'Bouclier',
                'category' => 'category_shield',
                'description' => "<p>Le Bouclier est un sort défensif qui augmente considérablement la défense du lanceur pendant une courte durée. En entourant le mage d’une énergie protectrice, il réduit les dégâts reçus, le rendant presque invulnérable face aux attaques les plus puissantes. Un sort clé pour survivre dans les moments de danger.</p>",
                'type' => 'Défensif',
                'mana' => 10,
                'target' => 'defense',
                'amount' => 5,
                'duration' => 1,
                'reference' => 'spell_shield',
            ],
            [
                'name' => 'Mur de Glace',
                'category' => 'category_water',
                'description' => "<p>Ce sort invoque un mur imposant de glace, bloquant le passage des ennemis et offrant une barrière temporaire. Idéal pour contrôler le champ de bataille, protéger ses alliés ou ralentir les assauts, le Mur de Glace est une solution tactique dans de nombreuses situations.</p>",
                'type' => 'Utile',
                'mana' => 15,
                'effect' => 'invisibility',
                'duration' => 1,
                'reference' => 'spell_ice_wall',
            ],

            // Restauration
            [
                'name' => 'Soin',
                'category' => 'category_restoration',
                'description' => "<p>Ce sort de lumière restaure les points de vie d’une cible, dissipant blessures et douleurs en un instant. Simple mais efficace, il est indispensable pour tout soigneur ou aventurier désireux de maintenir son groupe en vie. Avec un faible coût en mana, il peut être utilisé fréquemment dans les situations critiques.</p>",
                'type' => 'Défensif',
                'mana' => 10,
                'target' => 'health',
                'amount' => 20,
                'reference' => 'spell_healrestore',
            ],
            [
                'name' => 'Recharge',
                'category' => 'category_restoration',
                'description' => "<p>Ce sort de lumière restaure les points de mana d’une cible, dissipant la fatigue et la lassitude en un instant. Simple mais efficace, il est indispensable pour tout soigneur ou aventurier désireux de maintenir son groupe en vie. Avec un faible coût en mana, il peut être utilisé fréquemment dans les situations critiques.</p>",
                'type' => 'Défensif',
                'mana' => 10,
                'target' => 'mana',
                'amount' => 20,
                'reference' => 'spell_manarestore',
            ],

            // Illusion
            [
                'name' => 'Invisibilité',
                'category' => 'category_illusion',
                'description' => "<p>En activant ce sort, le lanceur devient totalement invisible aux yeux de ses ennemis, lui permettant de se déplacer ou de se repositionner sans être détecté. Essentiel pour les missions d’infiltration ou pour fuir une situation désespérée, l’Invisibilité est aussi utile qu’impressionnante.</p>",
                'type' => 'Utile',
                'mana' => 15,
                'effect' => 'invisibility',
                'duration' => 1,
                'reference' => 'spell_invisibility',
            ],

            // Nature
            [
                'name' => 'Racines Enchevêtrantes',
                'category' => 'category_nature',
                'description' => "<p>En faisant appel à la nature, ce sort fait surgir des racines qui immobilisent les ennemis dans une zone donnée. Ces racines limitent leurs mouvements et leur capacité à riposter, offrant un contrôle inestimable dans les combats chaotiques ou lors de fuites stratégiques.</p>",
                'type' => 'Utile',
                'mana' => 15,
                'effect' => 'invisibility',
                'duration' => 1,
                'area' => 1,
                'reference' => 'spell_entangling_roots',
            ],

            // Métamorphose
            [
                'name' => 'Loup',
                'category' => 'category_metamorphosis',
                'description' => "<p>Ce sort de métamorphose transforme le lanceur en un loup sauvage, augmentant sa vitesse et ses capacités de combat. Idéal pour la chasse, l’exploration ou la fuite, il offre une nouvelle perspective sur le monde et permet de surmonter de nombreux obstacles. Attention cependant, la transformation est temporaire et nécessite une grande concentration.</p>",
                'type' => 'Utile',
                'mana' => 15,
                'effect' => 'metamorphosis',
                'duration' => 1,
                'reference' => 'spell_metamorphosis_wolf',
            ],
        ];

        foreach($spells as $data) {
            $spell = new Spell();
            $spell->setName($data['name'])
                ->setDescription($data['description'])
                ->setType($data['type'])
                ->setMana($data['mana'])
                ->setTarget($data['target'] ?? null)
                ->setEffect($data['effect'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setArea($data['area'] ?? null)
                ->setDuration($data['duration'] ?? null)
                ->setCategory($this->getReference($data['category'], Category::class));
            $manager->persist($spell);
            $this->addReference($data['reference'], $spell);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 19;
    }
}
