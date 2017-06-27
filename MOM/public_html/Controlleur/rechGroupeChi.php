<?php

include_once (dirname(dirname(__FILE__)) . "/Model/php/filer.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/object.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/pageMenu.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/db_traitement.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/searchChi.php");

$file = new filer();
//move upl
$head = ""
        . "<script src = \"../Model/javascript/filterChimi.js\"></script>";
//head
$title = "Recherche de groupe chimique dans la base | Ceramom BDD";

//Objects
$searchChi = new searchChi("http://images2.fanpop.com/image/photos/9300000/Fry-Icon-philip-j-fry-9365666-190-190.jpg", "Fry", "80085", "he is a dumb but he is funny. lorem ipsum dolores", 1001);

//Contents
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
        . "<div class = \"row\" id = \"advSearch\" style=\"color: #8e3c06;\">"
            . "<center>"
                . "<h2>Recherche</h2>"
                . "<form class=\"col-sm-offset-1 col-sm-10 col-lg-10 col-lg-offset-1\" action=\"/rechGroupeChi.php\">"
                    . "<div class=\"input-group\" id=\"searchChi\">"

                        . "<div class=\"row\">"
                            . "<b>Groupe chimique : </b>"
                            . "<input class=\"form-control\" type=\"text\" name=\"searchBar\" placeholder=\"Entrez votre recherche...\"></input>"
                        . "</div>"
                        . "<br />"

                        . "<div class=\"row\">"
                            . "<div class=\"col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1\" id=\"selectChi\">"
                                . "<label class=\"\" for=\"selectRegion\">Region </label>"
                                . "<br />"
                                . "<select id=\"selectRegion\" class=\"c-select form-control\"> "
                                    . "<option selected>Selectionnez une option</option>"
                                . "</select>"
                            . "</div>"

                            . "<div class=\"col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1\" id=\"selectChi\">"
                                . "<label class=\"\" for=\"select2\">Quelque Chose </label>"
                                . "<br />"
                                . "<select id=\"select2\" class=\"c-select form-control\"> "
                                    . "<option selected>Selectionnez une option</option>"
                                . "</select>"
                            . "</div>"

                            . "<div class=\"col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1\" id=\"selectChi\">"
                                . "<label class=\"\" for=\"select3\">Autre Chose </label>"
                                . "<br />"
                                . "<select id=\"select3\" class=\"c-select form-control\"> "
                                    . "<option selected>Selectionnez une option</option>"
                                . "</select>"
                            . "</div>"
                        . "</div>"

                        . "<br />"

                        . "<div class=\"row\" style=\"float: right;\">"
                            . "<div id=\"filtreChi\"></div>"
                            . "<p id=\"filtreChip\">+ De filtres</p>"
                        . "</div>"

                        . "<br />"

                        . "<div class=\"row\">"
                            . "<input class=\"btn btn-warning \" type=\"submit\" value=\"Recherche\">"
                        . "</input></div>"
                    . "</div>"
                . "</form>"
            . "</center>"
            . "<br/>"
            . "<div class=\"row\">"
                . "<div class=\"col-sm-offset-1 col-sm-10 col-lg-8 col-lg-offset-2\">"
                    . "<h2>Résultats</h2>"
                    . "<div id=\"resChi\">";
for ($i = 0; $i <= 5; $i++) {
    $content = $content . $searchChi->listDisplay();
}

$content = $content 
                    . "</div>"
                . "</div>"
            . "</div>"
        . "</div>";



require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");