<?php

namespace App\Entity\Action;

use App\Repository\Action\TradeActionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TradeActionRepository::class)]
class TradeAction extends Action {}
