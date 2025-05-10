<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\Book\DiaryTrait;
use App\DataFixtures\Item\Book\LetterTrait;
use App\Entity\Item\Book;
use App\Entity\Item\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture implements OrderedFixtureInterface
{
    use DiaryTrait;
    use LetterTrait;

    public function load(ObjectManager $manager): void
    {
        $allBooks = [
            // Journaux
            self::DIARY_BOOKS,

            // Lettre & Notes
            self::LETTER_BOOKS,
        ];

        foreach($allBooks as $books) {
            foreach($books as $data) {
                $book = new Book();
                $book->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setPrice($data['price'])
                    ->setCategory($this->getReference($data['category'], Category::class))
                    ->setThumbnail($data['picture']);
                $manager->persist($book);
                $this->addReference($data['reference'], $book);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 22;
    }
}
