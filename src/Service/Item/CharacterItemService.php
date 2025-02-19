<?php

namespace App\Service\Item;

use App\Entity\Character\Character;
use App\Entity\Item\CharacterItem;
use Doctrine\ORM\EntityManagerInterface;

readonly class CharacterItemService
{
    public function __construct(private EntityManagerInterface $manager)
    {
    }

    public function getCharacterItems(Character $character): array
    {
        return $this->manager->getRepository(CharacterItem::class)->findCharacterItemsByCategories($character);
    }

    public function getEquippedWeapons(Character $character, ?bool $isMagical = false): array
    {
        return $this->manager->getRepository(CharacterItem::class)->findEquippedWeapons($character, $isMagical);
    }
}
