<?php

namespace App\Service\Conditions;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use App\Entity\Location\CharacterLocation;
use App\Entity\Location\Location;
use App\Entity\Quest\PlayerQuest;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Quest\Quest;
use Doctrine\ORM\EntityManagerInterface;

readonly class ConditionEvaluatorService
{
    public function __construct(private EntityManagerInterface $entityManager)
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
        return match ($type) {
            'location_known' => $this->hasDiscoveredLocation($player, $value),
            'location_unknown' => !$this->hasDiscoveredLocation($player, $value),
            'quest_started' => $this->hasStartedQuest($player, $value),
            'quest_not_started' => !$this->hasStartedQuest($player, $value),
            'quest_status' => $this->hasQuestStatus($player, $value),
            'quest_step_not_started' => $this->isQuestStepNotStarted($player, $value),
            'quest_step_status' => $this->hasQuestStepStatus($player, $value),
            'combat_not_started' => $this->isCombatNotStarted($player, $value),
            'combat_status' => $this->hasCombatStatus($player, $value),
            'combat_status_not' => $this->hasNotCombatStatus($player, $value),
            'inventory_has' => $this->hasItem($player, $value),
            'any' => $this->evaluateAny($value, $player),
            default => false,
        };
    }

    private function hasDiscoveredLocation(Player $player, string $slug): bool
    {
        $location = $this->entityManager->getRepository(Location::class)->findOneBy(['slug' => $slug]);

        return $this->entityManager->getRepository(CharacterLocation::class)->findOneBy([
                'character' => $player,
                'location' => $location,
            ]) !== null;
    }

    private function hasStartedQuest(Player $player, string $slug): bool
    {
        $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $slug]);

        return $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
                'player' => $player,
                'quest' => $quest,
            ]) !== null;
    }

    private function hasQuestStatus(Player $player, array $data): bool
    {
        if(!isset($data['quest'], $data['status'])) {
            return false;
        }

        $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $data['quest']]);
        if(!$quest) return false;

        $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
            'player' => $player,
            'quest' => $quest,
        ]);

        if(!$playerQuest) return false;

        return $playerQuest->getStatus() === $data['status'];
    }

    private function isQuestStepNotStarted(Player $player, array $data): bool
    {
        if(!isset($data['quest'], $data['quest_step'])) {
            return false;
        }

        $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $data['quest']]);
        if(!$quest) return false;

        $step = $quest->getQuestSteps()->filter(fn($s) => $s->getPosition() === $data['quest_step'])->first();
        if(!$step) return false;

        $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
            'player' => $player,
            'quest' => $quest,
        ]);

        if(!$playerQuest) return true;

        $pqs = $this->entityManager->getRepository(PlayerQuestStep::class)->findOneBy([
            'player' => $player,
            'questStep' => $step,
        ]);

        return $pqs === null;
    }

    private function hasQuestStepStatus(Player $player, array $data): bool
    {
        if(!isset($data['quest'], $data['quest_step'], $data['status'])) {
            return false;
        }

        $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $data['quest']]);
        if(!$quest) return false;

        $step = $quest->getQuestSteps()->filter(fn($s) => $s->getPosition() === $data['quest_step'])->first();
        if(!$step) return false;

        $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
            'player' => $player,
            'quest' => $quest,
        ]);

        if(!$playerQuest) return false;

        $pqs = $this->entityManager->getRepository(PlayerQuestStep::class)->findOneBy([
            'player' => $player,
            'questStep' => $step,
        ]);

        return $pqs && $pqs->getStatus() === $data['status'];
    }

    private function hasItem(Player $player, string $slug): bool
    {
        $item = $this->entityManager->getRepository(Item::class)->findOneBy(['slug' => $slug]);

        return $this->entityManager->getRepository(CharacterItem::class)->findOneBy([
                'character' => $player,
                'item' => $item,
            ]) !== null;
    }

    private function isCombatNotStarted(Player $player, string $slug): bool
    {
        $combat = $this->entityManager->getRepository(Combat::class)->findOneBy(['slug' => $slug]);

        return $this->entityManager->getRepository(PlayerCombat::class)->findOneBy([
                'player' => $player,
                'combat' => $combat,
            ]) === null;
    }

    private function hasCombatStatus(Player $player, array $data): bool
    {
        if(!isset($data['combat'], $data['status'])) {
            return false;
        }

        $combat = $this->entityManager->getRepository(Combat::class)->findOneBy(['slug' => $data['combat']]);
        $playerCombat = $this->entityManager->getRepository(PlayerCombat::class)->findOneBy([
            'player' => $player,
            'combat' => $combat,
        ]);

        return $playerCombat && $playerCombat->getStatus() === $data['status'];
    }

    private function hasNotCombatStatus(Player $player, array $data): bool
    {
        if(!isset($data['combat'], $data['status'])) {
            return false;
        }

        $combat = $this->entityManager->getRepository(Combat::class)->findOneBy(['slug' => $data['combat']]);
        $playerCombat = $this->entityManager->getRepository(PlayerCombat::class)->findOneBy([
            'player' => $player,
            'combat' => $combat,
        ]);

        return $playerCombat && $playerCombat->getStatus() !== $data['status'];
    }

    private function evaluateAny(mixed $conditions, Player $player): bool
    {
        if(!is_array($conditions)) {
            return false;
        }

        // Si c'est un seul bloc (ex : ['quest_started' => 'machin']) on l'encapsule
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
}
