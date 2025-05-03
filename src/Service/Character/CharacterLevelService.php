<?php

namespace App\Service\Character;

use App\Entity\Character\Player;
use Doctrine\ORM\EntityManagerInterface;

readonly class CharacterLevelService
{
    private const LEVEL_MAX = 50;

    private const XP_TABLE = [
        1 => 0,
        2 => 75,
        3 => 200,
        4 => 450,
        5 => 800,
        6 => 1250,
        7 => 1800,
        8 => 2450,
        9 => 3200,
        10 => 4050,
        11 => 5000,
        12 => 6050,
        13 => 7200,
        14 => 8450,
        15 => 9800,
        16 => 11250,
        17 => 12800,
        18 => 14450,
        19 => 16200,
        20 => 18050,
        21 => 20000,
        22 => 22050,
        23 => 24200,
        24 => 26450,
        25 => 28800,
        26 => 31250,
        27 => 33800,
        28 => 36450,
        29 => 39200,
        30 => 42050,
        31 => 45000,
        32 => 48050,
        33 => 51200,
        34 => 54450,
        35 => 57800,
        36 => 61250,
        37 => 64800,
        38 => 68450,
        39 => 72200,
        40 => 76050,
        41 => 80000,
        42 => 84050,
        43 => 88200,
        44 => 92450,
        45 => 96800,
        46 => 101250,
        47 => 105800,
        48 => 110450,
        49 => 115200,
        50 => 120050,
    ];

    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function canLevelUp(Player $character): bool
    {
        $level = $character->getLevel();
        $xp = $character->getExperience();

        return isset(self::XP_TABLE[$level + 1]) && $xp >= self::XP_TABLE[$level + 1];
    }

    public function getRequiredXP(int $level): ?int
    {
        return self::XP_TABLE[$level] ?? null;
    }

    public function getLevelForXP(int $xp): int
    {
        foreach(self::XP_TABLE as $level => $xpRequired) {
            if($xp < $xpRequired) {
                return $level - 1;
            }
        }

        return self::LEVEL_MAX;
    }

    public function levelUp(Player $character): void
    {
        if(!$this->canLevelUp($character)) {
            return;
        }

        $newLevel = $character->getLevel() + 1;

        if($newLevel > self::LEVEL_MAX) {
            return;
        }

        // TODO: Offrir le choix entre augmenter un sort ou en apprendre un nouveau
        // TODO: Appliquer le plafond de +50 sur les caractéristiques

        $character->setLevel($newLevel);

        $this->entityManager->persist($character);
        $this->entityManager->flush();
    }
}
