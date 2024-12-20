<?php

namespace App\Service\Spell;

use App\Entity\Character\Character;
use App\Repository\Spell\CharacterSpellRepository;

class CharacterSpellService
{
    private CharacterSpellRepository $characterSpellRepository;

    public function __construct(CharacterSpellRepository $characterSpellRepository)
    {
        $this->characterSpellRepository = $characterSpellRepository;
    }

    public function getCharacterSpells(Character $character): array
    {
        return $this->characterSpellRepository->findCharacterSpells($character);
    }
}
