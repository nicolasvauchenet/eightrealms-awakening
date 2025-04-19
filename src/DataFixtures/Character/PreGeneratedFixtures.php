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
                'description' => "<p>Originaire de <strong>Port Saint-Doux</strong>, Aldrin le Brave est un <strong>chevalier</strong> emblématique dont le courage inspire respect et admiration à travers le royaume. Né dans une famille modeste de cette cité portuaire, il a grandi au milieu des récits de marins et des légendes anciennes. Très jeune, il a juré de défendre son peuple, forgeant son destin à travers un <strong>entraînement</strong> acharné et une <strong>discipline</strong> sans faille. Reconnaissable à son <strong>armure</strong> étincelante et son <strong>bouclier</strong> portant le sceau de Port Saint-Doux, Aldrin manie une <strong>épée</strong> ornée de runes, symbole de sa quête pour la justice. Infatigable défenseur des faibles, il incarne les idéaux chevaleresques de <strong>loyauté</strong> et d’<strong>honneur</strong>. Malgré ses exploits, Aldrin reste <strong>humble</strong>, conscient du poids de ses responsabilités. Toujours prêt à se sacrifier, il veille sur Port Saint-Doux, garant de la <strong>paix</strong> et de la <strong>sécurité</strong> dans un monde incertain.</p>",
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
                'description' => "<p>Originaire de <strong>Port Saint-Doux</strong>, Elandra la Sage est une <strong>mage</strong> respectée, célèbre pour sa maîtrise des <strong>arts arcanes</strong> et sa profonde <strong>sagesse</strong>. Née dans une famille de marchands, elle s’est rapidement démarquée par son <strong>intelligence</strong> et sa <strong>curiosité</strong> insatiable. Enfant, elle passait des heures à explorer les bibliothèques de la ville, fascinée par les <strong>légendes</strong> anciennes et les secrets de la <strong>magie</strong>. Son talent exceptionnel l’a conduite à étudier auprès des meilleurs érudits du royaume, mais c’est à Port Saint-Doux qu’elle revient toujours, puisant dans l’énergie mystique des flots pour alimenter ses <strong>sorts</strong>. Elandra est connue pour sa <strong>robe élégante</strong> et son <strong>bâton</strong> lumineux, symbole de sa connexion avec les <strong>forces élémentaires</strong>. Bien que <strong>sage</strong> et réfléchie, elle est aussi une <strong>conseillère</strong> attentive pour les habitants de Port Saint-Doux, les guidant à travers les défis par son <strong>savoir</strong> et sa <strong>bienveillance</strong>.</p>",
                'strength' => 8,
                'dexterity' => 12,
                'constitution' => 9,
                'wisdom' => 14,
                'intelligence' => 16,
                'charisma' => 10,
                'healthMax' => 90,
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
                'description' => "<p>Eryndor le Vigilant, un <strong>elfe solitaire</strong> vivant dans les <strong>Bois du Pendu</strong>, est un <strong>maître archer</strong>. Sa <strong>précision</strong> légendaire lui a valu de nombreux récits dans les tavernes. Enfant des bois, il a développé un lien profond avec la <strong>nature</strong> et une <strong>agilité</strong> qui dépasse l’entendement. Arpentant les sentiers sylvestres, Eryndor protège les créatures de la forêt contre les menaces extérieures, utilisant son arc pour abattre ses ennemis avec une précision mortelle. Son <strong>regard perçant</strong> et son <strong>calme</strong> olympien en font un adversaire redoutable, capable de décocher des flèches à une vitesse stupéfiante. Malgré son apparence austère, Eryndor cache un cœur <strong>généreux</strong>, prêt à aider ceux qui en ont besoin. Sa loyauté envers Elherys est inébranlable, et il veille sur la forêt avec une <strong>vigilance</strong> sans faille.</p>",
                'strength' => 10,
                'dexterity' => 16,
                'constitution' => 11,
                'wisdom' => 12,
                'intelligence' => 13,
                'charisma' => 9,
                'healthMax' => 110,
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
                'description' => "<p>Originaire de <strong>Port Saint-Doux</strong>, Lyra l’Agile est une <strong>voleuse</strong> renommée, connue pour sa <strong>discrétion</strong> et son <strong>habileté</strong> incomparable. Ayant grandi dans les ruelles sombres et animées de cette ville portuaire, elle a appris dès son plus jeune âge à <strong>survivre</strong> par ses propres moyens, développant une <strong>agilité</strong> naturelle et un <strong>instinct</strong> aiguisé. Son environnement l’a façonnée en une <strong>experte des ombres</strong>, capable de se faufiler là où personne ne l’attend. Avec son <strong>regard perçant</strong> et ses <strong>dagues</strong> toujours prêtes, Lyra excelle dans l’art de récupérer des trésors bien gardés et d’éviter les ennuis. Malgré son passé difficile, elle conserve un sens moral ambigu, aidant parfois les plus démunis tout en poursuivant ses propres intérêts. Port Saint-Doux reste son terrain de jeu favori, où elle navigue entre les tavernes bruyantes et les marchés bondés, toujours prête à relever un défi ou à saisir une opportunité dans l’ombre.</p>",
                'strength' => 8,
                'dexterity' => 17,
                'constitution' => 10,
                'wisdom' => 12,
                'intelligence' => 11,
                'charisma' => 13,
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
                'description' => "<p>Originaire du village de <strong>Plouc</strong>, Tharasha la Sauvage est une <strong>barbare</strong> redoutée. Sa <strong>force</strong> titanesque et son <strong>instinct primitif</strong> terrifient ses ennemis. Élevée dans un clan nomade, elle a appris très jeune à <strong>survivre</strong> dans un environnement hostile. Sa <strong>hache</strong> massive et son <strong>cri de guerre</strong> sont ses armes redoutables. Tharasha incarne la <strong>liberté</strong> brute, rejetant les règles des sociétés établies. Malgré son tempérament fougueux, elle protège férocement ses <strong>alliés</strong> et respecte la <strong>nature</strong> comme un guide spirituel. Ses récits de batailles et de victoires épiques inspirent <strong>crainte</strong> et <strong>admiration</strong>.</p>",
                'strength' => 18,
                'dexterity' => 10,
                'constitution' => 14,
                'wisdom' => 8,
                'intelligence' => 6,
                'charisma' => 7,
                'healthMax' => 140,
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
                'description' => "<p>Protectrice des <strong>Bois du Pendu</strong>, Isilëa la Gardienne est une <strong>druide</strong> puissante, en harmonie avec les cycles de la <strong>nature</strong>. Ses <strong>pouvoirs</strong> lui permettent de <strong>manipuler les éléments</strong> et de <strong>se transformer</strong> en créatures sauvages. Fille d’un ancien cercle druidique, elle a juré de protéger l’<strong>équilibre</strong> du monde. Isilëa est souvent vue avec son <strong>bâton noueux</strong>, orné de <strong>runes</strong> anciennes. Sa <strong>sagesse</strong> et son <strong>calme</strong> contrastent avec sa <strong>férocité au combat</strong> lorsqu’elle défend sa terre.</p>",
                'strength' => 9,
                'dexterity' => 14,
                'constitution' => 10,
                'wisdom' => 16,
                'intelligence' => 13,
                'charisma' => 12,
                'healthMax' => 100,
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
                'description' => "<p>Thorin le Féroce est un <strong>nain</strong> des <strong>Monts Terribles</strong>, connu pour sa <strong>bravoure</strong> et sa <strong>hache à deux mains</strong> héritée des anciens. Son <strong>armure gravée de runes</strong> et son <strong>casque à cornes</strong> symbolisent sa <strong>force</strong> et sa <strong>détermination</strong> inébranlable. Surnommé \"<strong>le Féroce</strong>\", il protège ses compagnons sans jamais reculer. <strong>Stratège</strong> hors pair, Thorin connaît chaque recoin des Monts Terribles, en faisant un <strong>guide</strong> précieux. Sa <strong>quête</strong> d'une <strong>relique perdue</strong> dans les profondeurs le pousse à l'<strong>aventure</strong>, incarnant l'esprit <strong>intrépide</strong> et la <strong>loyauté</strong> des siens.</p>",
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
                'description' => "<p><strong>Inventeur</strong> excentrique originaire de <strong>Port Saint-Doux</strong>, Grymm le Bricoleur est un <strong>mécaniste</strong> de génie, créant des <strong>gadgets</strong> et des <strong>armes</strong> ingénieuses. Ses inventions <strong>farfelues</strong> et parfois imprévisibles lui ont valu une réputation mitigée, mais personne ne peut nier son <strong>talent</strong> exceptionnel. Avec son <strong>armure articulée</strong> et son arsenal de gadgets mécaniques, Grymm utilise sa <strong>créativité</strong> pour résoudre des problèmes de manière inédite. Il est aussi <strong>pragmatique</strong> qu’<strong>amusant</strong>, apportant souvent une touche d’humour dans les situations les plus graves.</p>",
                'strength' => 7,
                'dexterity' => 14,
                'constitution' => 12,
                'wisdom' => 10,
                'intelligence' => 17,
                'charisma' => 9,
                'healthMax' => 120,
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
