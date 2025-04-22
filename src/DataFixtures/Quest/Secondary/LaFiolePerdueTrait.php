<?php

namespace App\DataFixtures\Quest\Secondary;

trait LaFiolePerdueTrait
{
    const LA_FIOLE_PERDUE_QUEST_STEPS = [
        [
            'description' => "<p>L’Alchimiste des Anciens Docks est hors de lui : une fiole précieuse, contenant une concoction instable et rare, a été dérobée lors d’un cambriolage nocturne. Selon ses observations, le voleur a fui vers les Bois du Pendu, un endroit dangereux peuplé de Druides reclus et de bandits opportunistes.</p><p>Avant de m'enfoncer tête baissée dans le Bois du Pendu, je devrais peut-être m'équiper…</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_la_fiole_perdue',
            'reference' => 'quest_secondary_la_fiole_perdue_step_1',
        ],
    ];
}
