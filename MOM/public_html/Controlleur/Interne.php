<?php
include_once (dirname(dirname(__FILE__)) . "/Model/php/filer.php");
$file = new filer();
//move upl

$title = "Recherche Interne dans la base | Ceramom BDD";

$content = "";

$content = $content . ""
        . "<div class=\"row\">"
            . "<div class = \"col-sm-7\">"
                . "<h2>LABORATOIRE ARAR</h2>"
                . "<h3><b>Recherche Interne dans la base de données</b></h3>"
            . "</div>"
            . "<div class = \"col-sm-5 hidden-xs\">"
                . "<img src = \"../Ressources/Oiseau_Quadri.gif\" style=\"width: 150px;\"/>"
            . "</div>"
        . "</div>"
        . "<br />"
        . "<div class = \"row\" id = \"advSearch\">"
        .   "<ol class=\"breadcrumb\">"
        .       "<li><a href=\"#\">Recherche avancée</a></li>"
        .       "<li><a href=\"#\">Resultat(s)</a></li>"
        .   "</ol>"
        . "";
$content = $content //input groupe
       // . "<form action = \"Interne.php\" method = \"get\">"
        .   "<h2>Recherche avancée</h2>
            <div class=\"row\"><center><table class=\"table\" id=\"table\">
                <thead class=\"thead-inverse\">
                  <tr>
                    
                    <th>Onglets</th>
                    <th>Champs des onglets</th>
                    <th>Requêtes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    
                    <td>
                        <select class=\"c-select\">
                            <option selected>Choisissez un onglet... </option>
                            <option value = \"1\">Sous-Objet</option>
                            <option value = \"2\">Provenance</option>
                            <option value = \"3\">Forme</option>
                            <option value = \"4\">Autres</option>
                        </select>
                    </td>
                    <td>
                        <select class=\"c-select\">
                            <option selected>Choisissez un onglet... </option>
                        </select>
                    </td>
                    <td>
                        <input type = \"text\" name = \"requ\" id = \"requ\"/>
                    </td>
                  </tr>
                  <tr>
                    
                    <td>
                        <select class=\"c-select\">
                            <option selected>Choisissez un onglet... </option>
                            <option value = \"1\">Sous-Objet</option>
                            <option value = \"2\">Provenance</option>
                            <option value = \"3\">Forme</option>
                            <option value = \"4\">Autres</option>
                        </select>
                    </td>
                    
                    <td>
                        <select class=\"c-select\">
                            <option selected>Choisissez un onglet... </option>
                        </select>                                        
                    </td>
                    
                    <td>
                        <input type = \"text\" name = \"requ\" id = \"requ\"/>
                    </td>
                  </tr>
                  <tr>
                    
                    <td>
                        <select class=\"c-select\">
                            <option selected>Choisissez un onglet... </option>
                            <option value = \"1\">Sous-Objet</option>
                            <option value = \"2\">Provenance</option>
                            <option value = \"3\">Forme</option>
                            <option value = \"4\">Autres</option>
                        </select>
                    </td>
                    
                    <td>
                        <select class=\"c-select\">
                            <option selected>Choisissez un onglet... </option>
                        </select>
                    </td>
                    
                    <td>
                        <input type = \"text\" name = \"requ\" id = \"requ\"/>
                    </td>
                  </tr>
                </tbody>
              </table></center></div>"                 
        //. "</form>"
        . "<h2>Résultat(s)</h2>"
        . "</div>";

require_once (dirname(dirname(__FILE__)) . "/Vue/layout.php");