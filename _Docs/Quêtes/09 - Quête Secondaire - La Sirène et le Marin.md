# 🗺️ Fiche Quête Secondaire — *La Sirène et le Marin*

---

## 🧾 Informations Générales

**Type :** Quête secondaire  
**Déclenchement :** Discussion avec Myra à la Taverne de la Flûte Moisie  
**Lieu de départ :** Port Saint-Doux – Quartier du Port  
**Résumé narratif :**
> Une vieille femme parle d’une ballade oubliée, capable d’éveiller les mémoires endormies. En suivant ses paroles, le
> joueur rencontre une Sirène tourmentée, ancienne amante d’un marin nommé Eryl. En remontant les traces du passé
> jusqu’à une plage maudite dans les Sables Chauds, le joueur découvre la vérité sur une trahison ancienne… et peut
> choisir de révéler cette vérité ou de l’adoucir, influençant la fin de la quête.  
> Cette quête propose une **fin à embranchements**, avec choix moral.

---

## 🎯 Objectifs Narratifs

| Ordre | Objectif                                                   |
|-------|------------------------------------------------------------|
| 1     | Explorer les docks en chantant la ballade révélée par Myra |
| 2     | Survivre à l’attaque de la Sirène                          |
| 3     | Découvrir l’histoire d’Eryl sur la Plage de la Sirène      |
| 4     | Décider de la vérité à transmettre à la Sirène             |
| 5     | Retourner voir Myra à la Taverne, pour clore le récit      |

---

## 🪜 Étapes Narratives

| Pos. | ID Technique                                 | Titre / Moment clé                           | Type d’étape               |
|------|----------------------------------------------|----------------------------------------------|----------------------------|
| 1    | quest_secondary_la_sirene_et_le_marin_step_1 | Rencontre avec Myra et ballade oubliée       | Déclencheur / introduction |
| 2    | quest_secondary_la_sirene_et_le_marin_step_2 | Apparition et combat contre la Sirène        | Combat / action principale |
| 3    | quest_secondary_la_sirene_et_le_marin_step_3 | Révélation d’un lieu oublié                  | Transition / exploration   |
| 4    | quest_secondary_la_sirene_et_le_marin_step_4 | Combat sur la Plage et découverte du journal | Combat / révélation        |
| 5    | quest_secondary_la_sirene_et_le_marin_step_5 | Vérité révélée à la Sirène                   | Choix narratif (vérité)    |
| 6    | quest_secondary_la_sirene_et_le_marin_step_6 | Mensonge réconfortant à la Sirène            | Choix narratif (mensonge)  |
| 7    | quest_secondary_la_sirene_et_le_marin_step_7 | Retour auprès de Myra (après vérité)         | Clôture                    |
| 8    | quest_secondary_la_sirene_et_le_marin_step_8 | Retour auprès de Myra (après mensonge)       | Clôture                    |

---

## 🔐 Conditions de déclenchement

Cette quête nécessite que le joueur explore la Taverne de la Flûte Moisie et engage une discussion avec Myra. Aucune
autre condition préalable n’est exigée.

---

## 🎁 Conséquences

- Gagne potentiellement l’amulette magique **Cœur d’Écume**
- Réputation positive auprès de certains PNJs selon la version racontée
- Choix narratif à double embranchement (vérité ou mensonge)
- Approfondissement du lore maritime et des quartiers portuaires

---

## 🧪 Remarques techniques

- Étape 2 = combat contre une créature marine
- Étape 4 = combat + obtention d’objet (journal d’Eryl)
- Étapes 5 et 6 sont alternatives (le joueur ne voit qu’une seule selon son choix)
- Étapes 7 et 8 sont également exclusives selon l’issue choisie
