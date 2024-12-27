<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Scene\Scene;
use App\Repository\Character\PlayerCreatureRepository;
use App\Repository\Character\PlayerNpcRepository;

class CombatSceneService
{
    private PlayerNpcRepository $playerNpcRepository;
    private PlayerCreatureRepository $playerCreatureRepository;

    public function __construct(PlayerNpcRepository      $playerNpcRepository,
                                PlayerCreatureRepository $playerCreatureRepository)
    {
        $this->playerNpcRepository = $playerNpcRepository;
        $this->playerCreatureRepository = $playerCreatureRepository;
    }

    public function getSceneNpcs(Scene $scene, Player $player): array
    {
        return $this->playerNpcRepository->findBy(['scene' => $scene, 'player' => $player]);
    }

    public function getSceneCreatures(Scene $scene, Player $player): array
    {
        return $this->playerCreatureRepository->findBy(['scene' => $scene, 'player' => $player]);
    }
}
