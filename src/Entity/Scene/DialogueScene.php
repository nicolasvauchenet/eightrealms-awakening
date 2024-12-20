<?php

namespace App\Entity\Scene;

use App\Repository\Scene\DialogueSceneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogueSceneRepository::class)]
class DialogueScene extends Scene {}
