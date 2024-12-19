<?php

namespace App\Twig\Components\Character;

use App\Entity\Character\Character;
use App\Entity\Item\CharacterItem;
use App\Service\Item\CharacterItemService;
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

    private CharacterItemService $characterItemService;
    private EntityManagerInterface $entityManager;

    #[LiveProp(writable: true)]
    public Character $character;

    #[LiveProp(writable: true)]
    public string $type;

    public function __construct(CharacterItemService   $characterItemService,
                                EntityManagerInterface $entityManager)
    {
        $this->characterItemService = $characterItemService;
        $this->entityManager = $entityManager;
    }

    #[LiveAction]
    public function equipItem(#[LiveArg] int $id): void
    {
        $characterItem = $this->entityManager->getRepository(CharacterItem::class)->find($id);
        if($characterItem->isEquipped()) {
            $characterItem->setSlot(null);
            $characterItem->setEquipped(false);
        } else {
            $categoryName = $characterItem->getItem()->getCategory()->getName();
            $equippedItems = $this->characterItemService->getEquippedItems($characterItem->getCharacter());

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
}
