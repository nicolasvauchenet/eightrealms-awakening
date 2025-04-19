<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\CreatureItem\GobelinsTrait;
use App\DataFixtures\Item\CreatureItem\RatsTrait;
use App\Entity\Character\Creature;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CreatureItemFixtures extends Fixture implements OrderedFixtureInterface
{
    use RatsTrait;
    use GobelinsTrait;

    public function load(ObjectManager $manager): void
    {
        $allCharacterItems = [
            // Rats
            self::RATS_ITEMS,

            // Gobelins
            self::GOBELINS_ITEMS,
        ];

        foreach($allCharacterItems as $characterItems) {
            foreach($characterItems as $data) {
                $characterItem = new CharacterItem();
                $item = $this->getReference($data['item'], $data['class']);
                if($item instanceof Armor || $item instanceof Shield) {
                    $itemHealth = $item->getHealthMax();
                    $itemCharge = null;
                } else if($item instanceof Weapon) {
                    $itemHealth = $item->getHealthMax();
                } else if($item instanceof MagicalWeapon) {
                    $itemHealth = null;
                    $itemCharge = $item->getChargeMax();
                } else {
                    $itemHealth = null;
                    $itemCharge = null;
                }
                $characterItem->setHealth($itemHealth ?? null)
                    ->setCharge($itemCharge ?? null)
                    ->setEquipped($data['equipped'] ?? false)
                    ->setSlot($data['slot'] ?? null)
                    ->setQuestItem(false)
                    ->setCharacter($this->getReference($data['character'], Creature::class))
                    ->setItem($item);
                $manager->persist($characterItem);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 21;
    }
}
