<?php

namespace App\Entity\Action;

use App\Repository\Action\PlaceActionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceActionRepository::class)]
class PlaceAction extends Action {}
