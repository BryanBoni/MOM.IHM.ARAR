<?php
//import
include_once (dirname(dirname(__FILE__)) . "/Model/php/search.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/object.php");
include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect.php");
//include_once (dirname(dirname(__FILE__)) . "/Model/php/listes_opts.php");

//Variables
$title = "Home | Laboratoire ArAr";
$search = new search();
$objet = new object("../Ressources/objectBeta/fry.png", "Fry", "he is a dumb but he is funny.", 1001);
$accesDb = new db_connect();

$content = "";
$sizeList = 100;
$i = 0;
$ResultPerPage = 15;
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
        
                . "<div id = \"filterList\">"
                    . "<b> Recherche : </b><div id = \"tag\">"
                    . "</div>";//need to be change, it's just to test.


$filterList = $search -> getFilterList(); //get the filter research list in search().
$text = $search -> getFilterText(); //get the filter sub-research list in search().
$minObject = $objet -> minDisplay(); //get the object display.


foreach($filterList as $value){
    $content = $content
            . "<b>" . $value . " :</b>"
            . "<ul>";
    
    $text2 = $text[$value];
    foreach($text2 as $value2){
            $content = $content
                    . "<li>";
            
            $content = $content . "<div class = \"checkbox\" id = \"check\"><label><input type = \"checkbox\" name = \"".$value2."\">". $value2." ()</label></div>";
            
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

//here is the display option
$content = $content . "" 
            . "<div class = \"col-sm-9\" id = \"cadre\" ><div id=\"gg\">"
                . "<div id = \"short\">"
                    . "<div style = \"float: left;\">"
                        . "Résultats par pages : <div class=\"imgNb imgNb-active\"> 15 </div><div class=\"imgNb\"> 30 </div><div class=\"imgNb\"> 45 </div>"
                    . "</div>"
                    . "<div style = \"float: right;\">"
                        . "<div class = \"imgNb glyphicon glyphicon-picture\" aria-hidden = \"true\" title = \"Image seulement\"></div>"
                        . "<div class = \"imgNb imgNb-active glyphicon glyphicon-th\" aria-hidden = \"true\" title = \"Image et Texte\"></div>"
                        . "<div class =\"imgNb glyphicon glyphicon-list\" aria-hidden=\"true\" title = \"affichage en Liste\"></div>"
                    . "</div><br /><br />";

$content = $content . "</div>"
                . "<p style=\"float: left;\"><b>votre recherche : </b><font color = \"red\">" . htmlspecialchars($_GET["search"])."</font></p><p style=\"float: right;\"> $sizeList résultats</p>"
                . "<br />"
                . ""
            
                . "<nav style =\"text-align: center; color: red; border-top: 1px solid #8e3c06;border-bottom: 1px solid #8e3c06; margin: 0px;\" >"
                    
                    . "<ul class = \"pagination\" style=\" margin: 0px; margin-top: 8px;\">"
                        . "<li>"
                            . "<a href = \"#\" aria-label = \"Previous\"><span aria-hidden = \"true\">&laquo;</span></a>"
                        . "</li>";

while($i <= ($sizeList / $ResultPerPage)){
        if($i == 0){
            $content = $content . "<li role = \"presentation\"  class = \"active\"><a href=\"#\">". $i ."</a></li>";
        }else{
            $content = $content . "<li role = \"presentation\"><a href=\"#\">". $i ."</a></li>";
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
for($i = 0; $i < 15; $i++){
    $content = $content . "<div id =\"imageObj".$i."\">$minObject</div>";
}

$content = $content . $accesDb -> selection(htmlspecialchars($_GET["search"]));

$content = $content . ""
                    . "</div>"
                . "<nav style =\"text-align: center;\" >"    
                    . "<ul class = \"pagination\" style=\" margin: 0px; margin-top: 8px;\">"
                        . "<li>"
                            . "<a href = \"#\" aria-label = \"Previous\"><span aria-hidden = \"true\">&laquo;</span></a>"
                        . "</li>";
$i -= $i;
while($i <= ($sizeList / $ResultPerPage)){
        if($i == 0){
            $content = $content . "<li role = \"presentation\" class = \"active\" ><a href=\"#\">". $i ."</a></li>";
        }else{
            $content = $content . "<li role = \"presentation\"><a href=\"#\">". $i ."</a></li>";
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