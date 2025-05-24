<?php

namespace App\Service\Game\Player;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Combat\PlayerCombatEffect;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Location\CharacterLocation;
use App\Entity\Location\Location;
use App\Entity\Riddle\PlayerRiddle;
use App\Entity\Riddle\Riddle;
use App\Entity\Screen\Screen;
use App\Service\Game\Combat\InitiativeService;
use Doctrine\ORM\EntityManagerInterface;

readonly class UpdatePlayerService
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private InitiativeService      $initiativeService)
    {
    }

    public function updatePlayerScreen(Player $player, Screen $screen, ?Location $location = null, ?Combat $combat = null, ?Riddle $riddle = null): void
    {
        $player->setCurrentScreen($screen);
        $this->entityManager->persist($player);
        $this->entityManager->flush();

        if($location) {
            $this->updatePlayerLocations($player, $location);
        }

        if($combat) {
            $this->updatePlayerCombat($player, $combat);
        }

        if($riddle) {
            $this->updatePlayerRiddle($player, $riddle);
        }

    }

    private function updatePlayerLocations(Player $player, Location $location): void
    {
        $player->setCurrentLocation($location);

        if(in_array($location->getType(), ['location', 'zone'], true)) {
            $alreadyDiscovered = $this->entityManager->getRepository(CharacterLocation::class)
                ->findOneBy([
                    'character' => $player,
                    'location' => $location,
                ]);

            if(!$alreadyDiscovered) {
                $characterLocation = (new CharacterLocation())
                    ->setCharacter($player)
                    ->setLocation($location);
                $this->entityManager->persist($characterLocation);
            }
        }

        $this->entityManager->persist($player);
        $this->entityManager->flush();
    }

    public function updatePlayerCombat(Player $player, Combat $combat): PlayerCombat
    {
        // Récupérer l'entité PlayerCombat existante
        $playerCombat = $this->entityManager->getRepository(PlayerCombat::class)->findOneBy([
            'player' => $player,
            'combat' => $combat,
        ]);

        if(!$playerCombat) {
            // Nouveau combat pour le joueur
            $playerCombat = (new PlayerCombat())
                ->setPlayer($player)
                ->setCombat($combat)
                ->setStatus('progress')
                ->setCurrentRound(1)
                ->setCurrentTurn(0);
            $this->entityManager->persist($playerCombat);

            foreach($combat->getCombatEnemies() as $enemyCombat) {
                $pce = (new PlayerCombatEnemy())
                    ->setEnemy($enemyCombat->getEnemy())
                    ->setHealth($enemyCombat->getHealth())
                    ->setMana($enemyCombat->getMana())
                    ->setPosition($enemyCombat->getPosition())
                    ->setPlayerCombat($playerCombat);
                $this->entityManager->persist($pce);

                $playerCombat->addPlayerCombatEnemy($pce);
                $this->entityManager->persist($playerCombat);
            }
            $this->entityManager->flush();
        } else {
            // Supprimer les effets temporaires existants
            $this->removeTemporaryEffects($playerCombat);

            // Le combat existe déjà pour le joueur
            $playerCombat->setStatus('progress')
                ->setCurrentRound(1)
                ->setCurrentTurn(0);
            $this->entityManager->persist($playerCombat);

            foreach($playerCombat->getPlayerCombatEnemies() as $playerCombatEnemy) {
                $enemyTemplate = $combat->getCombatEnemies()->filter(
                    fn($ec) => $ec->getPosition() === $playerCombatEnemy->getPosition()
                )->first();

                if($enemyTemplate) {
                    $playerCombatEnemy
                        ->setHealth($enemyTemplate->getHealth())
                        ->setMana($enemyTemplate->getMana());

                    $this->entityManager->persist($playerCombatEnemy);
                }
            }
            $this->entityManager->flush();
        }

        // Mettre à jour l'ordre des tours
        $initiative = $this->initiativeService->getTurnOrder($playerCombat);
        $playerCombat
            ->setTurnOrder($initiative)
            ->setCurrentRound(1)
            ->setCurrentTurn(0);
        $this->entityManager->persist($playerCombat);
        $this->entityManager->flush();

        return $playerCombat;
    }

    // Méthode pour supprimer les effets temporaires
    private function removeTemporaryEffects(PlayerCombat $playerCombat): void
    {
        // Supprimer les effets temporaires pour ce PlayerCombat
        $effects = $this->entityManager->getRepository(PlayerCombatEffect::class)
            ->findBy(['playerCombat' => $playerCombat]);
        foreach($effects as $effect) {
            $this->entityManager->remove($effect);
        }

        $this->entityManager->flush();
    }

    public function updatePlayerRiddle(Player $player, Riddle $riddle): PlayerRiddle
    {
        // Récupérer l'entité PlayerRiddle existante
        $playerRiddle = $this->entityManager->getRepository(PlayerRiddle::class)->findOneBy([
            'player' => $player,
            'riddle' => $riddle,
        ]);

        if(!$playerRiddle) {
            // Nouvelle énigme pour le joueur
            $playerRiddle = (new PlayerRiddle())
                ->setPlayer($player)
                ->setRiddle($riddle)
                ->setSolved(false)
                ->setSuccess(false);
            $this->entityManager->persist($playerRiddle);
            $this->entityManager->flush();
        }

        return $playerRiddle;
    }
}
