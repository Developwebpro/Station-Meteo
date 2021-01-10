import time
from random import *

now = time.localtime(time.time()) # Obtenir l'heure et la date locale
year, month, day, hour, minute, second, weekday, yearday, daylight = now

diff = 24 - hour
final = 24 - diff

minute = minute

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

def tempressentie():
    while True:
        tr = uniform(-40, 80)
        tr = round(tr,2)
        tr = str(tr)
        return tr

# Ecriture de chaque message recu
try:
    #Boucle while qui tourne tout le temps
    while True:        
        fichier = open("donnees/gauge.csv", "a") #Ouvrir le fichier et écrire à la fin sans effacer le contenu précédent
        fichier.write(temperature() + "," + humidite() + "," + tempressentie() + "\n")
        #data0 : température, data1 : humidité, data2 : temp ressentie
        fichier.close()
        print("Le chrono est de ", final, "h et ", minute, " minutes")
        time.sleep(60)
        minute += 1
        
        if minute == 59:
            now = time.localtime(time.time()) # Obtenir l'heure et la date locale
            year, month, day, hour, minutes, second, weekday, yearday, daylight = now

            print("Le chrono est de ", final, "h et ", minute, " minutes")
            minute = 0
            final += 1
            fichier = open("donnees/" + "%02d-%02d-%02d" % (year, month, day) + ".csv", "a")
            fichier.write("%02d,%02d,%02d,%02d,00," % (year, month, day, final) + temperature() + "," + humidite() + "\n")
            fichier.close()
            time.sleep(60)

        if final == 24:
            now = time.localtime(time.time()) # Obtenir l'heure et la date locale
            year, month, day, hour, minute, second, weekday, yearday, daylight = now
            
            print("Journée du ", "%02d/%02d/%02d" % (year, month, day-1), " terminée !!!!!!!!!!!!!")
            minute = 0
            final = 0
            print("Date : ", "%02d/%02d/%02d" % (year, month, day))
            fichier = open("donnees/" + "%02d-%02d-%02d" % (year, month, day) + ".csv", "a")
            
except KeyboardInterrupt:
    exit()
