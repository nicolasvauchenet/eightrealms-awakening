<?php

namespace App\Service\Location;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Location\CharacterLocation;
use App\Repository\Location\CharacterLocationRepository;
use App\Service\Game\Conditions\ConditionEvaluatorService;

readonly class CharacterLocationSelectorService
{
    public function __construct(
        private CharacterLocationRepository $characterLocationRepository,
        private ConditionEvaluatorService   $conditionEvaluator,
    )
    {
    }

    public function getValidLocationForCharacter(Character $character, Player $player): ?CharacterLocation
    {
        $locations = $this->characterLocationRepository->findBy(['character' => $character]);

        foreach($locations as $charLoc) {
            $conditions = $charLoc->getConditions();

            if(!$conditions || $this->conditionEvaluator->isValid($conditions, $player)) {
                return $charLoc;
            }
        }

        return null;
    }
}
