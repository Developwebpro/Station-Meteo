#include "DHT.h" //Appel de la librairie du capteur

DHT dht(2, DHT22); //Broche du capteur

void setup() {
  Serial.begin(9600);
  dht.begin(); //Mise en service du capteur
}

void loop() {
  float humidity = dht.readHumidity(); //Récupération de l'humidité
  float temperature = dht.readTemperature(); //Récupération de la température en Celsius
  float tempFahr = dht.readTemperature(true); //Récupération de la température en Fahrenheit
  
  if (isnan(temperature) || isnan(humidity) || isnan(tempFahr)) {
    Serial.println("Erreur du capteur DHT22"); //Si un problème survient avec le capteur
    return;
  } 
  float temp_ressentie = dht.computeHeatIndex(tempFahr, humidity); //Calcul de la température ressentie

  Serial.print(temperature); //Affichage de la température
  Serial.print(",");
  Serial.print(humidity); //Affichage de l'humidité
  Serial.print(",");
  Serial.println(dht.convertFtoC(temp_ressentie)); //Conversion et affichage de la température ressentie
     
  delay(2000);
}
