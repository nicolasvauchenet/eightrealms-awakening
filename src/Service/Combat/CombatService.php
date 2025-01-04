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
            // On s’assure de ne pas ré-attaquer $playerCreature
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
    public function playerAttacksCreature(Player $player, PlayerCreature $playerCreature): string
    {
        // 1) Calcul du succès ou échec de l'attaque (avec +2 “facilitateur”)
        $attackRoll = random_int(1, 20);
        if($player->getProfession()->getType() === 'Magie') {
            $attackOk = (($attackRoll + 2) <= $player->getIntelligence());
        } else {
            $attackOk = (($attackRoll + 2) <= $player->getStrength());
        }

        // Défense de la créature
        $defenseRoll = random_int(1, 20);
        $defenseOk = ($defenseRoll <= $playerCreature->getCreature()->getStrength());

        $attackHits = $attackOk && !$defenseOk;

        // 2) Déterminer l’arme équipée (main droite ou gauche)
        $equipped = $this->characterItemService->getEquippedItems($player);
        /** @var CharacterItem|null $weaponItem */
        $weaponItem = $equipped['righthand'] ?? $equipped['lefthand'] ?? null;

        // Variables pour gérer l’arme magique
        $isMagical = false;
        $charge = 0;
        $weaponDamage = 0;
        $rawDamage = 0;

        if($weaponItem) {
            $weapon = $weaponItem->getItem();
            // Vérifier si c’est une arme magique via "charge"
            if(method_exists($weapon, 'getCharge') && $weapon->getCharge() !== null) {
                $isMagical = true;
                $charge = $weaponItem->getCharge() ?? 0;
            }

            if($isMagical && $charge > 0) {
                // Attaque magique => on utilise "amount" de l’arme comme dégâts
                $weaponDamage = $weapon->getAmount() ?? 0;
                $rawDamage = $weaponDamage; // pas de 1D6 aléatoire dans cet exemple
            } else {
                // Arme non-magique OU charge épuisée => on prend "damage"
                $weaponDamage = method_exists($weapon, 'getDamage')
                    ? ($weapon->getDamage() ?? 0)
                    : 0;
                $rawDamage = random_int(1, 6) + $weaponDamage + $player->getDamage();
            }
        }

        // ►►► IMPORTANT : décrémenter la charge si c’est une arme magique et charge>0,
        // même si l’attaque finit par être un échec
        if($weaponItem && $isMagical && $charge > 0) {
            // On réduit la charge de 1
            $weaponItem->setCharge(max(0, $charge - 1));
            $this->entityManager->persist($weaponItem);
        }

        // Si l’attaque rate, on s’arrête là,
        // mais la charge a déjà été consommée si c’était magique
        if(!$attackHits) {
            return 'Vous ratez votre attaque.';
        }

        // 5) Calcul de la défense de la cible
        $defense = $playerCreature->getCreature()->getDefense();

        // 6) Dégâts effectifs
        $damage = $rawDamage - $defense;
        $damage = max(0, $damage);

        // 7) Appliquer les dégâts à la créature
        $this->applyDamageToCreature($damage, $playerCreature);

        // 8) Gérer la dégradation physique (si l’arme est non-magique ou charge épuisée)
        //    => “absorbed” = la part non-infligée
        $absorbed = $rawDamage - $damage;
        if($weaponItem && (!$isMagical || $charge <= 0)) {
            if($absorbed > 0) {
                $this->degradeWeaponIfPhysical($player, $absorbed);
            }
        }

        // 9) Générer le message final
        if(!$playerCreature->isAlive()) {
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
        // Si tu veux aussi favoriser la créature, tu peux ajouter +2 ici.
        $attackRoll = random_int(1, 20);
        $attackOk = ($attackRoll <= $playerCreature->getCreature()->getStrength());

        $defenseRoll = random_int(1, 20);
        // On peut aussi buff ou non la défense du joueur :
        $defenseOk = (($defenseRoll + 2) <= $player->getStrength());
        // ou pas, selon l'équilibrage voulu

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
                        '%s vous attaque et inflige %d dégâts. %sIl vous reste %d PV.',
                        $playerCreature->getCreature()->getName(),
                        $remainingDamage,
                        $absorbedMessage ? $absorbedMessage . ' ' : '',
                        $newHP
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
