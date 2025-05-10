<?php

namespace App\Service\Game\Dialog;

use App\Entity\Character\Player;
use App\Entity\Location\CharacterLocation;
use App\Entity\Location\Location;
use App\Service\Item\CharacterInventoryService;
use App\Service\Quest\QuestProgressionService;
use Doctrine\ORM\EntityManagerInterface;

readonly class DialogEffectApplierService
{
    public function __construct(
        private EntityManagerInterface    $entityManager,
        private QuestProgressionService   $questProgressionService,
        private CharacterInventoryService $inventoryService
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
            'reveal_location' => $this->revealLocation($player, $value),
            'start_quest' => $this->questProgressionService->startQuest($player, $value),
            'start_quest_step' => $this->questProgressionService->startQuestStep($player, $value),
            'edit_quest_step_status' => $this->questProgressionService->editQuestStepStatus($player, $value),
            'reward_quest' => $this->questProgressionService->rewardQuest($player, $value),
            'add_items' => $this->addItems($player, $value),
            'remove_items' => $this->removeItems($player, $value),
            default => null,
        };
    }

    private function revealLocation(Player $player, string $slug): void
    {
        $location = $this->entityManager->getRepository(Location::class)->findOneBy(['slug' => $slug]);
        if(!$location) return;

        $existing = $this->entityManager->getRepository(CharacterLocation::class)->findOneBy([
            'character' => $player,
            'location' => $location,
        ]);

        if(!$existing) {
            $characterLocation = (new CharacterLocation())
                ->setCharacter($player)
                ->setLocation($location);
            $this->entityManager->persist($characterLocation);
        }
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
