<?php

namespace App\Service\Character;

use App\Repository\Character\PreGeneratedRepository;

class PreGeneratedService
{
    private PreGeneratedRepository $preGeneratedRepository;

    public function __construct(PreGeneratedRepository $preGeneratedRepository)
    {
        $this->preGeneratedRepository = $preGeneratedRepository;
    }

    public function getCharacters(): array
    {
        return $this->preGeneratedRepository->findAll();
    }
}
