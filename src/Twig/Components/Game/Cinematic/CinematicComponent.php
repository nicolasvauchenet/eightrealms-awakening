<?php

namespace App\Twig\Components\Game\Cinematic;

use App\Entity\Character\Player;
use App\Entity\Reward\PlayerReward;
use App\Entity\Screen\CinematicScreen;
use App\Service\Reward\RewardService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
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
    public bool $hasReward = false;

    #[LiveProp(writable: true)]
    public bool $isRewarded = false;

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private readonly RewardService          $rewardService)
    {
    }

    #[PostMount]
    public function postMount(): void
    {
        $playerReward = $this->entityManager->getRepository(PlayerReward::class)->findOneBy(['player' => $this->character, 'reward' => $this->screen->getReward()]);
        $this->hasReward = $this->screen->getReward() === null ? false : true;
        $this->isRewarded = $playerReward === null ? false : true;
    }

    #[LiveAction]
    public function getReward(): void
    {
        $this->isRewarded = $this->rewardService->giveRewardByScreen($this->screen, $this->character);
    }
}
