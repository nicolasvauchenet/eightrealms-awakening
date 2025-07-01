<?php

namespace App\Service\Game\Condition\Handler;

use App\Entity\Character\Player;
use App\Service\Game\Condition\ConditionEvaluatorService;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CanEnterLocationHandler implements ConditionHandlerInterface
{
    public function __construct(
        private readonly ConditionEvaluatorService $evaluator,
        private readonly RouterInterface           $router,
    )
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'can_enter_location';
    }

    public function evaluate(Player $player, mixed $value): bool|RedirectResponse
    {
        if(!isset($value['conditions'])) {
            return true;
        }

        $isAllowed = $this->evaluator->isValid($value['conditions'], $player);
        if($isAllowed) {
            return true;
        }

        $redirectType = $value['redirect_type'] ?? null;
        $redirectSlug = $value['redirect'] ?? null;

        if($redirectType === 'dialog' && $redirectSlug) {
            $url = $this->router->generate('app_game_screen_dialog', ['slug' => $redirectSlug]);

            return new RedirectResponse($url);
        }

        if($redirectType === 'hidden') {
            return new RedirectResponse('hidden');
        }

        return false;
    }
}
