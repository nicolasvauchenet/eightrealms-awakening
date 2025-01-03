<?php

namespace App\Service\Item;

use App\Entity\Character\Character;
use App\Entity\Item\CharacterItem;
use App\Repository\Item\CharacterItemRepository;
use Doctrine\Common\Collections\ArrayCollection;

class CharacterItemService
{
    private CharacterItemRepository $characterItemRepository;

    public function __construct(CharacterItemRepository $characterItemRepository)
    {
        $this->characterItemRepository = $characterItemRepository;
    }

    public function getCharacterItems(Character $character): array
    {
        return $this->characterItemRepository->findCharacterItems($character);
    }

    /**
     * Méthode pour récupérer le bonus d'un type donné (damage, defense, health, mana, etc.).
     *
     * Pour la partie "defense", on intègre le calcul de la défense variable
     * si l'item est partiellement endommagé.
     * Pour la partie "damage", on applique un calcul similaire
     * afin de réduire le bonus d'attaque si l'arme est abîmée.
     */
    public function getCharacterBonus(Character $character, string $bonus): int
    {
        $value = 0;
        $equippedItems = new ArrayCollection($this->characterItemRepository->findByEquipped($character));

        // Filtrages
        $weapons = $equippedItems->filter(function($characterItem) {
            return $characterItem->getItem()->getCategory()->getName() === 'weapon';
        });
        $armors = $equippedItems->filter(function($characterItem) {
            return $characterItem->getItem()->getCategory()->getName() === 'armor';
        });
        $shields = $equippedItems->filter(function($characterItem) {
            return $characterItem->getItem()->getCategory()->getName() === 'shield';
        });
        $rings = $equippedItems->filter(function($characterItem) {
            return $characterItem->getItem()->getCategory()->getName() === 'ring';
        });
        $amulets = $equippedItems->filter(function($characterItem) {
            return $characterItem->getItem()->getCategory()->getName() === 'amulet';
        });

        $armorItem = $armors->first() ?: null;
        $shieldItem = $shields->first() ?: null;
        $ringItem = $rings->first() ?: null;
        $amuletItem = $amulets->first() ?: null;

        switch($bonus) {
            case 'damage':
                // On somme le bonus d'attaque / dégâts des armes,
                // en tenant compte de l'usure.
                foreach($weapons as $weaponCI) {
                    /** @var CharacterItem $weaponCI */
                    // Calcul du "damage" effectif d'une arme usée
                    $value += $this->calculateEffectiveDamage($weaponCI);
                }
                break;

            case 'defense':
                // * Bouclier
                if($shieldItem) {
                    // Calculer la défense effective (paliers)
                    $value += $this->calculateEffectiveDefense($shieldItem);
                }
                // * Armure
                if($armorItem) {
                    $value += $this->calculateEffectiveDefense($armorItem);
                }
                break;

            case 'health':
                // Ex: anneau ou amulette qui ajoute de la health
                if($ringItem && $ringItem->getItem()->getTarget() === 'health') {
                    $value += $ringItem->getItem()->getAmount();
                }
                if($amuletItem && $amuletItem->getItem()->getTarget() === 'health') {
                    $value += $amuletItem->getItem()->getAmount();
                }
                break;

            case 'mana':
                // Ex: anneau/amulette qui ajoute du mana
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
     * Calcule le bonus d'attaque effectif d'une arme en fonction de sa durabilité,
     * en utilisant un système de paliers (même principe que pour la défense).
     */
    public function calculateEffectiveDamage(CharacterItem $weaponCI): int
    {
        $weapon = $weaponCI->getItem();

        // Vérifier si l'objet a bien une méthode "getDamage"
        // et un champ "health" => sinon, 0
        if(!method_exists($weapon, 'getDamage') || !method_exists($weapon, 'getHealth')) {
            return 0;
        }

        // Récupérer le damage de base
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

        // On applique un système de paliers comme pour la défense
        $percent = ($currentDurable / $maxDurability) * 100;

        // Paliers (exemple) :
        if($percent >= 51) {
            $ratio = 1.0;    // 100%
        } else if($percent >= 21) {
            $ratio = 0.5;    // 50%
        } else if($percent >= 1) {
            $ratio = 0.25;   // 25%
        } else {
            $ratio = 0.0;    // cassé
        }

        $effectiveDamage = (int)floor($baseDamage * $ratio);

        // Forcer un minimum de 1 si l'arme n'est pas cassée
        if($effectiveDamage < 1 && $currentDurable > 0) {
            $effectiveDamage = 1;
        }

        return $effectiveDamage;
    }

    /**
     * Calcule la défense "effective" d'un CharacterItem d'armure ou de bouclier
     * selon sa durabilité, en utilisant des paliers (non linéaire).
     *
     * Hypothèses :
     * - L'entité "Armor" ou "Shield" possède "getDefense()" pour la défense max
     * - "getHealth()" pour la durabilité maximale
     * - Le "CharacterItem" stocke la durabilité actuelle dans "CharacterItem->getHealth()"
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

        // Pas de notion de durabilité ?
        if($maxDurability <= 0) {
            return $baseDefense;
        }
        // Objet cassé => 0
        if($currentDurable <= 0) {
            return 0;
        }

        $percent = ($currentDurable / $maxDurability) * 100;

        // Paliers pour la défense
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

        // Si on n’est PAS cassé et que le calcul est 0, on met au moins 1
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

    /**
     * Ex d'utilisation: consommer/utiliser un objet (potion)
     */
    public function useItem(CharacterItem $characterItem, Character $character): Character
    {
        // ...
        return $character;
    }
}
