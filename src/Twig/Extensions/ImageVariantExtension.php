<?php

namespace App\Twig\Extensions;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Service\Character\CharacterReputationService;
use App\Service\Game\Condition\ConditionEvaluatorService;
use App\Service\Quest\CharacterQuestService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ImageVariantExtension extends AbstractExtension
{
    public function __construct(
        private readonly CharacterQuestService      $questService,
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
        $slug = $character->getSlug();

        $variantRules = [
            'chef-gobelin' => fn() => $this->questStatusIs($player, 'livraison-en-cours', 'rewarded'),
            'bilo-le-passant' => fn() => $this->questStatusIs($player, 'banquet-inaugural', 'progress'),
            'maire-de-port-saint-doux' => fn() => $this->questStatusIs($player, 'banquet-inaugural', 'progress'),
            'pecheur' => fn() => $this->questStatusIs($player, 'banquet-inaugural', 'progress'),
        ];

        if(isset($variantRules[$slug]) && $variantRules[$slug]()) {
            return $this->insertAltSuffix($character->getPicture());
        }

        if(
            $character->getPictureAngry() &&
            $this->characterReputationService->getReputation($player, $character) < -5
        ) {
            return $character->getPictureAngry();
        }

        return $character->getPicture();
    }

    public function getLocationPicture(Player $player, Location $location): string
    {
        $characterSlugs = [
            'chef-gobelin',
            'gerard-le-pecheur',
            'bilo-le-passant',
            'maire-de-port-saint-doux',
            'pecheur',
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

        return $hasMatchingCharacter
            ? $this->insertAltSuffix($location->getPicture())
            : $location->getPicture();
    }

    private function insertAltSuffix(string $path): string
    {
        return preg_replace('/(\.[a-z0-9]+)$/i', '_alt$1', $path);
    }

    private function questStatusIs(Player $player, string $questSlug, string $status): bool
    {
        $quests = array_merge(
            $this->questService->getPlayerSideQuests($player),
            $this->questService->getPlayerSideQuests($player, true)
        );

        foreach($quests as $pq) {
            if($pq->getQuest()->getSlug() === $questSlug && $pq->getStatus() === $status) {
                return true;
            }
        }

        return false;
    }
}
