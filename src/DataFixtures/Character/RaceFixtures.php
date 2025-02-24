<?php

namespace App\DataFixtures\Character;

use App\Entity\Character\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RaceFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $races = [
            [
                'name' => 'Humain',
                'description' => "Les Humains sont polyvalents et adaptables, capables de s'épanouir dans presque toutes les conditions. Bien qu'ils n'excellent dans aucun domaine particulier, leur détermination et leur ingéniosité leur permettent de rivaliser avec les races les plus puissantes. Leur diversité culturelle et sociale en fait une race incroyablement variée, avec des héros, des érudits, des marchands et des guerriers.",
                'bonusStats' => [
                    'strength' => 0,
                    'dexterity' => 0,
                    'constitution' => 0,
                    'wisdom' => 0,
                    'intelligence' => 0,
                    'charisma' => 1,
                ],
                'playable' => true,
                'attitude' => 'amical',
                'reference' => 'race_humain',
            ],
            [
                'name' => 'Elfe',
                'description' => "Les Elfes, gracieux et élégants, sont souvent associés aux arts magiques et à une profonde connexion avec la nature. Leur longévité leur confère une sagesse unique, bien que certains les considèrent distants ou arrogants. Résidant dans des forêts mystiques ou des cités majestueuses, ils excellent en magie, en tir à l'arc et en furtivité, et sont souvent les gardiens des anciennes traditions.",
                'bonusStats' => [
                    'strength' => -1,
                    'dexterity' => 2,
                    'constitution' => -1,
                    'wisdom' => 1,
                    'intelligence' => 1,
                    'charisma' => 0,
                ],
                'bonusEffects' => [
                    'nightVision',
                ],
                'playable' => true,
                'attitude' => 'neutre',
                'reference' => 'race_elfe',
            ],
            [
                'name' => 'Nain',
                'description' => "Robustes et résilients, les Nains sont célèbres pour leur artisanat exceptionnel et leur amour des métaux précieux. Vivant dans des citadelles souterraines, ils sont des guerriers redoutables et des mineurs infatigables. Bien que parfois perçus comme têtus, leur loyauté et leur courage sont inébranlables. Leur affinité avec les montagnes et leur expertise en forge les rendent indispensables dans les alliances.",
                'bonusStats' => [
                    'strength' => 1,
                    'dexterity' => -1,
                    'constitution' => 2,
                    'wisdom' => 1,
                    'intelligence' => 0,
                    'charisma' => -1,
                ],
                'bonusEffects' => [
                    'nightVision',
                ],
                'playable' => true,
                'attitude' => 'neutre',
                'reference' => 'race_nain',
            ],
            [
                'name' => 'Orque',
                'description' => "Puissants et brutaux, les Orques sont une race forgée par les batailles et la survie dans des environnements hostiles. Leur force physique est légendaire, et leur esprit combatif les rend redoutables sur le champ de bataille. Bien que souvent vus comme sauvages, certains Orques cherchent à s'intégrer dans des sociétés civilisées, apportant leur courage et leur détermination.",
                'bonusStats' => [
                    'strength' => 2,
                    'dexterity' => 0,
                    'constitution' => 1,
                    'wisdom' => -1,
                    'intelligence' => -2,
                    'charisma' => -1,
                ],
                'playable' => true,
                'attitude' => 'hostile',
                'reference' => 'race_orque',
            ],
            [
                'name' => 'Halfelin',
                'description' => "Petits, discrets et agiles, les Halfelins sont souvent sous-estimés par les autres races. Dotés d'un sens de l'humour et d'une curiosité sans limites, ils sont parfaits pour les rôles de voleurs, éclaireurs ou marchands. Malgré leur taille modeste, leur bravoure et leur capacité à trouver des solutions créatives dans des situations difficiles en font de précieux alliés.",
                'bonusStats' => [
                    'strength' => -2,
                    'dexterity' => 2,
                    'constitution' => 0,
                    'wisdom' => 1,
                    'intelligence' => 0,
                    'charisma' => 1,
                ],
                'playable' => true,
                'attitude' => 'amical',
                'reference' => 'race_halfelin',
            ],
            [
                'name' => 'Gnome',
                'description' => "Les Gnomes, petits mais brillants, sont des experts en magie et en technologie. Leur curiosité insatiable et leur créativité débordante les mènent souvent à des découvertes fascinantes. Ils sont appréciés pour leur sens de l'humour et leur optimisme, bien que leur nature excentrique puisse parfois dérouter leurs alliés.",
                'bonusStats' => [
                    'strength' => -2,
                    'dexterity' => 1,
                    'constitution' => 1,
                    'wisdom' => 0,
                    'intelligence' => 2,
                    'charisma' => -1,
                ],
                'playable' => true,
                'attitude' => 'amical',
                'reference' => 'race_gnome',
            ],
        ];

        foreach($races as $data) {
            $race = new Race();
            $race->setName($data['name'])
                ->setDescription($data['description'])
                ->setBonusStats($data['bonusStats'] ?? null)
                ->setBonusEffects($data['bonusEffects'] ?? null)
                ->setPlayable($data['playable'])
                ->setAttitude($data['attitude']);
            $manager->persist($race);
            $this->addReference($data['reference'], $race);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
    }
}
