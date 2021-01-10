# Import de la librairie serial
import serial
import time

now = time.localtime(time.time()) # Obtenir l'heure et la date locale
year, month, day, hour, minute, second, weekday, yearday, daylight = now

diff = 24 - hour
final = 24 - diff

minute = minute

serialArduino = serial.Serial('/dev/ttyACM0', 9600)

line = serialArduino.readline().decode('utf-8').rstrip()
data = line.split(',')

# Ecriture de chaque message recu
try:
    #Boucle while qui tourne tout le temps
    while True:
        serialArduino = serial.Serial('/dev/ttyACM0', 9600)
        line = serialArduino.readline().decode('utf-8').rstrip()
        data = line.split(',')

        fichier = open("donnees/gauge.csv", "a") #Ouvrir le fichier et écrire à la fin sans effacer le contenu précédent
        fichier.write(data[0] + "," + data[1] + "," + data[2] + "\n")
        #data0 : température, data1 : humidité, data2 : temp ressentie
        fichier.close()
        print("Le chrono est de ", final, "h et ", minute, " minutes")
        time.sleep(60)
        minute += 1

        if minute == 59:
            now = time.localtime(time.time()) # Obtenir l'heure et la date locale
            year, month, day, hour, minute, second, weekday, yearday, daylight = now

            serialArduino = serial.Serial('/dev/ttyACM0', 9600)
            line = serialArduino.readline().decode('utf-8').rstrip()
            data = line.split(',')

            print("Le chrono est de ", final, "h et ", minute, " minutes")
            minute = 0
            final += 1
            fichier = open("donnees/" + "%02d-%02d-%02d" % (year, month, day) + ".csv", "a")
            fichier.write("%02d,%02d,%02d,%02d,00," % (year, month, day, final) + data[0] + "," + data[1] + "\n")
            fichier.close()
            time.sleep(60)

        if final == 24:
            now = time.localtime(time.time()) # Obtenir l'heure et la date locale
            year, month, day, hour, minute, second, weekday, yearday, daylight = now

            serialArduino = serial.Serial('/dev/ttyACM0', 9600)
            line = serialArduino.readline().decode('utf-8').rstrip()
            data = line.split(',')

            print("Journée du ", "%02d/%02d/%02d" % (year, month, day), " terminée !!!!!!!!!!!!!")
            minute = 0
            final = 0
            print("Aujourd'hui nous sommes le : ", "%02d/%02d/%02d" % (year, month, day))
            fichier = open("donnees/" + "%02d-%02d-%02d" % (year, month, day) + ".csv", "a")
 
except KeyboardInterrupt:
    exit()
