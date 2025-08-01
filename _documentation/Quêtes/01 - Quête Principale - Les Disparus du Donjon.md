# 🗺️ Fiche Quête Principale — *Les Disparus du Donjon*

---

## 🧾 Informations Générales

**Type :** Quête principale  
**Déclenchement :** Automatique à l’arrivée à Port Saint-Doux, via le prologue jouable ou une première interaction avec
un donneur de quête (Wilbert, ou un événement aux Anciens Docks).  
**Lieu de départ :** Port Saint-Doux  
**Résumé narratif :**
> Le Royaume est en crise. Le Prince Alaric a disparu, et son père, le Roi Galdric III, a quitté la cour sans prévenir.
> Depuis, Port Saint-Doux est en proie au chaos, aux rumeurs, et à une étrange tension. Le joueur, fraîchement arrivé, se
> retrouve mêlé à une enquête ancienne mêlant magie oubliée, mensonges d’État et fragments d’un artefact interdit : le
> Sceau du Tombeau.  
> Pour comprendre ce qui s’est réellement passé, il lui faudra reconstituer ce Sceau, découvrir le Rituel de l’Âme, et
> oser pénétrer dans un lieu légendaire et scellé depuis des siècles : le Donjon de l’Âme.

---

## 🎯 Objectifs Narratifs

| Ordre | Objectif principal                                                                   |
|-------|--------------------------------------------------------------------------------------|
| 1     | Découvrir ce qui est arrivé au Prince Alaric et au Roi Galdric III                   |
| 2     | Retrouver les fragments perdus du Sceau du Tombeau                                   |
| 3     | Convaincre les membres du Trio Royal (Wilbert, Gart, Robert) de permettre la reforge |
| 4     | Apprendre le Rituel de l’Âme et accéder au Donjon                                    |
| 5     | Affronter, contenir ou succomber à Nashoré selon les choix du joueur                 |

---

## 🪜 Étapes Narratives

| Pos.  | ID Technique          | Titre / Moment clé                                | Type ou Fonction                              |
|-------|-----------------------|---------------------------------------------------|-----------------------------------------------|
| 1     | quest_main_step_1     | Arrivée à Port Saint-Doux, mise en contexte       | Introduction                                  |
| 2     | quest_main_step_2     | Découverte d'une note illisible aux Docks         | Événement déclencheur                         |
| 3     | quest_main_step_3     | Rencontre de Wilbert et première mention du Sceau | Mystère / exposition                          |
| 5     | quest_main_step_5     | Théobald, druide banni, parle du Donjon de l’Âme  | Lien avec les anciens rituels                 |
| 7     | quest_main_step_7     | Récupération du Médaillon des Vents               | Premier fragment                              |
| 8-10  | quest_main_step_8–10  | Trio Royal : révélations sur le passé             | Flashback, exposition, confiance              |
| 11    | quest_main_step_11    | Le Maire et le faux médaillon                     | Fausse piste                                  |
| 14–16 | quest_main_step_14–16 | Rencontre avec Tharôl / obtention de l’Épine      | Deuxième fragment — embranchements            |
| 17–23 | quest_main_step_17–23 | Reforge du Sceau avec l’aide de Gart              | Progression + ressource rare à obtenir        |
| 24–27 | quest_main_step_24–27 | Recherche et apprentissage du Rituel de l’Âme     | Dialogue avec les druides / quête spirituelle |
| 28–31 | quest_main_step_28–31 | Ouverture du Donjon, découverte de Galdric III    | Derniers alliés, tournant dramatique          |
| 32–36 | quest_main_step_32–36 | Confrontation avec Alaric : multiples issues      | Point de bascule avec choix narratifs forts   |
| 37–44 | quest_main_step_37–44 | Nashoré : combat, scellage, corruption, défaite   | Épilogues et fins multiples                   |

---

## 🔐 Conditions de déclenchement

La quête principale commence automatiquement avec le jeu. Il n’y a **aucune condition préalable** (ni niveau, ni
équipement, ni quête secondaire).  
Certaines étapes, en revanche, nécessitent d’avoir atteint un certain point de progression (ex. : possession du premier
fragment, ou acceptation du Grand Druide).

---

## 🎁 Conséquences

La quête principale :

- Modifie **l’état du monde** à travers plusieurs zones (Palais, Quartier du Marché, Bosquet des Druides, Donjon…).
- Impacte **les réactions et relations** des PNJs majeurs (Gart, Robert, Wilbert, etc.).
- **Débloque ou verrouille** certaines quêtes secondaires selon les choix effectués.
- Aboutit à **plusieurs fins différentes** allant du salut à la damnation.

---

## 🧪 Remarques techniques

- Certaines étapes sont dédoublées (ALT) pour permettre des **résolutions multiples** selon les choix ou les stats du
  joueur.
