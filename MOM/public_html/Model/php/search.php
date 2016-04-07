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
        $this -> filterText['Location'] = array("Provenance","Orsupp","Attrib");
        $this -> filterText['Description'] = array("Cathégorie","Datation");
        $this -> filterText['N° Analyse'] = array("Chimie","Pétro");
        $this -> filterText['Groupe de référence'] = array("rien");
        
        return $this -> filterText;
    }
}
