<?php

namespace App\Twig\Extensions;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Quest\PlayerQuest;
use App\Service\Character\CharacterReputationService;
use App\Service\Game\Conditions\ConditionEvaluatorService;
use App\Service\Quest\CharacterQuestService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ImageVariantExtension extends AbstractExtension
{
    public function __construct(private readonly CharacterQuestService      $questService,
                                private readonly ConditionEvaluatorService  $conditionEvaluatorService,
                                private readonly CharacterReputationService $characterReputationService
    )
    {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('variant_picture_for_character', $this->getCharacterPicture(...)),
            new TwigFunction('variant_picture_for_location', $this->getLocationPicture(...)),
        ];
    }

    public function getCharacterPicture(Player $player, Character $character): string
    {
        switch($character->getSlug()) {
            case 'chef-gobelin':
                $quest = $this->getLivraisonQuest($player);
                if($quest && $quest->getStatus() === 'rewarded') {
                    return $this->insertAltSuffix($character->getPicture());
                }
                break;
            default:
                break;
        }

        if($this->characterReputationService->getReputation($player, $character) < -5) {
            return $character->getPictureAngry();
        }

        return $character->getPicture();
    }

    public function getLocationPicture(Player $player, Location $location): string
    {
        $characterSlugs = [
            'chef-gobelin',
            'gerard-le-pecheur',
        ];

        $hasMatchingCharacter = false;
        foreach($location->getCharacterLocations() as $characterLocation) {
            $character = $characterLocation->getCharacter();
            if(!$character || !in_array($character->getSlug(), $characterSlugs, true)) {
                continue;
            }
            $hasMatchingCharacter = true;
            $conditions = $characterLocation->getConditions();
            if(!$conditions || $this->conditionEvaluatorService->isValid($conditions, $player)) {
                return $location->getPicture();
            }
        }

        if($hasMatchingCharacter) {
            return $this->insertAltSuffix($location->getPicture());
        }

        return $location->getPicture();
    }

    private function insertAltSuffix(string $path): string
    {
        return preg_replace('/(\.[a-z0-9]+)$/i', '_alt$1', $path);
    }

    private function getLivraisonQuest(Player $player): ?PlayerQuest
    {
        foreach($this->questService->getPlayerSideQuests($player) as $pq) {
            if($pq->getQuest()->getSlug() === 'livraison-en-cours') {
                return $pq;
            }
        }

        foreach($this->questService->getPlayerSideQuests($player, true) as $pq) {
            if($pq->getQuest()->getSlug() === 'livraison-en-cours') {
                return $pq;
            }
        }

        return null;
    }
}
