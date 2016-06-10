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
                if ($data['decoration'] == "NULL" || $data['decoration'] == NULL) {
                    $data['decoration'] = " ";
                } else {
                    $data['decoration'] = $data['decoration'] . ",";
                }
                if ($data['form'] == "NULL" || $data['form'] == NULL) {
                    $data['form'] = " ";
                } else {
                    $data['form'] = $data['form'] . ",";
                }
                if ($data['typology'] == "NULL" || $data['typology'] == NULL) {
                    $data['typology'] = " ";
                } else {
                    $data['typology'] = $data['typology'] . ",";
                }
                if ($data['name_site'] == "NULL" || $data['name_site'] == NULL) {
                    $data['name_site'] = " ";
                } else {
                    $data['name_site'] = $data['name_site'] . ",";
                }
                if ($data['name_town'] == "NULL" || $data['name_town'] == NULL) {
                    $data['name_town'] = " ";
                } else {
                    $data['name_town'] = $data['name_town'] . ",";
                }
                if ($data['name_region'] == "NULL" || $data['name_region'] == NULL) {
                    $data['name_region'] = " ";
                } else {
                    $data['name_region'] = $data['name_region'] . ",";
                }
                if ($data['name_country'] == "NULL" || $data['name_country'] == NULL) {
                    $data['name_country'] = " ";
                }
                if ($data['nom'] == "NULL" || $data['nom'] == NULL) {
                    $data['nom'] = "Aucun Nom Dispo";
                }
                if ($data['id_graphical_doc'] == "NULL" || $data['id_graphical_doc'] == NULL) {
                    $data['id_graphical_doc'] = " ";
                }

                $descritption = "<b>Description : </b>" . $data['decoration'] . " " . $data['form'] . " " . $data['typology'] . "<br /><b>Localisation : </b>" . $data['name_site'] . "" . $data['name_town'] . "" . $data['name_region'] . "" . $data['name_country'] . "";
                if ($data['url_doc'] == NULL) {
                    $objet->setObject("../Ressources/no-img.png", $data['nom'], $descritption, $data['id_graphical_doc']);
                } else {
                    $objet->setObject($data['url_doc'], $data['nom'], $descritption, $data['id_graphical_doc']);
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
