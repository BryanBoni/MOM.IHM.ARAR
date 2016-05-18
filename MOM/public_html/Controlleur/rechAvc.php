<?php

//import
include_once (dirname(dirname(__FILE__)) . "/Model/php/search.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/object.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect.php");

//Variables
$title = "Home | Laboratoire ArAr";
$head = "<script src = \"../Model/javascript/filterMenu.js\"></script>"
        . "<script src=\"../Model/javascript/filter.js\"></script>";
$head1 = "";
$search = new search();
$objet = new object("../Ressources/GraphicalDb/photos_objets/LEV730r.JPG", "Fry", "he is a dumb but he is funny.", 1001);
$accesDb = new db_connect();
$mode = "List";
$content = "";
//$sizeList = 100;
/*if (isset($_GET['search'])) {*/$_SESSION['search'] = htmlspecialchars($_GET["search"]);//}
$searchName = $_SESSION['search'];
$i = 0;

$countRep = $accesDb-> count($searchName);

$data = $countRep->fetch();
$sizeList = $data['c'];   
$countRep->closeCursor();

if (isset($_GET['display'])) {
    $_SESSION['display'] = htmlspecialchars($_GET["display"]);
    $mode = $_SESSION['display'];
}

if (isset($_GET['nbPage'])) {
    $_SESSION['nbPage'] = $_GET['nbPage'];
    $ResultPerPage = $_SESSION['nbPage'];
}else{
    $ResultPerPage = 15;
}



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
        . "<div class = \"col-sm-4 col-md-3\" id = \"cadre\">"
        . "<h4 id = \"filter\"><b>Affinez votre recherche</b></h4>"
        . "<div id = \"filterList\">"
        . "<b> Recherche : </b><div id = \"tag\"></div>";


$filterList = $search->getFilterList(); //get the filter research list in search().
$text = $search->getFilterText(); //get the filter sub-research list in search().
//filter function
foreach ($filterList as $value) {
    $content = $content
            . "<b>" . $value . " :</b>"
            . "<ul>";

    $text2 = $text[$value];
    foreach ($text2 as $value2) {
        $content = $content
                . "<li id = \"li\">" . $value2 . " <span class=\"badge\"> 9 </span></li>";

        $content = $content . "<div class = \"list\"></div>";
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
        . "<div class = \"col-sm-8 col-md-9\" id = \"cadre\" ><div id=\"gg\">"
        . "<div id = \"short\">"
        . "<div style = \"float: left; display: inline-text;\">"
        . "<form action = \"rechAvc.php\" method = \"get\"><b>Résultats par pages :<b/> ";
if ($ResultPerPage == 15) {
    $content = $content . "<button type = \"submit\" value = \"15\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb imgNb-active\"><b> 15 </b></div></button>";
}else{
    $content = $content . "<button type = \"submit\" value = \"15\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb\"><b> 15 </b></div></button>";
}

if ($ResultPerPage == 30) {
    $content = $content . "<button type = \"submit\" value = \"30\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb imgNb-active\"><b> 30 </b></div></button>";
}else{
    $content = $content . "<button type = \"submit\" value = \"30\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb\"><b> 30 </b></div></button>";
}

if ($ResultPerPage == 45) {
    $content = $content . "<button type = \"submit\" value = \"45\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb imgNb-active\"><b> 45 </b></div></button>";
}else{
    $content = $content . "<button type = \"submit\" value = \"45\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb\"><b> 45 </b></div></button>";
}

$content = $content
        . " </form></div>"
        . "<div style = \"float: right; display: inline-text;\">"
        . "<form action = \"rechAvc.php\" method = \"get\">";

if ($mode == "Image") {
    $content = $content . "<button type = \"submit\" value = \"ImageText\" name = \"display\" id=\"hiddenBtn\"><div class = \"imgNb imgNb-active glyphicon glyphicon-picture\" aria-hidden = \"true\" title = \"Image seulement\"></div></button>";
} else {
    $content = $content . "<button type = \"submit\" value = \"ImageText\" name = \"display\" id=\"hiddenBtn\"><div class = \"imgNb glyphicon glyphicon-picture\" aria-hidden = \"true\" title = \"Image seulement\"></div></button>";

}

if ($mode == "ImageText") {
    $content = $content . "<button type = \"submit\" value = \"ImageText\" name = \"display\" id=\"hiddenBtn\"><div class = \"imgNb imgNb-active glyphicon glyphicon-th\" aria-hidden = \"true\" title = \"Image et Texte\"></div></button>";
} else {
    $content = $content . "<button type = \"submit\" value = \"ImageText\" name = \"display\" id=\"hiddenBtn\"><div class = \"imgNb glyphicon glyphicon-th\" aria-hidden = \"true\" title = \"Image et Texte\"></div></button>";
}

if ($mode == "List") {
    $content = $content . "<button type = \"submit\" value = \"List\" name = \"display\" id=\"hiddenBtn\"><div class =\"imgNb imgNb-active glyphicon glyphicon-list\" aria-hidden=\"true\" title = \"affichage en Liste\"></div></button>";
} else {
    $content = $content . "<button type = \"submit\" value = \"List\" name = \"display\" id=\"hiddenBtn\"><div class =\"imgNb glyphicon glyphicon-list\" aria-hidden=\"true\" title = \"affichage en Liste\"></div></button>";
}

$content = $content . "</form>"
        . "</div><br /><br />";


$content = $content . "</div>"
        . "<p style=\"float: left;\"><b>votre recherche : </b><font color = \"red\">" . $searchName . "</font></p><p style=\"float: right;\"> $sizeList résultats</p>"
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


$content = $content . "</div><div class = \"row\" style = \"margin-left: 1px; margin-right: 1px;\">";
$rep = $accesDb->selection($searchName, $limit, $page);


//$rep = $pdodb->query($requete); 
$descritption = "";
$rep->execute();
while ($data = $rep->fetch()) {
    $descritption = "<b>Description : </b>" . $data['decoration'] . " " . $data['form'] . " " . $data['typology'] . ".<br /><b>Localisation : </b>" . $data['name_site'] . " , " . $data['name_town'] . " , " . $data['name_region'] . " , " . $data['name_country'] . " , ";
    $objet->setObject("../Ressources/GraphicalDb/photos_objets/LEV730r.JPG", $data['free_description'], $descritption, $data['id']);
    $content = $content . $objet->selectDisplay($mode);
    //$content = $content . "<br />";
}
$rep->closeCursor();

$content = $content . "</div><div class =\"row col-xs-12\""
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
        . "</nav></div>"
        . "</div></div>"
        . "</div>"
        . "</div>";

require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");
