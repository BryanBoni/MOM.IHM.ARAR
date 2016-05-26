<?php
/*
This class is used for the login page
*/

$title = "Login | Ceramom BDD";

$content = 
        "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Connexion</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<img src = \"../Ressources/Oiseau_Quadri.gif\" style=\"width: 150px;\"/>"
            . "</div>"
        . "</div>"
        . "<br />"
        . "<div class = \"row\" id = \"advSearch\">"
        . "<div class = \"col-sm-offset-3 col-sm-6\">"
            . "<form id = \"log\" action = \"./Insertion.php\" method = \"POST\">"
                . "<fieldset class = \"form-group\">"
                    . "<label for = \"login\"><h3>Login</h3></label><br />"
                    . "<input type = \"text\" class = \"form-control\" id = \"login\" placeholder = \"Entrez votre email ou votre pseudo\" name = \"login\"/><br />"
                . "</fieldset>"
                . "<fieldset class = \"form-group\">"
                    . "<label for = \"mdp\"><h3>Mot de passe</h3></label><br />"
                    . "<input type = \"password\" class = \"form-control\" id = \"mdp\" name = \"mdp\" placeholder = \"mot de passe\"/>"
                . "</fieldset>"
                . "<button type = \"submit\" class=\"btn btn-primary\">Submit</button>"
            . "</form>"
        . "</div>"
        . "</div>";


require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");