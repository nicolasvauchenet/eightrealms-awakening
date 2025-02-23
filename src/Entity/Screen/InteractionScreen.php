<?php

namespace App\Entity\Screen;

use App\Entity\Character\Npc;
use App\Repository\Screen\InteractionScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InteractionScreenRepository::class)]
#[ORM\Table(name: '`screen_interaction`')]
class InteractionScreen extends Screen {}
