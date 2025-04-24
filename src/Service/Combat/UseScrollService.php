<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Scroll;
use Doctrine\ORM\EntityManagerInterface;

readonly class UseScrollService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function useItem(Player $player, CharacterItem $characterItem, ?PlayerCombatEnemy $target = null): string
    {
        $item = $characterItem->getItem();

        if(!$item instanceof Scroll) {
            return "<span class='text-warning'>Cet objet ne peut pas être utilisé ici.</span>";
        }

        $type = $item->getType();
        $targetStat = $item->getTarget();
        $amount = $item->getAmount() ?? 0;

        $log = '';

        if($type === 'offensive') {
            if(!$target || $target->getHealth() <= 0) {
                return "<span class='text-danger'>Cible invalide.</span>";
            }

            if($targetStat === 'health' || $targetStat === 'damage') {
                $target->setHealth(max(0, $target->getHealth() - $amount));
                $targetStatName = 'dégâts';
            } else if($targetStat === 'mana') {
                $target->setMana(max(0, $target->getMana() - $amount));
                $targetStatName = 'magie';
            } else {
                $targetStatName = $targetStat;
            }

            $this->entityManager->persist($target);
            $log = "<span class='text-success'>Vous utilisez {$item->getName()} sur {$target->getEnemy()->getName()} et lui infligez $amount point" . ($amount > 1 ? 's' : '') . " de $targetStatName.</span>";

            if($target->getHealth() <= 0) {
                $log .= "<br/><strong class='text-success'>{$target->getEnemy()->getName()} {$target->getPosition()} est vaincu&nbsp;!</strong>";
            }
        } else if($type === 'defensive') {
            if($targetStat === 'health') {
                $before = $player->getHealth();
                $after = min($player->getHealthMax(), $before + $amount);
                $player->setHealth($after);
                $targetStatName = 'santé';
            } else if($targetStat === 'mana') {
                $before = $player->getMana();
                $after = min($player->getManaMax(), $before + $amount);
                $player->setMana($after);
                $targetStatName = 'magie';
            } else {
                $targetStatName = $targetStat;
            }

            $this->entityManager->persist($player);
            $log = "<span class='text-info'>Vous utilisez {$item->getName()} et récupérez $amount point" . ($amount > 1 ? 's' : '') . " de $targetStatName.</span>";
        } else {
            $log = "<span class='text-warning'>Ce parchemin n’a pas d’effet implémenté.</span>";
        }

        $this->deleteItem($characterItem);
        $this->entityManager->flush();

        return $log;
    }

    private function deleteItem(CharacterItem $characterItem): void
    {
        $this->entityManager->remove($characterItem);
    }
}
