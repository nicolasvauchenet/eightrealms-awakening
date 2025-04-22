<?php

namespace App\Twig\Components\Game\Cinematic;

use App\Entity\Character\Player;
use App\Entity\Screen\CinematicScreen;
use App\Service\Game\Reward\RewardService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('CinematicScreen', template: 'game/screen/cinematic/_component/_index.html.twig')]
class CinematicComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public CinematicScreen $screen;

    #[LiveProp(writable: true)]
    public bool $isRewarded = false;

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private RewardService                   $rewardService)
    {
    }

    #[PostMount]
    public function postMount(): void
    {
        $this->isRewarded = $this->screen->isRewarded();
    }

    #[LiveAction]
    public function getReward(): void
    {
        $this->isRewarded = $this->rewardService->giveReward($this->screen, $this->character);
    }
}
