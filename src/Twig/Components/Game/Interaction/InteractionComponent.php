<?php

namespace App\Twig\Components\Game\Interaction;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Entity\Screen\InteractionScreen;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('InteractionScreen', template: 'game/screen/interaction/_component/_index.html.twig')]
class InteractionComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public InteractionScreen $screen;

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
        $this->description = $this->screen->getDescription() ?? '';
    }

    #[LiveAction]
    public function pray(#[LiveArg] string $characterSlug): void
    {
        $character = $this->entityManager->getRepository(Character::class)->findOneBy(['slug' => $characterSlug]);
        $this->character->setHealth($this->character->getHealthMax())
            ->setMana($this->character->getManaMax())
            ->setFortune(max(0, $this->character->getFortune() - 15));
        $this->entityManager->persist($this->character);
        $this->entityManager->flush();

        $this->description .= "<p class='text-success'><strong>Vous priez avec {$character->getName()}.</strong></p>";
    }
}
