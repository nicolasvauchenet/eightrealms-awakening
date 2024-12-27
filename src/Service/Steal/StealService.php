<?php

namespace App\Service\Steal;

use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Service\Location\CharacterLocationReputationService;
use Doctrine\ORM\EntityManagerInterface;
use Random\RandomException;

class StealService
{
    private EntityManagerInterface $entityManager;
    private CharacterLocationReputationService $characterLocationReputationService;

    public function __construct(EntityManagerInterface             $entityManager,
                                CharacterLocationReputationService $characterLocationReputationService)
    {
        $this->entityManager = $entityManager;
        $this->characterLocationReputationService = $characterLocationReputationService;
    }

    /**
     * @throws RandomException
     */
    public function steal(PlayerNpc $npc, Player $character, int $difficulty)
    {
        //TODO: Implement the steal items logic
        $profession = $npc->getNpc()->getProfession();
        $isMerchant = ($profession && $profession->getName() === 'Marchand');
        $canStealItem = $isMerchant && $character->getLevel() >= 5;
        $willStealItem = false;
        if ($canStealItem) {
            $willStealItem = (bool) random_int(0, 1);
        }

        $crowns = $npc->getFortune();
        if($crowns > 0) {
            $baseDifficulty = $difficulty;

            $localeReputation = $this->characterLocationReputationService->getTotalReputation($character, $character->getCurrentPlace()->getLocation());
            $repMalus = $localeReputation < 0 ? 2 : 0;

            $maxCrowns = (int)floor($crowns * 0.25);
            $maxCrowns = max($maxCrowns, 1);
            $stolenCrowns = random_int(1, $maxCrowns);

            $totalMalus = $repMalus;
            $finalDifficulty = $baseDifficulty + $totalMalus;

            $dexScore = $character->getDexterity();
            $dexBonus = (int)floor(($dexScore - 10) / 2);
            $level = $character->getLevel();
            $levelBonus = (int)floor($level / 2);

            $d20 = random_int(1, 20);
            $stealRoll = $d20 + $dexBonus + $levelBonus;

            if($stealRoll >= $finalDifficulty) {
                $character->setFortune($character->getFortune() + $stolenCrowns);
                $character->setExperience($character->getExperience() + $stolenCrowns);
                $npc->setFortune($npc->getFortune() - $stolenCrowns);
                $this->entityManager->persist($character);
                $this->entityManager->persist($npc);
                $this->entityManager->flush();

                return ['success' => true, 'stolenCrowns' => $stolenCrowns];
            } else {
                return ['success' => false, 'stolenCrowns' => 0];
            }
        } else {
            return ['success' => true, 'stolenCrowns' => 0];
        }
    }
}
