<?php

namespace App\Twig\Components\Game\Trade;

use App\Entity\Character\Npc;
use App\Entity\Character\Player;
use App\Entity\Character\PlayerCharacter;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\PlayerCharacterItem;
use App\Entity\Screen\TradeScreen;
use App\Service\Game\Trade\TradeService;
use App\Service\Item\CharacterItemService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
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
    public string $characterType = 'player';

    #[LiveProp(writable: true)]
    public TradeScreen $screen;

    #[LiveProp(writable: true)]
    public PlayerCharacter $playerCharacter;

    #[LiveProp(writable: true)]
    public string $description = '';

    #[LiveProp(writable: true)]
    public ?string $activeCategoryFilter = null;

    #[LiveProp(writable: true)]
    public ?string $sellFilter = null;

    #[LiveProp(writable: true)]
    public ?string $buyFilter = null;

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private readonly CharacterItemService   $characterItemService,
                                private readonly TradeService           $tradeService)
    {
    }

    #[PostMount]
    public function postMount(): void
    {
        $this->description = "<p><strong>Vous commercez avec {$this->screen->getCharacter()->getName()}.</strong></p>";
    }

    #[LiveAction]
    public function buyItem(#[LiveArg] int $characterItemId): void
    {
        $npcItem = $this->entityManager->getRepository(PlayerCharacterItem::class)->find($characterItemId);
        if(!$npcItem) {
            $this->description .= "<p>Objet introuvable.</p>";

            return;
        }

        if(!$this->characterItemService->canBuyItem($this->playerCharacter, $npcItem)) {
            $this->description .= "<p class='text-warning'>Vous n'avez pas assez d'argent pour acheter cet objet.</p>";

            return;
        }

        $price = $this->tradeService->getItemPrice($this->playerCharacter, $npcItem);

        // Débit joueur
        $player = $this->character;
        $player->setFortune($player->getFortune() - $price);
        $this->entityManager->persist($player);

        // Crédit NPC
        $npc = $this->playerCharacter;
        $npc->setFortune($npc->getFortune() + $price);
        $this->entityManager->persist($npc);

        // Création objet joueur
        $item = $npcItem->getItem();
        $characterItem = (new CharacterItem())
            ->setCharacter($this->character)
            ->setItem($item)
            ->setEquipped(false)
            ->setSlot(null)
            ->setHealth($npcItem->getHealth() ?? 100)
            ->setCharge($npcItem->getCharge() ?? 100)
            ->setQuestItem(false);

        if(method_exists($item, 'getHealthMax')) {
            $characterItem->setHealth($item->getHealthMax() ?? null);
        }
        if(method_exists($item, 'getChargeMax')) {
            $characterItem->setCharge($item->getChargeMax() ?? null);
        }

        $this->entityManager->persist($characterItem);

        if(!$npcItem->isOriginal()) {
            $this->entityManager->remove($npcItem);
        }

        $this->entityManager->flush();

        $this->description .= "<p><em>Vous avez acheté 1 <strong>{$item->getName()}</strong> pour $price couronne" . ($price > 1 ? 's' : '') . ".</em></p>";

        if($this->buyFilter) {
            $remaining = $this->playerCharacter->getPlayerCharacterItems()->filter(
                fn(PlayerCharacterItem $ci) => $ci->getItem()->getCategory()->getSlug() === $this->buyFilter
            );

            if($remaining->isEmpty()) {
                $this->buyFilter = null;
            }
        }
    }

    #[LiveAction]
    public function sellItem(#[LiveArg] int $characterItemId): void
    {
        $characterItem = $this->entityManager->getRepository(CharacterItem::class)->find($characterItemId);
        if(!$characterItem || $characterItem->getCharacter() !== $this->character) {
            $this->description .= "<p class='text-danger'>Objet non valide ou introuvable dans votre inventaire.</p>";

            return;
        }

        if(!$this->characterItemService->canSellItem($this->playerCharacter, $characterItem)) {
            $this->description .= "<p class='text-warning'>Le marchand ne peut pas vous acheter cet objet.</p>";

            return;
        }

        $price = $this->tradeService->getItemPrice($this->playerCharacter, $characterItem, 'sell');

        // Crédit joueur
        $player = $this->character;
        $player->setFortune($player->getFortune() + $price);
        $this->entityManager->persist($player);

        // Débit du NPC
        $npc = $this->entityManager->getRepository(Npc::class)->find($this->playerCharacter->getCharacter()->getId());
        $this->playerCharacter->setFortune($npc->getFortune() - $price);
        $this->entityManager->persist($npc);

        $item = $characterItem->getItem();

        // Vérifie si un PlayerCharacterItem existe déjà pour cet item et ce NPC
        $existingNpcItem = $this->entityManager->getRepository(PlayerCharacterItem::class)
            ->findOneBy([
                'item' => $item,
                'playerCharacter' => $this->playerCharacter,
                'original' => true,
            ]);

        // Si aucun, on en crée un nouveau (non original)
        if(!$existingNpcItem) {
            $npcItem = (new PlayerCharacterItem())
                ->setItem($item)
                ->setPlayerCharacter($this->playerCharacter)
                ->setOriginal(false)
                ->setHealth($characterItem->getHealth() ?? 100)
                ->setCharge($characterItem->getCharge() ?? 100)
                ->setQuestItem($characterItem->isQuestItem());

            $this->entityManager->persist($npcItem);
        }

        // Suppression de l'objet chez le joueur
        $this->entityManager->remove($characterItem);

        $this->entityManager->flush();

        $this->description .= "<p><em>Vous avez vendu 1 <strong>{$item->getName()}</strong> à {$npc->getName()} pour $price couronne" . ($price > 1 ? 's' : '') . ".</em></p>";

        if($this->sellFilter) {
            $filtered = $this->tradeService->getSellableItems($this->character, $npc)
                ->filter(fn(CharacterItem $ci) => $ci->getItem()->getCategory()->getSlug() === $this->sellFilter);

            if($filtered->isEmpty()) {
                $this->sellFilter = null;
            }
        }
    }

    #[LiveAction]
    public function filterSell(#[LiveArg] ?string $category = null): void
    {
        $this->sellFilter = $category;
        $this->activeCategoryFilter = $category;
    }

    #[LiveAction]
    public function filterBuy(#[LiveArg] ?string $category = null): void
    {
        $this->buyFilter = $category;
        $this->activeCategoryFilter = $category;
    }
}
