<?php

namespace App\Twig\Components\Character;

use App\Entity\Character\Character;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('Sheet', template: 'character/sheet/_component.html.twig')]
class SheetComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Character $character;

    #[LiveProp(writable: true)]
    public string $type;
}
