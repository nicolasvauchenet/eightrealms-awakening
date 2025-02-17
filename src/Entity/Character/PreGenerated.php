<?php

namespace App\Entity\Character;

use App\Repository\Character\PreGeneratedRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PreGeneratedRepository::class)]
class PreGenerated extends Character {}
