<?php

namespace App\Service\Game\Dialog;

use App\Entity\Character\Player;
use App\Service\Game\Dialog\Handler\DialogEffectHandlerInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireLocator;

readonly class DialogEffectApplierService
{
    /**
     * @param iterable<DialogEffectHandlerInterface> $handlers
     */
    public function __construct(
        #[AutowireLocator('dialog_effect.handler')]
        private iterable $handlers,
    )
    {
    }

    public function applyEffects(?array $effects, Player $player): void
    {
        if(empty($effects)) return;

        foreach($effects as $type => $value) {
            foreach($this->handlers as $handler) {
                if($handler->supports($type)) {
                    $handler->apply($player, $value);
                    break;
                }
            }
        }
    }
}
