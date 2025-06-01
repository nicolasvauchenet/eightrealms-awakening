<?php

namespace App\DataFixtures\Item\Book;

trait LetterTrait
{
    const LETTER_BOOKS = [
        [
            'name' => "Note d'Alaric",
            'picture' => 'book_letter.png',
            'description' => "<p><em>Cette note griffonnée mais écrite d'une plume apparemment soignée a bien failli disparaître sous les effets de l'humidité, mais elle reste lisible.</em></p>",
            'type' => 'letter',
            'price' => 0,
            'category' => 'category_book',
            'bookAuthor' => 'Alaric',
            'bookCategory' => 'Note',
            'bookContent' => "<p>Les druides parleront. Ils connaissent le rituel. Et la clé ouvre plus que des portes, je dois la trouver aussi. Je vais aller voir ce Grand Druide. Si je tombe, que l’on me comprenne. Je fais cela pour la gloire du Royaume. Pour qu'il retrouve son éclat et que le Roi obtienne le respect qui lui est dû.<br/>Alaric</p>",
            'reference' => 'note_d_alaric',
        ],
    ];
}
