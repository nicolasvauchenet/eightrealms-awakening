<?php

namespace App\Entity\Scene;

use App\Repository\Scene\CombatSceneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombatSceneRepository::class)]
class CombatScene extends Scene {}
