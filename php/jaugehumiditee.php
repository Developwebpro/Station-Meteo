<script type="text/javascript" src="js/Gauges/zepto.min.js"></script>

<?php
    $tab = file('donnees/gauge.csv');
    $der_ligne = $tab[count($tab)-1];
    $linktext = explode(",", $der_ligne);
    $temperature = $linktext[0];
    $humidite = $linktext[1];
    $tempressentie = $linktext[2];
?>

<input type="hidden" id="inputTemp" value="<?php echo $temperature; ?>" />
<input type="hidden" id="inputHum" value="<?php echo $humidite; ?>" />

<div id="ensemble">
    <h3 class="actualisationText">Affichage en temps réel (actualisation toutes les minutes)</h3>
    <div id="conteneur"> 
        <div id="titre1">Taux d'humidité</div>
        <div id="root"></div>
    </div>
    <div id="conteneur2">
        <div id="titre1">Température ressentie</div>
        <div id="cerclext">
            <div id="cercle">
                <h3>
                  Température Ressentie
                </h3>
                <p>
                  <?php echo $tempressentie; ?>°C
                </p>
                <h4 id="date_heure_comment"></h4>
                <script type="text/javascript">window.onload = date_heure_comment('date_heure_comment');</script>
            </div>
        </div>
    </div>
    <div id="conteneur1">
        <div id="titre1">Température</div>
        <div id="root1"></div>
    </div>
</div>

<script type="text/javascript" src="js/Gauges/mesure.js"></script>
<script type="text/javascript" src="js/Gauges/mscorlib.js" ></script>
<script type="text/javascript" src="js/Gauges/PerfectWidgets.js" ></script>
