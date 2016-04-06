<?php

$title = "Home | Laboratoire ArAr";

$content = "";
//here is the filter
$content = $content . "<div class=\"row\">"
            . "<div class = \"col-xs-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Base de données</b></h3>"
            . "</div>"
            . "<div class = \"col-xs-5\">"
                . "<img src = \"../Ressources/Oiseau_Quadri.gif\" style=\"width: 150px;\"/>"
            . "</div>"
        . "</div>"
        . "<br />"
        . "<div class = \"row\" id = \"advSearch\">"
            . "<div class = \"col-xs-3 \" id = \"cadre\">"
                . "<h4 id = \"filter\"><b>Affinez votre recherche</b></h4>"
        
                . "<div id = \"filterList\">"//need to be change, it's just to test.
                    . "<b>Location :</b>"
                    . "<ul>"
                        . "<li> </li>"
                    . "</ul>"
                    
                    . "<b>Description :</b>"
                    . "<ul>"
                        . "<li> </li>"
                    . "</ul>"
        
                    . "<b>N° Analyse :</b>"
                    . "<ul>"
                        . "<li> </li>"
                    . "</ul>"
        
                    . "<b>Groupe de référence :</b>"
                    . "<ul>"
                        . "<li> </li>"
                    . "</ul>"
                . "</div>"

            . "</div>";
 
//here is the result list.
$content = $content . "" 
            . "<div class = \"col-xs-9\" id = \"cadre\">"
                . "<b>votre recherche : </b><font color = \"red\">" . htmlspecialchars($_GET["search"])."</font>"
                . ""
            . "</div>"
        . "</div>";

require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");


?>
