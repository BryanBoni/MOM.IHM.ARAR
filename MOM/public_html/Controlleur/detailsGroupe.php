<?php

//Import
include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect_new.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/db_traitement_group.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/db_traitement.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/detailGroupeTools.php");

//variables
$title = "Details du groupe | Ceramom BDD";
$content = "";

$head1 = ""
        . "<script src = \"../Model/javascript/resizeImg.js\"></script>"
        . "<script src = \"../Model/javascript/zoomGallerie.js\"></script>"
        . "<script src = \"../Model/javascript/jquery-1.12.3.min.js\"></script>"
        . "<script src = \"../Model/javascript/magnific_popup.js\"></script>";
$head = "";


/* Access to db for details */
$groupId = $_POST['objectId'];
//echo $groupId;//test good id;
$db_connectGroupe = new db_connect_new();


$request = "SELECT count(s.id) as nbElt
            FROM groups grp
            LEFT JOIN link_group_to_attribution lgta ON lgta.id_group=grp.id
            LEFT JOIN sample s ON s.id_attribution=lgta.id_attribution
            WHERE grp.id=$groupId
            GROUP BY grp.id";

$rep = $db_connectGroupe->requestGroup($request);
$rep->execute();
$data = $rep->fetch(PDO::FETCH_ASSOC);

$nbElt = $data['nbElt'];

$rep->closeCursor();


$request = "SELECT grp.id as idGrp, grp.nom as nomGrp,sGrp.id as superId, sGrp.nom as nomSGrp, sGrp.resum as descGrp, gd.url_doc as urlGrp, grp.statut_analyse_grpe as type_analyse, grp.type as status_grp, sGrp.fd_localisation as grpLocalisation
            FROM groups grp
            LEFT JOIN super_groupe sGrp ON sGrp.id=grp.id_super_grpe
            LEFT JOIN link_group_to_gd lgtg ON lgtg.id_group=grp.id
            LEFT JOIN graphical_document gd ON gd.id=lgtg.id_gd
            WHERE grp.id=$groupId";

$rep = $db_connectGroupe->requestGroup($request);
$rep->execute();
$data = $rep->fetch(PDO::FETCH_ASSOC);


$tools = new detailGroupeTools(false, false, false, false, false);

$objId = "";
$nomGrp = array($data['nomGrp']);
$superId = $data['superId'];
$groupeTitle = $data['nomSGrp'];
$groupImg = $data['urlGrp'];
$groupDesc = $data['descGrp'];
$groupBiblio = "n/a";
$groupAutor = "n/a";
$typeGroupe = $data['type_analyse'];
$statutGroup = $data['status_grp'];

if ($data['grpLocalisation'] == null) {
    $localisationGroupe = "n/a.";
} else {
    $localisationGroupe = $data['grpLocalisation'];
}

$categorieGroupe = "Super groupe"; /* ou fais partie du groupe */
//$isGroupeParDef
$groupFreeDesc = " n/a";
$groupVersions = ""
        . ""
        . "<b>Précédente(s) version(s) du groupe et groupe(s) liée(s) :</b>"
        . "<ul>"
        . "<li><a>Groupe 2010</a></li>"
        . "<li><a>Groupe 2003</a></li>"
        . "<li><a>Groupe 1996_bis</a></li>"
        . "<li><a>Groupe 1996</a></li>"
        . "</ul>"
        . "";


$listEch = "ABE_1, ABE_2, ABE_7, AMA883, AMA885, LEV_1, LEV2, ABE_1, ABE_2, ABE_7, AMA883, AMA885, LEV_1, LEV2, ABE_1, ABE_2, ABE_7, AMA883, AMA885, LEV_1, LEV2, ABE_1, ABE_2, ABE_7, AMA883, AMA885, LEV_1, LEV2.";


$rep->closeCursor();

$request = "SELECT count(grp.id) as nbGroup
            FROM groups grp
            LEFT JOIN super_groupe sGrp ON sGrp.id=grp.id_super_grpe
            WHERE grp.id_super_grpe=$superId AND grp.groupe_par_defaut=1
            GROUP BY grp.id_super_grpe";

$rep = $db_connectGroupe->requestGroup($request);
$rep->execute();
$data = $rep->fetch(PDO::FETCH_ASSOC);

$nbDefaultGroupe = $data['nbGroup'];

$rep->closeCursor();

$request = "SELECT grp.nom as grpName
            FROM groups grp
            WHERE grp.id_super_grpe=$superId AND grp.groupe_par_defaut=1";

$rep = $db_connectGroupe->requestGroup($request);
$rep->execute();
$i = 0;
while($data = $rep->fetch(PDO::FETCH_ASSOC)){

    $nomGrp[$i] = $data['grpName'];
    $i++;
}

$rep->closeCursor();


//The page
$content = $content . ""
        . "<div class=\"row\">"
        . "<div class = \"col-sm-7\">"
        . "<h2>LABORATOIRE ARAR</h2>"
        . "<h3><b>Détails du groupe chimique</b></h3>"
        . "</div>"
        . "<div class = \"col-sm-5 hidden-xs\">"
        . "<a href=\"http://www.arar.mom.fr/\"><img src = \"../Ressources/Oiseau_Quadri.png\" style=\"width: 200px;\"/></a>"
        . "</div>"
        . "</div>"
        . ""
        . "<div class = \"row\" id = \"advSearch\" style=\"color: #8e3c06;\">"
        . "<h1>$groupeTitle</h1>"
        . "<div id=\"groupeDesc\" class=\"row\">" //the description of the groupe and a picture representing it.
        . "<div id=\"groupeDescImg\" class=\"col-lg-2 col-md-3 col-sm-4 col-sm-offset-0\">"
            . "<div class=\"zoom-gallery\">"
                . "<a href=\"$groupImg\" data-source=\"$groupImg\" title=\"par defaut\">"
                    . "<img src=\"$groupImg\" />"
                . "</a>"
            . "</div>"
            . "<form action=\"./obj3D.php\" method=\"post\"><button style=\"width: 100%;\" type=\"submit\" name=\"objId\" class=\"btn btn-warning\" value=\"". ""/*$docGraphique*/."\">Voir objet 3D</button></form>"
        . "</div>"
        . "<div id=\"groupeDescTxt\" class=\"col-lg-10 col-md-9 col-sm-8 col-sm-offset-0 col-xs-offset-1 col-xs-10 \">"
        . "<ul class=\"nav nav-tabs\" role=\"tablist\">"
        . "<li role = \"presentation\" class = \"active\"><a href=\"#groupeDescTDesc\" aria-controls=\"groupePhoto\" role=\"tab\" data-toggle=\"tab\"><h4>Description</h4></a></li>"
        . "<li role = \"presentation\"><a href=\"#groupeDescTBiblio\" aria-controls=\"\" role=\"tab\" data-toggle=\"tab\"><h4>Bibliographie</h4></a></li>"
        . "<li role = \"presentation\"><a href=\"#groupeDescTAutor\" aria-controls=\"\" role=\"tab\" data-toggle=\"tab\"><h4>Auteur du groupe</h4></a></li>"
        . "<li role = \"presentation\"><a href=\"#groupeDescTOldGroups\" aria-controls=\"\" role=\"tab\" data-toggle=\"tab\"><h4>Autres groupes</h4></a></li>"
        . "</ul>"
        . "<div class=\"tab-content\">"
        . "<div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"groupeDescTDesc\">"
        . "<p class=\"hidden-xs\" style=\"overflow: auto; max-height: 130px; margin: 20px;\">$groupDesc</p>"
        . "<p class=\"hidden-sm hidden-md hidden-lg\" style=\"overflow: auto; max-height: 200px; margin: 20px;\">$groupDesc</p>"
        . "</div>"
        . "<div role=\"tabpanel\" class=\"tab-pane fade\" id=\"groupeDescTBiblio\">"
        . "<p class=\"hidden-xs\" style=\"overflow: auto; max-height: 130px; margin: 20px;\">$groupBiblio</p>"
        . "<p class=\"hidden-sm hidden-md hidden-lg\" style=\"overflow: auto; max-height: 200px; margin: 20px;\">$groupBiblio</p>"
        . "</div>"
        . "<div role=\"tabpanel\" class=\"tab-pane fade\" id=\"groupeDescTAutor\">"
        . "<p class=\"hidden-xs\" style=\"overflow: auto; max-height: 130px; margin: 20px;\">$groupAutor</p>"
        . "<p class=\"hidden-sm hidden-md hidden-lg\" style=\"overflow: auto; max-height: 200px; margin: 20px;\">$groupAutor</p>"
        . "</div>"
        . "<div role=\"tabpanel\" class=\"tab-pane fade\" id=\"groupeDescTOldGroups\">"
        . "<p class=\"hidden-xs\" style=\"overflow: auto; max-height: 130px; margin: 20px;\">$groupVersions</p>"
        . "</div>"
        . "</div>"
        . "</div>"
        . "</div>"
        . "<h1>Caractéristiques du groupe</h1>"
        . "<div id=\"groupeCara\" class=\"row\">"
            . "<div class=\"col-md-6\">"
                . "<p>"
                . "<div class=\"col-sm-6 col-md-12\">"
                    . "<b>Nombre de groupes représentatifs :</b> $nbDefaultGroupe.   <br />"
                    . "<b>Type d'analyse du groupe :</b> $typeGroupe.   <br />"
                    . "<b> Statut du groupe :</b> $statutGroup.   <br />"
                    . "<b style=\"color: #8e3c06;\">Nombre d'échantillons du groupe : </b> $nbElt <br />"
                . "</div>"
                . "<br />"
                . "<div class=\"col-sm-6 col-md-12\">"
                    . "<b> Catégorie :</b> $categorieGroupe.   <br />"
                    . "<b> Localisation géographique :</b> $localisationGroupe.   <br />"
                    . "<b> Détails supplémentaires :</b> $groupFreeDesc.<br />"
                . "</div>"
                . "</p>"
            . "</div>"
            . "<div class=\"col-md-6\" style=\"padding: 10px;\">"
                . "<img src=\"https://www.wired.com/wp-content/uploads/2016/11/GoogleMap-1.jpg\"  style=\"width: 100%;\"/>"
            . "</div>"
        . "</div>";



//Prototype of the preferences


$gpcS = " ";
$gpcP = " ";
$gpcD = " ";
$gpcB = " ";
$gpcSpec = " ";

if (isset($_POST['pref'])) {
    foreach ($_POST['pref'] as $value) {
        switch ($value) {
            case "gpcStats":
                $tools->set_isStats(true);
                $gpcS = "checked";
                break;
            case "gpcPhoto":
                $tools->set_isPhoto(true);
                $gpcP = "checked";
                break;
            case "gpcDessin":
                $tools->set_isDessin(true);
                $gpcD = "checked";
                break;
            case "gpcBino":
                $tools->set_isBino(true);
                $gpcB = "checked";
                break;
            case "gpcSpectro":
                $tools->set_isSpectro(true);
                $gpcSpec = "checked";
                break;
        }
    }
}

$groupName = array();//$data['nomGrp'], "Groupe2", "Groupe3"
$groupHref = array();//"Groupe1", "Groupe2", "Groupe3"
for($i = 0; $i < $nbDefaultGroupe; $i++){
    $groupName[$i] = $nomGrp[$i];
    $groupHref[$i] = "Groupe" . $i;
}


if ($nbDefaultGroupe > 1) {
    $content .= "<br />"
            . "<ul style=\"padding: 10px;\" class=\"nav nav-pills  nav-justified\" role=\"tablist\">";

    for ($i = 1; $i <= $nbDefaultGroupe; $i++) {
        $content .= "<li role = \"presentation\" ";
        if ($i == 1) {
            $content .= "class=\"active\" ";
        } $content .= "><a href=\"#" . $groupHref[$i - 1] . "\" aria-controls=\"" . $groupHref[$i - 1] .  "\" role=\"tab\" data-toggle=\"tab\"><h4>Sous groupe $i :" . $groupName[$i - 1] . "</h4></a></li>";
    }

    $content .= "</ul>"
            . ""
            . "<div class=\"tab-content\" id=\"grpContent\">";
}

for ($i = 1; $i <= $nbDefaultGroupe; $i++) {
    $request = "SELECT grp.id as idGrp, s.id as sampleId,
            FROM groups grp
            LEFT JOIN link_group_to_attribution lgta ON lgta.id_group=grp.id
            LEFT JOIN sample s ON s.id_attribution=lgta.id_attribution
            WHERE grp.id=$groupId";

    $rep = $db_connectGroupe->requestGroup($request);
    $rep->execute();
    /*while($data = $rep->fetch(PDO::FETCH_ASSOC)){
        switch(type doc){
            case "Photo tesson" : 
                break;
            case "Photo bino" : 
                break;

        }
        
    }*/
    
    
    if ($nbDefaultGroupe > 1) {
        if ($i == 1) {
            $firstGrp = "in active";
        } else {
            $firstGrp = "";
        }
        $content .= "<div role=\"tabpanel\" class=\"tab-pane fade $firstGrp\" id=\"" . $groupHref[$i - 1] . "\">";
    }
    $content = $content
            . "<div id=\"groupePref\">" //Prototype !
            . "<h1>Données et documents graphiques : <br/>" . $groupName[$i - 1] . "</h1>"
            . "<p style=\"text-align: left; margin: 20px; color: black;\"><b style=\"color: #8e3c06;\">Liste des échantillons du groupe :</b> $listEch</p>"
            . "<div id=\"groupePrefChoices\" class=\"row\">"
            . "<form action=\"#groupePref\" method=\"post\" >"
            . "<div  class=\"input-group col-xs-12\" style=\"border: 1px #cccccc solid;\">"
            . "<div class=\"col-sm-3\" style=\"padding: 10px;\"><b>Données chimiques </b><br /> <input id=\"gpcStats\" type=\"checkbox\" name=\"pref[]\" value=\"gpcStats\" $gpcS><label for=\"gpcStats\"></label> </div>"
            . "<div class=\"col-sm-2\" style=\"padding: 10px;\"><b>Photo tesson </b><br /> <input id=\"gpcPhoto\" type=\"checkbox\" name=\"pref[]\" value=\"gpcPhoto\" $gpcP><label for=\"gpcPhoto\"></label>  </div>"
            . "<div class=\"col-sm-2\" style=\"padding: 10px;\"><b>Dessin tesson </b><br /> <input id=\"gpcDessin\" type=\"checkbox\" name=\"pref[]\" value=\"gpcDessin\" $gpcD><label for=\"gpcDessin\"></label>  </div>"
            . "<div class=\"col-sm-2\" style=\"padding: 10px;\"><b>Aspect pâte</b><br /> <input id=\"gpcBino\" type=\"checkbox\" name=\"pref[]\" value=\"gpcBino\" $gpcB><label for=\"gpcBino\"></label>  </div>"
            . "<div class=\"col-sm-3\" style=\"padding: 10px;\"><b>Photo pétrographie </b><br /> <input id=\"gpcSpectro\" type=\"checkbox\" name=\"pref[]\" value=\"gpcSpectro\" $gpcSpec><label for=\"gpcSpectro\"></label>  </div>"
            . "</div>"
            . "<div class=\"col-xs-12\" style=\"padding: 0px; width: 100%; height: 100%; border:hidden;\"><input type=\"submit\" style=\"border-radius: 0px; width: 100%; height: 100%;\" class=\"btn btn-warning\" value=\"Afficher\"></div>"
            . "<input type=\"hidden\" name=\"objectId\" value=\"$groupId\" />"
            . "</form>"
            . "</div>"
            . "<div id=\"groupePrefPanel\" class=\"row\">"
            . $tools->Display(true)
            . "</div>"
            . "</div>";


    $rep->closeCursor();
    
    //Sample list
    $request = "SELECT DISTINCT grp.id as idGrp, s.id as sampleId, s.name as sampleName, gd.url_doc as sampleImg
            FROM groups grp
            LEFT JOIN link_group_to_attribution lgta ON lgta.id_group=grp.id
            LEFT JOIN sample s ON s.id_attribution=lgta.id_attribution
            LEFT JOIN link_gd_to_sample lgts ON lgts.id_sample=s.id
            LEFT JOIN graphical_document gd ON gd.id=lgts.id_gd
            WHERE grp.id=$groupId AND s.id IS NOT NULL AND gd.doc_par_defaut=1
            ";

    $rep = $db_connectGroupe->requestGroup($request);
    $rep->execute();
    
    $content = $content
            . "<h1>Liste des échantillons du groupe</h1>"
            . "<div class=\"row\" style=\" margin: 0px 10px 0px 10px;\"><p style=\" color: black; float: left;\"><b style=\"color: #8e3c06;\">nombre d'échantillons du groupe : </b> $nbElt</p><p style=\"float: right; \"><a href=\"./annexe/cahier.php\"><b>Tableau détaillé des échantillons <span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 24px;\" title=\"Tableau détailé des échantillons\"></span></b></a></p></div>"
            . "<div id=\"groupeList\" class=\"row\">";

    $groupeImage = "https://upload.wikimedia.org/wikipedia/commons/d/da/Monitor-1350918.svg";
    $previousID = "-1";
    
    while ($data = $rep->fetch(PDO::FETCH_ASSOC)) {
        if($previousID != $data['sampleId']){
            if($data['sampleImg'] == null){
                $data['sampleImg'] = $groupeImage;
            }
            $content = $content
                    . "<div class=\"col-lg-6\"><div class=\"row\" style=\"margin: 10px 10px 0px 10px;\">"
                    . "<div class=\"row\" id=\"groupeListElement\">"
                    . "<div class=\"col-sm-3 col-xs-12\">"
                        . "<div class=\"zoom-gallery\">"
                            . "<a href=\"" . $data['sampleImg']. "\" data-source=\"" . $data['sampleImg']. "\" title=\"".$data['sampleName']."\">"
                                . "<img src=\"" . $data['sampleImg']. "\" />"
                            . "</a>"
                        . "</div>"
                    . "</div>"
                    . "<div class=\"col-sm-9 col-xs-12\">"
                    . "<h4>" .$data['sampleName']. "</h4>"
                    . "<p style=\"text-align: justify; color: black; max-height: 100px; overflow: auto;\">Integer quis libero eleifend, interdum nibh a, posuere nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>"
                    . "<p style=\"text-align: justify; color: black; max-height: 100px; overflow: auto;\"></p>"
                    . "</div>"
                    . "</div>"
                    . "<div class=\"col-xs-12\" style=\"margin-bottom: 10px; padding: 0px;\">"
                    . "<form action = \"./details.php\" method = \"post\"><button style=\"width: 100%; border-radius: 0px 0px 10px 10px;\" type=\"submit\" class=\"btn btn-warning\" role=\"button\">Voir détails</button></form>"
                    . "</div>"
                    . "</div></div>";            
            $previousID = $data['sampleId'];
        }


    }

    $content = $content
            . "</div>";

    if ($nbDefaultGroupe > 1) {
        $content .= "</div>";
    }
    $rep->closeCursor();
}

if ($nbDefaultGroupe > 1) {
    $content .= "</div>";
}

$content = $content
        . "</div>";




require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");
