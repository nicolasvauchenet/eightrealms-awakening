<?php

namespace App\Twig\Components\Game\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Screen\CombatScreen;
use App\Service\Combat\CombatService;
use App\Service\Combat\InitiativeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('CombatScreen', template: 'game/screen/combat/_component/_index.html.twig')]
class CombatComponent extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public string $characterType;

    #[LiveProp(writable: true)]
    public CombatScreen $screen;

    #[LiveProp(writable: true)]
    public PlayerCombat $playerCombat;

    #[LiveProp(writable: true)]
    public string $description = '';

    #[LiveProp]
    public array $roundLogs = [];

    #[LiveProp]
    public string $intro = '';

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private readonly CombatService          $combatService,
                                private readonly InitiativeService      $initiativeService)
    {
    }

    #[PostMount]
    public function postMount(): void
    {
        $this->characterType = 'player';

        $this->playerCombat = $this->entityManager->getRepository(PlayerCombat::class)->findOneBy([
            'player' => $this->character,
            'combat' => $this->screen->getCombat(),
        ]);
        $this->entityManager->refresh($this->playerCombat);

        if(!$this->playerCombat->getTurnOrder()) {
            $order = $this->initiativeService->getTurnOrder($this->playerCombat);
            $this->playerCombat
                ->setTurnOrder($order)
                ->setCurrentRound(1)
                ->setCurrentTurn(0);
            $this->roundLogs = [[]];
            $this->entityManager->persist($this->playerCombat);
            $this->entityManager->flush();
        }

        $this->intro = $this->screen->getCombat()->getDescription() . "\n";
        $this->generateDescription();

        $this->advanceUntilPlayerTurn();
    }

    private function addLog(int $round, string $message): void
    {
        if(!isset($this->roundLogs[$round - 1])) {
            $this->roundLogs[$round - 1] = [];
        }

        $this->roundLogs[$round - 1][] = $message;
        $this->generateDescription();
    }

    private function generateDescription(): void
    {
        $html = $this->intro;

        foreach($this->roundLogs as $index => $messages) {
            if(empty($messages)) continue;

            $html .= "<h2>Round " . ($index + 1) . "</h2>\n<p>\n";
            foreach($messages as $message) {
                $html .= $message . "<br/>\n";
            }
            $html .= "</p>\n";
        }

        $this->description = $html;
    }

    #[LiveAction]
    public function flee(): ?RedirectResponse
    {
        if($this->combatService->flee($this->playerCombat)) {
            return $this->redirectToRoute('app_game_screen_location', [
                'slug' => $this->character->getCurrentLocation()->getSlug(),
            ]);
        }

        // Le joueur perd son tour si la tentative de fuite a échoué
        $this->playerCombat->setCurrentTurn($this->playerCombat->getCurrentTurn() + 1);
        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();

        $this->addLog($this->playerCombat->getCurrentRound(), "<strong class='text-warning'>Votre tentative de fuite a échoué&nbsp;!</strong>");
        $this->advanceUntilPlayerTurn();

        return null;
    }

    private function advanceUntilPlayerTurn(): void
    {
        $turnOrder = $this->playerCombat->getTurnOrder();
        $turnCount = count($turnOrder);

        while($this->playerCombat->getCurrentTurn() < $turnCount) {
            $currentEntity = $turnOrder[$this->playerCombat->getCurrentTurn()];

            if($currentEntity['type'] === 'enemy') {
                $enemyId = $currentEntity['id'];
                $log = $this->combatService->enemyAttack($this->playerCombat, $enemyId);
                $this->addLog($this->playerCombat->getCurrentRound(), $log);
                $this->playerCombat->setCurrentTurn($this->playerCombat->getCurrentTurn() + 1);
            } else if($currentEntity['type'] === 'player' && $currentEntity['id'] === $this->character->getId()) {
                $this->addLog($this->playerCombat->getCurrentRound(), "<strong>C’est votre tour d'agir…</strong>");
                break;
            } else {
                $this->playerCombat->setCurrentTurn($this->playerCombat->getCurrentTurn() + 1);
            }
        }

        if($this->playerCombat->getCurrentTurn() >= $turnCount) {
            $this->playerCombat->setCurrentRound($this->playerCombat->getCurrentRound() + 1);
            $this->playerCombat->setCurrentTurn(0);

            $newOrder = $this->initiativeService->getTurnOrder($this->playerCombat);
            $this->playerCombat->setTurnOrder($newOrder);
            $this->roundLogs[] = [];

            $this->advanceUntilPlayerTurn();

            return;
        }

        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();
    }

    #[LiveAction]
    public function doCombatAction(
        #[LiveArg] string $combatAction,
        #[LiveArg] int    $enemyId,
        #[LiveArg] string $mode
    ): void
    {
        $turnOrder = $this->playerCombat->getTurnOrder();
        $currentTurn = $this->playerCombat->getCurrentTurn();
        $currentEntity = $turnOrder[$currentTurn] ?? null;

        if(!$currentEntity || $currentEntity['type'] !== 'player' || $currentEntity['id'] !== $this->character->getId()) {
            $this->addLog($this->playerCombat->getCurrentRound(), "<em>Ce n’est pas votre tour&nbsp;!</em>");

            return;
        }

        if($combatAction === 'player_attack') {
            $log = $this->combatService->playerAttack(
                $this->character,
                $this->screen->getCombat(),
                $enemyId,
                $mode
            );
            $this->addLog($this->playerCombat->getCurrentRound(), $log);
        }

        $this->playerCombat->setCurrentTurn($currentTurn + 1);
        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();

        $this->advanceUntilPlayerTurn();
    }
}

