<?php

namespace App\EventSubscriber;

use App\Entity\Character\Player;
use App\Event\CombatVictoryEvent;
use App\Event\DialogStepReachedEvent;
use App\Event\ItemReceivedEvent;
use App\Entity\Quest\QuestStepTrigger;
use App\Service\Quest\QuestProgressionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

readonly class QuestTriggerSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private EntityManagerInterface  $entityManager,
        private QuestProgressionService $questProgressionService
    )
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ItemReceivedEvent::class => 'onItemReceived',
            DialogStepReachedEvent::class => 'onDialogStepReached',
            CombatVictoryEvent::class => 'onCombatVictory',
        ];
    }

    public function onItemReceived(ItemReceivedEvent $event): void
    {
        $player = $this->entityManager->getRepository(Player::class)->find($event->getPlayerId());
        if(!$player) {
            return;
        }

        $slug = $event->getItemSlug();
        $triggers = $this->entityManager->getRepository(QuestStepTrigger::class)->findBy(['type' => 'add_item']);

        foreach($triggers as $trigger) {
            $payload = $trigger->getPayload();
            if(($payload['slug'] ?? null) !== $slug) {
                continue;
            }

            $step = $trigger->getQuestStep();
            if(!$step) {
                continue;
            }

            $quest = $step->getQuest();
            $this->questProgressionService->startQuestStep($player, [
                'quest' => $quest->getSlug(),
                'quest_step' => $step->getPosition(),
            ]);
        }
    }

    public function onDialogStepReached(DialogStepReachedEvent $event): void
    {
        $player = $this->entityManager->getRepository(Player::class)->find($event->playerId);
        if(!$player) {
            return;
        }

        $triggers = $this->entityManager
            ->getRepository(QuestStepTrigger::class)
            ->findBy(['type' => 'dialog_step']);

        foreach($triggers as $trigger) {
            $payload = $trigger->getPayload();
            if(($payload['slug'] ?? null) !== $event->dialogStepSlug) {
                continue;
            }

            $step = $trigger->getQuestStep();
            $quest = $step?->getQuest();

            if($step && $quest) {
                $this->questProgressionService->startQuestStep($player, [
                    'quest' => $quest->getSlug(),
                    'quest_step' => $step->getPosition(),
                ]);
            }
        }
    }

    public function onCombatVictory(CombatVictoryEvent $event): void
    {
        $player = $this->entityManager->getRepository(Player::class)->find($event->playerId);
        if(!$player) {
            return;
        }

        $triggers = $this->entityManager
            ->getRepository(QuestStepTrigger::class)
            ->findBy(['type' => 'combat_victory']);

        foreach($triggers as $trigger) {
            $payload = $trigger->getPayload();
            if(($payload['slug'] ?? null) !== $event->combatSlug) {
                continue;
            }

            $step = $trigger->getQuestStep();
            $quest = $step?->getQuest();

            if($step && $quest) {
                $this->questProgressionService->startQuestStep($player, [
                    'quest' => $quest->getSlug(),
                    'quest_step' => $step->getPosition(),
                ]);
            }
        }
    }
}
