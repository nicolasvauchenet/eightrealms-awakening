<?php

namespace App\Service\Spell;

use App\Entity\Character\Character;
use App\Repository\Spell\CharacterSpellRepository;

readonly class CharacterSpellService
{
    public function __construct(private CharacterSpellRepository $characterSpellRepository)
    {
    }

    public function getCharacterSpells(Character $character): array
    {
        return $this->characterSpellRepository->findCharacterSpellsByCategories($character);
    }

    public function getCastableSpells(Character $character): array
    {
        $characterSpells = [];

        foreach($character->getCharacterSpells() as $characterSpell) {
            if($character->getMana() >= ($characterSpell->getManaCost()) + $characterSpell->getSpell()->getManaCost()) {
                $characterSpells[] = $characterSpell;
            }
        }

        return $characterSpells;
    }
}
