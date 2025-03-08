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
            $characterRaceAttitude === 'amical' && $npcRaceAttitude === 'amical', $characterRaceAttitude === 'hostile' && $npcRaceAttitude === 'hostile' => 1,
            $characterRaceAttitude === 'hostile' && $npcRaceAttitude === 'amical', $characterRaceAttitude === 'hostile' && $npcRaceAttitude === 'neutre' => -1,
            default => 0,
        };

        $reputation += match (true) {
            $characterProfessionAttitude === 'amical' && $npcProfessionAttitude === 'amical', $characterProfessionAttitude === 'hostile' && $npcProfessionAttitude === 'hostile' => 1,
            $characterProfessionAttitude === 'hostile' && $npcProfessionAttitude === 'amical', $characterProfessionAttitude === 'hostile' && $npcProfessionAttitude === 'neutre' => -1,
            default => 0,
        };

        if($character->getCharisma() >= 15) $reputation += 1;
        else if($character->getCharisma() <= 9) $reputation -= 1;

        return $reputation;
    }

}
