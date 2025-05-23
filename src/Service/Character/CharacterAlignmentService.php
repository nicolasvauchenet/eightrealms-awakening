<?php

namespace App\Service\Character;

use App\Entity\Alignment\Alignment;
use App\Entity\Alignment\PlayerAlignment;
use Doctrine\ORM\EntityManagerInterface;

class CharacterAlignmentService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function match(PlayerAlignment $playerAlignment): ?Alignment
    {
        $markers = $playerAlignment->getMarkerCounts() ?? [];
        if(empty($markers)) {
            return null;
        }

        $alignments = $this->entityManager->getRepository(Alignment::class)->findAll();

        $best = null;
        $bestScore = -INF;

        foreach($alignments as $alignment) {
            $score = 0;

            foreach($alignment->getPreferredMarkers() ?? [] as $marker) {
                $score += $markers[$marker] ?? 0;
            }

            foreach($alignment->getRejectedMarkers() ?? [] as $marker) {
                $score -= $markers[$marker] ?? 0;
            }

            if($score > $bestScore) {
                $bestScore = $score;
                $best = $alignment;
            }
        }

        return $best;
    }
}
