<?php

namespace App\Service\Game\Conditions;

use App\Entity\Character\Player;
use App\Service\Game\Conditions\Handler\ConditionHandlerInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireLocator;

readonly class ConditionEvaluatorService
{
    public function __construct(
        #[AutowireLocator('condition.handler')]
        private iterable $handlers,
    )
    {
    }

    public function isValid(?array $conditions, Player $player): bool
    {
        if(empty($conditions)) {
            return true;
        }

        foreach($conditions as $type => $value) {
            if(!$this->evaluate($type, $value, $player)) {
                return false;
            }
        }

        return true;
    }

    private function evaluate(string $type, mixed $value, Player $player): bool
    {
        if($type === 'any') {
            return $this->evaluateAny($value, $player);
        }

        if($type === 'all') {
            return $this->evaluateAll($value, $player);
        }

        foreach($this->handlers as $handler) {
            if($handler->supports($type)) {
                return $handler->evaluate($player, $value);
            }
        }

        throw new \RuntimeException("Aucun condition handler pour [$type]");
    }

    private function evaluateAny(mixed $conditions, Player $player): bool
    {
        if(!is_array($conditions)) return false;
        if(array_keys($conditions) === array_filter(array_keys($conditions), 'is_string')) {
            $conditions = [$conditions];
        }

        foreach($conditions as $subCondition) {
            foreach($subCondition as $type => $value) {
                if($this->evaluate($type, $value, $player)) {
                    return true;
                }
            }
        }

        return false;
    }

    private function evaluateAll(mixed $conditions, Player $player): bool
    {
        if(!is_array($conditions)) return false;
        if(array_keys($conditions) === array_filter(array_keys($conditions), 'is_string')) {
            $conditions = [$conditions];
        }

        foreach($conditions as $subCondition) {
            foreach($subCondition as $type => $value) {
                if(!$this->evaluate($type, $value, $player)) {
                    return false;
                }
            }
        }

        return true;
    }
}
