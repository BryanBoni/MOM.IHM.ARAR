<?php
//Import
include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/db_traitement.php");

//variables
$title = "Details | Ceramom BDD";
$content = "";
$head1 = "<script src = \"http://maps.googleapis.com/maps/api/js\"></script>"
        . "<script src = \"../Model/javascript/detailObj.js\"></script>"
        . "<script src = \"../Model/javascript/resizeImg.js\"></script>"
        . "<script src = \"../Model/javascript/zoomGallerie.js\"></script>"
        . "<script src = \"../Model/javascript/jquery-1.12.3.min.js\"></script>"
        . "<script src = \"../Model/javascript/magnific_popup.js\"></script>";
$head = "";
$objId = "";
$accesDb = new db_connect();
$traitement = new db_traitement();
$objGraphId = $_POST['objectId'];
$noImgFile = "../Ressources/objectBeta/default.png";

//Get obj Info:
$rep = $accesDb ->getIMG($objGraphId);
$data = $rep -> fetch();
$primaryImg = $data['url_doc'];


$detailTable = $traitement->detailDataBase($accesDb->getDetail($objGraphId));
$natureTable = $traitement->doNatureTable($accesDb->getNature($objGraphId));

$chimi = $traitement ->doChemistryTable($accesDb ->getChemistry($objGraphId));

// Module for the 3D and for the default picture.
$isObjFile = true;
$ifobj3D = "";
if($isObjFile) { $ifobj3D = "<a href=\"obj3D.php\" class=\"btn btn-warning\" style = \"margin: 5px;\">Visionner l'objet 3D</a>"; }
else { $ifobj3D = "<span>Objet 3D non disponible</span>"; }

$obj2D = "<div id=\"loadingContainer\" class = \"loading-container\">
            <img style=\"width: 100%;\" src=\"$primaryImg\" class = \"loading-container img_default\" /> 
        </div>";/*id=\"image2d\"*/

// Module for the gallery and the technical drawings
// PHOTO
$isImgFilePicture = true; // check is we have some picture in the database
$ifImgFilePicture = "<div class = \"zoom-gallery\">";
if($isImgFilePicture) {
    for ($i = 1; $i < 1+1; $i++) {
        //$ifImgFilePicture .= "<td><img src=\"$primaryImg\" class = \"img_file_gallerie\" /></td>";
        $ifImgFilePicture .= "<!--
	Width/height ratio of thumbnail and the main image must match to avoid glitches.
	If ratios are different, you may add CSS3 opacity transition to the main image to make the change less noticable.
	 -->
	<a href=\"$primaryImg\" data-source=\"$primaryImg\" title=\"LEV730\" style=\"width:193px;height:125px;\">
            <img src=\"$primaryImg\" class = \"img_file_gallerie\" />
	</a><br />";
    }
}
else { $ifImgFilePicture = "<span>Pas de fichier disponible</span>"; }
$ifImgFilePicture .= "</div>";





// DESSIN
$isImgFileDessin = true; // check is we have some picture in the database
$ifImgFileDessin = "<div class = \"zoom-gallery\">";
if($isImgFileDessin) {
    for ($i = 1; $i < 1+1; $i++) {
        //$ifImgFileDessin .= "<td><img src=\"../Ressources/objectBeta/default.png\" class = \"img_file_gallerie\" /></td>";
        $ifImgFileDessin .= "<!--
	Width/height ratio of thumbnail and the main image must match to avoid glitches.
	If ratios are different, you may add CSS3 opacity transition to the main image to make the change less noticable.
	 -->
	<a href=\"$noImgFile\" data-source=\"../Ressources/objectBeta/\" title=\"RIEN\" style=\"width:193px;height:125px;\">
            <img src=\"$noImgFile\" class = \"img_file_gallerie\" />
	</a><br />";
    }
}
else { $ifImgFileDessin = "<span>Pas de fichier disponible</span>"; }
$ifImgFileDessin .= "</div>";





// Display of the 2D documents in the gallery
$gallerie = "<div class=\"col-xs-5 \"><h3>Photo</h3>$ifImgFilePicture</div>"
        . "<div class=\"col-xs-5  col-xs-offset-1\"><h3>Dessin technique</h3>$ifImgFileDessin</div>";






//provisoire

$petro = "Morbi dolor nibh, accumsan eu eros at, ultrices volutpat lectus. Nulla diam sapien, varius ac tempor non, ullamcorper eu lorem. In rutrum dictum felis, in laoreet arcu iaculis sed. Donec molestie dui lectus, nec luctus magna pretium at. Integer sit amet tincidunt risus, nec euismod turpis. Donec turpis ligula, eleifend nec ultricies sit amet, semper vitae elit. Ut quis mauris luctus, ultrices magna sit amet, sollicitudin eros. ";
$autre1 = "Nunc mattis posuere porta. Quisque suscipit eget dolor ut porta. In molestie hendrerit sem, a ultricies arcu aliquam et. In molestie nisl vitae dui lacinia interdum. Nam dapibus vitae ex eget mollis. Ut in diam posuere, consequat ante id, hendrerit erat. Vivamus non pharetra lectus. Curabitur tempus condimentum suscipit. Fusce dapibus malesuada eleifend. Vestibulum ut lectus et lectus pharetra scelerisque. Praesent porta leo quam, et semper libero tempus ut. ";
$autre2 = "Morbi ultrices pellentesque turpis, ac rutrum turpis consectetur at. Vivamus scelerisque ac neque sed hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris ut sagittis urna. Quisque ex augue, posuere ut nisi nec, lobortis ultricies massa. Vivamus vitae nunc nisl. Donec vestibulum nibh eget nulla tincidunt, sit amet aliquet enim rutrum. Etiam pellentesque suscipit orci et elementum. Ut a dolor in tortor rhoncus bibendum. Vestibulum sed urna eget eros lacinia bibendum sed sit amet nulla. Cras gravida ut libero nec ultrices. Aliquam erat volutpat. Duis varius justo massa, ut egestas neque ultricies ut. Suspendisse ut dapibus lacus. ";

$objPD = "<b>Provenance</b><br /><p>Atelier de ..., 10Km au sud d'Hamamet, prospection de S. Aounalla et M. Bonifaik,<br /> Tunisie. </p> <br /><b>Origine supposée</b><p></p> <br /><b>Attribution</b> <p></p>";
$objGDesc = "<b>Description </b><p>" . $detailTable['category'] . $detailTable['form'] . $detailTable['typology'] . $detailTable['deco'] . $detailTable['coating'] . $detailTable['stamps'] . $detailTable['paste'] . $detailTable['firing_mode'] . $detailTable['pObj'] . $detailTable['descFree'] . "</p><br /><b>Datation</b><br /><p>". $detailTable['dateGene'] . ", " . $detailTable['datePrecise'] ."</p>";
$objGene = "<b>En laboratoire </b><p></p><b>Hors d'un laboratoire </b><p>" . $detailTable['stoNom'] . "</p>";
$objBiblio = "<b>Biblio</b><p>BRUN, C., 2007 - Etude Technique des productions de l'atelier de sidi Khalifa (Pheradi Maius, Tunisie) : Céramiques culinaires, sigillées et cazettes, in : BONIFAY, M. et TREGLIA, J.-C, LRCW2, Late Roman Coarse Wares, Cooking Wares and Amphorae in the Mediterranean : Archaeology and Archaeometry (Aix-en-Provence, 13-16 avril 2005), BAR IS1662 (II), pp. 569-579.</p>";
$other = "<a href=\"http://www.levantineceramics.org/wares/beirut-frankish-cooking-ware-be-cw\">http://www.levantineceramics.org/wares/beirut-frankish-cooking-ware-be-cw</a>"
        ;

$content = $content . "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Détails de l'objet sélectionné</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<img src = \"../Ressources/Oiseau_Quadri.gif\" style=\"width: 150px;\"/>"
            . "</div>"
        . "</div>"
        . ""
        
        . "<div class = \"row\" id = \"detailSearch\">"//same display as the previous one.
            . " <h1><font color=\"#8e3c06\">OBJET</font> " . $detailTable['Nom'] . "</h1>  "
            . "<div class = \"row\" style = \"margin: 10px; \">"
                . "<div class = \"col-sm-4\" id = \"obj3d\">"
                    . "<div style = \"margin: 15px;\"><b><font color=\"#8e3c06\"> ID Chimique </font>" . $detailTable['numChimie'] . "</div></b>"
                    . "$obj2D"
                    . "$ifobj3D"
                . "</div>"
        
                
               
                
                . "<div class =\"col-sm-8\" id = \"descGene\">"
                    
                    . "<h3 style = \"text-align: left;\">Informations générales de l'objet</h3>"    
                    . "<ul class = \"nav nav-tabs\" role = \"tablist\">"
                        . "<li role = \"presentation\" class = \"active\"><a href = \"#desc\" aria-controls = \"desc\" role = \"tab\" data-toggle = \"tab\">Description & Datation</a></li>"
                        . "<li role = \"presentation\"><a href = \"#DP\" aria-controls = \"DP\" role = \"tab\" data-toggle = \"tab\">Localisation </a></li>"
                        
                        . "<li role = \"presentation\"><a href = \"#stock\" aria-controls = \"stock\" role = \"tab\" data-toggle = \"tab\">Stockage</a></li>"
                        . "<li role = \"presentation\"><a href = \"#biblio\" aria-controls = \"biblio\" role = \"tab\" data-toggle = \"tab\">Bibliographie</a></li>"
                        . "<li role = \"presentation\"><a href = \"#other\" aria-controls = \"other\" role = \"tab\" data-toggle = \"tab\">Liens</a></li>"
                    . "</ul>"

                    . "<div class = \"tab-content\" style = \"border: 1px solid #e6e6e6; border-top: none; text-align: justify; padding: 15px;\">"//content
                        . "<div role = \"tabpanel\" class = \"tab-pane fade \" id = \"DP\">$objPD</div>"
                        . "<div role = \"tabpanel\" class = \"tab-pane fade in active\" id = \"desc\">$objGDesc</div>"
                        . "<div role = \"tabpanel\" class = \"tab-pane fade\" id = \"stock\">$objGene</div>"
                        . "<div role = \"tabpanel\" class = \"tab-pane fade\" id = \"biblio\">$objBiblio</div>"
                        . "<div role = \"tabpanel\" class = \"tab-pane fade\" id = \"other\">$other</div>"
                    . "</div>"
               . "</div>"
        . ""
                ;

$content = $content 
                
            . "</div>"
            . ""
            . "<div class = \"row\" style = \"margin: 0px 10px; \" id = \"nature\">"
                    . "<div class = \"col-xs-12\" style = \"border: 1px solid #cccccc; margin-right: 15px;\">"
                        .$natureTable//. "<p><b>Nature :</b> Vase</p><b>Identifiant par défault :</b><p></p>"
                    . "</div>"
            . "</div>"
            . "<div class = \"row\" id = \"galMap\">"
                . "<div class = \"col-sm-6\"><h3>Photos & Dessin</h3><div id = \"scrollable\" class=\"row\" style = \"height: 300px; border: 2px solid #cccccc\"><div style = \"min-width: 500px; \">$gallerie</div></div></div>"
                
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
