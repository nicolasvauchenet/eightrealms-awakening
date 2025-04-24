<?php

namespace App\Twig\Components\Game\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Item\CharacterItem;
use App\Entity\Screen\CombatScreen;
use App\Service\Character\CharacterBonusService;
use App\Service\Combat\CastSpellService;
use App\Service\Combat\Effect\CombatEffectService;
use App\Service\Combat\EnemyAttackService;
use App\Service\Combat\FleeService;
use App\Service\Combat\PlayerAttackService;
use App\Service\Combat\InitiativeService;
use App\Service\Combat\UseItemService;
use App\Service\Item\CharacterItemService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\Attribute\PreDehydrate;
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

    #[LiveProp(writable: true)]
    public array $damageBonus = [];

    #[LiveProp(writable: true)]
    public array $defenseBonus = [];

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private readonly InitiativeService      $initiativeService,
                                private readonly FleeService            $fleeService,
                                private readonly PlayerAttackService    $playerAttackService,
                                private readonly EnemyAttackService     $enemyAttackService,
                                private readonly CastSpellService       $castSpellService,
                                private readonly UseItemService         $useItemService,
                                private readonly CharacterItemService   $characterItemService,
                                private readonly CombatEffectService    $combatEffectService,
                                private CharacterBonusService           $characterBonusService)
    {
    }

    #[PreDehydrate]
    public function hydrate(): void
    {
        $this->updateBonuses();
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

        $this->updateBonuses();

        $this->intro = $this->screen->getCombat()->getDescription() . "\n";
        $this->generateDescription();

        $this->advanceUntilPlayerTurn();
    }

    private function updateBonuses(): void
    {
        // Récupérer les effets actifs de type damage et defense pour le personnage dans le contexte de ce combat
        $activeBonuses = $this->combatEffectService->getActiveBonuses($this->playerCombat, null);

        // Récupérer les bonus d'effet temporaire pour damage et defense
        $this->damageBonus = [
            'amount' => $activeBonuses['damage'] ?? 0,
            'extra' => $activeBonuses['damage'] > 0,
            'magical' => false,
        ];

        $this->defenseBonus = [
            'amount' => $activeBonuses['defense'] ?? 0,
            'extra' => $activeBonuses['defense'] > 0,
        ];

        // Récupérer les bonus classiques (item-based)
        $damageBonusItem = $this->characterBonusService->getDamage($this->character, $this->screen->getType());
        $this->damageBonus['amount'] += $damageBonusItem['amount'];
        $this->damageBonus['extra'] = $damageBonusItem['extra'];

        $defenseBonusItem = $this->characterBonusService->getDefense($this->character, $this->screen->getType());
        $this->defenseBonus['amount'] += $defenseBonusItem['amount'];
        $this->defenseBonus['extra'] = $defenseBonusItem['extra'];
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
                $html .= $message . "\n";
            }
            $html .= "</p>\n";
        }

        $this->description = $html;
    }

    #[LiveAction]
    public function flee(): ?RedirectResponse
    {
        if($this->fleeService->flee($this->playerCombat)) {
            return $this->redirectToRoute('app_game_screen_location', [
                'slug' => $this->character->getCurrentLocation()->getSlug(),
            ]);
        }

        // Le joueur perd son tour si la tentative de fuite a échoué
        $this->playerCombat->setCurrentTurn($this->playerCombat->getCurrentTurn() + 1);
        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();

        $this->addLog($this->playerCombat->getCurrentRound(), "<strong class='text-warning'>Votre tentative de fuite a échoué&nbsp;!</strong><br/>");
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
                $log = $this->enemyAttackService->enemyAttack($this->playerCombat, $enemyId);
                $this->addLog($this->playerCombat->getCurrentRound(), $log);
                $this->playerCombat->setCurrentTurn($this->playerCombat->getCurrentTurn() + 1);
            } else if($currentEntity['type'] === 'player' && $currentEntity['id'] === $this->character->getId()) {
                $this->addLog($this->playerCombat->getCurrentRound(), "<strong>C’est votre tour d'agir…</strong><br/>");
                break;
            } else {
                $this->playerCombat->setCurrentTurn($this->playerCombat->getCurrentTurn() + 1);
            }
        }

        if($this->playerCombat->getCurrentTurn() >= $turnCount) {
            // Gestion des effets temporaires : on décrémente les durées
            $this->combatEffectService->tickEffects($this->playerCombat);

            // Récupération des logs d’expiration
            $expiredLogs = $this->combatEffectService->removeExpiredEffects($this->playerCombat);
            foreach($expiredLogs as $log) {
                $this->addLog($this->playerCombat->getCurrentRound(), $log);
            }

            // Passage au round suivant
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
        #[LiveArg] string  $combatAction,
        #[LiveArg] int     $enemyId,
        #[LiveArg] ?string $mode = null,
        #[LiveArg] ?int    $characterSpellId = null,
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
            $log = $this->playerAttackService->playerAttack(
                $this->character,
                $this->screen->getCombat(),
                $enemyId,
                $mode
            );
            $this->addLog($this->playerCombat->getCurrentRound(), $log);
        } else if($combatAction === 'cast_spell') {
            $log = $this->castSpellService->cast(
                $this->character,
                $this->screen->getCombat(),
                $enemyId,
                $characterSpellId
            );
            $this->addLog($this->playerCombat->getCurrentRound(), $log);
        }

        $this->playerCombat->setCurrentTurn($currentTurn + 1);
        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();

        $this->advanceUntilPlayerTurn();
    }

    #[LiveAction]
    public function useItem(#[LiveArg] int $characterItemId, #[LiveArg] ?int $enemyId = null): void
    {
        $turnOrder = $this->playerCombat->getTurnOrder();
        $currentTurn = $this->playerCombat->getCurrentTurn();
        $currentEntity = $turnOrder[$currentTurn] ?? null;

        if(!$currentEntity || $currentEntity['type'] !== 'player' || $currentEntity['id'] !== $this->character->getId()) {
            $this->addLog($this->playerCombat->getCurrentRound(), "<em>Ce n’est pas votre tour&nbsp;!</em>");

            return;
        }

        $characterItem = $this->entityManager->getRepository(CharacterItem::class)->find($characterItemId);
        if($enemyId) {
            $enemy = $this->entityManager->getRepository(PlayerCombatEnemy::class)->find($enemyId);
        } else {
            $enemy = null;
        }

        if(!$characterItem || !$characterItem->getItem()) {
            $this->addLog($this->playerCombat->getCurrentRound(), "<span class='text-danger'>Objet introuvable.</span>");

            return;
        }

        // Délégation au UseItemService
        $log = $this->useItemService->useItem($this->character, $characterItem, $enemy);
        $this->addLog($this->playerCombat->getCurrentRound(), $log);

        // Fin du tour
        $this->playerCombat->setCurrentTurn($currentTurn + 1);
        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();

        $this->advanceUntilPlayerTurn();
    }
}

