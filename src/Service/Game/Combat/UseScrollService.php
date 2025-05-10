<?php

namespace App\Service\Game\Combat;

use App\Entity\Character\Character;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Scroll;
use App\Service\Game\Combat\Effect\CombatEffectService;
use App\Service\Game\Combat\Helper\AreaEffectHelperService;
use Doctrine\ORM\EntityManagerInterface;

readonly class UseScrollService
{
    public function __construct(
        private EntityManagerInterface  $entityManager,
        private AreaEffectHelperService $areaEffectHelper,
        private CombatEffectService     $combatEffectService
    )
    {
    }

    public function useItem(Character $player, CharacterItem $characterItem, ?PlayerCombatEnemy $target = null): string
    {
        $item = $characterItem->getItem();

        if(!$item instanceof Scroll) {
            return "<span class='text-warning'>Cet objet ne peut pas être utilisé ici.</span><br/>";
        }

        $type = $item->getType();
        $targetStat = $item->getTarget() ?? $item->getEffect();
        $amount = $item->getAmount() ?? 0;
        $area = $item->getArea() ?? 0;
        $duration = $item->getDuration();
        $log = '';

        $statName = match ($targetStat) {
            'health' => 'santé',
            'mana' => 'magie',
            'damage' => 'puissance',
            'defense' => 'défense',
            'invisibility' => 'invisibilité',
            'charmed' => 'charme',
            default => $targetStat,
        };

        if($type === 'offensive') {
            if(!$target || $target->getHealth() <= 0) {
                return "<span class='text-danger'>Cible invalide.</span><br/>";
            }

            if(in_array($targetStat, ['health', 'damage'])) {
                $target->setHealth(max(0, $target->getHealth() - $amount));
            } else if($targetStat === 'mana') {
                $target->setMana(max(0, $target->getMana() - $amount));
            }

            $this->entityManager->persist($target);

            $log .= "<span class='text-success'>Vous utilisez {$item->getName()} sur {$target->getEnemy()->getName()} {$target->getPosition()} et lui infligez <strong>$amount</strong> point" . ($amount > 1 ? 's' : '') . " de $statName&nbsp;!</span><br/>";

            if($target->getHealth() <= 0) {
                $log .= "<strong class='text-success'>{$target->getEnemy()->getName()} {$target->getPosition()} est vaincu&nbsp;!</strong><br/>";
            }

            if($area > 1) {
                $log .= $this->areaEffectHelper->applyAreaEffect($target, $targetStat, $amount, $area);
            }

        } else if($type === 'defensive') {
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
                $log = "<span class='text-info'>Vous utilisez {$item->getName()} et récupérez <strong>$amount</strong> point" . ($amount > 1 ? 's' : '') . " de $statName.</span><br/>";
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

                    $log = "<span class='text-info'>Vous utilisez {$item->getName()} et $label pendant " . ($duration ?? 'une durée indéterminée') . ".</span><br/>";
                } else {
                    $log = "<span class='text-warning'>Effet non appliqué&nbsp;: aucun combat actif.</span><br/>";
                }
            }

        } else if($type === 'utile') {
            $playerCombat = $player->getPlayerCombats()->last();
            if($playerCombat) {
                $this->combatEffectService->addEffect(
                    type: 'utile',
                    target: $targetStat,
                    amount: 1,
                    duration: $duration,
                    playerCombat: $playerCombat
                );
                $log = "<span class='text-info'>Vous utilisez {$item->getName()} et gagnez l’effet <strong>$statName</strong> pour " . ($duration ? $duration . 'tour' . ($duration > 1 ? 's' : '') : 'une durée illimitée') . ".</span><br/>";
            } else {
                $log = "<span class='text-warning'>Effet non appliqué&nbsp;: aucun combat actif.</span><br/>";
            }

        } else {
            $log = "<span class='text-warning'>Ce parchemin n’a pas d’effet implémenté.</span><br/>";
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
