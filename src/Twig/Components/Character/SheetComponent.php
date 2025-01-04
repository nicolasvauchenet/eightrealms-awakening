<?php

namespace App\Twig\Components\Character;

use App\Entity\Character\Character;
use App\Entity\Item\CharacterItem;
use App\Service\Item\CharacterItemService;
use App\Service\Item\ItemService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('Sheet', template: 'character/sheet/_component.html.twig')]
class SheetComponent
{
    use DefaultActionTrait;

    private EntityManagerInterface $entityManager;
    private CharacterItemService $characterItemService;

    #[LiveProp(writable: true)]
    public Character $character;

    #[LiveProp(writable: true)]
    public string $type;
    private ItemService $itemService;

    public function __construct(EntityManagerInterface $entityManager,
                                CharacterItemService   $characterItemService, ItemService $itemService)
    {
        $this->entityManager = $entityManager;
        $this->characterItemService = $characterItemService;
        $this->itemService = $itemService;
    }

    #[LiveAction]
    public function equipItem(#[LiveArg] int $characterItemId): void
    {
        $characterItem = $this->entityManager->getRepository(CharacterItem::class)->find($characterItemId);
        if(!$characterItem) {
            return;
        }

        $isMagical = $this->itemService->isMagicalWeapon($characterItem);

        if($isMagical && $this->character->getProfession()->getType() !== 'Magie') {
            return;
        }

        if($characterItem->isEquipped()) {
            $characterItem->setSlot(null);
            $characterItem->setEquipped(false);
        } else {
            $categoryName = $characterItem->getItem()->getCategory()->getName();
            $equippedItems = $this->characterItemService->getEquippedItems($this->character);

            switch($categoryName) {
                case 'armor':
                    if(isset($equippedItems['armor'])) {
                        $equippedItems['armor']->setEquipped(false)->setSlot(null);
                    }
                    $characterItem->setSlot('armor');
                    break;

                case 'weapon':
                    if($characterItem->getItem()->getType() === 'Distance') {
                        if(isset($equippedItems['righthand'])) {
                            $equippedItems['righthand']->setEquipped(false)->setSlot(null);
                        }
                        if(isset($equippedItems['lefthand'])) {
                            $equippedItems['lefthand']->setEquipped(false)->setSlot(null);
                        }
                        if(isset($equippedItems['shield'])) {
                            $equippedItems['shield']->setEquipped(false)->setSlot(null);
                        }
                        $characterItem->setSlot('bow');
                        break;
                    }

                    if(!isset($equippedItems['righthand'])) {
                        $characterItem->setSlot('righthand');
                    } else {
                        if(!isset($equippedItems['lefthand'])) {
                            if(isset($equippedItems['shield'])) {
                                $equippedItems['shield']->setEquipped(false)->setSlot(null);
                            }
                            $characterItem->setSlot('lefthand');
                        } else {
                            $equippedItems['righthand']->setEquipped(false)->setSlot(null);
                            $characterItem->setSlot('righthand');
                        }
                    }

                    if(isset($equippedItems['bow'])) {
                        $equippedItems['bow']->setEquipped(false)->setSlot(null);
                    }
                    break;

                case 'ring':
                case 'scroll':
                case 'potion':
                    if(isset($equippedItems[$categoryName])) {
                        $equippedItems[$categoryName]->setEquipped(false)->setSlot(null);
                    }
                    $characterItem->setSlot($categoryName);
                    break;

                case 'amulet':
                    $characterItem->setSlot('amulet');
                    break;

                case 'shield':
                    if(isset($equippedItems['lefthand'])) {
                        $equippedItems['lefthand']->setEquipped(false)->setSlot(null);
                    }
                    if(isset($equippedItems['bow'])) {
                        $equippedItems['bow']->setEquipped(false)->setSlot(null);
                    }
                    $characterItem->setSlot('shield');
                    break;

                default:
                    $characterItem->setSlot(null);
                    break;
            }
            $characterItem->setEquipped(true);
        }

        $this->entityManager->persist($characterItem);
        $this->entityManager->flush();
    }

    #[LiveAction]
    public function useItem(#[LiveArg] int $characterItemId): void
    {
        $characterItem = $this->entityManager->getRepository(CharacterItem::class)->find($characterItemId);
        if($characterItem->getItem()->getType() === 'Défensif' || $characterItem->getItem()->getType() === 'food') {
            switch($characterItem->getItem()->getTarget()) {
                case 'health':
                    $this->character->setHealth($this->character->getHealth() + $characterItem->getItem()->getAmount());
                    if($this->character->getHealthMax() < $this->character->getHealth()) {
                        $this->character->setHealth($this->character->getHealthMax());
                    }
                    break;
                case 'mana':
                    $this->character->setMana($this->character->getMana() + $characterItem->getItem()->getAmount());
                    if($this->character->getManaMax() < $this->character->getMana()) {
                        $this->character->setMana($this->character->getManaMax());
                    }
                    break;
                default:
                    break;
            }

            $this->character->removeCharacterItem($characterItem);
            $this->entityManager->remove($characterItem);
        }

        $this->entityManager->persist($this->character);
        $this->entityManager->flush();
    }
}
