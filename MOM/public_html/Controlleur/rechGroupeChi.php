<?php

include_once (dirname(dirname(__FILE__)) . "/Model/php/filer.php");
$file = new filer();
//move upl

$title = "Recherche de groupe chimique dans la base | Ceramom BDD";

$content = "";

$content = $content . ""
        . "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Recherche par groupes chimique</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<img src = \"../Ressources/Oiseau_Quadri.gif\" style=\"width: 150px;\"/>"
            . "</div>"
        . "</div>"
        . "<br />"
        . "<div class = \"row\" id = \"advSearch\">"

        . "</div>";



require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");