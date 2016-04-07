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
        $this -> filterText['Location'] = ["Provenance","Orsupp","Attrib"];
        $this -> filterText['Description'] = ["Cathégorie","Datation"];
        $this -> filterText['N° Analyse'] = ["Chimie","Pétro"];
        $this -> filterText['Groupe de référence'] = ["rien"];
        
        return $this -> filterText;
    }
}
