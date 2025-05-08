<?php

namespace App\Entity\Item;

use App\Entity\Character\PlayerCharacter;
use App\Repository\Item\PlayerCharacterItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerCharacterItemRepository::class)]
class PlayerCharacterItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $original = null;

    #[ORM\Column(nullable: true)]
    private ?int $health = null;

    #[ORM\Column(nullable: true)]
    private ?int $charge = null;

    #[ORM\Column]
    private ?bool $questItem = null;

    #[ORM\ManyToOne(inversedBy: 'playerCharacterItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlayerCharacter $playerCharacter = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Item $item = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isOriginal(): ?bool
    {
        return $this->original;
    }

    public function setOriginal(bool $original): static
    {
        $this->original = $original;

        return $this;
    }

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(?int $health): static
    {
        $this->health = $health;

        return $this;
    }

    public function getCharge(): ?int
    {
        return $this->charge;
    }

    public function setCharge(?int $charge): static
    {
        $this->charge = $charge;

        return $this;
    }

    public function isQuestItem(): ?bool
    {
        return $this->questItem;
    }

    public function setQuestItem(bool $questItem): static
    {
        $this->questItem = $questItem;

        return $this;
    }

    public function getPlayerCharacter(): ?PlayerCharacter
    {
        return $this->playerCharacter;
    }

    public function setPlayerCharacter(?PlayerCharacter $playerCharacter): static
    {
        $this->playerCharacter = $playerCharacter;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): static
    {
        $this->item = $item;

        return $this;
    }
}
