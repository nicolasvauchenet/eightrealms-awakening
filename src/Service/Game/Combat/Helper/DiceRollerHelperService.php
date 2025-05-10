<?php

namespace App\Service\Game\Combat\Helper;

use Random\RandomException;

readonly class DiceRollerHelperService
{
    /**
     * @throws RandomException
     */
    public function rollDice(int $faces = 20, int $bonus = 0): array
    {
        $natural = random_int(1, $faces);
        $total = $natural + $bonus;

        return [
            'natural' => $natural,
            'total' => $total,
            'isCriticalSuccess' => ($faces === 20 && $natural === 20),
            'isCriticalFailure' => ($faces === 20 && $natural === 1),
        ];
    }
}
