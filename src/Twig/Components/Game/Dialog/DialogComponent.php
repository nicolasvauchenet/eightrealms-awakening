<?php

namespace App\Twig\Components\Game\Dialog;

use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Entity\Dialog\DialogReply;
use App\Entity\Dialog\DialogStep;
use App\Entity\Screen\DialogScreen;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('DialogScreen', template: 'game/screen/dialog/_component/_index.html.twig')]
class DialogComponent extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public DialogScreen $screen;

    #[LiveProp(writable: true)]
    public PlayerNpc $playerNpc;

    #[LiveProp(writable: true)]
    public string $description = '';

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    #[PostMount]
    public function postMount(): void
    {
        $this->description = $this->screen->getDialogStep()->getText();
    }

    #[LiveAction]
    public function reply(#[LiveArg] int $replyId): RedirectResponse
    {
        $reply = $this->entityManager->getRepository(DialogReply::class)->find($replyId);

        return $this->redirectToRoute('app_game_screen_dialog', [
            'id' => $reply->getNextStep()->getId(),
        ]);
    }
}
