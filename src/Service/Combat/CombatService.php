<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Character\PlayerCreature;
use App\Entity\Item\CharacterItem;
use App\Service\Item\CharacterItemService;
use Doctrine\ORM\EntityManagerInterface;
use Random\RandomException;

class CombatService
{
    private EntityManagerInterface $entityManager;
    private CharacterItemService $characterItemService;

    public function __construct(
        EntityManagerInterface $entityManager,
        CharacterItemService   $characterItemService
    )
    {
        $this->entityManager = $entityManager;
        $this->characterItemService = $characterItemService;
    }

    /**
     * Gère un "tour de combat" complet :
     * 1) Le Player attaque la créature
     * 2) Si la créature survit, elle contre-attaque
     *
     * Renvoie une chaîne (ou un tableau) décrivant ce qui s'est passé.
     * @throws RandomException
     */
    public function resolveCombatRound(
        Player         $player,
        PlayerCreature $playerCreature,
        array          $sceneCreatures
    ): string
    {
        $messages = [];

        // 1) Attaque du joueur sur la créature
        $messages[] = $this->playerAttacksCreature($player, $playerCreature);

        // Si la cible est vivante, elle attaque
        if($playerCreature->isAlive()) {
            $messages[] = $this->creatureAttacksPlayer($playerCreature, $player);
        }

        // Ensuite, les autres créatures attaquent
        foreach($sceneCreatures as $pc) {
            // On s’assure de ne pas ré-attaquer avec $playerCreature
            if($pc !== $playerCreature && $pc->isAlive()) {
                $messages[] = $this->creatureAttacksPlayer($pc, $player);
            }
        }

        $this->entityManager->flush();

        return implode('<br/>', array_filter($messages));
    }

    /**
     * Le Player attaque la créature.
     * @throws RandomException
     */
    /**
     * Le Player attaque la créature.
     * @throws RandomException
     */
    public function playerAttacksCreature(Player $player, PlayerCreature $playerCreature): string
    {
        // 1) Récupérer l’arme équipée (main droite/gauche/bow)
        $equipped = $this->characterItemService->getEquippedItems($player);
        /** @var CharacterItem|null $weaponItem */
        $weaponItem = $equipped['righthand'] ?? $equipped['lefthand'] ?? $equipped['bow'] ?? null;

        // Variables pour différencier arc / arme magique / arme physique
        $isArc = false;
        $isMagical = false;
        $hasCharge = false;
        $weaponDamage = 0;
        $rawDamage = 0;

        // Par défaut, on suppose qu'on utilisera la Force
        // On déterminera la stat exact un peu plus bas
        $attackStat = $player->getStrength();

        // 2) Analyser l’arme équipée
        if($weaponItem) {
            $weapon = $weaponItem->getItem();

            // a) Détecter si c’est un arc (type='Distance' ou comme tu veux)
            if(method_exists($weapon, 'getType') && $weapon->getType() === 'Distance') {
                $isArc = true;
            }

            // b) Détecter si c’est une arme magique (ex. via getCharge())
            if(method_exists($weapon, 'getCharge') && $weapon->getCharge() !== null) {
                $isMagical = true;
                // On regarde la charge sur le CharacterItem
                $charge = $weaponItem->getCharge() ?? 0;
                $hasCharge = ($charge > 0);
            }
        }

        // 3) Choisir la caractéristique d’attaque selon l’arme
        //    Arc => Dextérité
        //    Arme magique avec charge => Intelligence
        //    Sinon => Force
        if($isArc) {
            $attackStat = $player->getDexterity();
        } else if($isMagical && $hasCharge) {
            $attackStat = $player->getIntelligence();
        } else {
            // Arme physique ou magique sans charge => Force
            $attackStat = $player->getStrength();
        }

        // 4) Calcul du succès ou échec de l’attaque
        //    On applique un -2 sur le jet => plus facile (ou +2 sur la stat, c’est équivalent)
        $attackRoll = random_int(1, 20);
        $levelBonus = (int)floor($player->getLevel() / 2);
        $attackOk = ($attackRoll <= ($attackStat + $levelBonus + 5));

        // 5) Défense de la créature
        //    (ex. on compare à la Dextérité de la créature ou autre stat)
        $defenseRoll = random_int(1, 20);
        // Par exemple, tu lui mets aussi un +2 ou pas.
        $defenseOk = (($defenseRoll + 2) <= $playerCreature->getCreature()->getDexterity());

        $attackHits = $attackOk && !$defenseOk;

        // 6) Si c’est une arme magique + charge>0, on consomme 1 charge
        //    même si l’attaque finit par rater
        if($weaponItem && $isMagical && $hasCharge) {
            $currentCharge = $weaponItem->getCharge() ?? 0;
            $weaponItem->setCharge(max(0, $currentCharge - 1));
            $this->entityManager->persist($weaponItem);
        }

        // 7) Si l’attaque rate, on s’arrête
        if(!$attackHits) {
            return 'Vous ratez votre attaque.';
        }

        // ==============================
        // 8) Calcul des dégâts
        // ==============================
        if($weaponItem) {
            $weapon = $weaponItem->getItem();

            if($isMagical && $hasCharge) {
                // Attaque magique => on prend "amount" pour les dégâts
                // (ex.: baguette de feu => getAmount()=10)
                $weaponDamage = $weapon->getAmount() ?? 0;
                // on ne rajoute pas 1D6 ici, c’est un choix
                $rawDamage = $weaponDamage;
            } else {
                // Arme non-magique OU charge épuisée
                // => 1D6 + weapon->getDamage() + bonus perso
                $baseDamage = method_exists($weapon, 'getDamage')
                    ? ($weapon->getDamage() ?? 0)
                    : 0;
                $rawDamage = random_int(1, 6) + $baseDamage + $player->getDamage();
            }
        } else {
            // Pas d’arme => au poing ? Par ex. 1D6
            $rawDamage = random_int(1, 6) + $player->getDamage();
        }

        // 9) On soustrait la défense de la cible
        $defenseVal = $playerCreature->getCreature()->getDefense();
        $damage = max(0, $rawDamage - $defenseVal);

        // 10) On applique les dégâts à la créature
        $this->applyDamageToCreature($damage, $playerCreature);

        // 11) Gérer la dégradation si arme physique (ou magique sans charge)
        if($weaponItem && (!$isMagical || !$hasCharge)) {
            $absorbed = $rawDamage - $damage; // la part non-infligée
            if($absorbed > 0) {
                $this->degradeWeaponIfPhysical($player, $absorbed);
            }
        }

        // 12) Message final
        if(!$playerCreature->isAlive()) {
            // Gain de la créature
            $player->setFortune($player->getFortune() + $playerCreature->getCrownReward())
                ->setExperience($player->getExperience() + $playerCreature->getXpReward());
            $this->entityManager->persist($player);

            return sprintf(
                'Vous touchez et infligez %d points de dégâts. %s est vaincu !',
                $damage,
                $playerCreature->getCreature()->getName()
            );
        } else {
            return sprintf(
                'Vous touchez et infligez %d points de dégâts à %s (reste %d PV).',
                $damage,
                $playerCreature->getCreature()->getName(),
                $playerCreature->getHealth()
            );
        }
    }

    /**
     * La créature attaque le Player.
     * @throws RandomException
     */
    public function creatureAttacksPlayer(PlayerCreature $playerCreature, Player $player): string
    {
        $attackRoll = random_int(1, 20);
        $attackOk = (($attackRoll - 2) <= $playerCreature->getCreature()->getStrength());

        $defenseRoll = random_int(1, 20);
        $defenseOk = (($defenseRoll - 2) <= $player->getDexterity());

        $attackHits = $attackOk && !$defenseOk;

        if($attackHits) {
            $damage = random_int(1, 6)
                + $playerCreature->getCreature()->getDamage()
                - $player->getDefense();
            $damage = max(0, $damage);

            // On applique la logique "bouclier puis armure puis PV"
            $absorbedMessage = '';
            $remainingDamage = $this->distributeDamageOnShieldArmor($damage, $player, $absorbedMessage);

            // Ce qui reste va au joueur
            if($remainingDamage > 0) {
                $newHP = $player->getHealth() - $remainingDamage;
                $player->setHealth($newHP);
                if($newHP <= 0) {
                    $player->setHealth(0)->setAlive(false);
                    $this->entityManager->persist($player);

                    return sprintf(
                        '%s vous attaque et inflige %d dégâts. %s%s Vous tombez à 0 PV (KO).',
                        $playerCreature->getCreature()->getName(),
                        $remainingDamage,
                        $absorbedMessage ? $absorbedMessage . ' ' : '',
                        $playerCreature->getCreature()->getName()
                    );
                } else {
                    $this->entityManager->persist($player);

                    return sprintf(
                        '%s vous attaque et inflige %d dégâts.',
                        $playerCreature->getCreature()->getName(),
                        $remainingDamage
                    );
                }
            } else {
                // Tout absorbé, aucun dégât
                return sprintf(
                    '%s tente de vous frapper, mais vous ne subissez aucun dégât. %s',
                    $playerCreature->getCreature()->getName(),
                    $absorbedMessage
                );
            }
        } else {
            return sprintf('%s a raté son attaque.', $playerCreature->getCreature()->getName());
        }
    }

    /**
     * Applique des dégâts "directement" à une créature.
     */
    private function applyDamageToCreature(int $damage, PlayerCreature $playerCreature): void
    {
        $newHealth = $playerCreature->getHealth() - $damage;
        if($newHealth <= 0) {
            $playerCreature->setHealth(0);
            $playerCreature->setAlive(false);
        } else {
            $playerCreature->setHealth($newHealth);
        }
        $this->entityManager->persist($playerCreature);
    }

    /**
     * Distribue "damage" sur le bouclier, puis l'armure, puis renvoie
     * les dégâts restants à infliger au Player.
     *
     * Remplit $absorbedMessage avec un texte du genre "Votre bouclier a absorbé X".
     */
    private function distributeDamageOnShieldArmor(int $damage, Player $player, string &$absorbedMessage = ''): int
    {
        $equippedItems = $this->characterItemService->getEquippedItems($player);
        $shieldItem = $equippedItems['shield'] ?? null;
        $armorItem = $equippedItems['armor'] ?? null;

        $remaining = $damage;
        $absorbedMessage = '';

        // ----- 1) BOUCLIER -----
        if($shieldItem) {
            // Défense effective (tenant compte de l’usure)
            $shieldDefense = $this->characterItemService->calculateEffectiveDefense($shieldItem);
            // ex. une baseDefense=2, partiellement usée => shieldDefense=1 ou 2

            if($shieldDefense > 0 && $remaining > 0) {
                $absorbed = min($shieldDefense, $remaining);
                // On décrémente la durabilité en fonction de la partie absorbée
                $shieldHealth = $shieldItem->getHealth() ?? 0;
                $damageToShield = (int)floor($absorbed / 2);

                // On ne dépasse pas la durabilité
                $damageToShield = min($damageToShield, $shieldHealth);

                // Applique la perte de durabilité
                if($damageToShield > 0) {
                    $shieldItem->setHealth($shieldHealth - $damageToShield);
                    $this->entityManager->persist($shieldItem);
                }
                // On retire les dégâts absorbés du “remaining”
                $remaining -= $absorbed;

                // Log
                $absorbedMessage .= sprintf(
                    'Votre bouclier a absorbé %d dégâts (perd %d durabilité). ',
                    $absorbed,
                    $damageToShield
                );
            }
        }

        // ----- 2) ARMURE -----
        if($remaining > 0 && $armorItem) {
            // Défense effective
            $armorDefense = $this->characterItemService->calculateEffectiveDefense($armorItem);
            if($armorDefense > 0) {
                $absorbed = min($armorDefense, $remaining);
                $armorHealth = $armorItem->getHealth() ?? 0;

                // Avant : $damageToArmor = (int) floor($absorbed / 2);
                $damageToArmor = (int)floor($absorbed / 2);

                // Si l’armure a absorbé >0 dégâts, on veut au moins perdre 1 durabilité
                if($damageToArmor < 1 && $absorbed > 0) {
                    $damageToArmor = 1;
                }

                // On ne dépasse pas la durabilité
                $damageToArmor = min($damageToArmor, $armorHealth);

                if($damageToArmor > 0) {
                    $armorItem->setHealth($armorHealth - $damageToArmor);
                    $this->entityManager->persist($armorItem);
                }
                $remaining -= $absorbed;

                $absorbedMessage .= sprintf(
                    'Votre armure a absorbé %d dégâts (perd %d durabilité). ',
                    $absorbed,
                    $damageToArmor
                );
            }
        }

        return $remaining;
    }

    /**
     * Dégrade l’arme (main droite ou main gauche) si c’est une arme physique.
     */
    private function degradeWeaponIfPhysical(Player $player, int $absorbed): void
    {
        $equipped = $this->characterItemService->getEquippedItems($player);
        /** @var CharacterItem|null $weaponItem */
        $weaponItem = $equipped['righthand'] ?? $equipped['lefthand'] ?? null;

        if(!$weaponItem) {
            return; // pas d'arme équipée
        }

        $weapon = $weaponItem->getItem();

        // Vérif qu'elle n'est pas "magique" => ex. on détecte getCharge
        $isMagical = false;
        if(method_exists($weapon, 'getCharge') && $weapon->getCharge() !== null) {
            $isMagical = true;
        }

        if($isMagical) {
            return;
        }

        // Arme physique => on la dégrade
        $currentDurability = $weaponItem->getHealth() ?? 0;
        if($currentDurability > 0) {
            // Diviser par 4 pour un usage moins punitif
            $damageToWeapon = (int)floor($absorbed / 4);
            $damageToWeapon = min($damageToWeapon, $currentDurability);

            $weaponItem->setHealth($currentDurability - $damageToWeapon);
            $this->entityManager->persist($weaponItem);
        }
    }
}
