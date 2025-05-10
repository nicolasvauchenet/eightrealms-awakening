<?php

namespace App\Entity\Item;

use App\Repository\Item\MiscRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MiscRepository::class)]
class Misc extends Item {}
