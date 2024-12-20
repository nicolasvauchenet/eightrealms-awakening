<?php

namespace App\Entity\Screen;

use App\Repository\Screen\CombatScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombatScreenRepository::class)]
class CombatScreen extends Screen {}
