<?php

namespace App\Entity\Action;

use App\Repository\Action\DialogueActionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogueActionRepository::class)]
class DialogueAction extends Action {}
