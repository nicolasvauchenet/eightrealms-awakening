<?php

namespace App\Service\Character;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Service\Quest\CharacterQuestService;

class CharacterDescriptionVariantService
{
    public function __construct(private CharacterQuestService $questService)
    {
    }

    public function getVariantDescription(Player $player, Character $character): ?string
    {
        $slug = $character->getSlug();

        $variantRules = [
            'bilo-le-passant' => fn() => $this->questStatusIs($player, 'banquet-inaugural', 'progress'),
            'maire-de-port-saint-doux' => fn() => $this->questStatusIs($player, 'banquet-inaugural', 'progress'),
            'pecheur' => fn() => $this->questStatusIs($player, 'banquet-inaugural', 'progress'),
        ];

        if(isset($variantRules[$slug]) && $variantRules[$slug]()) {
            return $character->getDescriptionAlt() ?? $character->getDescription();
        }

        return $character->getDescription();
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
