<?php

/*
  used to link rechAvc and db_connect :
  Call data from db_connect, process them
  and give the result to rechAvc.
 */

include_once (dirname(dirname(__FILE__)) . "/Model/php/db_connect.php");

class db_traitement {

    function __construct() {
        
    }
    
    public function detailDataBase($rep){
        $detailTable = array();
        $rep->execute();
        
        $data = $rep->fetch();
        
        $detailTable['Nom'] = $data['nom'];
        $detailTable['numChimie'] = $data['num_chemistry'];
        $detailTable['dateGene'] = $data['dating_general'];
        $detailTable['datePrecise'] = $data['dating_precise'];
        
        $rep->closeCursor();
        return $detailTable;
    }
    
    public function doNatureTable($rep) {
        $display = "";
        $rep->execute();
        $data = $rep ->fetch();
        $nomObj = $data['nom'];
        $natureObj = "Pot";
        $natureSObj = "Pâte";
        $numAna = "ADDAC";
        
        
        $display = $display . ""
                . "<table class=\"table table-hover\">
                    <thead>
                      <tr>
                        <th>Nom Objet</th>
                        <th>Nature Objet</th>
                        <th>Nom Sous-Objet</th>
                        <th>Nature Sous-Objet</th>
                        <th>Numéro(s) d'analyse(s)</th>
                      </tr>
                    </thead>
                    <tbody>";
        
        $i = 1;
        $display = $display . "
                      <tr>
                        <th scope=\"row\">$nomObj</th>
                        <td>$natureObj</td>
                        <td><b style=\"color: black;\">SO$i<b></td>
                        <td>$natureSObj</td>
                        <td>$numAna</td>
                      </tr>";
                      
        $display = $display . "
                    </tbody>
                  </table>";
        
        //$data = $rep->fetch();
        $rep->closeCursor();
        return $display;
    }
    
    public function doChemistryTable($rep){
        
        $display = "";
        $rep->execute();
        $i = 1;
        
       while($data = $rep->fetch()){
        if($data['free_description'] == "NULL" || $data['free_description'] == NULL ){
            $data['free_description'] = "Aucune information supplémentaire disponible";
        }
        
        if($data['num_elements_analysis'] == "NULL" || $data['num_elements_analysis'] == NULL ){
            $data['num_elements_analysis'] = "Nombre d'éléments analysés inconnu";
        }else{
            $data['num_elements_analysis'] = "Nombre d'éléments analysés : " . $data['num_elements_analysis'];
        }
        
        if($data['date_analysis'] == "NULL" || $data['date_analysis'] == NULL ){
            $data['date_analysis'] = "date d'analyse inconnue";
        }else{
            $data['date_analysis'] = "date de l'analyse : " . $data['date_analysis'];
        }
      
        
        $display = $display . "<h3 style=\"color: black;\">SO$i</h3><div style = \"padding: 5px; border-top: 1px solid #eaeaea; border-bottom: 1px solid #eaeaea; \">
            <div id = \"ddd\">
                <table class=\"table table-bordered\">
                        <thead style = \"background-color: #cecece; font-size: 11px;\">
                          <tr>
                            <th>N° analyse</th>
                            <th>CaO</th>
                            <th>Fe2O3</th>
                            <th>TiO2</th>
                            <th>K2O</th>
                            <th>SiO2</th>
                            <th>Al203</th>
                            <th>MgO</th>
                            <th>MnO</th>
                            <th>Na2O</th>
                            <th>P2O5</th>
                            <th>Zr</th>
                            <th>Sr</th>
                            <th>Rb</th>
                            <th>Zn</th>
                            <th>Cr</th>
                            <th>Ni</th>
                            <th>La</th>
                            <th>Ba</th>
                            <th>V</th>
                            <th>Ce</th>
                            <th>Y</th>
                            <th>Th</th>
                            <th>Pb</th>
                            <th>Cu</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr >
                            <th scope=\"row\">" . $data['num_chemistry'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['CaO'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Fe2O3'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['TiO2'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['K2O'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['SiO2'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Al2O3'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['MgO'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['MnO'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Na2O'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['P2O5'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Zr'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Sr'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Rb'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Zn'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Cr'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Ni'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['La'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Ba'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['V'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Ce'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Y'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Th'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Pb'] . "</th>
                            <th style=\"font-weight: normal;\">" . $data['Cu'] . "</th>
                          </tr>
                        </tbody>
                    </table></div>
                    " .
                    "<b>Information supplémentaire : </b>" . $data['num_elements_analysis'] . ", " . $data['date_analysis'] . ", " . $data['free_description'] . ".</div>";
       
        $i++;
        }
        $rep->closeCursor();
        return $display;
    }

    public function filterMenu($keyword, $rechFilter) {
        $connect = new db_connect();

        $rep = $connect->filter($keyword);
        $rep->execute();

        $rep->closeCursor();
    }

    public function dataBase($rep, $objet, $mode, $nbPage) {
        $descritption = "";
        $content = "";
        $name = "";
        $i = 0;
        $rep->execute();
        while ($data = $rep->fetch()) {
            if ($data['nom'] != $name) {
                $name = $data['nom'];
                
                if ($data['atelier'] == "NULL" || $data['atelier'] == NULL) {
                    $data['atelier'] = "";
                } else {
                    $data['atelier'] = $data['atelier'] . ", ";
                }
                
                if ($data['museum'] == "NULL" || $data['museum'] == NULL) {
                    $data['museum'] = "";
                } else {
                    $data['museum'] = $data['museum'] . " ";
                }
                
                if ($data['excavation'] == "NULL" || $data['excavation'] == NULL) {
                    $data['excavation'] = "";
                } else {
                    $data['excavation'] = $data['excavation'] . ", ";
                }
                
                if ($data['dating_general'] == "NULL" || $data['dating_general'] == NULL) {
                    $data['dating_general'] = "";
                } else {
                    $data['dating_general'] = $data['dating_general'] . ", ";
                }
                
                if ($data['dating_precise'] == "NULL" || $data['dating_precise'] == NULL) {
                    $data['dating_precise'] = "";
                } else {
                    $data['dating_precise'] = $data['dating_precise'] . "";
                }
                
                if ($data['coating'] == "NULL" || $data['coating'] == NULL) {
                    $data['coating'] = "";
                } else {
                    $data['coating'] = $data['coating'] . ", ";
                }
                
                if ($data['catopt'] == "NULL" || $data['catopt'] == NULL) {
                    $data['catopt'] = "";
                } else {
                    $data['catopt'] = $data['catopt'] . ", ";
                }
                
                if ($data['decoration'] == "NULL" || $data['decoration'] == NULL) {
                    $data['decoration'] = "";
                } else {
                    $data['decoration'] = $data['decoration'] . ", ";
                }
                if ($data['form'] == "NULL" || $data['form'] == NULL) {
                    $data['form'] = "";
                } else {
                    $data['form'] = $data['form'] . ", ";
                }
                if ($data['typology'] == "NULL" || $data['typology'] == NULL) {
                    $data['typology'] = "";
                } else {
                    $data['typology'] = $data['typology'] . ", ";
                }
                if ($data['name_site'] == "NULL" || $data['name_site'] == NULL) {
                    $data['name_site'] = "";
                } else {
                    $data['name_site'] = $data['name_site'] . ", ";
                }
                if ($data['name_town'] == "NULL" || $data['name_town'] == NULL) {
                    $data['name_town'] = "";
                } else {
                    $data['name_town'] = $data['name_town'] . ", ";
                }
                if ($data['name_region'] == "NULL" || $data['name_region'] == NULL) {
                    $data['name_region'] = "";
                } else {
                    $data['name_region'] = $data['name_region'] . ", ";
                }
                if ($data['name_country'] == "NULL" || $data['name_country'] == NULL) {
                    $data['name_country'] = "";
                }
                if ($data['nom'] == "NULL" || $data['nom'] == NULL) {
                    $data['nom'] = "Aucun Nom Dispo";
                }
                if ($data['id_graphical_doc'] == "NULL" || $data['id_graphical_doc'] == NULL) {
                    $data['id_graphical_doc'] = "";
                }

                $descritption = "<b>Description : </b>". $data['catopt'] . " " . $data['form'] . " " . $data['typology'];
                
                if($mode == "List"){
                    $descritption = $descritption  . " " . $data['decoration'] . " " . $data['coating'];
                }
                
                
                
                $descritption = $descritption . "<br /><b>Localisation : </b>" . $data['name_site'] . " " . $data['name_town'] . " " . $data['name_region'] . " " . $data['name_country'] . " ";
                
                if($mode == "List"){
                    $descritption = $descritption . ""
                            . ", " . $data['atelier'] . "" . $data['excavation'] . "" . $data['museum']
                            . "<br/>"
                            . "<b>Datation : </b>" . $data['dating_general'] . " " . $data['dating_precise'] ."<br/>"
                            . "<b>n° Analyses :</b> ff";
                    if($data['was'] == "yes" || $data['was'] == "possibly"){
                        if($data['was'] == "yes"){
                            $descritption = $descritption . "<br /><b>Déchet de fabrication : </b>" . "Oui.";
                        }else if($data['was'] == "possibly"){
                            $descritption = $descritption . "<br /><b>Déchet de fabrication : </b>" . "Possible.";
                        }
                    }
                }
                
                if ($data['url_doc'] == NULL) {
                    $objet->setObject("../Ressources/no-img.png",/*$data['num_chemistry']*/ $data['nom'] . " | " . $data['num_chemistry'], $descritption, $data['objectId']);
                } else {
                    $objet->setObject($data['url_doc'],/*$data['num_chemistry']*/ $data['nom'] . " | " . $data['num_chemistry'], $descritption, $data['objectId']);
                }
                $content = $content . $objet->selectDisplay($mode);
                $i = $i + 1;
            }
            if($i >= $nbPage){
                break;
            }
        }
        $rep->closeCursor();
        return $content;
    }

}
