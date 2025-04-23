<?php

namespace App\Twig\Components\Game\Trade;

use App\Entity\Character\Player;
use App\Entity\Screen\TradeScreen;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('TradeScreen', template: 'game/screen/trade/_component/_index.html.twig')]
class TradeComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public TradeScreen $screen;

    #[LiveProp(writable: true)]
    public string $description = '';

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    #[PostMount]
    public function postMount(): void
    {
        $this->description = "<p><strong>Vous commercez avec {$this->screen->getCharacter()->getName()}.</strong></p>";
    }
}
