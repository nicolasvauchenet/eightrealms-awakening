<?php

namespace App\Entity\Screen;

use App\Entity\Riddle\RiddleQuestion;
use App\Repository\Screen\RiddleScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RiddleScreenRepository::class)]
class RiddleScreen extends Screen
{
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?RiddleQuestion $riddleQuestion = null;

    public function getRiddleQuestion(): ?RiddleQuestion
    {
        return $this->riddleQuestion;
    }

    public function setRiddleQuestion(RiddleQuestion $riddleQuestion): static
    {
        $this->riddleQuestion = $riddleQuestion;

        return $this;
    }
}
