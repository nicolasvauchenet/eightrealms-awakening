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
        [
            'name' => "Journal de Tharôl",
            'picture' => 'book_diary.png',
            'description' => "<p>Relié grossièrement avec du cuir de chèvre, ce journal a visiblement été rafistolé plusieurs fois. Les premières pages sont méticuleusement écrites. Plus on avance, plus l’encre se brouille, les lignes tremblent, les mots se répètent… jusqu’à devenir presque illisibles.</p><p><em>Jour 12 – La neige ne cesse de tomber. Le vent siffle des noms que je n’ai pas entendus depuis des décennies. Mais je tiens bon. J’ai promis au roi.</em></p><p><em>Jour 48 – L’Épine me parle. Elle brûle parfois dans la nuit. C’est peut-être le froid… ou autre chose. Mais je sens sa vigilance. Elle me veille. Ou me surveille&nbsp;?</em></p><p><em>Jour 107 – Un bouquetin a trouvé refuge près de la maison. Il me fixe parfois, pendant des heures, sans bouger. Je crois qu’il m’écoute. Peut-être est-ce lui, le véritable gardien.</em></p><p><em>Jour 301 – Je… je ne sais plus mon nom. Mais je connais la mission. L'Épine ne doit pas être retrouvée. Le Sceau ne doit jamais être reformé. Même si… même si je deviens ce que je crains.</em></p><p><em>Jour 640&nbsp;? – J’ai vu mon reflet dans l’eau du Gouffre. Cornes. Poils. Yeux… jaunes. Est-ce une bénédiction&nbsp;? Une punition&nbsp;? Ou suis-je enfin libre&nbsp;?</em></p>",
            'type' => 'book',
            'price' => 1,
            'category' => 'category_book',
            'reference' => 'journal_de_tharol',
        ],
    ];
}
