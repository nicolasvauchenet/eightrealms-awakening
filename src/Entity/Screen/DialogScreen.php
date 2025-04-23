<?php

namespace App\Entity\Screen;

use App\Entity\Dialog\DialogStep;
use App\Repository\Screen\DialogScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogScreenRepository::class)]
class DialogScreen extends Screen
{
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?DialogStep $dialogStep = null;

    public function getDialogStep(): ?DialogStep
    {
        return $this->dialogStep;
    }

    public function setDialogStep(DialogStep $dialogStep): static
    {
        $this->dialogStep = $dialogStep;

        return $this;
    }
}
