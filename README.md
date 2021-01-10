# Station Météo
Station Météo à l'aide d'un Raspberry Pi 3, d'un Arduino UNO et d'un Capteur DHT22

###### tags: `TP Station Météo`

# **TP Station Météo Connectée**

**Tâches à réaliser :**
* Créer une station météo en temps réel.
* Afficher sous forme graphique les données recueillies par le capteur.
* Créer un simulateur de données pour les tests

**Cahier des charges :**

* Affichage graphique en « temps réel » du taux d’humidité, de la température et de la température ressentie dans une interface web (toutes les xx minutes) – en option passage en paramètre du délai de mesure.
* Affichage graphique (courbes, histogrammes...) de l’historique par jour (en option par semaine, mois) des données.
* Pourvoir avoir le choix du jour à afficher dans l’historique l’interface web
* Développement d’un simulateur de données brutes pour les tests
* Calcul des moyennes des différentes données acquises par jour (en option par semaine par mois)

# Explications et démonstration
Notre groupe à réalisé une station météo permettant de récupérer la température et l'humidité grâce à un capteur DHT22 pour l'afficher sur une page web.

Cette page web est divisée en trois onglets : 
1) Onglet avec 3 gauges
    ![](https://i.imgur.com/GNzy6xZ.png)
    Sur cette page nous affichons le taux d'humidité (widget de gauche), la température ressentie (widget central) et la température ambiante (widget de droite).

2) Onglet avec le graphique affichant la température et l'humidité de la veille
    ![](https://i.imgur.com/zeQJurs.png)
    Sur cette page nous créons un graphique affichant le taux d'humidité et la température relevés chaque heure la veille.
    Ces données sont récupérées à partir d'un fichier .csv qui permet de récupérer dans l'ordre toutes les données pour les afficher.

3) Onglet avec le graphique affichant la température et l'humidité du jour (en temps réel)
    ![](https://i.imgur.com/HL5VdzK.png)
    Sur cette page nous créons un graphique affichant le taux d'humidité et la température relevés chaque heure en temps réel.
    Le fichier est trouvé grâce à son nom qui est générer automatiquement en php.
    
# Comment démarrer cette station météo ?

Pour démarrer cette station météo il faut que vous recupériez les fichiers et programmes nécessaire ici : 

**Voici les étapes à réaliser**

Coté Arduino : 
* Faites les branchement du capteur DHT22 sur votre Arduino comme sur l'image suivante : 
    ![](https://i.imgur.com/oA9g5au.png)
* Ensuite mettez le code Arduino sur votre carte (le code se trouve dans le dossier "codeArduino"). Tout le code est expliqué, donc aucun problème de compréhension :smiley: 
> PS : Pensez à bien vérifier le port sur lequel est branché votre capteur et modifié dans le code arduino si besoin (ici il s'agit du port 2)

Coté Raspberry Pi :

* Copier tous les dossiers/fichiers dans votre répertoire */var/www/html/StationMeteo*
* Brancher ensuite l'Arduino au Raspberry Pi à l'aide d'un câble USB B (Arduino) / USB A (port USB) comme sur l'image suivante : 
    ![](https://i.imgur.com/MuIUW6F.png)
* Ensuite rendez-vous dans ce répertoire avec la commande `cd /var/www/html/StationMeteo`
* Puis vous pouvez directement lancer le programme Python avec la commande `python3 simulateurAvecCapteur.py` qui lancera le script Python permettant d'assurer la communication entre le Raspberry, l'Arduino et le Capteur DHT22.
    Comme pour le code Arduino, tout y est expliqué pour bien comprendre ce qui se passe.
> PS: Si vous n'avez pas de capteur DHT22 ni même de carte Arduino, vous pouvez utiliser le script *simulateurSansCapteur.py* qui généra aléatoirement des données pour remplacer celles envoyées par l'Arduino.
* Ensuite pour voir le site vous pouvez le visualiser à cette adresse : *votreIP/StationMeteo*

Si vous souhaitez retrouver tous les codes et documents utilisés vous pouvez les consulter ici : Lien de votre Drive

***TP réalisé par GRISVAL Thibault, CHARPY Valentin et BAILO Thomas***
