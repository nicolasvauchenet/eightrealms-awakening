<?php

namespace App\Service\Character;

use App\Entity\Character\Npc;
use App\Entity\Character\Player;

readonly class CharacterReputationService
{
    public function getReputation(Player $character, Npc $npc): int
    {
        $characterRaceAttitude = $character->getRace()->getAttitude();
        $characterProfessionAttitude = $character->getProfession()->getAttitude();
        $npcRaceAttitude = $npc->getRace()->getAttitude();
        $npcProfessionAttitude = $npc->getProfession()->getAttitude();
        $reputation = 0;

        $reputation += match (true) {
            $characterRaceAttitude === 'amical' && $npcRaceAttitude === 'amical' => 2,
            $characterRaceAttitude === 'hostile' && $npcRaceAttitude === 'amical' => -2,
            $characterRaceAttitude === 'hostile' && $npcRaceAttitude === 'hostile' => 1,
            default => 0,
        };

        if($characterProfessionAttitude === 'amical' && $npcProfessionAttitude === 'amical') $reputation += 2;
        else if($characterProfessionAttitude === 'hostile' && $npcProfessionAttitude === 'amical') $reputation -= 1;

        if($character->getCharisma() >= 12) $reputation += 1;
        else if($character->getCharisma() <= 9) $reputation -= 1;

        return $reputation;
    }

}
