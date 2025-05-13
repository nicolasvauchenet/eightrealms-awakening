<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Map;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MapFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $maps = [
            // Royaume
            [
                'name' => "Royaume de l'Île du Nord",
                'picture' => 'royaume-de-l-ile-du-nord.png',
                'description' => "<p>Cette carte finement tracée dévoile les secrets du petit Royaume de l'Île du Nord. Très pratique pour quiconque souhaite percer les mystères de l'île.</p>",
                'type' => 'realm',
                'price' => 1000,
                'category' => 'category_map',
                'thumbnail' => 'realm.png',
                'reference' => 'map_royaume_de_lile_du_nord',
            ],

            // Lieu
            [
                'name' => 'Port Saint-Doux',
                'picture' => 'port-saint-doux.png',
                'description' => "<p>Ce parchemin révèle les moindres détails de la capitale Port Saint-Doux, ses quais animés, ses marchés colorés et ses ruelles labyrinthiques. Un indispensable pour quiconque souhaite explorer ses richesses ou éviter ses pièges.</p>",
                'type' => 'location',
                'price' => 500,
                'category' => 'category_map',
                'thumbnail' => 'city.png',
                'reference' => 'map_port_saint_doux',
            ],
            [
                'name' => 'Plouc',
                'description' => "<p>Cette carte montre les quelques maisons de Plouc, un village perdu à l'ouest de l'Île du Nord. Un endroit idéal pour se reposer et se ressourcer. Ou pour pêcher…</p>",
                'picture' => 'plouc.png',
                'type' => 'location',
                'price' => 250,
                'category' => 'category_map',
                'thumbnail' => 'village.png',
                'reference' => 'map_plouc',
            ],
            [
                'name' => 'Bois du Pendu',
                'description' => "<p>Cette carte ancienne révèle les sentiers tortueux du Bois du Pendu, une forêt lugubre au cœur de l’Île du Nord. On y voit des arbres tordus, des clairières oubliées… et un vieux symbole tracé à l’encre noire, à l’endroit même où les rumeurs parlent de pendus qui chuchotent dans le vent.</p><p>Un lieu que beaucoup préfèrent éviter. Mais parfois, les secrets les plus précieux se cachent là où personne ne veut chercher.</p>",
                'picture' => 'bois-du-pendu.png',
                'type' => 'location',
                'price' => 350,
                'category' => 'category_map',
                'thumbnail' => 'forest.png',
                'reference' => 'map_bois_du_pendu',
            ],
            [
                'name' => 'Sables Chauds',
                'description' => "<p>Une vieille carte enroulée, griffonnée de symboles à moitié effacés par le temps. Elle représente un désert bordé par la mer, ponctué de quelques repères : une oasis, les restes d’un camp, et une plage que le cartographe appelle sobrement &laquo;&nbsp;Plage de la Sirène&nbsp;&raquo;.</p>",
                'picture' => 'sables-chauds.png',
                'type' => 'location',
                'price' => 350,
                'category' => 'category_map',
                'thumbnail' => 'desert.png',
                'reference' => 'map_sables_chauds',
            ],
            [
                'name' => 'Monts Terribles',
                'description' => "<p>Ce vieux parchemin représente l'une des régions les plus inhospitalières du royaume. Les Monts Terribles sont un enchevêtrement de crêtes acérées, de gouffres insondables et de pics battus par des vents féroces. Rares sont ceux qui en sont revenus… et encore plus rares ceux qui ont osé y retourner. Mais il se murmure qu’au cœur de ces hauteurs maudites, gisent des secrets oubliés, des reliques de civilisations perdues, et des bêtes qu’aucun homme n’a jamais domptées.</p>",
                'picture' => 'monts-terribles.png',
                'type' => 'location',
                'price' => 350,
                'category' => 'category_map',
                'thumbnail' => 'mountain.png',
                'reference' => 'map_monts_terribles',
            ],
            [
                'name' => "Donjon de l'Âme",
                'description' => "<p>Ce plan ancien dévoile les sinistres entrailles du Donjon de l’Âme. On y distingue plusieurs salles reliées par de petits couloirs, comme un enchaînement de pièges conçu pour mener les imprudents à leur perte.</p><p>La carte ne révèle ni comment y entrer, ni ce qui s’y cache vraiment. Mais les noms suffisent à glacer le sang. Un avertissement, ou une invitation…</p>",
                'picture' => 'donjon-de-lame.png',
                'type' => 'location',
                'price' => 5000,
                'category' => 'category_map',
                'thumbnail' => 'dungeon.png',
                'reference' => 'map_donjon_de_l_ame',
            ],
        ];

        foreach($maps as $data) {
            $map = new Map();
            $map->setName($data['name'])
                ->setPicture($data['picture'])
                ->setDescription($data['description'])
                ->setType($data['type'])
                ->setPrice($data['price'])
                ->setCategory($this->getReference($data['category'], Category::class))
                ->setThumbnail($data['thumbnail']);
            $manager->persist($map);
            $this->addReference($data['reference'], $map);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 13;
    }
}
