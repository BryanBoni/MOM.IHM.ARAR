<?php

//import
include_once (dirname(dirname(__FILE__)) . "/Model/php/search.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/object.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect.php");

//Variables
$title = "Home | Laboratoire ArAr";
$search = new search();
$objet = new object("../Ressources/objectBeta/fry.png", "Fry", "he is a dumb but he is funny.", 1001);
$accesDb = new db_connect();
$mode = "List";
$content = "";
$sizeList = 100;
$i = 0;
$ResultPerPage = 15;


//here is the filter
$content = $content . ""
        . "<div class=\"row\">"
        . "<div class = \"col-sm-7\">"
        . "<h2>LABORATOIRE ARAR</h2>"
        . "<h3><b>Base de données</b></h3>"
        . "</div>"
        . "<div class = \"col-sm-5 hidden-xs\">"
        . "<img src = \"../Ressources/Oiseau_Quadri.gif\" style=\"width: 150px;\"/>"
        . "</div>"
        . "</div>"
        . "<br />"
        . "<div class = \"row\" id = \"advSearch\">"
        . "<div class = \"col-sm-3 \" id = \"cadre\">"
        . "<h4 id = \"filter\"><b>Affinez votre recherche</b></h4>"
        . "<div id = \"filterList\">"
        . "<b> Recherche : </b><div id = \"tag\">"
        . "</div>";


$filterList = $search->getFilterList(); //get the filter research list in search().
$text = $search->getFilterText(); //get the filter sub-research list in search().
$minObject = $objet->selectDisplay($mode); //get the object display.
//filter function
foreach ($filterList as $value) {
    $content = $content
            . "<b>" . $value . " :</b>"
            . "<ul>";

    $text2 = $text[$value];
    foreach ($text2 as $value2) {
        $content = $content
                . "<li>";

        $content = $content . "<div class = \"checkbox\" id = \"check\"><label><input type = \"checkbox\" name = \"" . $value2 . "\">" . $value2 . " ()</label></div>";

        $content = $content
                . "</li>";
    }

    $content = $content
            . "</ul>";
}

$content = $content .
        "</div>"
        . "</div>";
//here is the result list.
//here is the display option
$content = $content . ""
        . "<div class = \"col-sm-9\" id = \"cadre\" ><div id=\"gg\">"
        . "<div id = \"short\">"
        . "<div style = \"float: left;\">"
        . "Résultats par pages : <div class=\"imgNb imgNb-active\"> 15 </div><div class=\"imgNb\"> 30 </div><div class=\"imgNb\"> 45 </div>"
        . "</div>"
        . "<div style = \"float: right;\">"
        . "<a href=\"#\"><div class = \"imgNb glyphicon glyphicon-picture\" aria-hidden = \"true\" title = \"Image seulement\"></div></a>"
        . "<div class = \"imgNb imgNb-active glyphicon glyphicon-th\" aria-hidden = \"true\" title = \"Image et Texte\"></div>"
        . "<div class =\"imgNb glyphicon glyphicon-list\" aria-hidden=\"true\" title = \"affichage en Liste\"></div>"
        . "</div><br /><br />";

$content = $content . "</div>"
        . "<p style=\"float: left;\"><b>votre recherche : </b><font color = \"red\">" . htmlspecialchars($_GET["search"]) . "</font></p><p style=\"float: right;\"> $sizeList résultats</p>"
        . "<br />"
        . ""
        . "<nav style =\"text-align: center; color: red; border-top: 1px solid #8e3c06;border-bottom: 1px solid #8e3c06; margin: 0px;\" >"
        . "<ul class = \"pagination\" style=\" margin: 0px; margin-top: 8px;\">"
        . "<li>"
        . "<a href = \"#\" aria-label = \"Previous\"><span aria-hidden = \"true\">&laquo;</span></a>"
        . "</li>";

while ($i <= ($sizeList / $ResultPerPage)) {
    if ($i == 0) {
        $content = $content . "<li role = \"presentation\"  class = \"active\"><a href=\"#\">" . $i . "</a></li>";
    } else {
        $content = $content . "<li role = \"presentation\"><a href=\"#\">" . $i . "</a></li>";
    }
    $i += 1;
}

$content = $content . ""
        . "<li>"
        . "<a href=\"#\" aria-label=\"Next\">"
        . "<span aria-hidden=\"true\">&raquo;</span>"
        . "</a>"
        . "</li>"
        . "</ul>"
        . "</nav>"
        . "<div class = \"row\" id = \"ooo\">";
/* for($i = 0; $i < 15; $i++){
  $content = $content . "<div id =\"imageObj".$i."\">$minObject</div>";
  }
 */

$content = $content . "</div>";
//$rep = $accesDb->selection(htmlspecialchars($_GET["search"]));
//$pdodb = $accesDb ->connect();

try {
    $pdodb = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->userName, $this->passwd);
    $pdodb->exec('SET NAMES utf8');
}catch(PDOException $e){
        die('Erreur : '.$e->getMessage());
}
$requete = "SELECT s.free_description, s.nom, si.name_site, t.name_town, r.name_region, c.name_country, d.decoration, d.form, d.typology  
                FROM sample_new s 
                LEFT JOIN description d ON s.id_description=d.id
                LEFT JOIN provenance p ON s.id_provenance=p.id 
                LEFT JOIN location l ON p.id_location=l.id 
                LEFT JOIN site si ON l.id_site=si.id 
                LEFT JOIN town t ON l.id_town=t.id 
                LEFT JOIN region r ON l.id_region=r.id 
                LEFT JOIN country c ON l.id_country=c.id 
                WHERE t.name_town like '% $keyword %' or r.name_region like '% $keyword %' or c.name_country like '% $keyword %' or si.name_site like '% $keyword %' or p.workshop  like '% $keyword %' or p.museum  like '% $keyword %' or p.private_collection like '% $keyword %' or p.atelier like '% $keyword %' or p.excavation like '% $keyword %' or p.geolocation like '% $keyword %' or p.contact like '% $keyword %' or p.free_description like '% $keyword %'";
//$rep = $pdodb->query($requete); 
$rep = $pdodb->prepare($requete);
$descritption = "";

$rep->execute();
while ($data = $rep->fetch()) {
    $descritption = "<b>Description : </b>" . $data['decoration'] . " " . $data['form'] . " " . $data['typology'] . ".<br /><b>Location : </b>" . $data['name_site'] . " , " . $data['name_town'] . " , " . $data['name_region'] . " , " . $data['name_country'] . " , ";
    $objet->setObject("../Ressources/objectBeta/fry.png", $data['free_description'], $descritption);
    $content = $content . $objet->selectDisplay($mode);
    $content = $content . "<br />";
}
$rep->closeCursor();

$content = $content . ""
        . "<nav style =\"text-align: center;\" >"
        . "<ul class = \"pagination\" style=\" margin: 0px; margin-top: 8px;\">"
        . "<li>"
        . "<a href = \"#\" aria-label = \"Previous\"><span aria-hidden = \"true\">&laquo;</span></a>"
        . "</li>";
$i -= $i;
while ($i <= ($sizeList / $ResultPerPage)) {
    if ($i == 0) {
        $content = $content . "<li role = \"presentation\" class = \"active\" ><a href=\"#\">" . $i . "</a></li>";
    } else {
        $content = $content . "<li role = \"presentation\"><a href=\"#\">" . $i . "</a></li>";
    }
    $i += 1;
}

$content = $content . ""
        . "<li>"
        . "<a href=\"#\" aria-label=\"Next\">"
        . "<span aria-hidden=\"true\">&raquo;</span>"
        . "</a>"
        . "</li>"
        . "</ul>"
        . "</nav>"
        . "</div></div>"
        . "</div>"
        . "</div>";

require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");
