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
                'description' => "Originaire de Port Saint-Doux, Aldrin le Brave est un chevalier emblématique dont le courage inspire respect et admiration à travers le royaume. Né dans une famille modeste de cette cité portuaire, il a grandi au milieu des récits de marins et des légendes anciennes. Très jeune, il a juré de défendre son peuple, forgeant son destin à travers un entraînement acharné et une discipline sans faille. Reconnaissable à son armure étincelante et son bouclier portant le sceau de Port Saint-Doux, Aldrin manie une épée ornée de runes, symbole de sa quête pour la justice. Infatigable défenseur des faibles, il incarne les idéaux chevaleresques de loyauté et d’honneur. Malgré ses exploits, Aldrin reste humble, conscient du poids de ses responsabilités. Toujours prêt à se sacrifier, il veille sur Port Saint-Doux, garant de la paix et de la sécurité dans un monde incertain.",
                'health' => 120,
                'mana' => 30,
                'damage' => 6,
                'defense' => 6,
                'fortune' => 200,
                'strength' => 13,
                'dexterity' => 12,
                'constitution' => 14,
                'intelligence' => 10,
                'charisma' => 10,
                'race' => 'race_humain',
                'profession' => 'profession_chevalier',
                'reference' => 'character_aldrin',
            ],
            [
                'name' => 'Elandra la Sage',
                'picture' => 'elandra-la-sage.png',
                'description' => "Originaire de Port Saint-Doux, Elandra la Sage est une mage respectée, célèbre pour sa maîtrise des arts arcanes et sa profonde sagesse. Née dans une famille de marchands, elle s’est rapidement démarquée par son intelligence et sa curiosité insatiable. Enfant, elle passait des heures à explorer les bibliothèques de la ville, fascinée par les légendes anciennes et les secrets de la magie. Son talent exceptionnel l’a conduite à étudier auprès des meilleurs érudits du royaume, mais c’est à Port Saint-Doux qu’elle revient toujours, puisant dans l’énergie mystique des flots pour alimenter ses sorts. Elandra est connue pour sa robe élégante et son bâton lumineux, symbole de sa connexion avec les forces élémentaires. Bien que sage et réfléchie, elle est aussi une conseillère attentive pour les habitants de Port Saint-Doux, les guidant à travers les défis par son savoir et sa bienveillance.",
                'health' => 80,
                'mana' => 150,
                'damage' => 8,
                'defense' => 0,
                'fortune' => 300,
                'strength' => 10,
                'dexterity' => 11,
                'constitution' => 12,
                'intelligence' => 15,
                'charisma' => 14,
                'race' => 'race_elfe',
                'profession' => 'profession_mage',
                'reference' => 'character_elandra',
            ],
            [
                'name' => 'Eryndor le Vigilant',
                'picture' => 'eryndor-le-vigilant.png',
                'description' => "Eryndor le Vigilant, un elfe solitaire vivant dans les Bois du Pendu, est un maître archer. Sa précision légendaire lui a valu de nombreux récits dans les tavernes. Enfant des bois, il a développé un lien profond avec la nature et une agilité qui dépasse l’entendement. Arpentant les sentiers sylvestres, Eryndor protège les créatures de la forêt contre les menaces extérieures, utilisant son arc enchanté pour abattre ses ennemis avec une précision mortelle. Son regard perçant et son calme olympien en font un adversaire redoutable, capable de décocher des flèches à une vitesse stupéfiante. Malgré son apparence austère, Eryndor cache un cœur généreux, prêt à aider ceux qui en ont besoin. Sa loyauté envers Elherys est inébranlable, et il veille sur la forêt avec une vigilance sans faille.",
                'health' => 90,
                'mana' => 40,
                'damage' => 6,
                'defense' => 2,
                'fortune' => 150,
                'strength' => 12,
                'dexterity' => 15,
                'constitution' => 12,
                'intelligence' => 10,
                'charisma' => 13,
                'race' => 'race_elfe',
                'profession' => 'profession_archer',
                'reference' => 'character_eryndor',
            ],
            [
                'name' => 'Lyra l’Agile',
                'picture' => 'lyra-lagile.png',
                'description' => "Originaire de Port Saint-Doux, Lyra l’Agile est une voleuse renommée, connue pour sa discrétion et son habileté incomparable. Ayant grandi dans les ruelles sombres et animées de cette ville portuaire, elle a appris dès son plus jeune âge à survivre par ses propres moyens, développant une agilité naturelle et un instinct aiguisé. Son environnement l’a façonnée en une experte des ombres, capable de se faufiler là où personne ne l’attend. Avec son regard perçant et ses dagues toujours prêtes, Lyra excelle dans l’art de récupérer des trésors bien gardés et d’éviter les ennuis. Malgré son passé difficile, elle conserve un sens moral ambigu, aidant parfois les plus démunis tout en poursuivant ses propres intérêts. Port Saint-Doux reste son terrain de jeu favori, où elle navigue entre les tavernes bruyantes et les marchés bondés, toujours prête à relever un défi ou à saisir une opportunité dans l’ombre.",
                'health' => 90,
                'mana' => 50,
                'damage' => 4,
                'defense' => 2,
                'fortune' => 250,
                'strength' => 8,
                'dexterity' => 16,
                'constitution' => 10,
                'intelligence' => 12,
                'charisma' => 10,
                'race' => 'race_halfelin',
                'profession' => 'profession_voleur',
                'reference' => 'character_lyra',
            ],
            [
                'name' => 'Tharasha la Sauvage',
                'picture' => 'tharasha-la-sauvage.png',
                'description' => "Originaire du village de Plouc, Tharasha la Sauvage est une barbare redoutée, dont la force titanesque et l’instinct primitif terrifient ses ennemis. Élevée dans un clan nomade, elle a appris très jeune à survivre dans un environnement hostile. Sa hache massive et son cri de guerre sont ses armes redoutables. Tharasha incarne la liberté brute, rejetant les règles des sociétés établies. Malgré son tempérament fougueux, elle protège férocement ses alliés et respecte la nature comme un guide spirituel. Ses récits de batailles et de victoires épiques inspirent crainte et admiration.",
                'health' => 160,
                'mana' => 10,
                'damage' => 8,
                'defense' => 4,
                'fortune' => 50,
                'strength' => 16,
                'dexterity' => 10,
                'constitution' => 15,
                'intelligence' => 8,
                'charisma' => 6,
                'race' => 'race_orque',
                'profession' => 'profession_barbare',
                'reference' => 'character_tharasha',
            ],
            [
                'name' => 'Isilëa la Gardienne',
                'picture' => 'isilea-la-gardienne.png',
                'description' => "Protectrice des Bois du Pendu, Isilëa la Gardienne est une druide puissante, en harmonie avec les cycles de la nature. Ses pouvoirs lui permettent de manipuler les éléments et de se transformer en créatures sauvages. Fille d’un ancien cercle druidique, elle a juré de protéger l’équilibre du monde. Isilëa est souvent vue avec son bâton noueux, orné de runes anciennes. Sa sagesse et son calme contrastent avec sa férocité au combat lorsqu’elle défend sa terre.",
                'health' => 100,
                'mana' => 120,
                'damage' => 0,
                'defense' => 0,
                'fortune' => 100,
                'strength' => 8,
                'dexterity' => 11,
                'constitution' => 13,
                'intelligence' => 15,
                'charisma' => 14,
                'race' => 'race_elfe',
                'profession' => 'profession_druide',
                'reference' => 'character_isilea',
            ],
            [
                'name' => 'Thorin Le Féroce',
                'picture' => 'thorin-le-feroce.png',
                'description' => "Thorin le Féroce est un nain des Monts Terribles, connu pour sa bravoure et sa hache à deux mains héritée des anciens. Son armure gravée de runes et son casque à cornes symbolisent sa force et sa détermination inébranlable. Surnommé \"le Féroce\", il protège ses compagnons sans jamais reculer. Stratège hors pair, Thorin connaît chaque recoin des Monts Terribles, en faisant un guide précieux. Sa quête d'une relique perdue dans les profondeurs le pousse à l'aventure, incarnant l'esprit intrépide et la loyauté des siens.",
                'health' => 150,
                'mana' => 20,
                'damage' => 8,
                'defense' => 6,
                'fortune' => 250,
                'strength' => 15,
                'dexterity' => 12,
                'constitution' => 15,
                'intelligence' => 10,
                'charisma' => 9,
                'race' => 'race_nain',
                'profession' => 'profession_guerrier',
                'reference' => 'character_thorin',
            ],
            [
                'name' => 'Grymm le Bricoleur',
                'picture' => 'grymm-le-bricoleur.png',
                'description' => "Inventeur excentrique originaire de Port Saint-Doux, Grymm le Bricoleur est un mécaniste de génie, créant des gadgets et des armes ingénieuses. Ses inventions farfelues et parfois imprévisibles lui ont valu une réputation mitigée, mais personne ne peut nier son talent exceptionnel. Avec son armure articulée et son arsenal de gadgets mécaniques, Grymm utilise sa créativité pour résoudre des problèmes de manière inédite. Il est aussi pragmatique qu’amusant, apportant souvent une touche d’humour dans les situations les plus graves.",
                'health' => 90,
                'mana' => 60,
                'damage' => 4,
                'defense' => 2,
                'fortune' => 400,
                'strength' => 9,
                'dexterity' => 16,
                'constitution' => 12,
                'intelligence' => 14,
                'charisma' => 8,
                'race' => 'race_gnome',
                'profession' => 'profession_mecaniste',
                'reference' => 'character_grymm',
            ],
        ];

        foreach($characters as $data) {
            $character = new PreGenerated();
            $character->setName($data['name'])
                ->setPicture($data['picture'])
                ->setDescription($data['description'])
                ->setHealth($data['health'])
                ->setMana($data['mana'])
                ->setDamage($data['damage'])
                ->setDefense($data['defense'])
                ->setFortune($data['fortune'])
                ->setStrength($data['strength'])
                ->setDexterity($data['dexterity'])
                ->setConstitution($data['constitution'])
                ->setIntelligence($data['intelligence'])
                ->setCharisma($data['charisma'])
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
