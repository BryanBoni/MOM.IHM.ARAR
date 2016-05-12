<?php
class search {
    private $filterList = array("Location","Description","N° Analyse","Groupe de référence");
    private $filterText = array();
    public function __construct() {
    }
    
    public function getFilterList(){
        return $this -> filterList;
    }
    
    public function getFilterText(){
        $this -> filterText['Location'] = array("Provenance","Origine supposée","Attribution");
        $this -> filterText['Description'] = array("Catégorie","Datation");
        $this -> filterText['N° Analyse'] = array("Chimie","Pétrographie");
        $this -> filterText['Groupe de référence'] = array("rien");
        
        return $this -> filterText;
    }
}
