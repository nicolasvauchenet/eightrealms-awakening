<?php

namespace App\Service\Item;

use App\Entity\Character\Character;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Weapon;
use App\Repository\Item\CharacterItemRepository;
use Doctrine\Common\Collections\ArrayCollection;

class CharacterItemService
{
    private CharacterItemRepository $characterItemRepository;
    private ItemService $itemService;

    public function __construct(CharacterItemRepository $characterItemRepository,
                                ItemService             $itemService)
    {
        $this->characterItemRepository = $characterItemRepository;
        $this->itemService = $itemService;
    }

    public function getCharacterItems(Character $character): array
    {
        return $this->characterItemRepository->findCharacterItems($character);
    }

    /**
     * Méthode pour récupérer le bonus d'un type donné (damage, defense, health, mana, magical, etc.).
     *
     * - `damage` : additionne le "damage" effectif (tenant compte de l'usure) de chaque arme (physique).
     * - `defense`: calcule la défense effective (usure) du bouclier + armure.
     * - `health` : bonus de vie via anneaux/amulette.
     * - `mana`   : bonus de mana via anneaux/amulette.
     * - `magical`: renvoie la somme des dégâts magiques (si armes magiques).
     */
    public function getCharacterBonus(Character $character, string $bonus): int
    {
        $value = 0;
        $equippedItems = new ArrayCollection($this->characterItemRepository->findByEquipped($character));

        // Filtrer par catégorie
        $weapons = $equippedItems->filter(function(CharacterItem $ci) {
            return $ci->getItem()->getCategory()->getName() === 'weapon';
        });
        $armors = $equippedItems->filter(function(CharacterItem $ci) {
            return $ci->getItem()->getCategory()->getName() === 'armor';
        });
        $shields = $equippedItems->filter(function(CharacterItem $ci) {
            return $ci->getItem()->getCategory()->getName() === 'shield';
        });
        $rings = $equippedItems->filter(function(CharacterItem $ci) {
            return $ci->getItem()->getCategory()->getName() === 'ring';
        });
        $amulets = $equippedItems->filter(function(CharacterItem $ci) {
            return $ci->getItem()->getCategory()->getName() === 'amulet';
        });

        $armorItem = $armors->first() ?: null;
        $shieldItem = $shields->first() ?: null;
        $ringItem = $rings->first() ?: null;
        $amuletItem = $amulets->first() ?: null;

        switch($bonus) {

            // ----- PHYSICAL DAMAGE (armes non magiques) -----
            case 'damage':
                // On somme le "damage" effectif de toutes les armes physiques équipées,
                // en tenant compte de l'usure (méthode `calculateEffectiveDamage`).
                foreach($weapons as $weaponCI) {
                    $value += $this->calculateEffectiveDamage($weaponCI);
                }
                break;

            // ----- MAGICAL DAMAGE (armes magiques) -----
            case 'magical':
                // On somme le "damage" de toutes les armes MAGIQUES,
                // éventuellement tu peux aussi faire un "calculateEffectiveDamage" si tu veux
                // que la durabilité joue un rôle, même pour les armes magiques.
                foreach($weapons as $weaponCI) {
                    if($this->itemService->isMagicalWeapon($weaponCI) && $weaponCI->getItem()->getType() === 'Offensif') {
                        /** @var Weapon $weapon */
                        $weapon = $weaponCI->getItem();
                        if($weaponCI->getCharge() > 0) {
                            $value += $weapon->getAmount() ?? 0;
                        } else {
                            $value = 0;
                        }
                    }
                }
                break;

            // ----- DEFENSE -----
            case 'defense':
                // * Bouclier
                if($shieldItem) {
                    $value += $this->calculateEffectiveDefense($shieldItem);
                }
                // * Armure
                if($armorItem) {
                    $value += $this->calculateEffectiveDefense($armorItem);
                }
                break;

            // ----- HEALTH -----
            case 'health':
                if($ringItem && $ringItem->getItem()->getTarget() === 'health') {
                    $value += $ringItem->getItem()->getAmount();
                }
                if($amuletItem && $amuletItem->getItem()->getTarget() === 'health') {
                    $value += $amuletItem->getItem()->getAmount();
                }
                break;

            // ----- MANA -----
            case 'mana':
                if($ringItem && $ringItem->getItem()->getTarget() === 'mana') {
                    $value += $ringItem->getItem()->getAmount();
                }
                if($amuletItem && $amuletItem->getItem()->getTarget() === 'mana') {
                    $value += $amuletItem->getItem()->getAmount();
                }
                break;

            default:
                // rien
                break;
        }

        return $value;
    }

    /**
     * Calcule le bonus de dégâts effectif d'une arme physique
     * selon sa durabilité (paliers).
     * Hypothèses :
     *  - L'entité "Weapon" possède "getDamage()" pour la base
     *  - "getHealth()" pour la durabilité max (si 0 => pas d'usure)
     *  - "CharacterItem->getHealth()" => durabilité actuelle
     */
    public function calculateEffectiveDamage(CharacterItem $weaponCI): int
    {
        $weapon = $weaponCI->getItem();

        // Vérifier qu'on a bien un "Weapon" + getDamage()
        if(!$weapon instanceof Weapon || !method_exists($weapon, 'getDamage')) {
            return 0;
        }

        $baseDamage = $weapon->getDamage() ?? 0;
        // Durabilité max
        $maxDurability = $weapon->getHealth() ?? 0;
        // Durabilité actuelle
        $currentDurable = $weaponCI->getHealth() ?? 0;

        // Si pas de durabilité => on considère l'arme toujours "en forme"
        if($maxDurability <= 0) {
            return $baseDamage;
        }

        // Arme cassée => 0
        if($currentDurable <= 0) {
            return 0;
        }

        // Paliers de durabilité => ratio
        $percent = ($currentDurable / $maxDurability) * 100;
        if($percent >= 51) {
            $ratio = 1.0;    // 100%
        } else if($percent >= 21) {
            $ratio = 0.5;    // 50%
        } else if($percent >= 1) {
            $ratio = 0.25;   // 25%
        } else {
            $ratio = 0.0;    // cassé (mais on teste déjà plus haut)
        }

        $effectiveDamage = (int)floor($baseDamage * $ratio);

        // Forcer un minimum de 1 si pas cassée
        if($effectiveDamage < 1 && $currentDurable > 0) {
            $effectiveDamage = 1;
        }

        return $effectiveDamage;
    }

    /**
     * Calcule la défense "effective" d'un CharacterItem (armure ou bouclier)
     * selon sa durabilité, en paliers.
     *
     * Hypothèses :
     *  - L'entité "Armor" ou "Shield" a "getDefense()" pour la base
     *  - "getHealth()" pour la durabilité maximale
     *  - "CharacterItem->getHealth()" => durabilité actuelle
     */
    public function calculateEffectiveDefense(CharacterItem $characterItem): int
    {
        $item = $characterItem->getItem();

        if(!method_exists($item, 'getDefense')) {
            return 0;
        }

        $baseDefense = $item->getDefense() ?? 0;
        $maxDurability = $item->getHealth() ?? 0;
        $currentDurable = $characterItem->getHealth() ?? 0;

        if($maxDurability <= 0) {
            return $baseDefense;
        }
        if($currentDurable <= 0) {
            return 0;
        }

        $percent = ($currentDurable / $maxDurability) * 100;

        // Paliers
        if($percent >= 51) {
            $ratio = 1.0;
        } else if($percent >= 21) {
            $ratio = 0.5;
        } else if($percent >= 1) {
            $ratio = 0.25;
        } else {
            $ratio = 0.0;
        }

        $effective = (int)floor($baseDefense * $ratio);
        if($effective < 1 && $currentDurable > 0) {
            $effective = 1;
        }

        return $effective;
    }

    /**
     * Récupère les CharacterItems équipés, classés par slot (righthand, lefthand, armor, shield, etc.)
     */
    public function getEquippedItems(Character $character): array
    {
        $slots = ['armor', 'righthand', 'lefthand', 'bow', 'shield', 'ring', 'potion', 'scroll', 'amulet'];
        $equippedItems = $this->characterItemRepository->findByEquipped($character);
        $itemsBySlot = array_fill_keys($slots, null);

        foreach($equippedItems as $item) {
            if(in_array($item->getSlot(), $slots, true)) {
                $itemsBySlot[$item->getSlot()] = $item;
            }
        }

        return $itemsBySlot;
    }

    public function canEquipWeapon(Character $character, CharacterItem $weaponCI): bool
    {
        $profession = $character->getProfession();
        $professionType = $profession ? $profession->getType() : '';
        $isMagical = $this->itemService->isMagicalWeapon($weaponCI);
        if($isMagical) {
            return ($professionType === 'Magie');
        }

        return true;
    }

    /**
     * Ex d'utilisation: consommer/utiliser un objet (potion)
     */
    public function useItem(CharacterItem $characterItem, Character $character): Character
    {
        // ...
        return $character;
    }
}
