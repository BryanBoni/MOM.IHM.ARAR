<!DOCTYPE html>
<!--  -->
<html>
    <head>
        <title>Objet 3D</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            epix-imgloader {
                position: absolute;
                top: 50%;
                left: 50%;
                z-index: 1000;
            }
            .loading-container {
                position: relative;
                background: #dfdfdf;
                width: auto;
                height: auto;
            }
        </style>
    </head>
    <body>
        <?php
            ini_set("max_execution_time",150);
        ?>
        <input id="texture" type="button" value="Géométrie et texture" onclick="setTexture()" />
        <input id="uniforme" type="button" value="Géométrie" onclick="setUniforme()" />
        <input id="retour" type="button" value="Retour" onclick="history.go(-1);" />
        </br>
        <div id="loadingContainer" class = "loading-container">
            <center class="onepix-imgloader">
                <div id="loading" class="onepix-imgloader" style="padding: 25%;">
                    <span>Chargement</span></br>
                    <span id="pourcent"></span>
                </div>
            </center>
            <div id="container" class="container" ></div>
        </div>
        <div id="legende_obj3D">
            <p>LÉGENDE : afficher le contenu avec du php</p>
        </div>
        <script src="../Model/javascript/three.min.js"></script>
        <script src="../Model/javascript/Detector.js"></script>
        <script src="../Model/javascript/raf.js"></script>
        <script src="../Model/javascript/DDSLoader.js"></script>
        <script src="../Model/javascript/OBJLoader.js"></script>
        <script src="../Model/javascript/TrackballControls.js"></script>
        <script src="../Model/javascript/heartcode-canvasloader-min.js"></script>
        <script src="../Model/javascript/jquery-1.12.3.min.js"></script>
        <script src="../Model/javascript/model3D.js"></script>
    </body>
</html>
