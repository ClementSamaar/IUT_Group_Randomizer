# IUT_Group_Randomizer
Gérard MENVUSSA, enseignant à l’IUT, a l’habitude, pour les TP, de faire travailler les
étudiants en groupe.
La création des groupes se fait d’ordinaire de manière aléatoire, les noms des élèves sont
inscrits sur des bouts de papier déposés dans une casquette et, une main innocente tire
au sort les membres de chaque groupe.
Confinement oblige, cette année il faut trouver une autre méthode.
Vous êtes donc chargé, à titre individuel (entraide néanmoins possible) de produire une
petite application qui aura pour objectif de créer ces groupes de travail.

## Impératifs techniques :
- usage des tampons,
- autoloader
- pattern MVC (usage des répertoires suivants : Controleurs | Modeles | Vues)
  
La liste des étudiants vous est fournie au format Excel, il faudra trouver un moyen de
l’exploiter au format JSON (utilisez un outil externe, en ligne pour la transformation ou,
bien mieux, transformez la via PHP).

Paramètres en entrée : le nombre max d’élèves par groupe
En sortie : liste des groupes et leurs membres (bonus: téléchargeable au format pdf)
