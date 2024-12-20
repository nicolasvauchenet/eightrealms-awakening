<?php

namespace App\Entity\Action;

use App\Repository\Action\TransitionActionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransitionActionRepository::class)]
class TransitionAction extends Action {}
