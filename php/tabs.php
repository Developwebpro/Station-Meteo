<section id="tabs">
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'Gauges')" id="defaultOpen">Gauges</button>
      <button class="tablinks" onclick="openCity(event, 'Hier')">Hier</button>
      <button class="tablinks" onclick="openCity(event, 'Aujourdhui')">Aujourd'hui</button>
    </div>

    <div id="Gauges" class="tabcontent">
        <?php include("jaugehumiditee.php"); ?>
    </div>
    
    <div id="Hier" class="tabcontent">
      <script type="text/javascript">
            chartItHier();

            async function chartItHier() {
                const dataHier = await getDataHier();
                const ctx = document.getElementById('chartHier').getContext('2d');
                const myChartHier = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dataHier.xshum,
                        datasets: [{
                            label: 'Température',
                            data: dataHier.ystemp,
                            fill: false,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Humidité',
                            data: dataHier.yshum,
                            fill: false,
                            backgroundColor: 'rgba(99, 132, 255, 0.2)',
                            borderColor: 'rgba(99, 132, 255, 1)',
                            borderWidth: 1
                        }]
                    },
                });
            }

            async function getDataHier() {
                <?php
                    $date = date("Y-m-d"); //Récupération date d'aujourd'hui
                    $datehier = date("Y-m-d", strtotime($date." - 1 days"));
                ?>

                const xstemp = []; //Tableau des gradations sur l'axe X
                const ystemp = []; //Tableau des gradations sur l'axe Y

                const xshum = []; //Tableau des gradations sur l'axe X
                const yshum = []; //Tableau des gradations sur l'axe Y

                const response = await fetch('<?php echo "donnees/$datehier" ?>.csv'); //Lecture du fichier des données
                const dataHier = await response.text();

                const table = dataHier.split('\n').slice(0);
                table.forEach(row => {
                    const columns = row.split(',');

                    const heure = columns[3]; //Récupération de la valeur de l'heure
                    const mois = columns[1];

                    xstemp.push(parseFloat(heure) + "h"); //Gradation graphique sur l'axe X
                    xshum.push(parseFloat(heure) + "h"); //Gradation graphique sur l'axe X

                    const temp = columns[5]; //Récupération de la valeur de la température
                    const hum = columns[6]; //Récupération de la valeur de l'humidité

                    ystemp.push(temp); //Gradation graphique sur l'axe Y
                    yshum.push(hum); //Gradation graphique sur l'axe Y
                });
                return { xstemp, ystemp, xshum, yshum };
            }
        </script>
        <canvas id="chartHier" width="500" height="150"></canvas>
    </div>

    <div id="Aujourdhui" class="tabcontent">
        <script type="text/javascript">
            chartIt();

            async function chartIt() {
                const data = await getData();
                const ctx = document.getElementById('chart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.xshum,
                        datasets: [{
                            label: 'Température',
                            data: data.ystemp,
                            fill: false,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Humidité',
                            data: data.yshum,
                            fill: false,
                            backgroundColor: 'rgba(99, 132, 255, 0.2)',
                            borderColor: 'rgba(99, 132, 255, 1)',
                            borderWidth: 1
                        }]
                    },
                });
            }

            async function getData() {
                <?php
                    $date = date("Y-m-d"); //Récupération date d'aujourd'hui
                    //$datehier = date("Y-m-d", strtotime($date." - 1 days"));
                ?>

                const xstemp = []; //Tableau des gradations sur l'axe X
                const ystemp = []; //Tableau des gradations sur l'axe Y

                const xshum = []; //Tableau des gradations sur l'axe X
                const yshum = []; //Tableau des gradations sur l'axe Y

                const response = await fetch('<?php echo "donnees/$date" ?>.csv'); //Lecture du fichier des données
                const data = await response.text();

                const table = data.split('\n').slice(0);
                table.forEach(row => {
                    const columns = row.split(',');

                    const heure = columns[3]; //Récupération de la valeur de l'heure
                    const mois = columns[1];

                    xstemp.push(parseFloat(heure) + "h"); //Gradation graphique sur l'axe X
                    xshum.push(parseFloat(heure) + "h"); //Gradation graphique sur l'axe X

                    const temp = columns[5]; //Récupération de la valeur de la température
                    const hum = columns[6]; //Récupération de la valeur de l'humidité

                    ystemp.push(temp); //Gradation graphique sur l'axe Y
                    yshum.push(hum); //Gradation graphique sur l'axe Y
                });
                return { xstemp, ystemp, xshum, yshum };
            }
        </script>
        <canvas id="chart" width="500" height="150"></canvas>
    </div>

    <script type="text/javascript" src="js/tabs.js"></script>
</section>