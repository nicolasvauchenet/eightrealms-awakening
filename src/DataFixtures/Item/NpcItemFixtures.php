<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\NpcItem\DruidTrait;
use App\DataFixtures\Item\NpcItem\DwarfTrait;
use App\DataFixtures\Item\NpcItem\FishermenTrait;
use App\DataFixtures\Item\NpcItem\GartTrait;
use App\DataFixtures\Item\NpcItem\JarrodTrait;
use App\DataFixtures\Item\NpcItem\MinionsTrait;
use App\DataFixtures\Item\NpcItem\SophieTrait;
use App\DataFixtures\Item\NpcItem\ThugsTrait;
use App\DataFixtures\Item\NpcItem\WilbertTrait;
use App\Entity\Character\Npc;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class NpcItemFixtures extends Fixture implements OrderedFixtureInterface
{
    use SophieTrait;
    use JarrodTrait;
    use GartTrait;
    use WilbertTrait;
    use FishermenTrait;
    use ThugsTrait;
    use MinionsTrait;
    use DwarfTrait;
    use DruidTrait;

    public function load(ObjectManager $manager): void
    {
        $allCharacterItems = [
            // Sophie la Marchande
            self::SOPHIE_ITEMS,

            // Jarrod le Tavernier
            self::JARROD_ITEMS,

            // Gart le Forgeron
            self::GART_ITEMS,

            // Wilbert l'Arcaniste
            self::WILBERT_ITEMS,

            // Pêcheurs
            self::FISHERMEN_ITEMS,

            // Malfrats
            self::THUGS_ITEMS,

            // Sbires
            self::MINIONS_ITEMS,

            // Nains
            self::DWARF_ITEMS,

            // Druides
            self::DRUID_ITEMS,
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
                    ->setCharacter($this->getReference($data['character'], Npc::class))
                    ->setItem($item);
                $manager->persist($characterItem);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 20;
    }
}
