<?php

namespace App\DataFixtures\Quest\Main;

trait MainQuestStepTrait
{
    const MAIN_QUEST_STEPS = [
        [
            'description' => "<p>Je viens de revenir à Port Saint-Doux. Je n’ai ni or, ni renom, ni avenir tout tracé. Juste deux bottes usées, quelques affaires et une bourse vide. Et l’envie de trouver un travail honnête. Mais l’ambiance ici est plutôt morose. Le Prince Alaric a disparu il y a plusieurs semaines. Le Roi Galdric III l’a suivi peu après, sans explication. Depuis, ce n’est plus qu'incertitude, crainte et rumeurs qui circulent. Elles parlent de trahisons, de créatures infernales, même de magie ancienne.</p><p>En l'absence du Roi, c’est le Maire qui s’est arrogé tous les pouvoirs. Un type louche et désagréable, visiblement plus intéressé par son propre prestige que par le bien commun. Il joue les rois de pacotille, en profitant pour réorganiser la ville à sa sauce, surtout au profit des humains. Il est ouvertement raciste. Les tensions montent entre les populations du Royaume, les anciens pactes sont ignorés… Port Saint-Doux est au bord du chaos, et moi, je débarque en plein milieu de tout ça.</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_1',
        ],
        [
            'description' => "<p>J’ai fini par trouver une tâche à accomplir. Un petit homme m’a proposé quelques pièces en échange d’un coup de main aux Anciens Docks. Il y aurait une infestation de rats. Rien de bien glorieux, mais suffisant pour remplir mon estomac. Les rats étaient nombreux et agressifs. J’en suis venu à bout, non sans mal.</p><p>En explorant les lieux, j’ai remarqué une caisse renversée, marquée d’un ancien sceau royal à moitié effacé. Elle semblait hors de place. À l’intérieur, j’ai découvert un vieux morceau de papier, trempé, à moitié déchiré. La note est totalement illisible, rongée par l’humidité et le temps. Seule quelques traces subsistent&nbsp;:&nbsp;une ligne écrite dans un langage étrange&nbsp;—&nbsp;peut-être une sorte de code, et une initiale tracée d’une main rapide. “A.”</p><p>Je ne comprends pas ce que cela signifie. Mais je garde la note&nbsp;:&nbsp;cette découverte mérite sûrement d’être éclaircie. Il me faut quelqu’un capable de lire ce genre d’écrits.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_2',
        ],
        [
            'description' => "<p>J’ai rencontré Wilbert l'Arcaniste dans son échoppe, au cœur du Quartier des Ploucs. Un gnome savant, réputé pour son érudition… et son manque de patience avec les gens.</p><p>Il a étudié la note longtemps, à la lueur vacillante d’une lanterne. Les lettres étaient presque toutes effacées, mais après quelques murmures et un sort de révélation, il a relevé une unique ligne, gravée plus profondément dans le papier&nbsp;:&nbsp;&laquo;&nbsp;Les Druides savent. Le Rituel permet de passer de l’autre côté. Le Sceau ouvrira le Tombeau.&nbsp;&raquo;</p><p>Il s’est figé. Puis a parlé d’un vieux lieu, oublié de presque tous. Un donjon ancien, interdit, lié aux secrets de la couronne. Il a baissé la voix, précisant que ce genre de choses ne devrait pas être remué à la légère.</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_3',
        ],
        [
            'description' => "<p>Je me suis retrouvé dans un campement gobelin, en plein cœur des Bois des Relents, près du village de Plouc. Là-bas, en discutant avec un chef gobelin, j'ai appris une chose troublante. Les gobelins ont suivi discrètement un vieil homme, seul, l’air pressé, marmonnant que &laquo;&nbsp;son fils allait faire une erreur monumentale&nbsp;&raquo; et qu’il &laquo;&nbsp;devait l’arrêter coûte que coûte&nbsp;&raquo;. Il aurait aussi évoqué un nom, qui commençait par &laquo;&nbsp;Nash&nbsp;&raquo;… Ils l’ont vu s’engager vers le Col du Vent Noir, à l'entrée des Monts Terribles. Il avait l'air noble, probablement de la cour royale.</p><p>Impossible de ne pas faire le lien avec les récents événements… Le Roi Galdric III serait-il parti vers le nord&nbsp;? Si c'est le cas, pourquoi les Monts Terribles&nbsp;? Et ce&laquo;&nbsp;Nash&nbsp;-&nbsp;quelque chose&nbsp;&raquo;, qui est-il&nbsp;?</p>",
            'position' => 4,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_4',
        ],
        [
            'description' => "<p>Dans le Bois du Pendu, j’ai croisé un vieil homme aux allures de druide. Méfiant, il a cru que j’étais venu l’éliminer. Mais nous n’avons pas eu le temps de nous expliquer&nbsp;:&nbsp;des druides nous ont attaqués.</p><p>Après le combat, il s’est présenté&nbsp;:&nbsp;Théobald Gris-Murmure, druide banni. Il avait tenté d’apprendre le &laquo;&nbsp;Rituel de l’Âme&nbsp;&raquo;, une incantation ancestrale qui, selon lui, permettrait de révéler l’entrée du Donjon de l’Âme, dans lequel se trouve le tombeau du Roi Galdric 1er. Ses confrères l’ont jugé dangereux, refusant de partager un savoir jugé trop puissant. Banni, il a poursuivi seul ses recherches.</p><p>Il a découvert des fragments d’histoire oubliée&nbsp;:&nbsp;Galdric Ier ne serait pas mort en paix, mais frappé par une malédiction liée au Donjon. Avant de me quitter, Théobald m’a confié avoir vu le Prince Alaric. Il l’a reconnu sans hésiter. Le jeune homme cherchait le Bosquet des Druides.</p>",
            'position' => 5,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_5',
        ],
        [
            'description' => "<p>Le Grand Druide m’a toisé longuement, sans mot dire. Sa méfiance suintait dans chacun de ses silences. Pour qu’il m’accorde la parole, il m’a imposé l’Épreuve du Cercle. Un rite ancien, que seuls les initiés osent affronter. Ce ne fut pas un duel ni une énigme, mais une confrontation intérieure&nbsp;:&nbsp;visions, souvenirs déterrés, vérités amères. J’ai failli flancher, mais j’ai tenu bon.</p><p>Satisfait&nbsp;—&nbsp;ou simplement soulagé de ne pas voir un imbécile de plus&nbsp;—&nbsp;il a enfin parlé. Peu, mais assez pour faire trembler mes certitudes. Il a confirmé l’existence d’un lieu oublié&nbsp;:&nbsp;le Donjon de l’Âme. Son entrée est dissimulée, inaccessible aux yeux des profanes. Seul le Rituel de l’Âme, détenu par leur ordre, peut en révéler l’accès. Au fond du Donjon reposerait le tombeau du Roi Galdric Ier, mais une malédiction planerait sur ce lieu, comme un poison.</p><p>Il a aussi murmuré que ce tombeau est scellé par un artefact ancien, brisé en deux fragments depuis des générations. Mais sur le reste, il s’est refermé comme une huître. Pas un mot de plus…</p>",
            'position' => 6,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_6',
        ],
        [
            'description' => "<p>Wilbert m’avait confié une mission étrange&nbsp;:&nbsp;récupérer une fiole d’essence arcanique perdue dans les Sables Chauds. La quête m’a conduit jusqu’à une oasis oubliée, là où les vents hurlent comme des voix mortes et où l’eau paraît veiller sur des secrets anciens. J’y ai affronté un homme ensorcelé, un pauvre fou qui se prenait pour un Djinn. Mais puissant, et terriblement dangereux.</p><p>En fouillant les lieux après le combat, j’ai trouvé un objet étrange&nbsp;:&nbsp;un médaillon gravé d’un ancien glyphe royal, serti d’un fragment cristallin d’origine inconnue. Il vibrait d’une énergie à la fois froide et ancienne. Je l’ai rapporté à Wilbert.</p><p>Il l’a observé longtemps, puis m’a confié que ce bijou pourrait bien être le &laquo;&nbsp;Médaillon des Vents&nbsp;&raquo;, un artefact légendaire que le roi Galdric II aurait tenté de retrouver toute sa vie. Mais il a refusé de m'en dire davantage.</p>",
            'position' => 7,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_7',
        ],
        [
            'description' => "<p>J'ai questionné Wilbert au sujet de tout ça. J’avais besoin d’en savoir plus. De comprendre dans quoi j'avais mis les pieds, dans quoi le Royaume tout entier avait mis les pieds… Le vieux mage était réticent, mais quelque chose dans mon regard&nbsp;—&nbsp;ou peut-être la gravité de mes questions&nbsp;—&nbsp;l’a convaincu de parler. Je lui ai montré l'amulette trouvée sur le faux Djinn, et il m'a finalement lâché que le Médaillon des Vents est l'un des deux fragments du Sceau. Mais il n'en a pas dit plus.</p><p>Il m’a parlé d’une époque révolue, d'une malédiction royale au temps de Galdric 1er, et d’un trio inséparable&nbsp;:&nbsp;lui, Gart le Forgeron, et Robert, un ancien garde royal. Tous trois avaient servi, de près ou de loin, le roi Galdric II dès sa montée sur le trône, après la disparition tragique de son père. Il n'était alors qu'un adolescent. Ensemble, ils avaient vu l’Empire chanceler et la magie se noircir. Ils avaient partagé des secrets et des soupçons. Des fragments d’histoire interdite, des mots chuchotés à propos du Donjon de l’Âme, du Rituel, et de quelque chose à sceller à jamais.</p><p>Wilbert m’a prévenu&nbsp;:&nbsp;ces souvenirs sont dangereux. Le genre de savoir qu’on paie cher. Il ne voulait pas m’en dire plus. Pas sans preuve, pas sans les autres. Pour en savoir plus et essayer de comprendre, je devrais retrouver les deux autres. Et les convaincre de parler, eux aussi.</p>",
            'position' => 8,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_8',
        ],
        [
            'description' => "<p>J’ai pris le chemin de la forge de Gart, le vieux forgeron de la cour, qu’on disait proche du roi Galdric II. Je lui ai montré le médaillon. Il l’a pris, l’a regardé sous tous les angles, a pincé les lèvres… puis l’a reposé sur l’enclume sans un mot.</p><p><em>Si vous voulez que je joue avec ça comme un artisan de foire, vous êtes pas au bon endroit.</em></p><p>Il a refusé net. Pas un mot sur le Sceau, ni sur le Donjon, ni sur Galdric III et le Prince Alaric. Rien. Mais dans sa colère froide, j’ai perçu quelque chose. Pas du mépris. De la peur.</p><p>Il a laissé échapper une phrase. Un nom&nbsp;:&nbsp;Robert. Un ancien garde d’élite, autrefois compagnon du roi, aujourd'hui simple garde sans grade. L’un des trois membres du &laquo;&nbsp;Trio royal&nbsp;&raquo;&nbsp;:&nbsp;Wilbert l’arcaniste, Gart le forgeron… et Robert, la lame fidèle.</p><p>Gart a refusé d’en dire plus. Mais cette piste, elle est là, nette comme une entaille fraîche&nbsp;:&nbsp;si je veux comprendre ce que j’ai entre les mains, je dois aller parler à Robert.</p>",
            'position' => 9,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_9',
        ],
        [
            'description' => "<p>J’ai retrouvé Robert dans le Quartier du Marché. Il m’a observé en silence. Comme s'il savait déjà que je viendrais. Son ton est devenu beaucoup plus familier, étrangement, mais il n'est pas sorti de sa réserve et a gardé sa stature.</p><p><em>Alors comme ça, t’as parlé à Gart&nbsp;? Et à Wilbert&nbsp;? T'en remues de la poussière, pour sûr.</em></p><p>Il n’était pas hostile. Mais prudent. J’ai dû le convaincre que je cherchais la vérité, pas à me mêler de politique. Alors il a parlé. Pas longtemps, mais assez&nbsp;:</p><p><em>Le Roi Galdric III a disparu pour retrouver son fils, Alaric. Et tout ça tourne autour d’un vieux mythe, celui du Donjon de l’Âme.</em></p><p>Il a craché au sol.<p><p><em>Le maire se pavane avec un médaillon prétendument offert par Galdric II. Mon cul, ouais. Galdric II se serait jamais abaissé à fricoter avec ce gros rat. Pas plus que son successeur, il pouvait pas l’encadrer. Ce maire est un imposteur, et son bijou… ça m’étonnerait pas que ce soit une copie.</em></p><p>Et c’est tout ce qu’il m’a laissé&nbsp;:&nbsp;un doute planté dans le médaillon du Maire, et un rappel que Galdric III est parti sans prévenir, à cause de tout ça. Robert ne veut pas s’impliquer. Pas encore. Mais il surveille. Et s’il doit agir, il le fera pour son roi.</p>",
            'position' => 10,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_10',
        ],
        [
            'description' => "<p>Le Maire a organisé un grand banquet pour inaugurer le Quartier de la Nouvelle Ville. Tout Port Saint-Doux y était. J’ai écouté son discours d’autosatisfaction, coincé entre deux stands de saucisses. J'ai réussi à l'aborder. Il m'a parlé d’avenir, de reconstruction, de prospérité… et puis il a exhibé un médaillon autour de son cou.</p><p><em>Offert par Galdric II en personne</em>, a-t-il déclaré, en le brandissant fièrement.</p><p>Un médaillon ancien, c’est vrai. Mais… quelque chose m’a dérangé. Wilbert avait dit que ces objets étaient rares, presque uniques. Robert n’imaginait même pas que le Roi ait pu approcher un homme comme le Maire. Ce médaillon, ce pourrait être un fragment. Ou un faux très bien forgé. Je dois en avoir le cœur net.</p>",
            'position' => 11,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_11',
        ],
        [
            'description' => "<p>Je suis retourné voir Wilbert avec une description précise du médaillon porté par le Maire. L’Arcaniste n’a même pas levé les yeux de son établi. Il a juste soupiré.</p><p><em>Ça&nbsp;? Je l’ai déjà vu. Une contrefaçon habile, faite pour briller à la lumière mais vide de toute essence magique. Une coquille, pas un fragment.</em></p><p>Selon lui, ce n’est ni un artefact, ni un vestige royal. Juste un objet pour flatter un ego. Mais… il ne l’a pas vu de près. Il reste une chance, mince, qu’il se trompe. J’ai confiance en ce vieux gnome bourru, mais un doute s’est installé. Et si c’était bien un faux&nbsp;? Qui l’a forgé&nbsp;? Pourquoi&nbsp;? Et surtout… à quoi ressemble le véritable second fragment&nbsp;?</p>",
            'position' => 12,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_12',
        ],
        [
            'description' => "<p>En repassant chez Gart&nbsp;—&nbsp;sans grand espoir je l’avoue&nbsp;—&nbsp;j’ai voulu comprendre pourquoi il avait été si froid à propos du Sceau. Il m’a regardé longuement, puis m’a balancé entre deux coups de marteau&nbsp;:</p><p><em>C’est pas à moi qu’il faut poser ces questions. C’est notre Roi qui savait ce qu’il faisait… Du moins, jusqu’à ce qu’il parte. Il notait tout. Surtout dans ses derniers mois. Paraît qu’il passait tout son temps dans ses appartements, au Palais.</em></p><p>Voilà donc la prochaine piste. Les notes du Roi. Il y a peut-être là de quoi éclaircir cette histoire de rituel, de tombeau… et peut-être même du fragment disparu.</p>",
            'position' => 13,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_13',
        ],
        [
            'description' => "<p>Le Palais ne m’avait jamais semblé aussi froid. Pas de feu, pas d’accueil, rien qu’un silence glacial et des gardes droits comme des hallebardes rouillées. J’ai tenté la discussion&nbsp;:&nbsp;ils m’ont répondu par des regards aussi tranchants que leurs lames. Puis je l’ai vue. Une servante. Les bras chargés de linges, le regard vif sous sa coiffe trop serrée. Je lui ai offert un sourire, quelques mots bien choisis, des fleurs cueillies à l’aube. Elle a rougi, a détourné les yeux, puis a murmuré&nbsp;:&nbsp;<em>Je peux faire diversion, cinq minutes pas plus.</em></p><p>Le reste s’est déroulé comme dans un rêve fiévreux&nbsp;:&nbsp;j'ai monté les marches quatre à quatre, parcouru un couloir sombre, sur un parquet grinçant, et enfin… j'ai pénétré dans les appartements royaux. Sous un pupitre renversé, j'ai trouvé un carnet de cuir aux coins usés. L’écriture du Roi Galdric III. Des notes fiévreuses, confuses parfois, mais pleines de vérité. Il y parlait d’Alaric, de son comportement bizarre, de ses recherches obsessionnelles, de la rumeur d’une malédiction tapie sous le tombeau de Galdric Ier. Il évoquait le rituel de l’Âme, la perte d’un premier fragment&nbsp;—&nbsp;le Médaillon des Vents&nbsp;—&nbsp;et la cache du second, confié à un vieil ermite dans les Monts Terribles.</p><p>Une dernière ligne griffonnée, comme une prière&nbsp;:&nbsp;<em>Si je ne reviens pas, c’est que l’Ombre aura gagné.</em></p>",
            'position' => 14,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_14',
        ],
        // ALT 1
        [
            'description' => "<p>Tharôl vivait reclus au Refuge du Bouc Boiteux. Ce n’était plus un homme, mais une silhouette rongée par les années, par la solitude, et par la magie obscure de l’Épine du Roi. Cet artefact n’est pas qu’un fragment du Sceau&nbsp;:&nbsp;il porte une volonté propre, un fardeau ancien tissé de serments et de souffrances. Il s’était accroché à Tharôl comme une sangsue d’âme, effaçant peu à peu ses souvenirs, sa bonté, son humanité… ne laissant qu’un gardien froid, hostile, hanté par les bêtes plus que par les hommes. Pourtant, au fond de lui, il restait quelque chose. Un regret. Un désir d’être libre.</p><p>J’ai pratiqué le rituel. Les mots étaient anciens, hésitants, mais ils ont suffi. L’Épine a glissé de son corps comme une ombre arrachée. Libéré de la malédiction, Tharôl s’est effondré. Il était vieux, depuis trop longtemps. Son dernier souffle était un soupir de paix. J’ai emporté l’Épine du Roi. Elle pulse encore… Mais elle est à moi, maintenant.</p>",
            'position' => 15,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_15',
        ],
        // ALT 2
        [
            'description' => "<p>Tharôl m’a accueilli comme un chien chasse les intrus. Grognon, sec, paranoïaque. À ses yeux, j’étais un voleur de secrets ou un traître de plus. Il se méfiait de tout. Et probablement de lui-même.</p><p>L’Épine du Roi était visible, presque incrustée dans sa chair. Ce fragment du Sceau avait pourri son âme&nbsp;:&nbsp;il le faisait errer entre deux formes&nbsp;—&nbsp;celle d’un vieil homme rongé de doutes, et celle d’une bête féroce et silencieuse.</p><p>Ce n’est pas sous la rage que je l’ai tué. C’est sous sa forme humaine, alors qu’il ne m’attaquait pas. Peut-être qu’il aurait parlé. Peut-être qu’on aurait pu l’aider. Peut-être… L’Épine était froide, noire, encore vibrante de malédiction. J’ai dû la détacher de son corps comme on arrache une épine vivante d’une plaie purulente.</p><p>Je l’ai prise. Mais depuis, le silence du Refuge me pèse.</p>",
            'position' => 16,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_16',
        ],
        // ALT 3
        [
            'description' => "<p>Je voulais sauver Tharôl. Malgré sa méfiance, malgré la bête tapie en lui, malgré l’Épine du Roi, noire comme une nuit sans fin, scellée à son cœur. Cette chose n’était pas qu’un fragment magique. C’était un parasite. Une conscience. Une ancienne promesse façonnée dans la douleur et l’oubli. Elle avait rongé Tharôl, l’isolant, le brisant, le forçant à vivre entre deux mondes&nbsp;:&nbsp;celui des bêtes et celui des hommes.</p><p>Le rituel de dépossession était risqué. Incomplet. Mais j’ai essayé. Et j’ai échoué. L’Épine a quitté Tharôl. Il est tombé à genoux, libre et vidé… et moi, je suis resté debout, glacé jusqu’aux os, l’esprit alourdi. La chose en moi. Elle murmure, parfois. Elle attend.</p><p>J’ai quitté le Refuge avec le second fragment. Mais j’ai aussi quitté quelque chose derrière moi&nbsp;:&nbsp;la sensation d’être entier.</p>",
            'position' => 17,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_17',
        ],
        [
            'description' => "<p>J’ai repris la route vers Port Saint-Doux, les deux fragments du Sceau en ma possession&nbsp;:&nbsp;le Médaillon des Vents et l’Épine du Roi.</p><p>Le voyage a été long et silencieux. Tout au fond de mon sac, ces objets semblaient peser plus lourd qu’ils ne le devraient. En arrivant aux portes de la ville, j’ai senti l’atmosphère encore plus tendue qu’avant. Les regards sont fuyants, les soldats plus nombreux. Le Maire impose son autorité, et personne ne s’y oppose ouvertement. Je dois retrouver Wilbert, Robert et Gart. Avant de penser à ouvrir le Donjon de l’Âme, il faudra convaincre ceux qui savent forger l’Histoire… ou au moins la souder.</p>",
            'position' => 18,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_18',
        ],
        [
            'description' => "<p>Je suis allé voir Gart le Forgeron, dans son atelier étouffant du Quartier du Marché. Il a reconnu l’Épine du Roi du premier coup d’œil. Il m’a demandé d’un ton sec si j’avais une idée de ce que je trimballais. J’ai répondu que oui, ou du moins que je commençais à comprendre. Il a soupiré, longuement, et m’a dit de foutre le camp. Pour lui, reforger le Sceau, même en théorie, c’est rejouer avec les forces qui ont coûté la vie à Galdric Ier. Il m’a dit que si j’avais une once de bon sens, je devrais jeter les deux fragments au fond de la mer.</p><p>Avant de me claquer la porte au nez, il a quand même laissé échapper un détail. Que pour espérer le faire changer d’avis, il faudrait obtenir l’accord des deux autres têtes pensantes de leur ancien &laquo;&nbsp;trio&nbsp;&raquo;&nbsp;:&nbsp;Wilbert et Robert. Ceux-là seuls pourraient peut-être le convaincre que ce n’est pas une folie.</p>",
            'position' => 19,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_19',
        ],
        // ALT 1
        [
            'description' => "<p>Je suis allé voir Robert. Il a levé les yeux sur moi, m’a scruté, puis a lâché un grognement. Je lui ai exposé la situation&nbsp;:&nbsp;le Sceau, les fragments, l’urgence. Il a secoué la tête.</p><p><em>C’est pas que je t’aime pas, gamin. Mais j’te connais pas. J’te vois courir partout, j’entends que dalle, j’vois pas grand-chose. Si tu veux qu’on te fasse confiance pour manœuvrer un artefact aussi dangereux que le Sceau du Tombeau… il va falloir plus qu’un joli discours.</em></p><p>Puis il a tourné les talons. Le message était clair&nbsp;:&nbsp;sans preuves tangibles de mes actions, pas de soutien. Il va me falloir accomplir plus, prouver ma valeur. Ou alors abandonner.</p>",
            'position' => 20,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_20',
        ],
        // ALT 2
        [
            'description' => "<p>Je suis retourné parler à Robert, le garde vétéran du Quartier du Marché. Il m’a vu approcher de loin, le regard sérieux, presque trop calme pour ce vieux ronchon. Je lui ai parlé du Sceau, des fragments, du Royaume qui part en vrille, de la menace imminente, du besoin de reforger ce foutu artefact.</p><p>Il n’a pas sourcillé. Il m’a écouté, puis il a hoché la tête. Il a dit que depuis mon arrivée, il avait vu ce que j’étais capable de faire. Que j’aidais les gens sans chercher à me faire valoir, que j’avais risqué ma vie pour des étrangers, et que j’avais assez d’étoffe pour porter un poids que même des nobles n’oseraient pas soulever. Alors il a accepté. Un vieux grognard qui donne son aval, ça vaut plus qu’un parchemin royal.</p>",
            'position' => 21,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_21',
        ],
        [
            'description' => "<p>Wilbert m’a reçu dans son échoppe encombrée comme d’habitude, entre des piles de grimoires et des fioles qui bouillonnaient toutes seules. Il a longuement regardé les deux fragments, sans les toucher, puis il a marmonné des mots que je ne comprenais pas. Il les a appelés &laquo;&nbsp;les deux clefs du silence éternel&nbsp;&raquo;. Il n’a pas été surpris que je veuille reforger le Sceau. Il a même souri, légèrement.</p><p><em>L’idée est dangereuse, mais logique. Si le Tombeau scellé contient encore l’essence de Galdric Ier ou pire… mieux vaut refermer la cage que jouer les curieux. Même si nous ne savons même pas si elle s'est rouverte, ou pas…</em></p><p>Il m’a parlé d’un métal rare, le tellarion, capable de fusionner deux fragments magiques sans les corrompre. Gart saurait peut-être le travailler, mais seulement si l’esprit est prêt. Avant de me laisser partir, il m’a tendu un manuscrit. Quelques lignes anciennes sur le Sceau. Des mots de Galdric II, peut-être.</p><p><em>Dites à Gart que c’est le moment. Soit il agit maintenant, soit quelqu’un d’autre le fera. Mais vous… vous me semblez avoir une âme droite.</em>></p>",
            'position' => 22,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_22',
        ],
        // ALT 1
        [
            'description' => "<p>Gart m’a écouté jusqu’au bout cette fois. Pas un mot, pas une grimace. Puis il m’a regardé droit dans les yeux.</p><p><em>Je te crois. Et je te suis. Mais je ne peux pas reforger le Sceau comme ça. Pas sans une Pierre Tellarion.</em></p><p>Il m’a expliqué que ce minéral ancien, presque mythique, permet d’unir des objets magiques sans briser leur équilibre. Une sorte de cœur forgé dans le sang et le temps, que seuls les maîtres forgerons du royaume savent manier. Il en reste quelques-unes. Peut-être. La dernière qu’il a entendue mentionner aurait été déterrée dans un ancien sanctuaire tout en haut des Monts Terribles, au Rocher du Dragon.</p><p><em>Reviens avec ça. Et je te le forge, ton fichu Sceau.</em></p>",
            'position' => 23,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_23',
        ],
        // ALT 2
        [
            'description' => "<p>Je suis revenu avec la Pierre Tellarion. Elle était bien là, dans ce sanctuaire à demi effondré, perdue au sommet des Monts Terribles. Gart l’a examinée, longuement. Puis il m’a fait signe d’entrer et a fermé sa forge à double tour. Il a disposé les deux fragments sur son établi, placé la Pierre Tellarion entre eux, et enclenché un mécanisme ancien qui s’est mis à vibrer. Des glyphes se sont allumés sur l’enclume. Les fragments ont tremblé, se sont élevés, fusionnés. Des heures ont passé, ou des minutes, je ne sais plus. Quand la lumière s’est éteinte, Gart tenait le Sceau reforgé. Il me l’a tendu. Sans un mot. Mais ses yeux brillaient.</p>",
            'position' => 24,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_24',
        ],
        [
            'description' => "<p>J'ai le Sceau. Mais il me manque le Rituel de l'Âme, pour entrer dans le Donjon. Je dois retourner parler au Grand Druide, et le convaincre de me transmettre ce savoir. Sans finir comme Théobald, pourchassé par les Druides du Cercle…</p>",
            'position' => 25,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_25',
        ],
        [
            'description' => "<p>Je suis retourné au Bosquet des Druides. Je croyais que le Grand Druide allait m’aider. Je croyais que maintenant que j’avais les deux fragments du Sceau, il me montrerait le Rituel de l’Âme. Mais il m’a reçu froidement. Son regard perçait à travers moi comme si j’étais une menace. Il a dit que les fragments n’avaient aucun lien avec lui. Que les Hommes venaient toujours chercher des pouvoirs qu’ils ne comprenaient pas. Il m’a rappelé que je n’étais pas des leurs. Que je n’étais pas initié. J’ai insisté. Il s’est levé et m’a simplement dit&nbsp;:</p><p><em>Si tu tiens tant à ouvrir ce tombeau, alors trouve ta propre voie. Mais n’attends pas que le Cercle t’y conduise. Je te reconnais du mérite, certes. Tu as passé l'épreuve. Mais tu n'es pas des nôtres.</em></p><p>Il m’a tourné le dos. Entretien terminé. Je suis reparti, avec plus de questions que de réponses.</p>",
            'position' => 26,
            'last' => true,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_26',
        ],
        [
            'description' => "<p>Je suis allé au Bois du Pendu, attiré par des rumeurs et des courants d’air chargés de regrets. Là, dans un recoin oublié d'une crique un peu glauque, j’ai trouvé un esprit suspendu à la mémoire des vivants&nbsp;:&nbsp;Gérôme. Il n’était plus de ce monde, mais son châtiment le retenait ici, dans l’ombre des branches. Un druide ancien, condamné pour avoir osé défier les règles du Cercle et remettre en question le secret du Rituel de l’Âme. Pour cela, il avait été pendu. Et oublié.</p><p>Mais son âme n’avait pas fui. En répondant à ses questions, en retrouvant son histoire, je l’ai aidé à rassembler les fragments de sa mémoire dispersée. Lorsqu’il s’est souvenu de qui il était, la corde a disparu. Il a retrouvé la paix. Avant de s’effacer, il m’a laissé l’Amulette du Cercle, une relique oubliée, symbole de sa sagesse bannie et de son appartenance à l'Ancien Cercle, respectable ancêtre des druides qui parcourent aujourd'hui ces bois.</p>",
            'position' => 27,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_27',
        ],
        [
            'description' => "<p>Cette fois, le Grand Druide ne pouvait plus me renvoyer à mes quêtes ou à mon ignorance. Lorsque je suis revenu dans le Bosquet des Druides, j’ai brandi l’Amulette du Cercle. Le silence est tombé, lourd, ancestral. Le regard du Grand Druide s’est durci&nbsp;—&nbsp;puis s’est adouci. Il a reconnu en moi l’écho de leurs fautes. Le souvenir de Gérôme. L'héritage de l'Ancien Cercle. Le poids de ce qu’ils ont toujours refusé de transmettre.</p><p>Il n’a pas prononcé de mots inutiles. Il m’a enseigné le Rituel de l’Âme, celui que même le Roi Galdric Ier n’aurait pas dû apprendre, celui qui révèle les portes cachées du Donjon. Il m’a averti, cependant&nbsp;:&nbsp;ce rituel ne fait pas qu’ouvrir une voie. Il réveille ce qui dort. Il appelle les âmes liées. Et le danger ne vient pas toujours de ce qu’on cherche, mais de ce qu’on réveille en chemin.</p>",
            'position' => 28,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_28',
        ],
        [
            'description' => "<p>Le Sceau du Tombeau est entre mes mains. Le Médaillon des Vents et l’Épine du Roi ont été reforgés en une seule pièce, un artefact ancien, puissant… et inquiétant. J’ai appris le Rituel de l’Âme. Je peux désormais révéler les portes du Donjon. Je sais où aller. Mais… suis-je prêt ?</p><p>Mes pensées me portent encore à travers les rues de Port Saint-Doux, et je sens les regards des vivants et les murmures des morts. Chaque choix fait, chaque vie croisée, pèse un peu plus lourd. Je dois bientôt partir. Et pourtant, je doute. Ai-je tout ce qu’il me faut&nbsp;? Suis-je suffisamment armé, protégé, lucide&nbsp;? Ai-je fait tout ce qui pouvait être fait, ou vais-je vers ma fin&nbsp;—&nbsp;ou pire encore&nbsp;?</p>",
            'position' => 29,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_29',
        ],
        [
            'description' => "<p>Au bout du monde, là où les Monts Terribles s’effondrent dans la lande froide et stérile, je l’ai trouvé. Le Donjon de l’Âme. Une citadelle ancienne, scellée, rongée par le vent et la mousse, accrochée au flanc de la montagne comme un vestige oublié. Pas de porte, pas d’entrée. Juste un mur de pierre noire, plus froid que l’air alentour.</p><p>J’ai récité le Rituel de l’Âme. Les mots appris. Le geste transmis. Le vent s’est arrêté. Mon souffle s’est figé. Puis, lentement, les pierres du mur ont tremblé, gémissant comme une bête réveillée d’un long sommeil. Une faille s’est ouverte dans le roc. Deux battants gigantesques, dissimulés dans le mur depuis des siècles, ont glissé l’un contre l’autre, révélant l’intérieur.</p><p>Une obscurité pure. Totale. Silencieuse. Aucun bruit. Aucune odeur. Rien d’humain, rien d’accueillant. Et moi, face à l’inconnu, le cœur prêt à bondir, j’ai franchi le seuil.</p>",
            'position' => 30,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_30',
        ],
        [
            'description' => "<p>Dans une salle étrange, silencieuse comme un tombeau, le sol luisait d’un éclat bleuté. Au centre trônait un immense miroir fendu, à la surface pâle et vive à la fois, comme un œil de verre ouvert sur un autre monde. Des pages dispersées m’attendaient là, abandonnées, peut-être même jetées avec rage. Je les ai ramassées une à une. Certaines étaient brûlées sur les bords, d'autres trempées d’humidité ancienne. Toutes étaient vierges. Face au miroir, l’encre s'est révélée. Et la voix d’Alaric, le Prince disparu, s’est mise à me parler à travers les lignes…</p><p>Il parlait d’abord de sa curiosité. Des légendes anciennes. Du Roi Galdric Ier, son ancêtre préféré, modèle de droiture et d’unité. Puis vinrent les murmures. Une voix, dans sa tête. Discrète, douce, familière. Qui lui révélait des vérités cachées. Qui guidait ses pas, soufflait les bonnes réponses. Une voix qui l’aidait à percer les secrets du Donjon. Elle lui a promis de revoir son grand-père. Galdric Ier n’était pas mort… juste enfermé. Toujours là, dans le Tombeau, prisonnier d’une injustice ancienne. Et seul le Prince pouvait le libérer. Il a douté. Puis cru. Puis obéi.</p><p>Les dernières pages sont emplies d’adoration. De visions. De promesses. Le monde pouvait être sauvé, unifié. Il le voyait. Il le voulait. Une ère nouvelle sous la bannière des Galdric. La Paix par la Guerre. L’Ordre par la soumission. Et au fond, cette certitude qui transperce le papier&nbsp;:&nbsp;Il devait retrouver Nashoré.</p>",
            'position' => 31,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_31',
        ],
        [
            'description' => "<p>En approchant, j’ai d’abord cru que mes oreilles me jouaient des tours. Un bruissement… puis un mot… non, une syllabe. Et soudain des dizaines. Des centaines. Des murmures. Des voix multiples, entremêlées, incompréhensibles, qui semblaient sortir des murs eux-mêmes. Plus j’approchais, plus elles devenaient pressantes. Pas plus fortes, non. Pires&nbsp;:&nbsp;plus nombreuses. Leur flux incessant formait un brouhaha mental qui parasitait toute pensée.</p><p>Dans la salle, à demi effondré contre une colonne fissurée, un homme en armure gisait. Vivant. Je me suis approché, retenant mon souffle. Galdric III. Le roi disparu. Ses lèvres s’ouvrirent faiblement… et les murmures cessèrent d’un coup.</p><p><em>Tu es arrivé jusqu’ici. Alors… tout n’est pas encore perdu.</em></p><p>Il a parlé lentement. Chaque phrase semblait extraite à la force des souvenirs et de la douleur. Il m’a parlé d’Alaric, de sa soif de vérité, de son obsession pour le passé glorieux de la lignée des Galdric.</p><p><em>Il croyait… pouvoir libérer son aïeul… sauver Galdric Ier d’un sort injuste. Il s’est trompé. Moi aussi. Je… n'ai pas vu… J'ai compris… trop tard.</em></p><p>Le roi a tenté de le suivre, de le raisonner. Mais le Donjon ne pardonne pas.</p><p><em>Je suis tombé ici… en bonne compagnie, on dirait.</em></p><p>Son rictus était amer. Je lui ai offert quelques-unes de mes potions restantes. Il a bu lentement, en fermant les yeux. Puis il a soufflé, plus ferme&nbsp;:</p><p><em>Il faut empêcher ce qui vient. Si Alaric s’abandonne à Nashoré, le Tombeau ne sera plus qu’une porte ouverte. Et le Monde… le Monde ne tiendra pas.</em></p><p>Il s’est levé en tremblant, l’épée au fourreau. Il m’a regardé, épuisé mais droit.</p><p><em>Je te suis. Tant que je tiens debout.</em></p>",
            'position' => 32,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_32',
        ],
        [
            'description' => "<p>La salle résonnait d’un silence plus oppressant que tous les murmures du Donjon. Devant moi, Alaric. Seul. Debout, le dos droit mais les traits tirés, les mains crispées. Il faisait face à une porte monumentale, sculptée dans la roche même des Monts Terribles. Elle vibrait d’une présence sourde, invisible. Il ne m’a pas vu entrer. Ou alors… il s’en fichait.</p><p><em>Je suis prêt. Tu m’as dit que je le serais. Alors ouvre.</em></p><p>Il parlait à voix basse, mais chaque mot suintait la tension, l’épuisement… et la foi aveugle.</p><p><em>Je peux le faire. Pour Galdric. Pour le Royaume. Pour toi.</em></p><p>Puis, le doute. L’hésitation dans le ton.</p><p><em>Pourquoi tu m’ignores ? Tu m’as guidé… Tu m’as fait une promesse…</em></p><p><em>Grand-père… Tu es là, pas vrai&nbsp;? Je le sais. Je te sens. Tu peux m’aider… Aide-moi&nbsp;!</em></p><p>Une longue seconde passa. Puis il s’effondra à genoux. Pas physiquement. Mentalement. Il parla à voix basse, dans une langue que je ne comprenais pas, ou peut-être n’était-ce qu’un murmure sans fin. Une prière tordue, ou une négociation funeste. Quelque chose bougeait, derrière cette porte. Ou en lui.</p>",
            'position' => 33,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_33',
        ],
        // ALT 1
        [
            'description' => "<p>J’ai parlé à Alaric. Je lui ai rappelé qui il était, qui il avait été. Son regard a vacillé… puis s’est assombri. Il a attaqué.</p><p>Galdric s’est interposé. Il a payé le prix fort. Le combat a été brutal, presque irréel.</p><p>Quand le silence est revenu, j’étais debout, seul, blessé… et le Sceau à la main. Mais je ne ressentais aucune victoire. Juste… un rire. Loin. Grave. Et soudain, une présence dans mon esprit. Nashoré.</p><p>Il voulait ma voix, mes gestes, mon corps. Je ne pouvais pas résister longtemps. Alors j’ai fait le seul choix possible&nbsp;:&nbsp; j’ai ouvert la porte avec le Sceau. Et je suis entré pour l’affronter.</p>",
            'position' => 34,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_34',
        ],
        // ALT 2
        [
            'description' => "<p>J’ai parlé. Galdric aussi. Et contre toute attente, Alaric nous a écoutés. Il a pleuré. Il a tremblé. Pendant un instant, il est redevenu un fils. Un homme. Mais cette accalmie n’a pas duré. Des éclairs noirs ont traversé ses pupilles. Ses mains tremblaient.</p><p><em>Il… il m’appelle. Il me brûle. Je ne peux pas…</em></p><p>Il m’a supplié.</p><p><em>Va. Entre. Empêche-le. Je le retiens… un peu.</em></p><p>Alors j’ai ouvert la porte. Et j’ai plongé dans les ténèbres.</p>",
            'position' => 35,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_35',
        ],
        // ALT 3
        [
            'description' => "<p>Je ne les ai pas écoutés. Ni le père. Ni le fils. Je les ai tués. Par certitude. Par peur. Par impatience. Je croyais que cela réglerait le problème. Mais c’était exactement ce qu’il voulait. Nashoré a trouvé une brèche.</p><p>Il m’a souri. Et a pris racine. Quand j’ai repris mes esprits, ma main était posée sur le Sceau. J’ai ouvert la porte… sans le vouloir. Je suis entré. Mais je n’étais plus seul dans ma tête.</p>",
            'position' => 36,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_36',
        ],
        // ALT 4
        [
            'description' => "<p>Alaric a écouté. Il s’est montré calme. Raisonné. Il m’a dit qu’il m’avait attendu. Qu’il comprenait enfin. Qu’il voulait combattre Nashoré avec moi. Qu’ensemble, nous serions plus forts.</p><p>Son père doutait, mais moi… Moi j’avais envie d’y croire. Alors j’ai utilisé le Sceau.</p><p>Les portes se sont ouvertes. Il m’a suivi dans l’ombre. Mais dans son regard… J’ai cru voir le sourire de Nashoré.</p>",
            'position' => 37,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_37',
        ],
        // ALT 1
        [
            'description' => "<p>Alaric est mort. Galdric aussi. Je suis seul dans ce tombeau. Et la voix en moi hurle à s’en fendre l’âme. Elle me harcèle, me tente, m’ordonne de m’agenouiller.</p><p>Mais je ne fléchis pas. Je tiens bon. J’ai réuni les fragments. Reforgé le Sceau. Traversé l’île, affronté les monstres, les fantômes, les démons intérieurs. Je ne suis pas venu jusqu’ici pour reculer.</p><p>Alors je pousse la porte du Tombeau, et j’entre. Nashoré m’attend. Ce n’est pas un combat pour le monde. C’est un combat pour mon âme.</p>",
            'position' => 38,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_38',
        ],
        // ALT 2
        [
            'description' => "<p>Il me connaissait. Il savait tout de moi. La voix, d’abord douce, m’a caressé l’esprit. Elle m’a compris. Elle m’a dit que ce monde n’avait jamais été juste. Que Galdric 1er avait voulu l’unité. Que ce rêve avait été brisé. Et que je pouvais le réaliser à mon tour.</p><p>Alaric, à mes côtés, me soutenait. Il croyait en cette voie. J’ai ouvert la porte avec le Sceau. Je n’ai pas ressenti la peur. Pas tout de suite. Juste une main glaciale sur mon cœur. Puis… le silence. Et le noir.</p>",
            'position' => 39,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_39',
        ],
        // ALT 3
        [
            'description' => "<p>Alaric tremblait. Ses yeux s’embuaient de lumière et de ténèbres mêlées. Galdric posait une main sur son épaule. Moi, je tenais le Sceau.</p><p>Nashoré grattait déjà la paroi de nos esprits. J'ai ouvert la porte avec le Sceau. Et la porte s’est ouverte. Ensemble, nous sommes entrés. Il ne s’agira pas de fuir, ni de résister, ni même de vaincre. Il s’agira de choisir ce qu’il reste de nous quand l’ombre nous dévore. Le combat final commence.</p>",
            'position' => 40,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_40',
        ],
        // ALT 4
        [
            'description' => "<p>Alaric était là. Sourire doux, regard franc. Il m’a dit que Nashoré nous avait dupés tous. Il m’a tendu la main. Et moi, naïf, fatigué, ébranlé, je l’ai saisie.</p><p><em>Allons le vaincre ensemble</em> qu’il a dit. Alors j’ai placé le Sceau dans le réceptacle, et la porte du Tombeau s’est ouverte.</p><p>Mais ce n’est pas Nashoré que nous allions affronter. C’était moi. Il n’avait plus besoin d’un hôte. Il avait un messager. La lumière s’est éteinte. Et la fin a commencé.</p>",
            'position' => 41,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_41',
        ],
        // ALT 1
        [
            'description' => "<p>Nashoré s’est matérialisé dans les ombres du Tombeau. Il n’avait ni chair, ni souffle. Mais sa présence écrasait le sol. Il m’a parlé. Il m’a tenté une dernière fois. Il connaissait mes doutes. Mes douleurs. Mes désirs. J’ai refusé.</p><p>Il a rugi, et l’espace autour de nous s’est effondré. Le combat a été mental, physique, spirituel. Il m’a attaqué dans mes souvenirs. Dans mes remords. Mais j’ai tenu bon.</p><p>Quand le Sceau a brillé entre mes mains, je l’ai vu reculer. Hurler. Se briser. Et puis… le silence. Je suis sorti seul du Tombeau. Mais je n’étais plus le même.</p>",
            'position' => 42,
            'last' => true,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_42',
        ],
        // ALT 2
        [
            'description' => "<p>Nous avons refermé la porte derrière nous. Galdric et Alaric étaient à mes côtés. Nashoré nous a attendus, amusé, presque moqueur.</p><p>Mais nous avions préparé le Rituel de Dépossession. Le Grand Rituel, mêlant les trois fragments d’âmes brisées : le père, le fils, et le témoin.</p><p>En l’invoquant, nous n’avons pas tenté de tuer Nashoré. Nous avons tenté de le sceller. Encore. Le prix fut lourd. Galdric donna son souffle. Alaric sa conscience. Moi… j’ai perdu ce que j’étais.</p><p>Le monde est sauf. Mais quelque chose d’ancien veille encore, au fond du Tombeau.</p>",
            'position' => 43,
            'last' => true,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_43',
        ],
        // ALT 3
        [
            'description' => "<p>Je croyais avoir gagné. Je croyais avoir résisté.</p><p>Mais quand je suis entré, Nashoré n’a rien dit. Il m’a regardé. Et il a souri. J’ai compris que c’était trop tard. J’étais déjà à lui.</p><p>Il n’a pas eu besoin de se battre. Il m’a juste montré ce que je voulais. J’ai pris sa main. Et j’ai ouvert le monde.</p>",
            'position' => 44,
            'last' => true,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_44',
        ],
        // ALT 4
        [
            'description' => "<p>Le Tombeau n’était pas une prison. C’était une chambre d’éveil. Nashoré ne dormait pas. Il attendait. Il préparait.</p><p>Quand j’ai ouvert la porte, il n’a pas essayé de fuir. Il m’a dit&nbsp;:&nbsp;<em>Tu as bien travaillé.</em></p><p>Alors il a regardé au-delà du Royaume. Vers les autres Îles. Ce jour-là, il ne m’a pas tué. Il m’a laissé vivre. Car je suis devenu son héraut.</p><p>Et l’Éveil ne fait que commencer.</p>",
            'position' => 45,
            'last' => true,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_45',
        ],
    ];
}
