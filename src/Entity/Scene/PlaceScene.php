<?php

namespace App\Entity\Scene;

use App\Repository\Scene\PlaceSceneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceSceneRepository::class)]
class PlaceScene extends Scene {}
