<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    public function __construct(private readonly RouterInterface $router)
    {
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token): RedirectResponse
    {
        $user = $token->getUser();
        $roles = $token->getRoleNames();

        if(in_array('ROLE_ADMIN', $roles, true)) {
            return new RedirectResponse($this->router->generate('app_back_office_home'));
        }

        $request->getSession()->getFlashBag()->add('success', "Bon retour dans les Huit Royaumes, {$user->getName()}&nbsp;!");

        return new RedirectResponse($this->router->generate('app_front_office_home'));
    }
}
