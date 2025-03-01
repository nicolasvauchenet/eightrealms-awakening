<?php

namespace App\DataFixtures\Character;

use App\Entity\Character\Player;
use App\Entity\Character\Profession;
use App\Entity\Character\Race;
use App\Entity\Location\Location;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlayerFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $characters = [
            [
                'name' => 'Aldrin le Brave',
                'picture' => 'aldrin-le-brave.png',
                'description' => "<p>Originaire de <strong>Port Saint-Doux</strong>, Aldrin le Brave est un <strong>chevalier</strong> emblématique dont le courage inspire respect et admiration à travers le royaume. Né dans une famille modeste de cette cité portuaire, il a grandi au milieu des récits de marins et des légendes anciennes. Très jeune, il a juré de défendre son peuple, forgeant son destin à travers un <strong>entraînement</strong> acharné et une <strong>discipline</strong> sans faille. Reconnaissable à son <strong>armure</strong> étincelante et son <strong>bouclier</strong> portant le sceau de Port Saint-Doux, Aldrin manie une <strong>épée</strong> ornée de runes, symbole de sa quête pour la justice. Infatigable défenseur des faibles, il incarne les idéaux chevaleresques de <strong>loyauté</strong> et d’<strong>honneur</strong>. Malgré ses exploits, Aldrin reste <strong>humble</strong>, conscient du poids de ses responsabilités. Toujours prêt à se sacrifier, il veille sur Port Saint-Doux, garant de la <strong>paix</strong> et de la <strong>sécurité</strong> dans un monde incertain.</p>",
                'level' => 1,
                'experience' => 0,
                'strength' => 14,
                'dexterity' => 10,
                'constitution' => 13,
                'wisdom' => 11,
                'intelligence' => 10,
                'charisma' => 12,
                'healthMax' => 130,
                'health' => 130,
                'manaMax' => 50,
                'mana' => 50,
                'fortune' => 100,
                'race' => 'race_humain',
                'profession' => 'profession_chevalier',
                'location' => 'location_zone_quartier_du_marche',
                'owner' => 'user_nicolas',
                'reference' => 'player_aldrin',
            ],
        ];

        foreach($characters as $data) {
            $character = new Player();
            $character->setName($data['name'])
                ->setPicture($data['picture'])
                ->setDescription($data['description'])
                ->setLevel($data['level'])
                ->setExperience($data['experience'])
                ->setStrength($data['strength'])
                ->setDexterity($data['dexterity'])
                ->setConstitution($data['constitution'])
                ->setWisdom($data['wisdom'])
                ->setIntelligence($data['intelligence'])
                ->setCharisma($data['charisma'])
                ->setHealthMax($data['healthMax'])
                ->setHealth($data['health'])
                ->setManaMax($data['manaMax'])
                ->setMana($data['mana'])
                ->setFortune($data['fortune'])
                ->setRace($this->getReference($data['race'], Race::class))
                ->setProfession($this->getReference($data['profession'], Profession::class))
                ->setLocation($this->getReference($data['location'], Location::class))
                ->setOwner($this->getReference($data['owner'], User::class));
            $manager->persist($character);
            $this->addReference($data['reference'], $character);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 90;
    }
}
