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
        //id
        $detailTable['Nom'] = $data['nom'];
        $detailTable['numChimie'] = $data['num_chemistry'];
        //date
        $detailTable['dateGene'] = $data['sampleDatingGeneral'];
        $detailTable['datePrecise'] = $data['sampleDP'];
        
        //Description
        if($data['cat'] == NULL || $data['cat'] == "NULL"){
            $detailTable['category'] = "";
        }else{
            $detailTable['category'] = $data['cat'];
        }
        
        if($data['form'] == NULL || $data['form'] == "NULL"){
            $detailTable['form'] = "";
        }else{
            $detailTable['form'] = ", "  . $data['form'];
        }
        
        if($data['typology'] == NULL || $data['typology'] == "NULL"){
            $detailTable['typology'] = "";
        }else{
            $detailTable['typo'] = ", "  . $data['typology'];
        }
        
        if($data['decoration'] == NULL || $data['decoration'] == "NULL"){
            $detailTable['decoration'] = "";
        }else{
            $detailTable['deco'] = ", "  . $data['decoration'];
        }
        
        if($data['sampleCoating'] == NULL || $data['sampleCoating'] == "NULL"){
            $detailTable['sampleCoating'] = "";
        }else{
            $detailTable['sampleCoating'] = ", "  . $data['sampleCoating'];
        }
        
        if($data['stamps'] == NULL || $data['stamps'] == "NULL"){
            $detailTable['stamps'] = "";     
        }else{
            $detailTable['stamps'] = ", "  . $data['stamps'];
        }
        
        if($data['paste'] == NULL || $data['paste'] == "NULL"){
            $detailTable['paste'] = "";      
        }else{
            $detailTable['paste'] = ", "  . $data['paste'];
        }
        
        if($data['fm'] == NULL || $data['fm'] == "NULL"){
            $detailTable['fm'] = "";    
        }else{
            $detailTable['firing_mode'] = ", "  . $data['fm'];
        }
        
        if($data['pObj'] == NULL || $data['pObj'] == "NULL"){
            $detailTable['pObj'] = "";           
        }else{
            $detailTable['pObj'] = ", "  . $data['pObj'];
        }
        
        if($data['descFree'] == NULL || $data['descFree'] == "NULL"){
            $detailTable['descFree'] = ".";          
        }else{
            $detailTable['desc_free'] = ", " . $data['descFree'] . ".";
        }
        
        //storage
        if($data['stoNom'] == NULL || $data['stoNom'] == "NULL"){
            $detailTable['stoNom'] = "";           
        }else{
            $detailTable['stoNom'] = $data['stoNom'];
        }
        
        
        $rep->closeCursor();
        return $detailTable;
    }
    
    public function doNatureTable($rep) {
        $display = "";
        $rep->execute();
        $data = $rep ->fetch();
        $nomObj = $data['nom'];
        $natureObj = "Pot";
        $natureSObj = $data['options'];
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
            $data['free_description'] = ".";
        }else{
            $data['free_description'] = ", " . $data['free_description'] . ".";
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
                    "<b>Information supplémentaire : </b>" . $data['num_elements_analysis'] . ", " . $data['date_analysis'] . "" . $data['free_description'] . "</div>";
       
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
            if ($data['nameSample'] != $name) {
                $name = $data['nameSample'];
                
                
                if ($data['workshopPorv'] == "NULL" || $data['workshopPorv'] == NULL) {
                    $data['workshopPorv'] = "";
                } else {
                    $data['workshopPorv'] = $data['workshopPorv'] . ", ";
                }
                
                if ($data['museumProv'] == "NULL" || $data['museumProv'] == NULL) {
                    $data['museumProv'] = "";
                } else {
                    $data['museumProv'] = $data['museumProv'] . " ";
                }
                
                if ($data['excavationProv'] == "NULL" || $data['excavationProv'] == NULL) {
                    $data['excavationProv'] = "";
                } else {
                    $data['excavationProv'] = $data['excavationProv'] . ", ";
                }
                
                if ($data['sampleDatingGeneral'] == "NULL" || $data['sampleDatingGeneral'] == NULL) {
                    $data['sampleDatingGeneral'] = "";
                } else {
                    $data['sampleDatingGeneral'] = $data['sampleDatingGeneral'] . ", ";
                }
                
                if ($data['sampleDP'] == "NULL" || $data['sampleDP'] == NULL) {
                    $data['sampleDP'] = "";
                } else {
                    $data['sampleDP'] = $data['sampleDP'] . "";
                }
                
                if ($data['sampleCoating'] == "NULL" || $data['sampleCoating'] == NULL) {
                    $data['sampleCoating'] = "";
                } else {
                    $data['sampleCoating'] = $data['sampleCoating'] . ", ";
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
                if ($data['prov_site'] == "NULL" || $data['prov_site'] == NULL) {
                    $data['prov_site'] = "";
                } else {
                    $data['prov_site'] = $data['prov_site'] . ", ";
                }
                if ($data['prov_town'] == "NULL" || $data['prov_town'] == NULL) {
                    $data['prov_town'] = "";
                } else {
                    $data['prov_town'] = $data['prov_town'] . ", ";
                }
                if ($data['prov_region'] == "NULL" || $data['prov_region'] == NULL) {
                    $data['prov_region'] = "";
                } else {
                    $data['prov_region'] = $data['prov_region'] . ", ";
                }
                if ($data['prov_country'] == "NULL" || $data['prov_country'] == NULL) {
                    $data['prov_country'] = "";
                }
                if ($data['nameSample'] == "NULL" || $data['nameSample'] == NULL) {
                    $data['nameSample'] = "Aucun Nom Dispo";
                }
                if ($data['id_graphical_doc'] == "NULL" || $data['id_graphical_doc'] == NULL) {
                    $data['id_graphical_doc'] = "";
                }

                $descritption = "<b>Description : </b>". $data['catopt'] . " " . $data['form'] . " " . $data['typology'];
                
                if($mode == "List"){
                    $descritption = $descritption  . " " . $data['decoration'] . " " . $data['sampleCoating'];
                }
                
                
                
                $descritption = $descritption . "<br /><b>Localisation : </b>" . $data['prov_site'] . " " . $data['prov_town'] . " " . $data['prov_region'] . " " . $data['prov_country'] . " ";
                
                if($mode == "List"){
                    $descritption = $descritption . ""
                            . ", " . $data['atelier'] . "" . $data['excavationProv'] . "" . $data['museumProv']
                            . "<br/>"
                            . "<b>Datation : </b>" . $data['sampleDatingGeneral'] . " " . $data['sampleDP'] ."<br/>"
                            . "<b>n° Analyses :</b> ff";
                    if($data['was'] == "yes" || $data['was'] == "possibly"){
                        if($data['was'] == "yes"){
                            $descritption = $descritption . "<br /><b>Déchet de fabrication : </b>" . "Oui.";
                        }else if($data['was'] == "possibly"){
                            $descritption = $descritption . "<br /><b>Déchet de fabrication : </b>" . "Possible.";
                        }
                    }
                }
                
                if ($data['url_document'] == NULL) {
                    $objet->setObject("../Ressources/no-img.png",/*$data['num_chemistry']*/ $data['nameSample'] . " | " . $data['num_chemistry'], $descritption, $data['objectId']);
                } else {
                    $objet->setObject($data['url_document'],/*$data['num_chemistry']*/ $data['nameSample'] . " | " . $data['num_chemistry'], $descritption, $data['objectId']);
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
