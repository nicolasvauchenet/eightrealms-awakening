<?php

namespace App\Entity\Action;

use App\Repository\Action\CombatActionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombatActionRepository::class)]
class CombatAction extends Action {}
