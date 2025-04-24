<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Scroll;
use App\Service\Combat\Helper\AreaEffectHelperService;
use Doctrine\ORM\EntityManagerInterface;

readonly class UseScrollService
{
    public function __construct(
        private EntityManagerInterface  $entityManager,
        private AreaEffectHelperService $areaEffectHelper
    )
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
        $area = $item->getArea() ?? 0;

        $log = '';

        if($type === 'offensive') {
            if(!$target || $target->getHealth() <= 0) {
                return "<span class='text-danger'>Cible invalide.</span>";
            }

            $statName = match ($targetStat) {
                'health', 'damage' => 'dégâts',
                'mana' => 'magie',
                default => $targetStat,
            };

            if($targetStat === 'health' || $targetStat === 'damage') {
                $target->setHealth(max(0, $target->getHealth() - $amount));
            } else if($targetStat === 'mana') {
                $target->setMana(max(0, $target->getMana() - $amount));
            }

            $this->entityManager->persist($target);

            $log .= "<span class='text-success'>Vous utilisez {$item->getName()} sur {$target->getEnemy()->getName()} {$target->getPosition()} et lui infligez $amount point" . ($amount > 1 ? 's' : '') . " de $statName&nbsp;!</span>";

            if($target->getHealth() <= 0) {
                $log .= "<br/><strong class='text-success'>{$target->getEnemy()->getName()} {$target->getPosition()} est vaincu&nbsp;!</strong>";
            }

            if($area > 1) {
                $log .= $this->areaEffectHelper->applyAreaEffect($target, $targetStat, $amount, $area);
            }

        } else if($type === 'defensive') {
            $before = $targetStat === 'health' ? $player->getHealth() : $player->getMana();
            $max = $targetStat === 'health' ? $player->getHealthMax() : $player->getManaMax();
            $after = min($max, $before + $amount);

            if($targetStat === 'health') {
                $player->setHealth($after);
            } else if($targetStat === 'mana') {
                $player->setMana($after);
            }

            $this->entityManager->persist($player);
            $log = "<span class='text-info'>Vous utilisez {$item->getName()} et récupérez $amount point" . ($amount > 1 ? 's' : '') . " de $targetStat.</span>";

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
