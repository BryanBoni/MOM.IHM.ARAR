<?php

//Import
//include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/db_traitement.php");

//variables
$title = "Details du groupe | Ceramom BDD";
$content = "";

$head1 = ""
        . "<script src = \"../Model/javascript/resizeImg.js\"></script>"
        . "<script src = \"../Model/javascript/zoomGallerie.js\"></script>"
        . "<script src = \"../Model/javascript/jquery-1.12.3.min.js\"></script>"
        . "<script src = \"../Model/javascript/magnific_popup.js\"></script>";
$head = ""; 

$objId = "";
$groupeTitle = "Nom du Groupe + Référence?";
$groupImg = "../Ressources/objectBeta/pancletteFullLogo.png";
$groupDesc = "Aliquam interdum, lectus ac tincidunt luctus, sem tellus fringilla metus, eu vulputate enim sem et odio. Duis turpis neque, aliquam sed aliquet accumsan, placerat ut lectus. Proin fringilla pulvinar porttitor. Phasellus quis nulla ut metus maximus commodo. Proin eleifend neque lacus, a euismod augue venenatis quis. Quisque eu nisl augue. Duis consectetur eu neque in suscipit. Curabitur neque justo, semper ac vestibulum ac, aliquam eu augue. Mauris pretium faucibus nisi, et iaculis est lobortis pharetra. Morbi a suscipit turpis. Proin euismod aliquam libero et congue.";


//The page
$content = $content . ""
        . "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Détails du groupe chimique</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<img src = \"../Ressources/Oiseau_Quadri.gif\" style=\"width: 150px;\"/>"
            . "</div>"
        . "</div>"
        . ""
        . "<div class = \"row\" id = \"advSearch\" style=\"color: #8e3c06;\">"
            . "<h1>$groupeTitle</h1>"
            . "<div id=\"groupeDesc\" class=\"row\">" //the description of the groupe and a picture representing it.
                . "<div id=\"groupeDescImg\" class=\"col-lg-2 col-md-3 col-sm-4 col-sm-offset-0\">"
                    . "<img src=\"$groupImg\" />"
                . "</div>"
                . "<div id=\"groupeDescTxt\" class=\"col-lg-10 col-md-9 col-sm-8 col-sm-offset-0 col-xs-offset-1 col-xs-10 \">"
                    . "<h2>Description</h2>"
                    . "<p style=\"overflow: auto; max-height: 180px; margin-right: 20px;\">$groupDesc</p>"
                . "</div>"
            . "</div>";


$content = $content
            . "<h2>Galerie du groupe</h2>"
            . "<div id=\"groupeGalerie\" class=\"row\">"
                . "<ul class=\"nav nav-tabs\" role=\"tablist\">"
                    . "<li role = \"presentation\" class = \"active\"><a href=\"#groupePhoto\" aria-controls=\"groupePhoto\" role=\"tab\" data-toggle=\"tab\">Photos</a></li>"
                    . "<li role = \"presentation\"><a href=\"#groupeDessin\" aria-controls=\"\" role=\"tab\" data-toggle=\"tab\">Dessins</a></li>"
                . "</ul>"
                . "<div class=\"tab-content\">"
                    . "<div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"groupePhoto\">"
                        . "<div class=\"zoom-gallery\">";

//PHOTO to do on click on title, destroy what's behind
$nbPic = 16;
for($it = 1; $it < $nbPic; $it++){//(temporary) for each image found, add it to content
    $content = $content 
                            . "<a href=\"http://artdesigntendance.com/wp-content/uploads/2015/02/C%C3%A9ramique-de-Brigitte-Papazian-pr%C3%A9sent%C3%A9e-%C3%A0-la-Galerie-Atelier-28-800x600.jpg"./*../Ressources/objectBeta/fry.png*/"\" data-source=\"../Ressources/objectBeta/fry.png\" title=\"LEV730\" class=\"col-lg-2 col-md-3 col-sm-3 col-xs-3\" "/*style=\"width:193px;height:125px;\"*/.">"
                                . "<img src=\"http://artdesigntendance.com/wp-content/uploads/2015/02/C%C3%A9ramique-de-Brigitte-Papazian-pr%C3%A9sent%C3%A9e-%C3%A0-la-Galerie-Atelier-28-800x600.jpg"./*../Ressources/objectBeta/fry.png*/"\" class = \"img_file_gallerie\" />"
                            . "</a>"
                            . "<a href=\"../Ressources/objectBeta/fry.png\" data-source=\"../Ressources/objectBeta/fry.png\" title=\"LEV730\" class=\"col-lg-2 col-md-3 col-sm-3 col-xs-3\" "/*style=\"width:193px;height:125px;\"*/.">"
                                . "<img src=\"../Ressources/objectBeta/fry.png\" class = \"img_file_gallerie\" />"
                            . "</a>";
}
$content = $content 
                        ."</div>"
                    . "</div>";
                 //   . "<div role=\"tabpanel\" class=\"tap-pane fade\" id=\"groupeDessin\"\">"
                 //       . "YOLO"
                 //   . "</div>";

$content = $content 
                . "</div>"               
            . "</div>";

$content = $content
            . "<h2>Liste des éléments du groupe</h2>"
            . "<div id=\"groupeList\" class=\"row\">";

$groupeImage = "../Ressources/objectBeta/pancletteLogo.png";

for($it = 0; $it < 10; $it++){
    $content = $content
                . "<div class=\"col-lg-6\"><div class=\"row\" style=\"margin: 10px 10px 0px 10px;\">"
                . "<div class=\"row\" id=\"groupeListElement\">"
                    . "<div class=\"col-sm-3 col-xs-4\"><img src=\"$groupeImage\" /></div>"
                    . "<div class=\"col-sm-9 col-xs-8\">"
                        . "<p style=\"text-align: justify; color: black; max-height: 100px; overflow: auto;\">Integer quis libero eleifend, interdum nibh a, posuere nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>"
                    . "</div>"    
                . "</div>"
                . "<div class=\"col-xs-12\" style=\"margin-bottom: 10px; padding: 0px;\">"
                    . "<form action = \"#\" method = \"post\"><button style=\"width: 100%; border-radius: 0px 0px 10px 10px;\" type=\"submit\" class=\"btn btn-warning\" role=\"button\">Voir détails</button></form>"
                . "</div>"
                . "</div></div>";
}

$content = $content                
            . "</div>";




$content = $content
        . "</div>";
        
        


require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");