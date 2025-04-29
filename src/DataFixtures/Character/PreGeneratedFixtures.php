<?php

namespace App\DataFixtures\Character;

use App\Entity\Character\PreGenerated;
use App\Entity\Character\Profession;
use App\Entity\Character\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PreGeneratedFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $characters = [
            [
                'name' => 'Aldrin le Brave',
                'picture' => 'aldrin-le-brave.png',
                'thumbnail' => 'aldrin-le-brave_thumb.png',
                'description' => "<p>Fils d’un simple forgeron de Port Saint-Doux, Aldrin a grandi en rêvant d’armures étincelantes et de batailles héroïques. S’il manie déjà bien l’épée, son expérience se limite aux entraînements dans la cour des gardes locales. Idéaliste et volontaire, il s’est juré de défendre les innocents… même s’il découvre encore comment lever un bouclier correctement.</p>",
                'strength' => 14,
                'dexterity' => 10,
                'constitution' => 13,
                'wisdom' => 11,
                'intelligence' => 10,
                'charisma' => 12,
                'healthMax' => 130,
                'manaMax' => 50,
                'fortune' => 100,
                'race' => 'race_humain',
                'profession' => 'profession_chevalier',
                'reference' => 'character_aldrin',
            ],
            [
                'name' => 'Elandra la Sage',
                'picture' => 'elandra-la-sage.png',
                'thumbnail' => 'elandra-la-sage_thumb.png',
                'description' => "<p>Elandra vient tout juste de terminer sa formation auprès des érudits du cercle arcanique de Port Saint-Doux. Curieuse et studieuse, elle a de la théorie plein la tête, mais très peu d’expérience sur le terrain. Son bâton brille peut-être, mais elle ne sait pas encore bien s’en servir sans allumer un feu par accident.</p>",
                'strength' => 8,
                'dexterity' => 12,
                'constitution' => 10,
                'wisdom' => 14,
                'intelligence' => 16,
                'charisma' => 10,
                'healthMax' => 100,
                'manaMax' => 80,
                'fortune' => 200,
                'race' => 'race_elfe',
                'profession' => 'profession_mage',
                'reference' => 'character_elandra',
            ],
            [
                'name' => 'Eryndor le Vigilant',
                'picture' => 'eryndor-le-vigilant.png',
                'thumbnail' => 'eryndor-le-vigilant_thumb.png',
                'description' => "<p>Archer autodidacte, Eryndor a grandi dans les clairières paisibles des Bois du Pendu. Sa précision est prometteuse, mais il n’a encore affronté que des lapins et des cibles en bois. Solitaire et méfiant, il a récemment décidé de quitter les arbres pour tester ses talents dans le monde réel.</p>",
                'strength' => 10,
                'dexterity' => 16,
                'constitution' => 10,
                'wisdom' => 12,
                'intelligence' => 13,
                'charisma' => 9,
                'healthMax' => 100,
                'manaMax' => 65,
                'fortune' => 150,
                'race' => 'race_elfe',
                'profession' => 'profession_archer',
                'reference' => 'character_eryndor',
            ],
            [
                'name' => 'Lyra l’Agile',
                'picture' => 'lyra-lagile.png',
                'thumbnail' => 'lyra-lagile_thumb.png',
                'description' => "<p>Petite voleuse débrouillarde, Lyra connaît bien les ruelles de Port Saint-Doux… mais pas les vraies embuscades. Agile et rusée, elle sait se faufiler partout, mais sa lame n’a jamais rencontré autre chose que des cordages ou des poches mal placées. Elle rêve de gloire… ou au moins d’un bon butin.</p>",
                'strength' => 8,
                'dexterity' => 16,
                'constitution' => 10,
                'wisdom' => 12,
                'intelligence' => 11,
                'charisma' => 12,
                'healthMax' => 100,
                'manaMax' => 55,
                'fortune' => 250,
                'race' => 'race_halfelin',
                'profession' => 'profession_voleur',
                'reference' => 'character_lyra',
            ],
            [
                'name' => 'Tharasha la Sauvage',
                'picture' => 'tharasha-la-sauvage.png',
                'thumbnail' => 'tharasha-la-sauvage_thumb.png',
                'description' => "<p>Élevée dans une tribu rude et isolée, Tharasha sait manier la hache, mais sans vraie discipline. Sa force brute est indéniable, tout comme son tempérament. Elle n’a encore jamais affronté un vrai adversaire, mais elle ne demande que ça. L’odeur du sang et de l’aventure l’appelle.</p>",
                'strength' => 18,
                'dexterity' => 10,
                'constitution' => 13,
                'wisdom' => 8,
                'intelligence' => 6,
                'charisma' => 7,
                'healthMax' => 130,
                'manaMax' => 30,
                'fortune' => 50,
                'race' => 'race_orque',
                'profession' => 'profession_barbare',
                'reference' => 'character_tharasha',
            ],
            [
                'name' => 'Isilëa la Gardienne',
                'picture' => 'isilea-la-gardienne.png',
                'thumbnail' => 'isilea-la-gardienne_thumb.png',
                'description' => "<p>Apprentie-druide attachée à la nature, Isilëa a appris les rituels anciens mais n’a jamais quitté les bois. Elle maîtrise quelques sorts, connaît les herbes et les animaux, mais ses réflexes au combat sont encore hésitants. Elle part désormais pour défendre l’équilibre au-delà des clairières connues.</p>",
                'strength' => 9,
                'dexterity' => 14,
                'constitution' => 11,
                'wisdom' => 16,
                'intelligence' => 13,
                'charisma' => 12,
                'healthMax' => 110,
                'manaMax' => 65,
                'fortune' => 175,
                'race' => 'race_elfe',
                'profession' => 'profession_druide',
                'reference' => 'character_isilea',
            ],
            [
                'name' => 'Thorin Le Féroce',
                'picture' => 'thorin-le-feroce.png',
                'thumbnail' => 'thorin-le-feroce_thumb.png',
                'description' => "<p>Forgeron de formation, Thorin s’est toujours rêvé guerrier. Il a récupéré une vieille hache ancestrale, mais n’a encore jamais prouvé sa valeur en dehors des tavernes ou des arènes d’entraînement. Courageux mais un brin impulsif, il s’élance vers l’aventure pour faire honneur à ses ancêtres.</p>",
                'strength' => 16,
                'dexterity' => 9,
                'constitution' => 15,
                'wisdom' => 12,
                'intelligence' => 11,
                'charisma' => 8,
                'healthMax' => 150,
                'manaMax' => 55,
                'fortune' => 120,
                'race' => 'race_nain',
                'profession' => 'profession_guerrier',
                'reference' => 'character_thorin',
            ],
            [
                'name' => 'Grymm le Bricoleur',
                'picture' => 'grymm-le-bricoleur.png',
                'thumbnail' => 'grymm-le-bricoleur_thumb.png',
                'description' => "<p>Génie incompris ou fou dangereux selon les jours, Grymm bricole des gadgets dans son atelier de Port Saint-Doux. Il a construit une armure expérimentale et des armes bizarres… qu’il n’a encore jamais testées en situation réelle. Enthousiaste et maladroit, il cherche maintenant un terrain de jeu plus… explosif.</p>",
                'strength' => 7,
                'dexterity' => 14,
                'constitution' => 13,
                'wisdom' => 10,
                'intelligence' => 17,
                'charisma' => 9,
                'healthMax' => 130,
                'manaMax' => 85,
                'fortune' => 300,
                'race' => 'race_gnome',
                'profession' => 'profession_mecaniste',
                'reference' => 'character_grymm',
            ],
        ];

        foreach($characters as $data) {
            $character = new PreGenerated();
            $character->setName($data['name'])
                ->setPicture($data['picture'])
                ->setThumbnail($data['thumbnail'])
                ->setDescription($data['description'])
                ->setStrength($data['strength'])
                ->setDexterity($data['dexterity'])
                ->setConstitution($data['constitution'])
                ->setWisdom($data['wisdom'])
                ->setIntelligence($data['intelligence'])
                ->setCharisma($data['charisma'])
                ->setHealthMax($data['healthMax'])
                ->setManaMax($data['manaMax'])
                ->setFortune($data['fortune'])
                ->setRace($this->getReference($data['race'], Race::class))
                ->setProfession($this->getReference($data['profession'], Profession::class));
            $manager->persist($character);
            $this->addReference($data['reference'], $character);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 4;
    }
}
