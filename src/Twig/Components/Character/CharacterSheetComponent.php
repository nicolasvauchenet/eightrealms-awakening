<?php

namespace App\Twig\Components\Character;

use App\Entity\Character\Character;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Food;
use App\Entity\Item\Potion;
use App\Service\Game\Combat\UseItemService;
use App\Service\Item\CharacterItemService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('CharacterSheet', template: 'character/sheet/_component/_index.html.twig')]
class CharacterSheetComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Character $character;

    #[LiveProp(writable: true)]
    public string $characterType;

    #[LiveProp(writable: true)]
    public ?string $back = null;

    #[LiveProp(writable: true)]
    public string $activeContent = 'details';

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private readonly CharacterItemService   $characterItemService,
                                private readonly UseItemService         $useItemService)
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

        $this->characterItemService->toggleEquipItem($this->character, $characterItem);
        $this->entityManager->flush();
    }

    #[LiveAction]
    public function useItem(#[LiveArg] int $characterItemId): void
    {
        $characterItem = $this->entityManager->getRepository(CharacterItem::class)->find($characterItemId);

        if(!$characterItem || !$characterItem->getItem()) {
            return;
        }

        $item = $characterItem->getItem();
        $itemClass = get_class($item);

        // On ne permet que Potion ou Food
        if(!in_array($itemClass, [Potion::class, Food::class])) {
            return;
        }

        $this->useItemService->useItem($this->character, $characterItem);

        $this->entityManager->persist($this->character);
        $this->entityManager->flush();
    }
}
