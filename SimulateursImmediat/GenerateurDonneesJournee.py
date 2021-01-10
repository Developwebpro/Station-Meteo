### SIMULATEUR DONNEES DU JOUR SUR 24H ###

import time #Librairie pour le temps
from random import *  # Librairie pour le nombre aléatoire


# Genaration aléatoire des données de température et d'humidité
def temperature():
    while True:
        t = uniform(-40, 80)
        t = round(t,2)
        t = str(t)
        return t
    
def humidite():
    while True:
        h = uniform(0, 100)
        h = round(h,2)
        h = str(h)
        return h


# Ecriture de chaque message recu
try:
        for i in range(24):
                now = time.localtime(time.time()) # Obtenir l'heure et la date locale
                year, month, day, hour, minute, second, weekday, yearday, daylight = now
                
                fichier = open("%02d-%02d-%02d" % (year, month, day) + ".csv", "a")
                fichier.write("%02d,%02d,%02d,%02d,00," % (year, month, day, i) + temperature() + "," + humidite() + "\n")
                fichier.close()

except KeyboardInterrupt:
	exit()
