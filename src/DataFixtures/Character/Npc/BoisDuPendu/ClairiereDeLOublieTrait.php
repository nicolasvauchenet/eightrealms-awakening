<?php

namespace App\DataFixtures\Character\Npc\BoisDuPendu;

trait ClairiereDeLOublieTrait
{
    const CLAIRIERE_DE_L_OUBLIE_NPCS = [
        // Npcs
        [
            'name' => 'Théobald le Gris-Murmure',
            'picture' => 'img/chapter1/npc/theobald-le-gris-murmure.png',
            'thumbnail' => 'img/chapter1/npc/theobald-le-gris-murmure_thumb.png',
            'description' => "<p>On le voit à peine d’abord, une silhouette courbée dans la brume du sous-bois. Puis il lève lentement les yeux vers vous. Son regard est dur, creusé par les années, mais il n’a rien de fragile.</p><p>Il ne dit rien. Il n’a pas besoin. Un bâton noueux dans une main, l’autre dissimulée sous sa manche, il semble attendre… ou juger.</p><p>Son habit râpé sent la terre et le feu de bois froid. Autour de lui, même les arbres semblent retenir leur souffle.</p>",
            'strength' => 6,
            'dexterity' => 8,
            'constitution' => 10,
            'wisdom' => 18,
            'intelligence' => 16,
            'charisma' => 12,
            'healthMax' => 60,
            'manaMax' => 120,
            'fortune' => 4,
            'level' => 8,
            'race' => 'race_humain',
            'profession' => 'profession_erudit',
            'reference' => 'npc_theobald_le_gris_murmure',
        ],

        // Enemies
        [
            'name' => 'Druide',
            'picture' => 'img/core/npc/druide.png',
            'thumbnail' => 'img/core/npc/druide_thumb.png',
            'description' => "<p>Le druide vous observe, droit et immobile. Son bâton est levé avant même que vous ouvriez la bouche. Ici, la forêt ne vous veut pas… et lui non plus.</p>",
            'strength' => 9,
            'dexterity' => 10,
            'constitution' => 11,
            'wisdom' => 15,
            'intelligence' => 14,
            'charisma' => 8,
            'healthMax' => 10,
            'manaMax' => 0,
            'fortune' => 5,
            'level' => 2,
            'race' => 'race_humain',
            'profession' => 'profession_druide',
            'reference' => 'npc_druide',
        ],
    ];
}
