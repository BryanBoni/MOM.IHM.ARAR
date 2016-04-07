<?php
//import
include_once (dirname(dirname(__FILE__)) . "/Model/php/search.php");

//Variables
$title = "Home | Laboratoire ArAr";
$search = new search();
$content = "";


//here is the filter
$content = $content . "<div class=\"row\">"
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
        
                . "<div id = \"filterList\">";//need to be change, it's just to test.


$filterList = $search -> getFilterList(); //get the filter research list in search().
$text = $search -> getFilterText(); //get the filter sub-research list in search().

foreach($filterList as $value){
    $content = $content
            . "<b>" . $value . " :</b>"
            . "<ul>";
    
    $text2 = $text[$value];
    foreach($text2 as $value2){
            $content = $content
                    . "<li>";
            
            $content = $content . "<div class = \"checkbox\"><label><input type = \"checkbox\" name = \"".$value2."\">". $value2." ()</label></div>";
            
            $content = $content 
                    . "</li>";
    }
    
    $content = $content
            . "</ul>";
}

$content = $content.
                "</div>"
            . "</div>";
//here is the result list.
$content = $content . "" 
            . "<div class = \"col-sm-9\" id = \"cadre\">"
                . "<b>votre recherche : </b><font color = \"red\">" . htmlspecialchars($_GET["search"])."</font>"
                . ""
            . "</div>"
        . "</div>";

require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");


?>
