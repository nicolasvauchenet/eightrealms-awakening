<?php

namespace App\DataFixtures\Dialog\DialogStep\BoisDuPendu;

trait GrandDruideTrait
{
    const GRAND_DRUIDE_DIALOG_STEPS = [
        // Quête principale : Les disparus du Donjon
        [
            'name' => 'Grand Druide - Rencontre',
            'text' => "<p><em>La sève parle. Le vent écoute. Mais toi… que viens-tu troubler en ce lieu sacré&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 5,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_1',
        ],
        [
            'name' => 'Grand Druide - Épreuve',
            'text' => "<p><em>Alors prouve que ton cœur n'est pas vide. Affronte l'Épreuve de l'Esprit du Cercle. Si tu vacilles, la forêt t’oubliera.</em></p>",
            'dialog' => 'quest_main_grand_druide',
            'effects' => [
                'end_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 5,
                    'status' => 'completed',
                ],
            ],
            'redirectToRiddle' => 'lepreuve-de-lesprit-du-cercle',
            'reference' => 'quest_main_grand_druide_2',
        ],
        [
            'name' => 'Grand Druide - Réponses',
            'text' => "<p>Le Grand Druide vous regarde d'un air bienveillant.</p><p><em>Tu as traversé l’épreuve sans perdre ton essence. Je vais donc répondre à tes questions.</em></p><p>Il vous regarde un long moment sans rien dire, comme s'il lisait quelque chose dans vos yeux.</p><p><em>Le Rituel de l’Âme permet de pénétrer dans le Donjon de l’Âme. Le Médaillon des Vents n’est qu’un fragment. Un éclat du Sceau du Tombeau… Celui où repose Galdric, le Premier du nom.</em></p><p><em>Son tombeau se trouve tout au fond du Donjon. Mais prends garde… le Donjon de l'Âme est un lieu maudit, où les épreuves se succèdent jusqu'à venir à bout des plus valeureux.</em></p>",
            'effects' => [
                'end_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 6,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_3',
        ],
        [
            'name' => 'Grand Druide - Fragment',
            'text' => "<p><em>Ce qui est enfermé ne l’est jamais pour rien. L'équilibre est précaire. Je n'en dirai pas plus à ce sujet.</em></p>",
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_4',
        ],
        [
            'name' => 'Grand Druide - Rituel refus',
            'text' => "<p><em>Je ne suis pas ton maître, et tu n’es pas mon successeur. Le Rituel de l’Âme ne s’enseigne pas à tout venant.</em></p>",
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_5',
        ],
        [
            'name' => 'Grand Druide - Rituel refus',
            'text' => "<p><em>Et je le regrette. À trop vouloir transmettre, on disperse le sens. Le Rituel ne doit être connu que du prochain Grand Druide. C’est la tradition.</em></p>",
            'dialog' => 'quest_main_grand_druide',
            'reference' => 'quest_main_grand_druide_6',
        ],
    ];
}
