<?php

namespace App\Entity\Screen;

use App\Repository\Screen\DialogueScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogueScreenRepository::class)]
class DialogueScreen extends Screen {}
