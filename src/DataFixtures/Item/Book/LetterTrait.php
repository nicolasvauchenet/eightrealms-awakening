<?php

namespace App\DataFixtures\Item\Book;

trait LetterTrait
{
    const LETTER_BOOKS = [
        [
            'name' => "Note anonyme",
            'picture' => 'book_letter.png',
            'description' => "<p><em>Cette note griffonnée, mais écrite d'une plume apparemment soignée dans une écriture étrange, a bien failli disparaître complètement sous les effets de l'humidité. Et de toute façon, elle est illisible.</em></p>",
            'type' => 'letter',
            'price' => 0,
            'category' => 'category_book',
            'bookAuthor' => 'Anonyme',
            'bookCategory' => 'Note',
            'bookContent' => "<p>…svenûl dræth ven saar… qël doran thrim’naç el’thur… skalen dë vor, qet nar tombâ’r…<br/>~A.</p>",
            'reference' => 'note_anonyme',
        ],
    ];
}
