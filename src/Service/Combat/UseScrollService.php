<?php

namespace App\Service\Combat;

use App\Entity\Character\Character;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Scroll;
use App\Service\Combat\Effect\CombatEffectService;
use App\Service\Combat\Helper\AreaEffectHelperService;
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
        $targetStat = $item->getTarget() ?? $item->getEffect(); // fallback sur effect pour scrolls "utiles"
        $amount = $item->getAmount() ?? 0;
        $area = $item->getArea() ?? 0;
        $duration = $item->getDuration(); // peut être null (effet permanent)
        $log = '';

        if($type === 'offensive') {
            if(!$target || $target->getHealth() <= 0) {
                return "<span class='text-danger'>Cible invalide.</span><br/>";
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

            $log .= "<span class='text-success'>Vous utilisez {$item->getName()} sur {$target->getEnemy()->getName()} {$target->getPosition()} et lui infligez $amount point" . ($amount > 1 ? 's' : '') . " de $statName&nbsp;!</span><br/>";

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
                $log = "<span class='text-info'>Vous utilisez {$item->getName()} et récupérez $amount point" . ($amount > 1 ? 's' : '') . " de $targetStat.</span><br/>";
            } else {
                // Création d’un effet temporaire sur le joueur
                $playerCombat = $player->getPlayerCombats()->last(); // on prend le plus récent
                if($playerCombat) {
                    $this->combatEffectService->addEffect(
                        type: $type,
                        target: $targetStat,
                        amount: $amount,
                        duration: $duration,
                        playerCombat: $playerCombat
                    );
                    $log = "<span class='text-info'>Vous utilisez {$item->getName()} et obtenez un effet temporaire de $targetStat (+$amount, durée : " . ($duration ?? '∞') . " tours).</span><br/>";
                } else {
                    $log = "<span class='text-warning'>Effet non appliqué&nbsp;: aucun combat actif.</span><br/>";
                }
            }

        } else if($type === 'utile') {
            // Exemple : invisibilité
            $playerCombat = $player->getPlayerCombats()->last();
            if($playerCombat) {
                $this->combatEffectService->addEffect(
                    type: 'utile',
                    target: $targetStat,
                    amount: 1,
                    duration: $duration,
                    playerCombat: $playerCombat
                );
                $log = "<span class='text-info'>Vous utilisez {$item->getName()} et gagnez l’effet <strong>$targetStat</strong> pour " . ($duration ?? 'une durée illimitée') . ".</span><br/>";
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
