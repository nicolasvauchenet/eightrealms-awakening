<?php

namespace App\Entity\Character;

use App\Entity\Item\PlayerCharacterItem;
use App\Repository\Character\PlayerCharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerCharacterRepository::class)]
class PlayerCharacter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $fortune = null;

    #[ORM\Column]
    private ?int $reputation = null;

    #[ORM\ManyToOne(inversedBy: 'playerCharacters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $player = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $character = null;

    /**
     * @var Collection<int, PlayerCharacterItem>
     */
    #[ORM\OneToMany(targetEntity: PlayerCharacterItem::class, mappedBy: 'playerCharacter', orphanRemoval: true)]
    #[ORM\OrderBy(['original' => 'DESC'])]
    private Collection $playerCharacterItems;

    public function __construct()
    {
        $this->playerCharacterItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFortune(): ?int
    {
        return $this->fortune;
    }

    public function setFortune(int $fortune): static
    {
        $this->fortune = $fortune;

        return $this;
    }

    public function getReputation(): ?int
    {
        return $this->reputation;
    }

    public function setReputation(int $reputation): static
    {
        $this->reputation = $reputation;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

        return $this;
    }

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(?Character $character): static
    {
        $this->character = $character;

        return $this;
    }

    /**
     * @return Collection<int, PlayerCharacterItem>
     */
    public function getPlayerCharacterItems(): Collection
    {
        $items = $this->playerCharacterItems->toArray();

        usort($items, function($a, $b) {
            $catA = $a->getItem()->getCategory()->getName();
            $catB = $b->getItem()->getCategory()->getName();

            $categoryCompare = strcmp($catA, $catB);
            if($categoryCompare !== 0) {
                return $categoryCompare;
            }

            $originalA = $a->isOriginal() ? 1 : 0;
            $originalB = $b->isOriginal() ? 1 : 0;

            if($originalA !== $originalB) {
                // Tri décroissant : les originaux (1) en premier
                return $originalB - $originalA;
            }

            return strcmp($a->getItem()->getName(), $b->getItem()->getName());
        });

        return new ArrayCollection($items);
    }

    public function addPlayerCharacterItem(PlayerCharacterItem $playerCharacterItem): static
    {
        if(!$this->playerCharacterItems->contains($playerCharacterItem)) {
            $this->playerCharacterItems->add($playerCharacterItem);
            $playerCharacterItem->setPlayerCharacter($this);
        }

        return $this;
    }

    public function removePlayerCharacterItem(PlayerCharacterItem $playerCharacterItem): static
    {
        if($this->playerCharacterItems->removeElement($playerCharacterItem)) {
            // set the owning side to null (unless already changed)
            if($playerCharacterItem->getPlayerCharacter() === $this) {
                $playerCharacterItem->setPlayerCharacter(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        $character = $this->getCharacter();

        if($this->reputation <= -10 && $character->getDescriptionAngry()) {
            return $character->getDescriptionAngry();
        }

        return $character->getDescription();
    }

    public function getPicture(): ?string
    {
        $character = $this->getCharacter();

        if($this->reputation <= -10 && $character->getPictureAngry()) {
            return $character->getPictureAngry();
        }

        return $character->getPicture();
    }
}
