<?php
session_start();

//imports
include_once (dirname(dirname(__FILE__)) . "/Model/php/search.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/object.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/pageMenu.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/db_traitement.php");
//Head
$title = "Home | Ceramom BDD";
$head = "<script src = \"../Model/javascript/filterMenu.js\"></script>"
        . "<script src=\"../Model/javascript/filter.js\"></script>"
        . "<script src=\"../Model/javascript/onPageMenu.js\"></script>";
$head1 = "";

//Objects
$search = new search();
$objet = new object("../Ressources/GraphicalDb/photos_objets/LEV730r.JPG", "Fry", "he is a dumb but he is funny.", 1001);
$accesDb = new db_connect();
$pageMenu = new pageMenu();
$db_traitement = new db_traitement();

//Variables
$mode = "List";
$ResultPerPage = 20;
$content = "";
$i = 0;
$sizeList = 200;
$countRep = $accesDb-> count($searchName);
$data = $countRep->fetch();
if($data['c'] == NULL){
    $sizeList = $data['c'];
}   
$countRep -> closeCursor();
$pageNumber = 1;
$selectedPage  = 1;
//Variables session
if (isset($_GET['search'])) {
    $_SESSION['search'] = htmlspecialchars($_GET["search"]);
    $searchName = $_SESSION['search'];
}else if(isset ($_SESSION['search'])){
    $searchName = $_SESSION['search'];
}

if (isset($_GET['display'])) {
    $_SESSION['display'] = htmlspecialchars($_GET["display"]);
    $mode = $_SESSION['display'];
}else if(isset ($_SESSION['display'])){
    $mode = $_SESSION['display'];
}

if (isset($_GET['nbPage'])) {
    $_SESSION['nbPage'] = $_GET['nbPage'];
    $ResultPerPage = $_SESSION['nbPage'];
}else if(isset ($_SESSION['nbPage'])){
    $ResultPerPage = $_SESSION['nbPage'];
}

if (isset($_GET['selectedPage'])) {
    $_SESSION['selectedPage'] = htmlspecialchars($_GET["selectedPage"]);
    $selectedPage = $_SESSION['selectedPage'];
}else if(isset ($_SESSION['selectedPage'])){
    $selectedPage = $_SESSION['selectedPage'];
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
        . "<div style = \"float: left; display: inline-text; margin: 0px;\">"
        . "<form action = \"rechAvc.php\" method = \"get\"><b>Résultats par pages :<b/> ";
if ($ResultPerPage == 20) {
    $content = $content . "<button type = \"submit\" value = \"20\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb imgNb-active\"><b> 20 </b></div></button>";
}else{
    $content = $content . "<button type = \"submit\" value = \"20\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb\"><b> 20 </b></div></button>";
}

if ($ResultPerPage == 40) {
    $content = $content . "<button type = \"submit\" value = \"40\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb imgNb-active\"><b> 40 </b></div></button>";
}else{
    $content = $content . "<button type = \"submit\" value = \"40\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb\"><b> 40 </b></div></button>";
}

if ($ResultPerPage == 100) {
    $content = $content . "<button type = \"submit\" value = \"100\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb imgNb-active\"><b> 100 </b></div></button>";
}else{
    $content = $content . "<button type = \"submit\" value = \"100\" name = \"nbPage\" id=\"hiddenBtn\"><div class=\"imgNb\"><b> 100 </b></div></button>";
}

$content = $content
        . " </form></div>"
        . "<div style = \"float: right; display: inline-text;\">"
        . "<form action = \"rechAvc.php\" method = \"get\" style = \"margin: 0px;\">";

if ($mode == "Image") {
    $content = $content . "<button type = \"submit\" value = \"Image\" name = \"display\" id=\"hiddenBtn\"><div class = \"imgNb imgNb-active glyphicon glyphicon-picture\" aria-hidden = \"true\" title = \"Image seulement\"></div></button>";
} else {
    $content = $content . "<button type = \"submit\" value = \"Image\" name = \"display\" id=\"hiddenBtn\"><div class = \"imgNb glyphicon glyphicon-picture\" aria-hidden = \"true\" title = \"Image seulement\"></div></button>";

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
        . "<form action = \"rechAvc.php\" method = \"get\">"
        . "<nav style =\"text-align: center; color: red; border-top: 1px solid #8e3c06;border-bottom: 1px solid #8e3c06; margin: 0px;\" >"
        . "<ul class = \"pagination\" style=\" margin: 0px; margin-top: 8px;\">"
        . "<li>"
        . "<a href = \"#\" aria-label = \"Previous\"><span aria-hidden = \"true\">&laquo;</span></a>"
        . "</li>";


$content = $content . $pageMenu ->displayPagination(($sizeList / $ResultPerPage), $selectedPage); // display the page Menu.


$content = $content . ""
        . "<li>"
        . "<a href=\"#\" aria-label=\"Next\">"
        . "<span aria-hidden=\"true\">&raquo;</span>"
        . "</a>"
        . "</li>"
        . "</ul>"
        . "</nav></form>"
        . "<div class = \"row\" id = \"ooo\">";

$content = $content . "</div><div class = \"row\" style = \"margin-left: 1px; margin-right: 1px;\">";

$start = $ResultPerPage * ($selectedPage - 1);
$stop = $ResultPerPage * $selectedPage;
$rep = $accesDb->selection($searchName, $start , $stop);

$content = $content . $db_traitement->dataBase($rep, $objet, $mode, $ResultPerPage);//process the data

$content = $content . "</div><div class =\"row col-xs-12\""
        . "<form action = \"rechAvc.php\" method = \"get\">"
        . "<nav style =\"text-align: center;\" >"
        . "<ul class = \"pagination\" style=\" margin: 0px; margin-top: 8px;\">"
        . "<li>"
        . "<a href = \"#\" aria-label = \"Previous\"><span aria-hidden = \"true\">&laquo;</span></a>"
        . "</li>";

$content = $content . $pageMenu ->displayPagination(($sizeList / $ResultPerPage), $selectedPage); // display the page Menu.

$content = $content . ""
        . "<li>"
        . "<a href=\"#\" aria-label=\"Next\">"
        . "<span aria-hidden=\"true\">&raquo;</span>"
        . "</a>"
        . "</li>"
        . "</ul>"
        . "</nav></form></div>"
        . "</div></div>"
        . "</div>"
        . "</div>";

require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");
