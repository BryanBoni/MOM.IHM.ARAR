<?php
include_once (dirname(dirname(__FILE__)) . "/Model/php/filer.php");
$file = new filer();
//move upl

$title = "Recherche Interne dans la base | Laboratoire ArAr";

$content = "";

$content = $content . ""
        . "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Recherche Interne dans la base de données</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<img src = \"../Ressources/Oiseau_Quadri.gif\" style=\"width: 150px;\"/>"
            . "</div>"
        . "</div>"
        . "<br />"
        . "<div class = \"row\" id = \"advSearch\">"
        .   "<ol class=\"breadcrumb\">"
        .       "<li><a href=\"#\">Home</a></li>"
        .       "<li><a href=\"#\">Library</a></li>"
        .       "<li class=\"active\">Data</li>"
        .   "</ol><br /><br />"
        . ""
        . ""
        . "</div>";

require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");