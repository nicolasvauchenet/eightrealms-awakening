<?php

namespace App\Service\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\Character\DeleteCharacterService;

readonly class DeleteUserService
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private DeleteCharacterService $deleteCharacterService)
    {

    }

    public function deleteUser(User $user): void
    {
        $this->deleteCharacterService->deleteCharacter($user->getPlayer());

        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }

}
