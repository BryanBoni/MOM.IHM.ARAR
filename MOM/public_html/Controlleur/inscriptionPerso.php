<?php

include_once (dirname(dirname(__FILE__)) . "/Model/php/filer.php");

$file = new filer();

$head = "";

$title = "Inscription d'un nouvel entrant | Ceramom BDD";

$content = "";

$content = $content . ""
        . "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Inscription d'un nouvel entrant</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<a href=\"http://www.arar.mom.fr/\"><img src = \"../Ressources/Oiseau_Quadri.png\" style=\"width: 200px;\"/></a>"
            . "</div>"
        . "</div>"
        . "<br />"
        . "<div class = \"row\" id = \"advSearch\" style=\"color: #8e3c06;\">"
            . "<center>"
                . "<h1>Formulaire d'inscription du nouvel entrant</h1>"
                . "<form action=\"#\" method=\"post\" class=\"col-sm-10 col-sm-offset-1\" style=\"border-radius: 5px; margin-bottom: 20px; padding: 0px;-webkit-box-shadow: inset 0 1px 0 rgba( 255, 255, 255, .15 ), 0 0 1.25em rgba( 0, 0, 0, .5 ); /* 20 */ -moz-box-shadow: inset 0 1px 0 rgba( 255, 255, 255, .15 ), 0 0 1.25em rgba( 0, 0, 0, .5 ); /* 20 */ box-shadow: inset 0 1px 0 rgba( 255, 255, 255, .15 ), 0 0 1.25em rgba( 0, 0, 0, .5 ); /* 20 */\">"

                    . "<div id=\"insciptForm\" class=\"col-sm-6\">"
                        . "<h4>Identitée du nouvel entrant</h4>"
                        . "<i >Veuillez remplir obligatoirement les champs comprenant une asterique (<b style=\"color: red;\">*</b>).</i>"
                        . "<br />"
                        . "<div class=\"input-group col-xs-12\">"
                            . "<label class=\"input-group-addon\" for=\"inscriptFirstName\">Nom<b style=\"color: red;\">*</b> :</label>"
                            . "<input type=\"text\" id=\"inscriptFirstName\" name=\"inscriptFirstName\" class=\"form-control\" placeholder=\"...\">"
                        . "</div>"
                        . "<br />"
                        . "<div class=\"input-group col-xs-12\">"
                            . "<label class=\"input-group-addon\" for=\"inscriptLastName\">Prénom<b style=\"color: red;\">*</b> :</label>"
                            . "<input type=\"text\" id=\"inscriptLastName\" name=\"inscriptLastName\" class=\"form-control\" placeholder=\"...\">"
                        . "</div>"
                        . "<br />"
                        . "<div class=\"input-group col-xs-12\">"
                            . "<label class=\"input-group-addon\" for=\"inscriptStatus\">Statut :</label>"
                            . "<select id=\"inscriptStatus\" class=\"c-select form-control\">"
                                . "<option>Selectionnez une option...</option>"
                                . "<option>Docteur</option>"
                                . "<option>Doctorant</option>"
                                . "<option>Externe</option>"
                                . ""
                            . "</select>"
                        . "</div>"
                        . "<br />"
                        . "<div class=\"input-group col-xs-12\">"
                            . "<label class=\"input-group-addon \" for=\"inscriptStatus\">Equipe :</label>"
                            . "<select id=\"inscriptStatus\" class=\"c-select form-control\">"
                                . "<option>Selectionnez une option...</option>"
                                . "<option>A</option>"
                                . "<option>B</option>"
                                . "<option>Aucune</option>"
                                . ""
                            . "</select>"
                        . "</div>"
                    . "</div>"

        
                    . "<div id=\"insciptForm\" class=\"col-sm-6\">"
                    . "<h4>Préférences d'utilisation </h4>"
                        . "<div class=\"input-group col-xs-12\" id=\"inscriptFormChkBox\">"
                            . "<div style=\"padding: 10px;\"> <input id=\"gpcStats\" type=\"checkbox\" name=\"pref[]\" value=\"gpcStats\" ><label for=\"gpcStats\"><b>Statistique </b></label> </div>"
                            . "<div style=\"padding: 10px;\"> <input id=\"gpcPhoto\" type=\"checkbox\" name=\"pref[]\" value=\"gpcPhoto\" ><label for=\"gpcPhoto\"><b>Photo</b></label>  </div>"
                            . "<div style=\"padding: 10px;\"> <input id=\"gpcDessin\" type=\"checkbox\" name=\"pref[]\" value=\"gpcDessin\" ><label for=\"gpcDessin\"><b>Dessin</b></label>  </div>"
                            . "<div style=\"padding: 10px;\"> <input id=\"gpcBino\" type=\"checkbox\" name=\"pref[]\" value=\"gpcBino\" ><label for=\"gpcBino\"><b>Bino</b></label>  </div>"
                            . "<div style=\"padding: 10px;\"> <input id=\"gpcSpectro\" type=\"checkbox\" name=\"pref[]\" value=\"gpcSpectro\" ><label for=\"gpcSpectro\"><b>Spectro</b></label>  </div>"
                        . "</div>"
                    . "</div>"
                    . "<center><button style=\"width:100%; border-top-left-radius: 0px; border-top-right-radius: 0px;\" type=\"submit\" class=\"btn btn-primary\"> Enregistrer </button></center>"
                . "</form>"
                . "<br />"
                . "";

$content = $content . ""
            . "</center>"
        . "</div>";

require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");