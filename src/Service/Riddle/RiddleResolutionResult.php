<?php

namespace App\Service\Riddle;

class RiddleResolutionResult
{
    public function __construct(
        public bool   $success,
        public int    $roll,
        public int    $statValue,
        public int    $total,
        public int    $difficulty,
        public string $log,
    )
    {
    }
}

