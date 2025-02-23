<?php

namespace App\Entity\Screen;

use App\Repository\Screen\DialogueScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogueScreenRepository::class)]
#[ORM\Table(name: '`screen_dialogue`')]
class DialogueScreen extends Screen {}
