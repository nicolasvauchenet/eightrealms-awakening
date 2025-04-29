<?php

namespace App\Service\Combat\Helper;

use App\Entity\Item\CharacterItem;
use Doctrine\ORM\EntityManagerInterface;
use Random\RandomException;

readonly class DurabilityHelperService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function handleWeaponUsage(CharacterItem $characterItem): ?string
    {
        if(!$characterItem->getItem() || !$this->isWeapon($characterItem)) {
            return null;
        }

        $characterItem->setUsage($characterItem->getUsage() + 1);

        if($characterItem->getUsage() % 5 === 0) {
            $characterItem->setHealth(max(0, $characterItem->getHealth() - 1));

            $this->entityManager->persist($characterItem);
            $this->entityManager->flush();

            return "<small class='text-warning'>Votre arme {$characterItem->getItem()->getName()} montre des signes d'usure.</small><br/>";
        }

        $this->entityManager->persist($characterItem);
        $this->entityManager->flush();

        return null;
    }

    public function handleArmorAndShieldUsage(array $equippedItems): array
    {
        $logs = [];

        foreach(['armor', 'shield'] as $slot) {
            if(!isset($equippedItems[$slot])) {
                continue;
            }

            $characterItem = $equippedItems[$slot];
            $characterItem->setUsage($characterItem->getUsage() + 1);

            if($characterItem->getUsage() % 5 === 0) {
                $characterItem->setHealth(max(0, $characterItem->getHealth() - 1));
                $logs[] = "<small class='text-warning'>Votre {$characterItem->getItem()->getName()} commence à se fissurer.</small><br/>";
            }

            $this->entityManager->persist($characterItem);
        }

        $this->entityManager->flush();

        return $logs;
    }

    /**
     * @throws RandomException
     */
    /**
     * @throws RandomException
     */
    public function handleCriticalHitDamage(?CharacterItem $attackerWeapon, array $defenderEquipments, bool $defenseIsCritical, bool $isPlayerWeapon = true): array
    {
        $logs = [];

        if($attackerWeapon && $isPlayerWeapon) {
            $damage = random_int(2, 5);
            $attackerWeapon->setHealth(max(0, $attackerWeapon->getHealth() - $damage));

            $logs[] = "<small class='text-danger'>Votre arme {$attackerWeapon->getItem()->getName()} subit $damage point" . ($damage > 1 ? 's' : '') . " de dégâts critiques !</small><br/>";
            $this->entityManager->persist($attackerWeapon);
        }

        if(!$defenseIsCritical) {
            foreach(['armor', 'shield'] as $slot) {
                if(isset($defenderEquipments[$slot])) {
                    $equipment = $defenderEquipments[$slot];
                    $damage = random_int(2, 5);
                    $equipment->setHealth(max(0, $equipment->getHealth() - $damage));
                    $logs[] = "<small class='text-danger'>{$equipment->getItem()->getName()} montre des signes de détérioration ($damage point" . ($damage > 1 ? 's' : '') . ") !</small><br/>";
                    $this->entityManager->persist($equipment);
                }
            }
        }

        $this->entityManager->flush();

        return $logs;
    }

    private function isWeapon(CharacterItem $characterItem): bool
    {
        $category = $characterItem->getItem()?->getCategory()?->getSlug();

        return in_array($category, ['arme', 'arme-magique']);
    }
}
