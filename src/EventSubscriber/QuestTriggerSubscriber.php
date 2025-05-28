<?php

namespace App\EventSubscriber;

use App\Event\ItemReceivedEvent;
use App\Event\DialogStepReachedEvent;
use App\Event\CombatVictoryEvent;
use App\Event\EnterLocationEvent;
use App\Repository\Character\PlayerRepository;
use App\Service\Quest\QuestTriggerExecutor;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

readonly class QuestTriggerSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private PlayerRepository     $playerRepository,
        private QuestTriggerExecutor $executor
    )
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ItemReceivedEvent::class => 'onItemReceived',
            DialogStepReachedEvent::class => 'onDialogStepReached',
            CombatVictoryEvent::class => 'onCombatVictory',
            EnterLocationEvent::class => 'onEnterLocation',
        ];
    }

    public function onItemReceived(ItemReceivedEvent $event): void
    {
        $player = $this->playerRepository->find($event->getPlayerId());
        if(!$player) return;

        $this->executor->handle('add_item', $player, $event);
    }

    public function onDialogStepReached(DialogStepReachedEvent $event): void
    {
        $player = $this->playerRepository->find($event->playerId);
        if(!$player) return;

        $this->executor->handle('dialog_step', $player, $event);
    }

    public function onCombatVictory(CombatVictoryEvent $event): void
    {
        $player = $this->playerRepository->find($event->playerId);
        if(!$player) return;

        $this->executor->handle('combat_victory', $player, $event);
    }

    public function onEnterLocation(EnterLocationEvent $event): void
    {
        $player = $this->playerRepository->find($event->getPlayerId());
        if(!$player) return;

        $this->executor->handle('enter_location', $player, $event);
    }
}
