<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Spell\CharacterSpell;
use Doctrine\ORM\EntityManagerInterface;

readonly class CastSpellService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function cast(Player $player, Combat $combat, int $enemyId, int $characterSpellId): string
    {
        $characterSpell = $this->entityManager->getRepository(CharacterSpell::class)->find($characterSpellId);

        if(!$characterSpell || $characterSpell->getCharacter() !== $player) {
            return "<span class='text-danger'>Sort introuvable ou non possédé.</span>";
        }

        $spell = $characterSpell->getSpell();
        $cost = $spell->getManaCost() + $characterSpell->getManaCost();

        if($player->getMana() < $cost) {
            return "<span class='text-warning'>Vous n'avez pas assez de mana pour lancer ce sort.</span>";
        }

        $playerCombat = $player->getPlayerCombats()->filter(
            fn($pc) => $pc->getCombat() === $combat
        )->first();

        $type = $spell->getType();
        $targetStat = $spell->getTarget();
        $amount = $spell->getAmount() + $characterSpell->getAmountBonus();
        $area = $spell->getArea() + $characterSpell->getAreaBonus();

        $player->setMana($player->getMana() - $cost);
        $this->entityManager->persist($player);

        if($type === 'offensive') {
            $target = $playerCombat->getPlayerCombatEnemies()->filter(
                fn($enemy) => $enemy->getId() === $enemyId
            )->first();

            if(!$target || $target->getHealth() <= 0) {
                return "<span class='text-danger'>Cible invalide.</span>";
            }

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

            $log = "<span class='text-success'>Vous lancez {$spell->getName()} sur {$target->getEnemy()->getName()} {$target->getPosition()} et lui infligez $amount point" . ($amount > 1 ? 's' : '') . " de $statName&nbsp;!</span>";

            if($target->getHealth() <= 0) {
                $log .= "<br/><strong class='text-success'>{$target->getEnemy()->getName()} {$target->getPosition()} est vaincu&nbsp;!</strong>";
            }

            if($area > 1) {
                $log .= $this->applyAreaEffect($target, $targetStat, $amount, $area);
            }

            $this->entityManager->flush();

            return $log;
        }

        if($type === 'defensive') {
            $before = $targetStat === 'health' ? $player->getHealth() : $player->getMana();
            $max = $targetStat === 'health' ? $player->getHealthMax() : $player->getManaMax();
            $after = min($max, $before + $amount);

            if($targetStat === 'health') {
                $player->setHealth($after);
            } else if($targetStat === 'mana') {
                $player->setMana($after);
            }

            $this->entityManager->persist($player);
            $this->entityManager->flush();

            return "<span class='text-info'>Vous lancez {$spell->getName()} et récupérez $amount point" . ($amount > 1 ? 's' : '') . " de $targetStat.</span>";
        }

        return "<span class='text-danger'>Ce sort n’a pas d’effet implémenté.</span>";
    }

    private function applyAreaEffect(PlayerCombatEnemy $target, string $targetStat, int $baseAmount, int $area): string
    {
        $log = '';
        $aoeAmount = ceil($baseAmount * 0.75);
        $statName = match ($targetStat) {
            'health', 'damage' => 'dégâts',
            'mana' => 'magie',
            default => $targetStat,
        };

        $enemies = $target->getPlayerCombat()->getPlayerCombatEnemies()->filter(
            fn($e) => $e->getHealth() > 0 && $e !== $target
        )->slice(0, $area - 1);

        foreach($enemies as $e) {
            if($targetStat === 'health' || $targetStat === 'damage') {
                $e->setHealth(max(0, $e->getHealth() - $aoeAmount));
            } else if($targetStat === 'mana') {
                $e->setMana(max(0, $e->getMana() - $aoeAmount));
            }

            $this->entityManager->persist($e);

            $log .= "<br/><span class='text-success'>{$e->getEnemy()->getName()} {$e->getPosition()} est aussi touché et perd $aoeAmount point" . ($aoeAmount > 1 ? 's' : '') . " de $statName&nbsp;!</span>";

            if($e->getHealth() <= 0) {
                $log .= "<br/><strong class='text-success'>{$e->getEnemy()->getName()} {$e->getPosition()} est vaincu&nbsp;!</strong>";
            }
        }

        return $log;
    }
}
