<?php
    $title = "Laboratoire ArAr | Ceramom BDD";
    
    $home = 1;
    
    $content = "";
    
    $actu = "" //example
            . "<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-10 col-xs-offset-1 col-sm-offset-0\" id=\"homeThumbnail\">"
                . "<a href=\"http://www.arar.mom.fr/recherche-et-activites/axes-de-recherche/equipe-2/ceramologie-metropolitaine/les-ceramiques-de-cuisine-d-epoque-romaine\">"
                    . "<img style=\"width: 100%;\" src=\"http://www.arar.mom.fr/sites/arar.mom.fr/files/img/Activites/aostecommunes2.jpg\"/>"
                    . "<p style=\"text-align: center; color: #337ab7;\">"
                        . "ACR : Les céramiques de cuisine d’époque romaine en Région Rhône-Alpes et dans le Sud de la Bourgogne"
                    . "</p>"
                . "</a>"
            . "</div>"
            . "<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-10 col-xs-offset-1 col-sm-offset-0\" id=\"homeThumbnail\">"
                . "<a href=\"http://www.arar.mom.fr/recherche-et-activites/axes-de-recherche/equipe-2/ceramologie-metropolitaine/programme-pcr-baliz\"><img style=\"width: 100%;\" src=\"http://www.arar.mom.fr/sites/arar.mom.fr/files/img/Activites/Vayres.jpg\"/></a>"
                . "<p style=\"text-align: center; color: #337ab7;\">"
                    . "<a href=\"http://www.arar.mom.fr/recherche-et-activites/axes-de-recherche/equipe-2/ceramologie-metropolitaine/programme-pcr-baliz\">Programme PCR BaLiZ</a>"
                . "</p>"
            . "</div>"
            . "<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-10 col-xs-offset-1 col-sm-offset-0\" id=\"homeThumbnail\">"
                . "<a href=\"http://www.doaks.org/research/support-for-research/project-grants/reports/2008-2009/waksman\"><img style=\"width: 100%;\" src=\"http://www.arar.mom.fr/sites/arar.mom.fr/files/img/Activites/waksman1.jpg\"/></a>"
                . "<p style=\"text-align: center; color: #337ab7;\">"
                    . "<a href=\"http://www.doaks.org/research/support-for-research/project-grants/reports/2008-2009/waksman\">Programme PCR BaLiZ</a>"
                . "</p>"
            . "</div>"
            . "<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-10 col-xs-offset-1 col-sm-offset-0\" id=\"homeThumbnail\">"
                . "<a href=\"http://www.arar.mom.fr/recherche-et-activites/axes-de-recherche/equipe-2/monde-byzantin-monde-musulman-et-moyen-orient-medieval/ceramiques-fatimides-de-la-region-de-kairouan\"><img style=\"width: 100%;\" src=\"http://www.arar.mom.fr/sites/arar.mom.fr/files/img/Activites/sabra.jpg\"/></a>"
                . "<p style=\"text-align: center; color: #337ab7;\">"
                    . "<a href=\"http://www.arar.mom.fr/recherche-et-activites/axes-de-recherche/equipe-2/monde-byzantin-monde-musulman-et-moyen-orient-medieval/ceramiques-fatimides-de-la-region-de-kairouan\">Programme PCR BaLiZ</a>"
                . "</p>"
            . "</div>"
            . "";
    
    //content of the tutorial about this web site
    $guide = "<h3>La barre de menu</h3>"
            . "<p>Présente sur quasiment toutes les pages du site. <br />Elle vous permet de naviguer entre les divers pages principales du site, soit : la recherche d'échantillons, la recherche de groupes chimique, la modification de la base de données, ainsi que la connexion et l'insciption d'un utilisateur (l'inscription ne peut être faite que par un utilisateur habilité à le faire).</p>"
            . "<h3>Recherche Avancée</h3>"
            . "<p>Cette page sert à la recherche d'échantillons de la base de données céramologique, certain échantillons présent dans la base peuvent ne pas être affiché sur cette page si vous n'êtes pas connecté ou que vous n'en avez pas les droits de consultation.</p>"
            . "<h3>Recherche par groupes chimique</h3>"
            . "<p>Cette page sert à la recherche de groupe et super groupe de la base de données céramologique, il est possible de filtrer votre recherche en modifiant ou en ajoutant des paramètres de recherche tel que la date de creation, la localisation d'un site, etc... .</p>"
            . "<hr style=\"margin: 20px;\" />"
            . "<p><i>(Pour les utilisateurs connectés)</i></p>"
            . "<h3>Groupe chimique</h3>"
            . "<p>Cette page sert à l'insertion et/ou à la modification d'un groupe chimique dans la base de données.</p>"
            . "<h3>Ajout d'un échantillon</h3>"
            . "<p>Cette page sert à l'insertion et/ou à la modification d'un échantillon dans la base de données.</p>"
            . "";
    
    $contact = "Laboratoire ArAr. Archéologie et Archéométrie <br /> MSH Maison de l'Orient et de la Méditerranée <br /> 7 rue Raulin - 69365 LYON cedex 7 (1er étage) <br />Téléphone : 04 72 71 58 97 <br /> Fax : 04 78 69 82 31";
    
    $content = $content . ""
        . "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Page d'accueil</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<a href=\"http://www.arar.mom.fr/\"><img src = \"Ressources/Oiseau_Quadri.png\" style=\"width: 200px;\"/></a>"
            . "</div>"
        . "</div>"
        . "<br />"
        . "<div class = \"row\" id = \"advSearch\" style=\"color: #8e3c06;\">"
            . "<div class=\"\">"
                . "<h3>"
                    . "Bonjour ! Bienvenue sur le site de la base de données céramologique du laboratoire ArAr."
                    . ""
                . "</h3>"
            . "</div>"
            . "<form action =\"Controlleur/rechAvc.php\" method=\"get\">"
                . "<div class=\"input-group col-sm-8 col-sm-offset-2\">"
                    . "<input type = \"text\" name = \"search\" aria-describedby = \"basic-addon1\" class = \"form-control\" id = \"searchTxt\" placeholder = \"Recherche simple...\"/>"
                    . "<span class=\"input-group-btn\">"
                        . "<button  id = \"searchBtn\" class = \"btn btn-warning\" name = \"searchBtn\" type = \"submit\">Rechercher <span class = \"glyphicon glyphicon-search\"/></button>"
                    . "</span>"
                . "</div>"
                . "<input type=\"hidden\" name=\"display\" value=\"ImageText\" />"
               /* . "<input type = "hidden" name="display" value="ImageText"/>
                <?php
                    $_SESSION['nbPage'] = 15;
                    $_SESSION['display'] = "ImageText";
                ?>"*/
            . "</form>"
            . "<br />"
            . "<div class=\"col-sm-10 col-sm-offset-1\" id=\"accueilContentMenu\">"
                . "<ul class=\"nav nav-pills  nav-justified\" role=\"tablist\">"
                    . "<li role = \"presentation\" class=\"active\"><a href=\"#actu\" aria-controls=\"actu\" role=\"tab\" data-toggle=\"tab\"><h4>Projet en cours</h4></a></li>"
                    . "<li role = \"presentation\" ><a href=\"#guide\" aria-controls=\"\" role=\"tab\" data-toggle=\"tab\"><h4>Guide pratique du site</h4></span></a></li>"
                    . "<li role = \"presentation\"><a href=\"#Contact\" aria-controls=\"\" role=\"tab\" data-toggle=\"tab\"><h4>Contact</h4></a></li>"
                . "</ul>"
                . "<br />"
                . "<div class=\"tab-content\" id=\"accueilContent\">"
                    . "<div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"actu\">"
                        . "<div class=\"row\">$actu</div>"
                    . "</div>"
                    . "<div role=\"tabpanel\" class=\"tab-pane fade\" id=\"guide\">"
                        . "<p class=\"row\">$guide</p>"
                    . "</div>"
                    . "<div role=\"tabpanel\" class=\"tab-pane fade\" id=\"Contact\">"
                        . "<p class=\"row\">$contact</p>"
                    . "</div>"
                . "</div>"
            . "</div>";
    
    
    $content = $content . ""
        . "</div>";
    
    require_once (dirname(__FILE__) . "/Vue/layout.php");
