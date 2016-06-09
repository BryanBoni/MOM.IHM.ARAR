<?php

/*
  used to link rechAvc and db_connect :
  Call data from db_connect, process them
  and give the result to rechAvc.
 */

class db_traitement {

    function __construct() {
        
    }

    public function filterMenu($keyword) {
        
    }

    public function dataBase($rep, $objet, $mode) {
        $descritption = "";
        $content = "";
        $rep->execute();
        while ($data = $rep->fetch()) {

            $descritption = "<b>Description : </b>" . $data['decoration'] . " " . $data['form'] . " " . $data['typology'] . ".<br /><b>Localisation : </b>" . $data['name_site'] . " , " . $data['name_town'] . " , " . $data['name_region'] . " , " . $data['name_country'] . " , ";
            if ($data['url_doc'] == NULL) {
                $objet->setObject("../Ressources/no-img.png", $data['nom'], $descritption, $data['id_graphical_doc']);
            } else {
                $objet->setObject($data['url_doc'], $data['nom'], $descritption, $data['id_graphical_doc']);
            }
            $content = $content . $objet->selectDisplay($mode);
        }
        $rep->closeCursor();
        return $content;
    }

}
