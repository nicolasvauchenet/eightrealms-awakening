<?php

namespace App\Entity\Scene;

use App\Repository\Scene\CinematicSceneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CinematicSceneRepository::class)]
class CinematicScene extends Scene {}
