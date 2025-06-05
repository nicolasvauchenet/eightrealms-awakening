<?php

namespace App\DataFixtures\Item\Book;

trait DiaryTrait
{
    const DIARY_BOOKS = [
        [
            'name' => "Journal d'Eryl",
            'picture' => 'book_diary.png',
            'description' => "<p><em>Ce journal détrempé porte encore l’odeur du sel et du sang séché. Les premières pages évoquent une passion brûlante pour une créature des flots… mais plus on avance, plus l’écriture se fait moqueuse.</em></p>",
            'type' => 'book',
            'price' => 1,
            'category' => 'category_book',
            'bookAuthor' => 'Eryl D. (Capitaine déchu)',
            'bookCategory' => 'Journal',
            'bookContent' => "<p>Elle m’a encore parlé de la mer, de ses sœurs, de je-ne-sais-quelle cité engloutie… Une vraie poétesse. Faut dire qu’elle est belle, la créature. Et bien naïve. Elle m'a offert un médaillon, en me disant qu'en le portant, je serai accepté par les siens…</p><p>J’ai testé son médaillon aujourd’hui. Impressionnant. J’ai pu plonger jusqu’aux rochers du large, mes poumons toujours pleins d'air. Trois poissons m'ont immédiatement rejoint, et ne semblaient pas le moins du monde effrayés par ma présence. Je les ai eus tous les trois. En un seul plongeon.</p><p>Les autres marins commencent à jalouser mon médaillon, surtout Malo. Je dois me méfier de lui… Il faut dire que depuis que je le porte, c'est moi qui nourris les hommes. Ils dépendent tous de moi désormais.</p><p>J'ai fait escale à Port Saint-Doux. Elle était là, au bord des quais. J’ai essayé de lui écrire un poème avec une foutue arête, comme la vieille folle de la taverne me l’avait conseillé… Résultat ? Elle a cru que c’était un menu, et elle est partie sans rien comprendre, la sardine. J'ai raconté ça aux gars, et les rires ont résonné dans toute la taverne. Elle n'a rien compris, cette dorade&nbsp;! Tant pis. J’ai mieux à faire que de courtiser cet animal. Demain, je retourne plonger. Y’a un banc entier de sirènes plus au large, apparemment. À moi les écailles, les chants… et les trésors.</p>",
            'reference' => 'journal_d_eryl',
        ],
        [
            'name' => "Journal de Tharôl",
            'picture' => 'book_diary.png',
            'description' => "<p><em>Relié grossièrement avec du cuir de chèvre, ce journal a visiblement été rafistolé plusieurs fois. Les premières pages sont méticuleusement écrites. Plus on avance, plus l’encre se brouille, les lignes tremblent, les mots se répètent… jusqu’à devenir presque illisibles.</em></p>",
            'type' => 'book',
            'price' => 1,
            'category' => 'category_book',
            'bookAuthor' => 'Tharôl le Silencieux',
            'bookCategory' => 'Journal',
            'bookContent' => "<p><strong>Jour 12 –</strong> La neige ne cesse de tomber. Le vent siffle des noms que je n’ai pas entendus depuis des décennies. Mais je tiens bon. J’ai promis au roi.</p><p><strong>Jour 48 –</strong> L’Épine me parle. Elle brûle parfois dans la nuit. C’est peut-être le froid… ou autre chose. Mais je sens sa vigilance. Elle me veille. Ou me surveille&nbsp;?</p><p><strong>Jour 107 –</strong> Un bouquetin a trouvé refuge près de la maison. Il me fixe parfois, pendant des heures, sans bouger. Je crois qu’il m’écoute. Ou qu'il attend quelque chose de moi… Peut-être est-ce lui, le gardien de ces lieux&nbsp;?</p><p><strong>Jour 301 –</strong> Je… je ne sais plus mon nom. Mais je connais la mission. L'Épine ne doit pas être retrouvée. Le Sceau ne doit jamais être reformé. Même si… même si je deviens ce que je crains. Je ne vois plus l'animal… Mais je continue à le voir derrière mes yeux, comme s'il était entré… En moi… Non. C'est impossible. Je dois être atteint du mal de la montagne. Je dois tenir bon.</p><p><strong>Jour 640&nbsp;? –</strong> J’ai vu mon reflet dans l’eau du Gouffre. Cornes. Poils. Yeux… rouge sang. Est-ce une bénédiction&nbsp;? Une punition&nbsp;? Ou suis-je enfin libre&nbsp;? Suis-je devenu le Gardien&nbsp;?</p>",
            'reference' => 'journal_de_tharol',
        ],
    ];
}
