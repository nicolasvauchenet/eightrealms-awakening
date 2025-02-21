<?php

namespace App\Entity\Screen;

use App\Repository\Screen\TradeScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TradeScreenRepository::class)]
class TradeScreen extends Screen {}
