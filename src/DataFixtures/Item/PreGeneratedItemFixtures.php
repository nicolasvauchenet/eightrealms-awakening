<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\PreGeneratedItem\AldrinTrait;
use App\DataFixtures\Item\PreGeneratedItem\ElandraTrait;
use App\DataFixtures\Item\PreGeneratedItem\EryndorTrait;
use App\DataFixtures\Item\PreGeneratedItem\GrymmTrait;
use App\DataFixtures\Item\PreGeneratedItem\IsileaTrait;
use App\DataFixtures\Item\PreGeneratedItem\LyraTrait;
use App\DataFixtures\Item\PreGeneratedItem\TharashaTrait;
use App\DataFixtures\Item\PreGeneratedItem\ThorinTrait;
use App\Entity\Character\PreGenerated;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PreGeneratedItemFixtures extends Fixture implements OrderedFixtureInterface
{
    use AldrinTrait;
    use ElandraTrait;
    use EryndorTrait;
    use LyraTrait;
    use TharashaTrait;
    use IsileaTrait;
    use ThorinTrait;
    use GrymmTrait;

    public function load(ObjectManager $manager): void
    {
        $allCharacterItems = [
            // Aldrin le Brave
            self::ALDRIN_ITEMS,

            // Elandra la Sage
            self::ELANDRA_ITEMS,

            // Eryndor le Vigilant
            self::ERYNDOR_ITEMS,

            // Lyra l’Agile
            self::LYRA_ITEMS,

            // Tharasha la Sauvage
            self::THARASHA_ITEMS,

            // Isilëa la Gardienne
            self::ISILEA_ITEMS,

            // Thorin le Féroce
            self::THORIN_ITEMS,

            // Grymm le Bricoleur
            self::GRYMM_ITEMS,
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
                    ->setEquipped($data['equipped'])
                    ->setSlot($data['slot'] ?? null)
                    ->setQuestItem(false)
                    ->setCharacter($this->getReference($data['character'], PreGenerated::class))
                    ->setItem($item);
                $manager->persist($characterItem);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 19;
    }
}
