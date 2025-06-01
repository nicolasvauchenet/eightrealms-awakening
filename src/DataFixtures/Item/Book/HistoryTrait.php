<?php

namespace App\DataFixtures\Item\Book;

trait HistoryTrait
{
    const HISTORY_BOOKS = [
        [
            'name' => "La Dynastie des Galdric",
            'picture' => 'book_author.png',
            'description' => "<p><em>Un ouvrage concis retraçant l'histoire des souverains portant le nom de Galdric, piliers fondateurs et gardiens du Royaume de l'Île du Nord.</em></p>",
            'type' => 'book',
            'price' => 10,
            'category' => 'category_book',
            'bookAuthor' => 'Mirel de Noirmont',
            'bookCategory' => 'Histoire et Mythes',
            'bookContent' => "<p><strong>Galdric Ier, dit le Bâtisseur</strong>, fut le premier à rassembler les Humains, les Elfes, les Nains et même certaines tribus Orques sous une même bannière. Visionnaire et déterminé, il fonda le Royaume de l'Île du Nord et fit ériger la citadelle de Port Saint-Doux. Nul ne sait comment il parvint à instaurer cette paix fragile entre ces peuples si opposés, mais certaines chroniques évoquent un mystérieux pacte avec une entité ancienne, voire démoniaque… D'aucuns murmurent qu'il lui aurait même bâti un Donjon, loin au nord, dans une région que peu osent encore parcourir. Son règne s'acheva brutalement, sa fin entachée de rumeurs de trahison, de magie interdite et d’un héritage scellé dans l’ombre.</p><p><strong>Galdric II</strong>, son fils unique, monta sur le trône à l’adolescence, peu après la disparition inexpliquée de son père lors d’une expédition au nord. Jeune mais farouche, il fit régner l’ordre et apaisa les tensions. Il offrit un quartier entier aux villageois de Plouc, transforma les anciens docks en un centre névralgique du commerce maritime, et fit ouvrir les Docks de l’Ouest. On lui attribue aussi la scellure d’un danger ancestral dans le tombeau même de Galdric Ier, au fond du Donjon de l’Âme. Il mourut entouré de respect, mais ses dernières paroles restent un mystère.</p><p><strong>Galdric III</strong> règne encore aujourd’hui, bien que nul ne l’ait vu depuis plusieurs lunes. Souverain érudit et discret, il s’est toujours montré fasciné par les secrets du passé, les arcanes anciennes et les artefacts oubliés. Sous son règne, la capitale s’est embellie et les écoles de magie ont prospéré. Mais depuis la disparition de son fils Alaric, des rumeurs sombres parcourent les tavernes. Le roi serait absent, caché, ou pire… tombé sous une malédiction.</p>",
            'reference' => 'book_chroniques_galdric',
        ],
    ];
}
