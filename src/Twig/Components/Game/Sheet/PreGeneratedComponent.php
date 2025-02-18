<?php

namespace App\Twig\Components\Game\Sheet;

use App\Entity\Character\PreGenerated;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('PreGeneratedSheet', template: 'game/character/sheet/pregenerated/_component/_index.html.twig')]
class PreGeneratedComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public PreGenerated $character;

    #[LiveProp(writable: true)]
    public string $activeContent = 'details';

    #[LiveAction]
    public function setActiveContent(#[LiveArg] string $content): void
    {
        $this->activeContent = $content;
    }
}
