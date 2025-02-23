<?php

namespace App\Entity\Screen;

use App\Repository\Screen\TradeScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TradeScreenRepository::class)]
#[ORM\Table(name: '`screen_trade`')]
class TradeScreen extends Screen {}
