<?php

namespace App\DataFixtures\Character\Npc\PortSaintDoux;

trait VieilleVilleTrait
{
    const VIEILLE_VILLE_NPCS = [
        [
            'name' => 'Grand Prêtre de Port Saint-Doux',
            'picture' => 'img/chapter1/npc/grand-pretre-de-port-saint-doux.png',
            'thumbnail' => 'img/chapter1/npc/grand-pretre-de-port-saint-doux_thumb.png',
            'description' => "<p>Le Grand Prêtre vous observe longuement, comme s’il lisait dans vos pensées. Ses mains tremblent à peine quand il vous bénit, mais son regard, lui, ne vacille jamais.</p><p><em>Que la lumière vous guide, enfant du destin… Car l’ombre s’est déjà faufilée dans nos prières.</em></p>",
            'strength' => 10,
            'dexterity' => 10,
            'constitution' => 10,
            'wisdom' => 16,
            'intelligence' => 13,
            'charisma' => 12,
            'healthMax' => 100,
            'manaMax' => 65,
            'fortune' => 100,
            'level' => 2,
            'race' => 'race_humain',
            'profession' => 'profession_pretre',
            'reference' => 'npc_grand_pretre_de_port_saint_doux',
        ],
        [
            'name' => 'Gart le Forgeron',
            'picture' => 'img/chapter1/npc/gart-le-forgeron.png',
            'thumbnail' => 'img/chapter1/npc/gart-le-forgeron_thumb.png',
            'description' => "<p>Devant vous, un colosse marqué par la chaleur de la forge. La suie sur ses bras ne cache pas ses muscles tendus ni son regard perçant. Il parle peu, mais frappe juste – sur l’enclume comme dans ses mots.</p><p><em>Arme, armure, ou silence&nbsp;? Ici, je ne forge que ce qu’on mérite.</em></p>",
            'strength' => 15,
            'dexterity' => 15,
            'constitution' => 16,
            'wisdom' => 10,
            'intelligence' => 8,
            'charisma' => 8,
            'healthMax' => 160,
            'manaMax' => 40,
            'fortune' => 2000,
            'level' => 2,
            'race' => 'race_humain',
            'profession' => 'profession_forgeron',
            'reference' => 'npc_gart_le_forgeron',
        ],
    ];
}
