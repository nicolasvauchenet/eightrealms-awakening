<?php

namespace App\Service\Game\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Spell\CharacterSpell;
use App\Service\Game\Combat\Effect\CombatEffectService;
use App\Service\Game\Combat\Helper\AreaEffectHelperService;
use App\Service\Game\Combat\Helper\EnemyLabelHelperService;
use Doctrine\ORM\EntityManagerInterface;

readonly class CastSpellService
{
    public function __construct(
        private EntityManagerInterface  $entityManager,
        private AreaEffectHelperService $areaEffectHelper,
        private CombatEffectService     $combatEffectService,
        private EnemyLabelHelperService $enemyLabelHelperService,
    )
    {
    }

    public function cast(Player $player, Combat $combat, int $enemyId, int $characterSpellId): string
    {
        $characterSpell = $this->entityManager->getRepository(CharacterSpell::class)->find($characterSpellId);
        if(!$characterSpell || $characterSpell->getCharacter() !== $player) {
            return "<span class='text-danger'>Sort introuvable ou non possédé.</span><br/>";
        }

        $spell = $characterSpell->getSpell();
        $cost = $spell->getManaCost() + $characterSpell->getManaCost();
        if($player->getMana() < $cost) {
            return "<span class='text-warning'>Vous n'avez pas assez de mana pour lancer ce sort.</span><br/>";
        }

        $playerCombat = $player->getPlayerCombats()->filter(
            fn($pc) => $pc->getCombat() === $combat
        )->first();

        $type = $spell->getType();
        $targetStat = $spell->getTarget() ?? $spell->getEffect();
        $amount = $spell->getAmount() + $characterSpell->getAmountBonus();
        $area = $spell->getArea() + $characterSpell->getAreaBonus();
        $duration = $spell->getDuration() ? $spell->getDuration() + $characterSpell->getDurationBonus() : null;

        $player->setMana($player->getMana() - $cost);
        $this->entityManager->persist($player);

        // Effet offensif
        if($type === 'offensive') {
            $target = $playerCombat->getPlayerCombatEnemies()->filter(
                fn($enemy) => $enemy->getId() === $enemyId
            )->first();
            if(!$target || $target->getHealth() <= 0) {
                return "<span class='text-danger'>Cible invalide.</span><br/>";
            }

            $enemyName = $this->enemyLabelHelperService->getDisplayName($target);
            $statName = match ($targetStat) {
                'damage', 'health' => 'dégâts',
                'mana' => 'magie',
                default => $targetStat,
            };

            if($targetStat === 'damage' || $targetStat === 'health') {
                $target->setHealth(max(0, $target->getHealth() - $amount));
            } else if($targetStat === 'mana') {
                $target->setMana(max(0, $target->getMana() - $amount));
            }

            $this->entityManager->persist($target);

            $log = "<span class='text-success'>Vous lancez {$spell->getName()} sur $enemyName et lui infligez $amount point" . ($amount > 1 ? 's' : '') . " de $statName&nbsp;!</span><br/>";

            if($target->getHealth() <= 0) {
                $log .= "<strong class='text-success'>$enemyName est vaincu&nbsp;!</strong><br/>";
            }

            if($area > 1) {
                $log .= $this->areaEffectHelper->applyAreaEffect($target, $targetStat, $amount, $area);
            }

            $this->entityManager->flush();

            return $log;
        } else if($type === 'defensive') {
            $statName = match ($targetStat) {
                'health' => 'santé',
                'mana' => 'magie',
                'damage' => 'puissance',
                'defense' => 'défense',
                default => $targetStat,
            };

            if(in_array($targetStat, ['health', 'mana'])) {
                $before = $targetStat === 'health' ? $player->getHealth() : $player->getMana();
                $max = $targetStat === 'health' ? $player->getHealthMax() : $player->getManaMax();
                $after = min($max, $before + $amount);

                if($targetStat === 'health') {
                    $player->setHealth($after);
                } else {
                    $player->setMana($after);
                }

                $this->entityManager->persist($player);
                $log = "<span class='text-info'>Vous lancez {$spell->getName()} et récupérez <strong>$amount</strong> point" . ($amount > 1 ? 's' : '') . " de $statName.</span><br/>";
            } else {
                $playerCombat = $player->getPlayerCombats()->last();
                if($playerCombat) {
                    $this->combatEffectService->addEffect(
                        type: $type,
                        target: $targetStat,
                        amount: $amount,
                        duration: $duration,
                        playerCombat: $playerCombat
                    );

                    $label = match ($targetStat) {
                        'damage' => "vos dégâts sont augmentés",
                        'defense' => "votre défense est renforcée",
                        'invisibility' => "vous devenez invisible",
                        'charmed' => "vous charmez l’ennemi",
                        default => "vous bénéficiez d’un effet spécial",
                    };

                    $log = "<span class='text-info'>Vous lancez {$spell->getName()} et $label pendant " . ($duration ? $duration . ' tour' . ($duration > 1 ? 's' : '') : 'une durée indéterminée') . ".</span><br/>";
                } else {
                    $log = "<span class='text-warning'>Effet non appliqué&nbsp;: aucun combat actif.</span><br/>";
                }
            }

            return $log;
        } else if($type === 'utile') {
            $statName = match ($targetStat) {
                'invisibility' => 'devenez invisible',
                default => "gagnez l'effet " . $targetStat,
            };

            $playerCombat = $player->getPlayerCombats()->last();
            if($playerCombat) {
                $this->combatEffectService->addEffect(
                    type: 'utile',
                    target: $targetStat,
                    amount: 1,
                    duration: $duration,
                    playerCombat: $playerCombat
                );

                $log = "<span class='text-info'>Vous lancez {$spell->getName()} et $statName pour " . ($duration ? $duration . ' tour' . ($duration > 1 ? 's' : '') : 'une durée indéterminée') . ".</span><br/>";
            } else {
                $log = "<span class='text-warning'>Effet non appliqué&nbsp;: aucun combat actif.</span><br/>";
            }

            return $log;
        }

        return "<span class='text-danger'>Ce sort n’a pas d’effet implémenté.</span><br/>";
    }
}
