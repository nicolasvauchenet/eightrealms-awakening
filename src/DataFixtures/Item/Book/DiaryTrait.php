<?php

namespace App\DataFixtures\Item\Book;

trait DiaryTrait
{
    const DIARY_BOOKS = [
        [
            'name' => "Journal d'Eryl",
            'picture' => 'book_diary.png',
            'description' => "<p>Ce journal détrempé porte encore l’odeur du sel et du sang séché. Les premières pages évoquent une passion brûlante pour une créature des flots… mais plus on avance, plus l’écriture se fait moqueuse.</p><p><em>Elle m’a encore parlé de la mer, de ses sœurs, de je-ne-sais-quelle cité engloutie… Une vraie poétesse. Faut dire qu’elle est belle, la créature. Et bien naïve.</em></p><p><em>J’ai testé son médaillon aujourd’hui. Impressionnant. J’ai pu plonger jusqu’aux rochers du large. Trois poissons en un seul plongeon. Les autres marins commencent à jalouser mon médaillon, surtout Malo. Je dois me méfier de lui…</em></p><p><em>J’ai essayé d'écrire un poème à ma prétendante marine avec cette foutue arête, comme la vieille folle me l’avait conseillé… Résultat ? Elle a cru que c’était un menu. Rires dans toute la taverne. Elle n'a rien compris, cette dorade&nbsp;! Tant pis. J’ai mieux à faire. Demain, je retourne plonger. Y’a un banc entier de sirènes apparemment. À moi les écailles, les chants… et les trésors.</em></p>",
            'type' => 'book',
            'price' => 1,
            'category' => 'category_book',
            'reference' => 'journal_d_eryl',
        ],
    ];
}
