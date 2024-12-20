<?php

namespace App\Entity\Action;

use App\Repository\Action\StealActionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StealActionRepository::class)]
class StealAction extends Action {}
