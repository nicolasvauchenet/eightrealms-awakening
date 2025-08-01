# 🗺️ Fiche Quête Secondaire — *Les Flammes d’Askalor*

---

## 🧾 Informations Générales

**Type :** Quête secondaire  
**Déclenchement :** Inscriptions brûlées repérées au Col du Vent Noir  
**Lieu de départ :** Monts Terribles – Col du Vent Noir  
**Résumé narratif :**
> Des murmures inquiétants résonnent dans les hauteurs glacées du Col du Vent Noir. Un ancien culte nain, oublié depuis
> des siècles, tente de ramener Askalor, le Feu Ancien, à travers un rituel interdit mené dans les profondeurs du
> Gouffre d’Askalor. Le joueur peut emprunter une galerie maudite creusée par Bardin l’Exhumé, un nain repenti aux
> visions troublantes, ou affronter les dangers frontaux du Gouffre.  
> S’il échoue à stopper le rituel, Askalor pourrait embraser le monde.  
> S’il réussit, il obtiendra le Croc d’Askalor, une arme ancienne capable de blesser Nashoré.

---

## 🎯 Objectifs Narratifs

| Ordre | Objectif                                                   |
|-------|------------------------------------------------------------|
| 1     | Découvrir les signes annonciateurs du culte dans les Monts |
| 2     | Explorer la Grotte des Échos et rencontrer Bardin l’Exhumé |
| 3     | Choisir un chemin vers le Gouffre (frontal ou souterrain)  |
| 4     | Survivre aux hallucinations et pénétrer dans le Culte      |
| 5     | Empêcher ou assister au rituel final                       |
| 6     | Décider du sort du culte et récupérer le Croc d’Askalor    |

---

## 🪜 Étapes Narratives

| Pos. | ID Technique                           | Titre / Moment clé                            | Type d’étape                  |
|------|----------------------------------------|-----------------------------------------------|-------------------------------|
| 1    | quest_secondary_flames_askalor_step_1  | Murmures au Col du Vent Noir                  | Déclencheur / ambiance        |
| 2    | quest_secondary_flames_askalor_step_2  | Rencontre avec un Nain rongé de fièvre        | Rencontre / exposition        |
| 3    | quest_secondary_flames_askalor_step_3  | La galerie maudite de Bardin                  | Exploration / dilemme         |
| 4    | quest_secondary_flames_askalor_step_4  | Hallucinations dans la pierre                 | Hallucinations / choix        |
| 5    | quest_secondary_flames_askalor_step_5  | Le Culte de l’Âtre Souverain                  | Infiltration / confrontation  |
| 6    | quest_secondary_flames_askalor_step_6  | Le Rituel commence                            | Compte à rebours / urgence    |
| 7a   | quest_secondary_flames_askalor_step_7a | Briser le rituel : le Croc surgit des cendres | Réussite dramatique / gain    |
| 7b   | quest_secondary_flames_askalor_step_7b | Laisser faire : vision d’un monde consumé     | Échec volontaire / révélation |
| 8    | quest_secondary_flames_askalor_step_8  | Retour à Bardin (ou ce qu’il en reste)        | Clôture morale / malaise      |

---

## 🔐 Conditions de déclenchement

Cette quête est accessible après les premiers événements majeurs de la quête principale. Elle suppose que le joueur a
accès aux Monts Terribles et a déjà rencontré Wilbert ou consulté certaines archives sur les cultes anciens.

---

## 🎁 Conséquences

- Acquisition du **Croc d’Askalor**, une dague unique efficace contre Nashoré
- Compréhension plus profonde des tensions entre Nains et Royaumes humains
- Possibilité d’échec narratif marquant (Askalor se réveille… ou presque)
- Conséquences psychologiques sur le joueur, selon ses choix

---

## 🧪 Remarques techniques

- L’accès au Gouffre peut se faire par deux lieux différents (galerie de Bardin ou descente frontale)
- Des hallucinations sont implémentées sous forme de PNJs illusoires et de faux écrans de jeu
- La récompense finale (Croc d’Askalor) est un objet de quête à usage unique mais décisif
