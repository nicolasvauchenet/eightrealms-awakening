<?php

namespace App\Service\Spell;

use App\Entity\Character\Character;
use App\Repository\Spell\CharacterSpellRepository;

class CharacterSpellService
{
    public function __construct(private CharacterSpellRepository $characterSpellRepository)
    {
    }

    public function getCharacterSpells(Character $character): array
    {
        return $this->characterSpellRepository->findCharacterSpellsByCategories($character);
    }
}
