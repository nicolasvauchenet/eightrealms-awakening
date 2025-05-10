<?php

namespace App\DataFixtures\Item\Book;

trait LetterTrait
{
    const LETTER_BOOKS = [
        [
            'name' => "Note d'Alaric",
            'picture' => 'book_letter.png',
            'description' => "<p><em>Les druides parleront. La clé ouvre plus que des portes. Si je tombe, que l’on me comprenne.</em></p><p><em>Alaric</em></p>",
            'type' => 'letter',
            'price' => 0,
            'category' => 'category_book',
            'reference' => 'note_d_alaric',
        ],
    ];
}
