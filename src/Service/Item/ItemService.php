<?php

namespace App\Service\Item;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use App\Entity\Item\Weapon;
use App\Entity\Character\PlayerNpc;
use App\Service\Location\CharacterLocationReputationService;
use Doctrine\ORM\EntityManagerInterface;

class ItemService
{
    private EntityManagerInterface $entityManager;
    private CharacterLocationReputationService $characterLocationReputationService;

    public function __construct(
        EntityManagerInterface             $entityManager,
        CharacterLocationReputationService $characterLocationReputationService
    )
    {
        $this->entityManager = $entityManager;
        $this->characterLocationReputationService = $characterLocationReputationService;
    }

    public function buyItem(Item $item, PlayerNpc $playerNpc, int $price, Player $character): Player
    {
        $playerNpc->setFortune($playerNpc->getFortune() + $price);
        $this->entityManager->persist($playerNpc);

        $character->setFortune($character->getFortune() - $price);
        $characterItem = (new CharacterItem())
            ->setCharacter($character)
            ->setItem($item)
            ->setEquipped(false)
            ->setHealth($item->getHealth());

        // Si c'est une arme (Weapon), on initialise la charge
        if($item instanceof Weapon) {
            $characterItem->setCharge($item->getCharge());
        }

        $this->entityManager->persist($characterItem);
        $this->entityManager->persist($character);

        $this->entityManager->flush();

        return $character;
    }

    public function sellItem(CharacterItem $characterItem, PlayerNpc $playerNpc, int $price, Player $character): Player
    {
        $playerNpc->setFortune($playerNpc->getFortune() - $price);
        $this->entityManager->persist($playerNpc);

        $character->setFortune($character->getFortune() + $price)
            ->removeCharacterItem($characterItem);
        $this->entityManager->remove($characterItem);
        $this->entityManager->persist($character);

        $this->entityManager->flush();

        return $character;
    }

    public function getItemBuyPrice(Item $item, Player $character): int
    {
        $basePrice = $item->getBuyPrice() ?: 0;
        $reputation = $this->characterLocationReputationService->getTotalReputation(
            $character,
            $character->getCurrentPlace()->getLocation()
        );
        $charisma = $character->getCharisma();

        return (int)round(
            $basePrice
            * (1 - $reputation / 100)
            * (1 - $charisma * 0.01)
        );
    }

    public function getItemSellPrice(CharacterItem $characterItem, Player $character): int
    {
        $basePrice = $characterItem->getItem()->getBuyPrice() ?: 0;
        $reputation = min(
            50,
            $this->characterLocationReputationService->getTotalReputation(
                $character,
                $character->getCurrentPlace()->getLocation()
            )
        );
        $charisma = $character->getCharisma() ?? 10;

        // On récupère le "durability factor"
        $healthFactor = $this->getItemDurabilityFactor($characterItem);

        // Formule de vente
        $sellPrice = ($basePrice / 2)
            * (1 + $reputation / 200)
            * (1 + $charisma * 0.005)
            * $healthFactor;

        return (int)round($sellPrice);
    }

    /**
     * Calcule un "durability factor" (0..1) pour n’importe quel CharacterItem
     * (arme, armure, bouclier...), en utilisant des paliers de durabilité.
     *
     * Hypothèse :
     *  - $characterItem->getHealth() => durabilité actuelle
     *  - $characterItem->getCharge() => charge actuelle (pour certaines armes magiques)
     *  - $item->getHealth() => durabilité maximale
     *  - $item->getCharge() => charge maximale
     * On prend le max des deux si c’est un Weapon (ex. l’arme peut avoir un usage "physique" (health)
     * ET un usage "magique" (charge)).
     *
     * Paliers d’exemple :
     *   - ≥ 51% : 100% (1.0)
     *   - ≥ 21% : 50%  (0.5)
     *   - ≥ 1%  : 25%  (0.25)
     *   -  0%   : 0
     */
    public function getItemDurabilityFactor(CharacterItem $characterItem): float
    {
        $item = $characterItem->getItem();

        // Récupération de la durabilité/charge actuelles
        $currentHealth = $characterItem->getHealth() ?? 0;
        $currentCharge = $characterItem->getCharge() ?? 0;

        // Récupération de la durabilité/charge maximales
        $maxHealth = $item->getHealth() ?? 0;
        $maxCharge = 0;
        if($item instanceof Weapon) {
            // Pour les armes, on peut envisager un champ getCharge()
            // (ex. baguettes, arcs magiques, etc.)
            $maxCharge = $item->getCharge() ?? 0;
        }

        // On prend la plus grande des deux valeurs (health / charge)
        $current = max($currentHealth, $currentCharge);
        $maximum = max($maxHealth, $maxCharge);

        // Si pas de notion de durabilité (max=0), ratio = 1 (plein)
        if($maximum <= 0) {
            return 1.0;
        }

        // Si la durabilité actuelle est 0 => ratio = 0
        if($current <= 0) {
            return 0.0;
        }

        // Calcul du pourcentage
        $percent = ($current / $maximum) * 100;

        // Paliers (exemple) :
        //   - ≥ 51% : ratio=1.0  (plein)
        //   - ≥ 21% : ratio=0.5
        //   - ≥ 1%  : ratio=0.25
        //   - 0%    : ratio=0.0
        if($percent >= 51) {
            $ratio = 1.0;
        } else if($percent >= 21) {
            $ratio = 0.5;
        } else if($percent >= 1) {
            $ratio = 0.25;
        } else {
            $ratio = 0.0;
        }

        return $ratio;
    }

    /**
     * Détermine si l'arme (CharacterItem) est considérée "magique".
     * Ex.: si l'entité Weapon a un champ "charge" non null,
     *      ou un booléen "isMagical", etc.
     */
    public function isMagicalWeapon(CharacterItem $weaponCI): bool
    {
        $item = $weaponCI->getItem();
        if(!$item instanceof Weapon) {
            return false;
        }

        // Par exemple, on considère "magique" si "charge" n'est pas null
        // ou si un champ "isMagical() === true" existe.
        if(method_exists($item, 'getCharge') && $item->getCharge() !== null) {
            return true;
        }

        return false;
    }
}
