<?php

namespace App\Service\Riddle;

use App\Entity\Character\Player;
use App\Service\Game\Effect\Handler\EffectHandlerInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireLocator;

readonly class RiddleEffectApplierService
{
    /**
     * @param iterable<EffectHandlerInterface> $handlers
     */
    public function __construct(
        #[AutowireLocator('riddle_effect.handler')]
        private iterable $handlers,
    )
    {
    }

    public function applyEffects(?array $effects, Player $player, ?array $conditions = null): void
    {
        if(empty($effects)) return;

        foreach($effects as $type => $value) {
            foreach($this->handlers as $handler) {
                if($handler->supports($type)) {
                    $handler->apply($player, [
                        'value' => $value,
                        'conditions' => $conditions,
                    ]);
                    break;
                }
            }
        }
    }
}
