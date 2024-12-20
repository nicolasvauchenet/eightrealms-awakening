<?php

namespace App\Entity\Screen;

use App\Repository\Screen\CinematicScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CinematicScreenRepository::class)]
class CinematicScreen extends Screen {}
