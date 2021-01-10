<!DOCTYPE html>
<html>
    <head>
        <title>Station Météo</title>
        <link rel="icon" type="image/png" href="images/favicon.png"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- FEUILLES DE STYLES -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- JAVASCRIPT -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="//cdn.rawgit.com/Mikhus/canvas-gauges/gh-pages/download/2.1.7/all/gauge.min.js"></script>
        <script type="text/javascript" src="js/date_heure.js"></script>
        <script type="text/javascript" src="js/date_heure_comment.js"></script>
    </head>
    
    
    <body data-spy="scroll" data-target=".navbar" data-offset="60">
        <?php
            // Actualise votre page actuelle après 60 secondes
            header("Refresh:60");
        ?>
        
        <?php include("php/header.php"); ?>
        
        <?php include("php/tabs.php"); ?>
        
        <?php include("php/footer.php"); ?>
    </body>

</html>
