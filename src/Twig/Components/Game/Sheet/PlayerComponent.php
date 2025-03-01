<?php

namespace App\Twig\Components\Game\Sheet;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Service\Item\CharacterItemService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('PlayerSheet', template: 'game/character/sheet/player/_component/_index.html.twig')]
class PlayerComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public string $activeContent = 'details';

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private readonly CharacterItemService   $characterItemService)
    {
    }

    #[LiveAction]
    public function setActiveContent(#[LiveArg] string $content): void
    {
        $this->activeContent = $content;
    }

    #[LiveAction]
    public function equipItem(#[LiveArg] int $characterItemId): void
    {
        $characterItem = $this->entityManager->getRepository(CharacterItem::class)->find($characterItemId);
        if(!$characterItem) {
            return;
        }

        if(!$this->characterItemService->canEquipItem($this->character, $characterItem)) {
            return;
        }

        $categoryName = $characterItem->getItem()->getCategory()->getSlug();
        $equippedItems = $this->characterItemService->getEquippedItems($this->character);

        if($characterItem->isEquipped()) {
            switch($categoryName) {
                case 'arme':
                case 'arme-magique':
                    if($characterItem === $equippedItems['righthand'] && isset($equippedItems['lefthand'])) {
                        $equippedItems['lefthand']->setSlot('righthand');
                    }
                    break;
                default:
                    break;
            }
            $characterItem->setSlot(null);
            $characterItem->setEquipped(false);
        } else {
            $categoryCode = $characterItem->getItem()->getCategory()->getFolder();

            switch($categoryName) {
                case 'armure':
                    if(isset($equippedItems['armor'])) {
                        $equippedItems['armor']->setEquipped(false)->setSlot(null);
                    }
                    $characterItem->setSlot('armor');
                    break;
                case 'arme':
                case 'arme-magique':
                    if(in_array($characterItem->getItem()->getType(), ['Arme de jet', 'Arme de jet enchantée'])) {
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
                case 'anneau':
                case 'parchemin':
                case 'potion':
                    if(isset($equippedItems[$categoryCode])) {
                        $equippedItems[$categoryCode]->setEquipped(false)->setSlot(null);
                    }
                    $characterItem->setSlot($categoryCode);
                    break;
                case 'amulette':
                    $characterItem->setSlot('amulet');
                    break;
                case 'bouclier':
                    if(isset($equippedItems['shield'])) {
                        $equippedItems['shield']->setEquipped(false)->setSlot(null);
                    }
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
        if(in_array($characterItem->getItem()->getCategory()->getSlug(), ['potion', 'nourriture'])) {
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
