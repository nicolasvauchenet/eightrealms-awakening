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
     */
    public function resolveCombatRound(
        Player         $player,
        PlayerCreature $playerCreature
    ): string
    {
        $messages = [];

        // ==== 1) Attaque du joueur sur la créature ====
        $messages[] = $this->playerAttacksCreature($player, $playerCreature);

        // Si la créature est toujours en vie, elle attaque à son tour
        if($playerCreature->isAlive()) {
            $messages[] = $this->creatureAttacksPlayer($playerCreature, $player);
        }

        // On peut flush() à la fin du tour
        $this->entityManager->flush();

        return implode('<br/>', array_filter($messages));
    }

    /**
     * Le Player attaque la créature.
     * @throws RandomException
     */
    public function playerAttacksCreature(Player $player, PlayerCreature $playerCreature): string
    {
        // 1) Calcul du succès ou échec de l'attaque
        //    => on ajoute +2 pour rendre les attaques moins souvent ratées
        $attackRoll = random_int(1, 20);
        $attackOk = (($attackRoll + 2) <= $player->getStrength());

        // Défense de la créature
        $defenseRoll = random_int(1, 20);
        $defenseOk = ($defenseRoll <= $playerCreature->getCreature()->getStrength());

        $attackHits = $attackOk && !$defenseOk;

        if(!$attackHits) {
            return 'Vous ratez votre attaque.';
        }

        // 2) Dégâts bruts : 1D6 + bonus du joueur
        $rawDamage = random_int(1, 6) + $player->getDamage();

        // 3) Défense de la cible
        $defense = $playerCreature->getCreature()->getDefense();

        // 4) Dégâts effectifs
        $damage = $rawDamage - $defense;
        $damage = max(0, $damage); // Pas de dégâts négatifs

        // 5) Appliquer dégâts à la créature
        $this->applyDamageToCreature($damage, $playerCreature);

        // 6) Usure de l'arme si c’est une arme physique
        //    => "Absorbed" = la part non infligée
        $absorbed = $rawDamage - $damage;
        if($absorbed > 0) {
            $this->degradeWeaponIfPhysical($player, $absorbed);
        }

        // 7) Message
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
        /** @var CharacterItem|null $shieldItem */
        $shieldItem = $equippedItems['shield'] ?? null;
        /** @var CharacterItem|null $armorItem */
        $armorItem = $equippedItems['armor'] ?? null;

        $remaining = $damage;
        $absorbedMessage = '';

        // 1) Bouclier
        if($shieldItem) {
            $shieldHealth = $shieldItem->getHealth();
            $absorbed = min($shieldHealth, $remaining);

            if($absorbed > 0) {
                // On réduit l'usure par 2
                $damageToShield = (int)floor($absorbed / 2);

                // Bouclier perd X points de "vie"
                $shieldItem->setHealth($shieldHealth - $damageToShield);
                $this->entityManager->persist($shieldItem);

                $remaining -= $absorbed;
                $absorbedMessage .= sprintf(
                    'Votre bouclier a absorbé %d dégâts (perd %d durabilité). ',
                    $absorbed,
                    $damageToShield
                );
            }
        }

        // 2) Armure
        if($remaining > 0 && $armorItem) {
            $armorHealth = $armorItem->getHealth();
            $absorbed = min($armorHealth, $remaining);

            if($absorbed > 0) {
                // On réduit aussi l'usure par 2
                $damageToArmor = (int)floor($absorbed / 2);

                $armorItem->setHealth($armorHealth - $damageToArmor);
                $this->entityManager->persist($armorItem);

                $remaining -= $absorbed;
                $absorbedMessage .= sprintf(
                    'Votre armure a absorbé %d dégâts (perd %d durabilité). ',
                    $absorbed,
                    $damageToArmor
                );
            }
        }

        // 3) On renvoie les dégâts restants
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
            // Diviser par 2 pour un usage moins punitif
            $damageToWeapon = (int)floor($absorbed / 2);
            $damageToWeapon = min($damageToWeapon, $currentDurability);

            $weaponItem->setHealth($currentDurability - $damageToWeapon);
            $this->entityManager->persist($weaponItem);
        }
    }
}
