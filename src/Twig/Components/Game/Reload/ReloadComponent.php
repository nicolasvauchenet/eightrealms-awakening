<?php

namespace App\Twig\Components\Game\Reload;

use App\Entity\Character\Player;
use App\Entity\Character\PlayerCharacter;
use App\Entity\Item\CharacterItem;
use App\Entity\Screen\ReloadScreen;
use App\Service\Game\Trade\TradeService;
use App\Service\Item\CharacterItemService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('ReloadScreen', template: 'game/screen/reload/_component/_index.html.twig')]
class ReloadComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public string $characterType = 'player';

    #[LiveProp(writable: true)]
    public ReloadScreen $screen;

    #[LiveProp(writable: true)]
    public PlayerCharacter $playerCharacter;

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
        $this->description = "<p><strong>Vous demandez à {$this->screen->getCharacter()->getName()} de recharger vos objets magiques.</strong></p>";
    }

    #[LiveAction]
    public function reloadItem(#[LiveArg] int $characterItemId): void
    {
        $characterItem = $this->entityManager->getRepository(CharacterItem::class)->find($characterItemId);
        if(!$characterItem || $characterItem->getCharacter() !== $this->character) {
            $this->description .= "<p class='text-danger'>Objet introuvable ou invalide.</p>";

            return;
        }

        $price = $this->tradeService->getItemPrice($this->playerCharacter, $characterItem, 'reload');

        if($this->character->getFortune() < $price) {
            $this->description .= "<p class='text-warning'>Vous n'avez pas assez de couronnes pour faire recharger votre <strong>{$characterItem->getItem()->getName()}</strong>.</p>";

            return;
        }

        $this->character->setFortune($this->character->getFortune() - $price);
        $this->playerCharacter->setFortune($this->playerCharacter->getFortune() + $price);

        if(method_exists($characterItem->getItem(), 'getChargeMax')) {
            $characterItem->setCharge($characterItem->getItem()->getChargeMax());
        }

        $this->entityManager->persist($this->character);
        $this->entityManager->persist($this->playerCharacter);
        $this->entityManager->persist($characterItem);
        $this->entityManager->flush();

        $this->description .= "<p class='text-success'><strong>{$characterItem->getItem()->getName()}</strong> a été rechargé pour {$price} couronne" . ($price > 1 ? 's' : '') . ".</p>";
    }

    #[LiveAction]
    public function reloadAllItems(#[LiveArg] int $characterId): void
    {
        if($this->character->getId() !== $characterId) {
            $this->description .= "<p class='text-danger'>Erreur de personnage.</p>";

            return;
        }

        $reloadableItems = $this->tradeService->getReloadableItems($this->character);
        $totalCost = $this->tradeService->getTotalPrice($this->playerCharacter, $reloadableItems, 'reload');

        if($this->character->getFortune() < $totalCost) {
            $this->description .= "<p class='text-warning'>Vous n'avez pas assez de couronnes pour tout faire recharger.</p>";

            return;
        }

        foreach($reloadableItems as $item) {
            $item->setCharge($item->getItem()->getChargeMax());
            $this->entityManager->persist($item);
        }

        $this->character->setFortune($this->character->getFortune() - $totalCost);
        $this->playerCharacter->setFortune($this->playerCharacter->getFortune() + $totalCost);
        $this->entityManager->persist($this->character);
        $this->entityManager->persist($this->playerCharacter);

        $this->entityManager->flush();

        $this->description .= "<p class='text-success'>Tous vos objets magiques ont été rechargés pour <strong>{$totalCost}</strong> couronne" . ($totalCost > 1 ? 's' : '') . ".</p>";
    }
}
