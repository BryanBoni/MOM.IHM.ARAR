<?php

//variables
$title = "Details | Laboratoire ArAr";
$content = "";
$head1 = "<script src = \"http://maps.googleapis.com/maps/api/js\"></script>"
        . "<script src = \"../Model/javascript/detailObj.js\"></script>";
$head = "";
$objTitle = "cbr_TN_2016";

if(true) { $ifobj3D = "<a href=\"obj3D.html\" class=\"btn btn-warning\" style = \"margin: 5px;\">Visionner l'objet 3D</a>"; }
else { $ifobj3D = "<span>Objet 3D non disponible</span>"; }

$obj2D = "<div id=\"loadingContainer\" class = \"loading-container\">
                <img id=\"image2d\" src=\"../Ressources/objectBeta/default.png\" class = \"loading-container\" />"
          . $ifobj3D . 
        "</div>";


//provisoire
$chimi = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare non arcu eu gravida. Curabitur eleifend mollis orci ac lacinia. Curabitur velit leo, vehicula non sem vel, porttitor congue sem. In venenatis urna nibh, id ultricies turpis fringilla eu. Vestibulum vitae vestibulum enim. Morbi eget ligula hendrerit, lacinia odio non, ornare tellus. Sed vitae augue eget nunc dignissim cursus. Proin at risus ut libero aliquet convallis vitae sit amet ante. Donec placerat malesuada volutpat. In risus nunc, mollis in urna vitae, ullamcorper vulputate dui. Suspendisse nibh nisi, pellentesque ut orci vel, tincidunt vehicula velit. Etiam massa nibh, feugiat id massa ac, dapibus convallis ipsum. Maecenas dolor velit, molestie non ullamcorper ut, bibendum id lorem. Praesent lacinia elit dapibus fringilla accumsan. Ut sed commodo quam. Nulla convallis, nisl ultricies ullamcorper tincidunt, augue lacus sagittis velit, eu vulputate massa dui convallis quam. ";
$petro = "Morbi dolor nibh, accumsan eu eros at, ultrices volutpat lectus. Nulla diam sapien, varius ac tempor non, ullamcorper eu lorem. In rutrum dictum felis, in laoreet arcu iaculis sed. Donec molestie dui lectus, nec luctus magna pretium at. Integer sit amet tincidunt risus, nec euismod turpis. Donec turpis ligula, eleifend nec ultricies sit amet, semper vitae elit. Ut quis mauris luctus, ultrices magna sit amet, sollicitudin eros. ";
$autre1 = "Nunc mattis posuere porta. Quisque suscipit eget dolor ut porta. In molestie hendrerit sem, a ultricies arcu aliquam et. In molestie nisl vitae dui lacinia interdum. Nam dapibus vitae ex eget mollis. Ut in diam posuere, consequat ante id, hendrerit erat. Vivamus non pharetra lectus. Curabitur tempus condimentum suscipit. Fusce dapibus malesuada eleifend. Vestibulum ut lectus et lectus pharetra scelerisque. Praesent porta leo quam, et semper libero tempus ut. ";
$autre2 = "Morbi ultrices pellentesque turpis, ac rutrum turpis consectetur at. Vivamus scelerisque ac neque sed hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris ut sagittis urna. Quisque ex augue, posuere ut nisi nec, lobortis ultricies massa. Vivamus vitae nunc nisl. Donec vestibulum nibh eget nulla tincidunt, sit amet aliquet enim rutrum. Etiam pellentesque suscipit orci et elementum. Ut a dolor in tortor rhoncus bibendum. Vestibulum sed urna eget eros lacinia bibendum sed sit amet nulla. Cras gravida ut libero nec ultrices. Aliquam erat volutpat. Duis varius justo massa, ut egestas neque ultricies ut. Suspendisse ut dapibus lacus. ";


$objGDesc = "<b>Provenance</b><br /><p>Atelier de ..., 10Km au sud d'Hamamet, prospection de S. Aounalla et M. Bonifaik,<br /> Tunisie. </p><br /><b>Datation</b><br /><p>2ème moitié Ve</p>";
$objGene = "<b>Nom</b><p>cbr_TN_2016</p><b>Nature</b> <p><b>S01</b> Pâte <b>S02</b> Engobe</p><b>Num analyse</b><p>ACD399, Capelli 7125, M215</p>";
$objBiblio = "<b>Biblio</b><p>BRUN, C., 2007 - Etude Technique des productions de l'atelier de sidi Khalifa (Pheradi Maius, Tunisie) : Céramiques culinaires, sigillées et cazettes, in : BONIFAY, M. et TREGLIA, J.-C, LRCW2, Late Roman Coarse Wares, Cooking Wares and Amphorae in the Mediterranean : Archaeology and Archaeometry (Aix-en-Provence, 13-16 avril 2005), BAR IS1662 (II), pp. 569-579.</p>";
$other = "Nothing";

$content = $content . "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Détails de l'objet sélectionné</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<img src = \"../Ressources/Oiseau_Quadri.gif\" style=\"width: 150px;\"/>"
            . "</div>"
        . "</div>"
        . "<br />"
        
        . "<div class = \"row\" id = \"detailSearch\">"//same display as the previous one.
            . "<h1><font color=\"#8e3c06\">OBJET</font> $objTitle</h1>"
            . "<div class = \"row\" style = \"margin: 10px; \">"
                . "<div class = \"col-xs-12 col-md-4 \" id = \"obj3d\">"
                    . "$obj2D"
                . "</div>"
                . "<div class = \"col-md-8 col-xs-12\" id = \"descGene\">"
                    . "<h3 style = \"text-align: left;\">Description </h3>"    
                    . "<ul class = \"nav nav-tabs\" role = \"tablist\">"
                        . "<li role = \"presentation\" class = \"active\"><a href = \"#DP\" aria-controls = \"DP\" role = \"tab\" data-toggle = \"tab\">Provenance & Datation</a></li>"
                        . "<li role = \"presentation\"><a href = \"#generale\" aria-controls = \"generale\" role = \"tab\" data-toggle = \"tab\">Identifiants</a></li>"
                        . "<li role = \"presentation\"><a href = \"#biblio\" aria-controls = \"biblio\" role = \"tab\" data-toggle = \"tab\">Bibliographie</a></li>"
                        . "<li role = \"presentation\"><a href = \"#other\" aria-controls = \"other\" role = \"tab\" data-toggle = \"tab\">Liens</a></li>"
                    . "</ul>"

                    . "<div class = \"tab-content\" style = \"border: 1px solid #e6e6e6; border-top: none; text-align: justify; padding: 15px;\">"//content
                        . "<div role = \"tabpanel\" class = \"tab-pane fade in active\" id = \"DP\">$objGDesc</div>"
                        . "<div role = \"tabpanel\" class = \"tab-pane fade\" id = \"generale\">$objGene</div>"
                        . "<div role = \"tabpanel\" class = \"tab-pane fade\" id = \"biblio\">$objBiblio</div>"
                        . "<div role = \"tabpanel\" class = \"tab-pane fade\" id = \"other\">$other</div>"
                    . "</div>"
                . "</div>";

$content = $content 
                
            . "</div>"
            . "<br />"
            . "<div class = \"row\" id = \"galMap\">"
                . "<div class = \"col-sm-6\"><h3>Photos & Dessin</h3><div id = \"scrollable\" style = \"height: 300px; border: 2px solid #cccccc\">$chimi</div></div>"
                
                . "<div class = \"col-sm-6\"><h3>Localisation</h3><div id = \"googleMap\" style = \"height: 300px; border: 2px solid #cccccc\"></div></div>"
            . "</div>"
        
            . "<div class = \"row\" id = \"galMap\">"
                . "<h3 style = \"text-align: left; margin: 10px;\"> Analyses</h3>"    
                . "<ul class = \"nav nav-tabs\" role = \"tablist\">"
                    . "<li role = \"presentation\" class = \"active\"><a href = \"#home\" aria-controls = \"home\" role = \"tab\" data-toggle = \"tab\">Chimie</a></li>"
                    . "<li role = \"presentation\"><a href = \"#profile\" aria-controls = \"profile\" role = \"tab\" data-toggle = \"tab\">Fabric</a></li>"
                    . "<li role = \"presentation\"><a href = \"#messages\" aria-controls = \"messages\" role = \"tab\" data-toggle = \"tab\">Pétrographie</a></li>"
                    . "<li role = \"presentation\"><a href = \"#settings\" aria-controls = \"settings\" role = \"tab\" data-toggle = \"tab\">Autres</a></li>"
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
