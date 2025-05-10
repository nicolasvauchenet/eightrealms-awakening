<?php

namespace App\Service\Character;

use App\Entity\Character\Player;
use Doctrine\ORM\EntityManagerInterface;

readonly class CharacterLevelService
{
    private const LEVEL_MAX = 50;

    private const XP_TABLE = [
        1 => 0,
        2 => 60,
        3 => 132,
        4 => 221,
        5 => 333,
        6 => 474,
        7 => 651,
        8 => 874,
        9 => 1152,
        10 => 1498,
        11 => 1927,
        12 => 2453,
        13 => 3099,
        14 => 3886,
        15 => 4843,
        16 => 6005,
        17 => 7410,
        18 => 9102,
        19 => 11123,
        20 => 13564,
        21 => 16531,
        22 => 20138,
        23 => 24521,
        24 => 29845,
        25 => 36314,
        26 => 44177,
        27 => 53756,
        28 => 65457,
        29 => 79796,
        30 => 97365,
        31 => 118938,
        32 => 145269,
        33 => 177332,
        34 => 216336,
        35 => 263803,
        36 => 321579,
        37 => 391995,
        38 => 477934,
        39 => 582921,
        40 => 711264,
        41 => 868237,
        42 => 1060249,
        43 => 1299058,
        44 => 1592103,
        45 => 1951855,
        46 => 2394291,
        47 => 2939935,
        48 => 3615918,
        49 => 4458101,
        50 => 5513861,
    ];

    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function canLevelUp(Player $character): bool
    {
        return $this->getPendingLevelUps($character) > 0;
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

        $character->setLevel($newLevel);

        $this->entityManager->persist($character);
        $this->entityManager->flush();
    }

    public function getLevelUpStatGain(int $level): array
    {
        return match (true) {
            $level <= 4 => ['count' => 1, 'points' => 1],
            $level <= 9 => ['count' => 1, 'points' => 2],
            $level <= 14 => ['count' => 2, 'points' => 1],
            $level <= 24 => ['count' => 2, 'points' => 2],
            $level <= 34 => ['count' => 3, 'points' => 1],
            $level <= 44 => ['count' => 3, 'points' => 2],
            $level <= 50 => ['count' => 3, 'points' => 3],
        };
    }

    public function getPendingLevelUps(Player $character): int
    {
        $currentLevel = $character->getLevel();
        $xp = $character->getExperience();

        $maxReachableLevel = $this->getLevelForXP($xp);

        return max(0, $maxReachableLevel - $currentLevel);
    }
}
