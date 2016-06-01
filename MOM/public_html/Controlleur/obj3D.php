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
        <input id="texture" type="button" value="texture" onclick="setTexture()" />
        <input id="uniforme" type="button" value="uniforme" onclick="setUniforme()" />
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
            <?php
                $gmworker= new GearmanWorker();

                # Ajoute un serveur par défaut (localhost).
                $gmworker->addServer();

                # Enregistre une fonction "reverse" avec le serveur.
                $gmworker->addFunction("reverse", "reverse_fn");

                # Définit le délai d'attente à 60 secondes
                $gmworker->setTimeout(60000);

                while(@$gmworker->work() || $gmworker->returnCode() == GEARMAN_TIMEOUT)
                {
                  if ($gmworker->returnCode() == GEARMAN_TIMEOUT)
                  {
                    # Normalement, vous devriez faire quelques lignes utiles ici...
                    continue;
                  }

                  if ($gmworker->returnCode() != GEARMAN_SUCCESS)
                  {
                    echo "return_code: " . $gmworker->returnCode() . "\n";
                    break;
                  }
                }

                function reverse_fn($job)
                {
                  return strrev($job->workload());
                }
            ?>
        </div>
        <script src="../Model/javascript/three.min.js"></script>
        <script src="../Model/javascript/Detector.js"></script>
        <script src="../Model/javascript/raf.js"></script>
        <script src="../Model/javascript/DDSLoader.js"></script>
        <script src="../Model/javascript/MTLLoader.js"></script>
        <script src="../Model/javascript/OBJLoader.js"></script>
        <script src="../Model/javascript/TrackballControls.js"></script>
        <script src="../Model/javascript/heartcode-canvasloader-min.js"></script>
        <script src="../Model/javascript/jquery-1.12.3.min.js"></script>
        <script src="../Model/javascript/model3D.js"></script>
    </body>
</html>
