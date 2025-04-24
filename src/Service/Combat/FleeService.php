<?php

namespace App\Service\Combat;

use App\Entity\Combat\PlayerCombat;
use App\Service\Combat\Effect\CombatEffectService;
use Random\RandomException;

readonly class FleeService
{
    public function __construct(
        private InitiativeService   $initiativeService,
        private CombatEffectService $combatEffectService
    )
    {
    }

    /**
     * @throws RandomException
     */
    public function flee(PlayerCombat $playerCombat): bool
    {
        $player = $playerCombat->getPlayer();

        // Vérifie si le joueur est invisible
        $effects = $this->combatEffectService->getActiveEffectEntities($playerCombat);

        foreach($effects as $effect) {
            if($effect->getTarget() === 'invisibility') {
                // Supprime l'effet d'invisibilité
                $this->combatEffectService->removeEffect($effect);

                return true;
            }
        }

        // Sinon, vérifie si c’est bien au joueur de jouer
        $initiative = $this->initiativeService->getTurnOrder($playerCombat);

        return isset($initiative[0]) && $initiative[0]['type'] === 'player' && $initiative[0]['id'] === $player->getId();
    }
}
