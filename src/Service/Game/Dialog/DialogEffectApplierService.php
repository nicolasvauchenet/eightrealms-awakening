<?php

namespace App\Service\Game\Dialog;

use App\Entity\Character\Player;
use App\Service\Item\CharacterInventoryService;
use App\Service\Location\LocationService;
use App\Service\Quest\QuestProgressionService;
use Doctrine\ORM\EntityManagerInterface;

readonly class DialogEffectApplierService
{
    public function __construct(
        private EntityManagerInterface    $entityManager,
        private QuestProgressionService   $questProgressionService,
        private CharacterInventoryService $inventoryService,
        private LocationService           $locationService,
    )
    {
    }

    public function applyEffects(?array $effects, Player $player): void
    {
        if(empty($effects)) {
            return;
        }

        foreach($effects as $type => $value) {
            $this->apply($type, $value, $player);
        }

        $this->entityManager->flush();
    }

    private function apply(string $type, mixed $value, Player $player): void
    {
        match ($type) {
            'reveal_location' => $this->locationService->revealLocation($player, $value),
            'start_quest' => $this->questProgressionService->startQuest($player, $value),
            'start_quest_step' => $this->questProgressionService->startQuestStep($player, $value),
            'edit_quest_step_status' => $this->questProgressionService->editQuestStepStatus($player, $value),
            'reward_quest' => $this->questProgressionService->rewardQuest($player, $value),
            'add_items' => $this->addItems($player, $value),
            'remove_items' => $this->removeItems($player, $value),
            default => null,
        };
    }

    private function addItems(Player $player, array $items): void
    {
        foreach($items as $data) {
            if(!isset($data['item'])) {
                continue;
            }

            $itemSlug = $data['item'];
            $isQuestItem = $data['questItem'] ?? false;

            $this->inventoryService->addItem($player, $itemSlug, $isQuestItem);
        }
    }

    private function removeItems(Player $player, array $items): void
    {
        foreach($items as $slug) {
            $this->inventoryService->removeItem($player, $slug);
        }
    }
}
