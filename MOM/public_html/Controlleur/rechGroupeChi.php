<?php

include_once (dirname(dirname(__FILE__)) . "/Model/php/filer.php");
include_once (dirname(dirname(__FILE__)). "/Model/php/db_traitement_group.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect_new.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/object.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/pageMenu.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/db_traitement.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/searchChi.php");

$file = new filer();
//move upl
$head1 = ""
        . "<script src = \"../Model/javascript/resizeImg.js\"></script>"
        . "<script src = \"../Model/javascript/zoomGallerie.js\"></script>"
        . "<script src = \"../Model/javascript/jquery-1.12.3.min.js\"></script>"
        . "<script src = \"../Model/javascript/magnific_popup.js\"></script>";

$head = ""
        . "<script src = \"../Model/javascript/filterChimi.js\"></script>";
//head
$title = "Recherche de groupe chimique dans la base | Ceramom BDD";

//Objects
$isConnect = false; //point if the user is connected to the site (true) or not (false)
$searchChi = new searchChi(/*"http://images2.fanpop.com/image/photos/9300000/Fry-Icon-philip-j-fry-9365666-190-190.jpg"*/"http://artdesigntendance.com/wp-content/uploads/2015/02/C%C3%A9ramique-de-Brigitte-Papazian-pr%C3%A9sent%C3%A9e-%C3%A0-la-Galerie-Atelier-28-800x600.jpg", "Novy Svet Ware", "Céramiques de la famille de la \"Zeuxippus Ware\" nommées (provisoirement) d'après l'épave de Novy Svet (Crimée) datée du 13ème siècle", 1001, 53, "Super groupe.");
$db_traitement = new db_traitement_group();
$db_connectGroupe = new db_connect_new();
$keyword = "";
if(isset($_POST['searchBar'])){
    $keyword = $_POST['searchBar'];
}

if(isset($_POST['selectRegion'])){
    $indicationGeographique = $_POST['selectRegion'];
}

if(isset($_POST['descGrpChi'])){
    $selectDescription = $_POST['descGrpChi'];
}

$nbGroupRes = 512;

//Contents
$content = "";

$content = $content . ""
        . "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Recherche par groupes</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<a href=\"http://www.arar.mom.fr/\"><img src = \"../Ressources/Oiseau_Quadri.png\" style=\"width: 200px;\"/></a>"
            . "</div>"
        . "</div>"
        . "<br />"
        . "<div class = \"row\" id = \"advSearch\" style=\"color: #8e3c06;\">"
            . "<center>"
                . "<h1>Recherche</h1>"
                . "<div id=\"searchChiForm\">"
                    . "<form class=\"col-sm-offset-1 col-sm-10 col-lg-10 col-lg-offset-1\" action=\"#\" method=\"post\">"
                        . "<div class=\"input-group\" id=\"searchChi\">"

                            . "<div class=\"row\">"
                                . "<b>Nom du groupe  </b>"
                                . "<input class=\"form-control\" type=\"text\" name=\"searchBar\" placeholder=\"Entrez votre recherche...\"></input>"
                            . "</div>"
                            . "<br />"

                            . "<div class=\"row\">"
                                . "<div class=\"col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0\" id=\"selectChi\">"
                                    . "<label class=\"\" for=\"selectRegion\">Indication géographique </label>"
                                    . "<br />"
                                    . "<input type=\"text\" value=\"$indicationGeographique\" name=\"selectRegion\" id=\"selectRegion\" class=\"form-control\"  title=\"Lieu de découverte ou de fabrication supposée...\" placeholder=\"Lieu de découverte et/ou de fabrication supposée...\" >"
                                . "</div>"

                                . "<div class=\"col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0\" id=\"selectChi\">"
                                    . "<label class=\"\" for=\"descGrpChi\" >Description</label>"
                                    . "<br />"
                                    . "<input type=\"text\" value=\"$selectDescription\" name=\"descGrpChi\" id=\"descGrpChi\" class=\"form-control\"/ title=\"Description de la catégorie d'objets recherchés...\" placeholder=\"Description de la catégorie d'objets recherchés...\">"
                                . "</div>"

                                . "<div class=\"col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0\" id=\"selectChi\">"
                                    . "<label class=\"\" for=\"select3\">Chronologie </label>" //faire recherche dans la base pour la liste complete
                                    . "<br />"
                                    . "<select id=\"select3\" class=\"c-select form-control\" > "
                                        . "<option >Antiquite gallo-romaine - debut 1er ap</option>"
                                        . "<option >Antiquite gallo-romaine - 2eme moitie 2eme ap</option>"
                                        . "<option >Antiquite gallo-romaine - fin 2eme ap</option>"
                                        . "<option >Antiquite gallo-romaine - 4eme ap</option>"
                                        . "<option >Medieval - 10-11eme ap</option>"
                                        . "<option >Medieval - inconnue</option>"
                                        . "<option >Inconnue</option>"
                                        . "<option selected>Selectionnez une option</option>"
                                    . "</select>"
                                . "</div>"
                            . "</div>"

                            . "<br />"
                           
                            . "<div id=\"filtreChi\" class=\"\"></div>"
        
                            . "<p id=\"filtreChip\" style=\"float: right;\">+ De filtres</p>"

                            . "<br />"

                            . "<div class=\"row\">"
                                . "<input style=\"heigth: 100px;\" class=\"btn btn-warning \" type=\"submit\" value=\"FILTRER\">"
                            . "</input></div>"
                        . "</div>"
                    . "</form>"
                . "</div>"
            . "</center>"
            . "<br/>"
            . "<div class=\"row\">"
                . "<div class=\"col-sm-offset-1 col-sm-10 col-lg-8 col-lg-offset-2\">"
                    . "<h1>Résultats</h1>"
                    . "<div id=\"resChi\">"
                        . "<div id=\"resChiTri\">"
                            . "<p>"
                                . "<b>Tri : </b>"
                                . " Alphabétique <a href=\"#\"><span class=\"glyphicon glyphicon-triangle-top\"></span></a> <a href=\"#\"><span class=\"glyphicon glyphicon-triangle-bottom\" style=\"margin-right: 20px;\"></span></a> "
                                . " Date <a href=\"#\"><span class=\"glyphicon glyphicon-triangle-top\"></span></a> <a href=\"#\"><span class=\"glyphicon glyphicon-triangle-bottom\" style=\"margin-right: 20px;\"></span></a> "
                                . " Region <a href=\"#\"><span class=\"glyphicon glyphicon-triangle-top\"></span></a> <a href=\"#\"><span class=\"glyphicon glyphicon-triangle-bottom\" style=\"margin-right: 10px;\"></span></a> "
                            . "</p>"
                        . "</div>"
                        . "<div style=\"overflow: auto; height: 800px;\">";

//here is the traitment for retriving the list of groups
/*for ($i = 0; $i <= 5; $i++) {
    $content = $content . $searchChi->listDisplay();
}*/

/*  IF THE DATABASE IS LINKED */

$request = "Select DISTINCT grp.id as idGrp, grp.nom as nomGrp, sGrp.nom as nomSGrp, sGrp.resum as grpResum, gd.url_doc as urlGrp, sGrp.fd_localisation as indicationGeographique, count(s.id) as nbElt
        From groups grp
        LEFT JOIN super_groupe sGrp ON sGrp.id=grp.id_super_grpe
        LEFT JOIN link_group_to_gd lgtg ON lgtg.id_group=grp.id
        LEFT JOIN graphical_document gd ON gd.id=lgtg.id_gd
        LEFT JOIN link_group_to_attribution lgta ON lgta.id_group=grp.id
        LEFT JOIN sample s ON s.id_attribution=lgta.id_attribution
        Where (grp.nom like '%$keyword%' or grp.free_description like '%$keyword%') AND sGrp.fd_localisation like '%$indicationGeographique%' AND sGrp.resum like '%$selectDescription%'";
        
        if($biblioSearch == true){
            $request .= "GROUP BY grp.id";
        }else{
            $request .= "and grp.groupe_par_defaut=1
                         GROUP BY grp.id";
        }

//$request .= "GROUP BY grp.id";

$rep = $db_connectGroupe->requestGroup($request, $isConnect, $biblioSearch);

$content .= $db_traitement->doGroupList($rep);



$content = $content 
                        . "</div>"
                    . "</div>"
                . "</div>"
            . "</div>"
        . "</div>";



require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");