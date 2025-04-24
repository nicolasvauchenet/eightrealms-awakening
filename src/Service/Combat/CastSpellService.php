<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Spell\CharacterSpell;
use Doctrine\ORM\EntityManagerInterface;

readonly class CastSpellService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function cast(Player $player, Combat $combat, int $enemyId, int $characterSpellId): string
    {
        // Récupère le sort
        $characterSpell = $this->entityManager->getRepository(CharacterSpell::class)->find($characterSpellId);

        if(!$characterSpell || $characterSpell->getCharacter() !== $player) {
            return "<span class='text-danger'>Sort introuvable ou non possédé.</span>";
        }

        $spell = $characterSpell->getSpell();
        $cost = $spell->getManaCost() + $characterSpell->getManaCost();

        if($player->getMana() < $cost) {
            return "<span class='text-warning'>Pas assez de mana pour lancer ce sort.</span>";
        }

        $playerCombat = $player->getPlayerCombats()->filter(
            fn($pc) => $pc->getCombat() === $combat
        )->first();

        $target = $playerCombat->getPlayerCombatEnemies()->filter(
            fn($enemy) => $enemy->getId() === $enemyId
        )->first();

        if(!$target || $target->getHealth() <= 0) {
            return "<span class='text-muted'>Cible invalide.</span>";
        }

        // Applique l'effet
        $damage = $spell->getAmount() + $characterSpell->getAmountBonus();
        $target->setHealth(max(0, $target->getHealth() - $damage));
        $player->setMana($player->getMana() - $cost);

        $this->entityManager->persist($player);
        $this->entityManager->persist($target);
        $this->entityManager->flush();

        $message = "<span class='text-primary'>Vous lancez {$spell->getName()} et infligez $damage points de dégâts à {$target->getEnemy()->getName()} !</span>";
        if($target->getHealth() <= 0) {
            $message .= "<br/><strong class='text-success'>{$target->getEnemy()->getName()} {$target->getPosition()} est vaincu&nbsp;!</strong>";
        }

        return $message;
    }
}
