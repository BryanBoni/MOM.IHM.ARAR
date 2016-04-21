<?php

//variables
$title = "Details | Laboratoire ArAr";
$content = "";

$objTitle = "Titre";
$objGDesc ="Description TXT";



$obj3D = "<div id=\"loadingContainer\" class = \"loading-container\">
            <center class=\"onepix-imgloader\">
                <div id=\"loading\" class=\"onepix-imgloader\" style=\"padding: 25%;\">
                    <span>Chargement</span>
                </div>
            </center>
            <div id=\"container\"></div>
            <a href=\"obj3D.html\">Visionner l'objet 3D</a>
        </div>
        <script src=\"../Model/javascript/three.min.js\"></script>
        <script src=\"../Model/javascript/Detector.js\"></script>
        <script src=\"../Model/javascript/raf.js\"></script>
        <script src=\"../Model/javascript/DDSLoader.js\"></script>
        <script src=\"../Model/javascript/MTLLoader.js\"></script>
        <script src=\"../Model/javascript/OBJLoader.js\"></script>
        <script src=\"../Model/javascript/TrackballControls.js\"></script>
        <script src=\"../Model/javascript/heartcode-canvasloader-min.js\"></script>
        <script src=\"../Model/javascript/jquery-1.12.3.min.js\"></script>
        <script src=\"../Model/javascript/model3DvueSimple.js\"></script>";




$chimi = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare non arcu eu gravida. Curabitur eleifend mollis orci ac lacinia. Curabitur velit leo, vehicula non sem vel, porttitor congue sem. In venenatis urna nibh, id ultricies turpis fringilla eu. Vestibulum vitae vestibulum enim. Morbi eget ligula hendrerit, lacinia odio non, ornare tellus. Sed vitae augue eget nunc dignissim cursus. Proin at risus ut libero aliquet convallis vitae sit amet ante. Donec placerat malesuada volutpat. In risus nunc, mollis in urna vitae, ullamcorper vulputate dui. Suspendisse nibh nisi, pellentesque ut orci vel, tincidunt vehicula velit. Etiam massa nibh, feugiat id massa ac, dapibus convallis ipsum. Maecenas dolor velit, molestie non ullamcorper ut, bibendum id lorem. Praesent lacinia elit dapibus fringilla accumsan. Ut sed commodo quam. Nulla convallis, nisl ultricies ullamcorper tincidunt, augue lacus sagittis velit, eu vulputate massa dui convallis quam. ";
$petro = "Morbi dolor nibh, accumsan eu eros at, ultrices volutpat lectus. Nulla diam sapien, varius ac tempor non, ullamcorper eu lorem. In rutrum dictum felis, in laoreet arcu iaculis sed. Donec molestie dui lectus, nec luctus magna pretium at. Integer sit amet tincidunt risus, nec euismod turpis. Donec turpis ligula, eleifend nec ultricies sit amet, semper vitae elit. Ut quis mauris luctus, ultrices magna sit amet, sollicitudin eros. ";
$autre1 = "Nunc mattis posuere porta. Quisque suscipit eget dolor ut porta. In molestie hendrerit sem, a ultricies arcu aliquam et. In molestie nisl vitae dui lacinia interdum. Nam dapibus vitae ex eget mollis. Ut in diam posuere, consequat ante id, hendrerit erat. Vivamus non pharetra lectus. Curabitur tempus condimentum suscipit. Fusce dapibus malesuada eleifend. Vestibulum ut lectus et lectus pharetra scelerisque. Praesent porta leo quam, et semper libero tempus ut. ";
$autre2 = "Morbi ultrices pellentesque turpis, ac rutrum turpis consectetur at. Vivamus scelerisque ac neque sed hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris ut sagittis urna. Quisque ex augue, posuere ut nisi nec, lobortis ultricies massa. Vivamus vitae nunc nisl. Donec vestibulum nibh eget nulla tincidunt, sit amet aliquet enim rutrum. Etiam pellentesque suscipit orci et elementum. Ut a dolor in tortor rhoncus bibendum. Vestibulum sed urna eget eros lacinia bibendum sed sit amet nulla. Cras gravida ut libero nec ultrices. Aliquam erat volutpat. Duis varius justo massa, ut egestas neque ultricies ut. Suspendisse ut dapibus lacus. ";

$content = $content . "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Détails de l'objet séléctionnée</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<img src = \"../Ressources/Oiseau_Quadri.gif\" style=\"width: 150px;\"/>"
            . "</div>"
        . "</div>"
        . "<br />"
        . "<div class = \"row\" id = \"advSearch\">"//same display as the previous one.
            . "<h1>$objTitle</h1>"
            . "<div class = \"row\">"
                . "<div class = \"col-sm-5 col-xs-offset-1 col-xs-10\" id = \"descGene\">"
                    . "<font color = \"#8e3c06\"><h3>Description :</h3></font>"
                    . "$objGDesc"
                . "</div>"
                . "<div class = \"col-xs-offset-1 col-xs-10 col-sm-5 col-sm-offset-0\" id = \"obj3d\">"
                    . "$obj3D"
                . "</div>"
            . "</div>"
            . "<br />"
            . "<div class = \"row\" id = \"galMap\">"
                . "<div class = \"col-sm-6\" style=\"//border-right: 2px solid #cccccc;\"><h3>Gallery</h3><div id = \"scrollable\" style = \"height: 300px; border: 2px solid #cccccc\">$chimi</div></div>"
                
                . "<div class = \"col-sm-6\"><h3>Map</h3><div id = \"googleMap\" style = \"height: 300px; border: 2px solid #cccccc\"></div></div>"
            . "</div>"
        
            . "<div class = \"row\" id = \"galMap\">"
                . "<h3 style = \"text-align: left; margin: 10px;\"> Table des analyses</h3>"    
                . "<ul class = \"nav nav-tabs\" role = \"tablist\">"
                    . "<li role = \"presentation\" class = \"active\"><a href = \"#home\" aria-controls = \"home\" role = \"tab\" data-toggle = \"tab\">Chimique</a></li>"
                    . "<li role = \"presentation\"><a href = \"#profile\" aria-controls = \"profile\" role = \"tab\" data-toggle = \"tab\">Petro</a></li>"
                    . "<li role = \"presentation\"><a href = \"#messages\" aria-controls = \"messages\" role = \"tab\" data-toggle = \"tab\">Autres</a></li>"
                    . "<li role = \"presentation\"><a href = \"#settings\" aria-controls = \"settings\" role = \"tab\" data-toggle = \"tab\">Autres 2</a></li>"
                . "</ul>"

                . "<div class = \"tab-content\" style = \"border: 1px solid #e6e6e6; border-top: none; text-align: justify; padding: 15px;\">"//content
                    . "<div role = \"tabpanel\" class = \"tab-pane fade in active\" id = \"home\">$chimi</div>"
                    . "<div role = \"tabpanel\" class = \"tab-pane fade\" id = \"profile\">$petro</div>"
                    . "<div role = \"tabpanel\" class = \"tab-pane fade\" id = \"messages\">$autre1</div>"
                    . "<div role = \"tabpanel\" class = \"tab-pane fade\" id = \"settings\">$autre2</div>"
                . "</div>"
            . "</div>"
        . "</div>";


require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");
