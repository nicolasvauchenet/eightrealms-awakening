<?php

namespace App\Twig\Components\Game\Repair;

use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\PlayerNpcItem;
use App\Entity\Screen\RepairScreen;
use App\Service\Item\CharacterItemService;
use App\Service\Trade\TradeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('RepairScreen', template: 'game/screen/repair/_component/_index.html.twig')]
class RepairComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public string $characterType = 'player';

    #[LiveProp(writable: true)]
    public RepairScreen $screen;

    #[LiveProp(writable: true)]
    public PlayerNpc $playerNpc;

    #[LiveProp(writable: true)]
    public string $description = '';

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private readonly CharacterItemService   $characterItemService,
                                private readonly TradeService           $tradeService)
    {
    }

    #[PostMount]
    public function postMount(): void
    {
        $this->description = "<p><strong>Vous demandez à {$this->screen->getCharacter()->getName()} de réparer vos objets usés.</strong></p>";
    }


}
