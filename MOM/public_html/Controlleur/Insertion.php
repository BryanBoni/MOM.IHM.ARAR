<?php
include_once (dirname(dirname(__FILE__)) . "/Model/php/filer.php");
$file = new filer();
//move upl

$title = "Insertion dans la base | Laboratoire ArAr";

$content = "";

$content = $content . ""
        . "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Insertion dans la base de données</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<img src = \"../Ressources/Oiseau_Quadri.gif\" style=\"width: 150px;\"/>"
            . "</div>"
        . "</div>"
        . "<br />"
        . "<div class = \"row\" id = \"advSearch\">"
            . "<input id=\"file\" type=\"file\" multiple /><br />"//to select 0 - N file(s).
            . "<div id = \"fileList\"></div>". $file ->createFile()
            . "<progress id = \"progress\"></progress>"
            . "<div id = \"createFolder\"></div>"
        . "</div>";

require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");