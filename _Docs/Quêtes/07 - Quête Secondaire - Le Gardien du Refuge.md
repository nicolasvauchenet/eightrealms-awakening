# 🗺️ Fiche Quête Secondaire — *Le Gardien du Refuge*

---

## 🧾 Informations Générales

**Type :** Quête secondaire  
**Déclenchement :** Exploration des Monts Terribles, découverte du refuge isolé  
**Lieu de départ :** Monts Terribles – Refuge de montagne  
**Résumé narratif :**
> Le joueur découvre un refuge isolé dans les hauteurs glacées des Monts Terribles. Il y rencontre un homme mystérieux,
> Tharôl, lié à une malédiction étrange : il se transforme en une bête sauvage sans en avoir conscience. À travers une
> enquête, un affrontement et la recherche d’un rituel ancien, le joueur devra choisir entre libérer Tharôl ou
> l’éliminer.  
> **Cette quête explore la thématique du Rituel de l’Âme** et introduit **l’Épine du Roi**, un artefact maudit
> directement lié à la quête principale.

---

## 🎯 Objectifs Narratifs

| Ordre | Objectif                                                           |
|-------|--------------------------------------------------------------------|
| 1     | Explorer le refuge et découvrir l'identité de Tharôl               |
| 2     | Comprendre le lien entre Tharôl et la bête                         |
| 3     | Chercher un moyen de rompre la malédiction                         |
| 4     | Tenter un rituel ou affronter Tharôl pour récupérer l'Épine du Roi |

---

## 🪜 Étapes Narratives

| Pos. | ID Technique                                 | Titre / Moment clé                      | Type d’étape                  |
|------|----------------------------------------------|-----------------------------------------|-------------------------------|
| 1    | quest_secondary_le_gardien_du_refuge_step_1  | Découverte du refuge                    | Introduction / exploration    |
| 2    | quest_secondary_le_gardien_du_refuge_step_2  | Lecture du journal de Tharôl            | Investigation                 |
| 3    | quest_secondary_le_gardien_du_refuge_step_3  | Première nuit sur place                 | Pause / attente               |
| 4    | quest_secondary_le_gardien_du_refuge_step_4  | Combat contre le bouquetin              | Combat                        |
| 5    | quest_secondary_le_gardien_du_refuge_step_5  | Rencontre avec Tharôl                   | Énigme / tension              |
| 6    | quest_secondary_le_gardien_du_refuge_step_6  | Deuxième nuit sur place                 | Pause / attente               |
| 7    | quest_secondary_le_gardien_du_refuge_step_7  | Retour de la bête                       | Révélation dramatique         |
| 8    | quest_secondary_le_gardien_du_refuge_step_8  | Aveux de Tharôl                         | Révélation                    |
| 9    | quest_secondary_le_gardien_du_refuge_step_9  | Piste vers un rituel interdit           | Ouverture vers autre lieu     |
| 10   | quest_secondary_le_gardien_du_refuge_step_10 | Recherche infructueuse                  | Échec intermédiaire           |
| 11   | quest_secondary_le_gardien_du_refuge_step_11 | Lecture du manuscrit "Serments Brisés"  | Trouvaille capitale           |
| 12   | quest_secondary_le_gardien_du_refuge_step_12 | Échec du rituel                         | Fin dramatique possible       |
| 13   | quest_secondary_le_gardien_du_refuge_step_13 | Réussite du rituel                      | Libération / clôture possible |
| 14   | quest_secondary_le_gardien_du_refuge_step_14 | Combat final contre Tharôl pour l’Épine | Fin alternative violente      |
| 15   | quest_secondary_le_gardien_du_refuge_step_15 | Départ avec l’Épine du Roi              | Conclusion / fardeau hérité   |

---

## 🔐 Conditions de déclenchement

Cette quête se déclenche uniquement par l’exploration libre des Monts Terribles. Elle ne nécessite aucune étape
préalable,
mais devient disponible **après la première visite libre hors de Port Saint-Doux**.

---

## 🎁 Conséquences

- Le joueur peut obtenir l’**Épine du Roi**, un artefact majeur lié au Rituel de l’Âme
- Plusieurs fins possibles : libération de Tharôl, sa mort, ou fusion avec la bête
- Impacts narratifs sur la quête principale selon la façon dont l’Épine est obtenue

---

## 🧪 Remarques techniques

- Les étapes 12, 13, 14 et 15 sont **mutuellement exclusives** (fin alternative)
- Tharôl est lié à un système de transformation à déclenchement narratif (non aléatoire)
- Le journal de Tharôl est un **objet lisible** (item interactif)
- Le manuscrit "Serments Brisés" n’est accessible que via exploration + déblocage spécial
