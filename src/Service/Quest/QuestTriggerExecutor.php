<?php

namespace App\Service\Quest;

use App\Entity\Character\Player;
use App\Entity\Quest\QuestStepTrigger;
use App\Service\Quest\TriggerHandler\QuestTriggerHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

readonly class QuestTriggerExecutor
{
    /**
     * @param iterable<QuestTriggerHandlerInterface> $handlers
     */
    public function __construct(
        #[AutowireIterator('app.quest_trigger_handler')]
        private iterable               $handlers,
        private EntityManagerInterface $entityManager,
    )
    {
    }

    public function handle(string $triggerType, Player $player, object $event): void
    {
        $triggers = $this->entityManager->getRepository(QuestStepTrigger::class)->findBy(['type' => $triggerType]);
        foreach($triggers as $trigger) {
            foreach($this->handlers as $handler) {
                if($handler->supports($trigger)) {
                    $handler->handle($trigger, $player, $event);
                    break;
                }
            }
        }
    }
}
