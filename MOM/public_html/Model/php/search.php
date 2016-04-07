<?php
class search {
    private $filterList = ["Location","Description","N° Analyse","Groupe de référence"];

    public function __construct() {
    }
    
    public function getFilterList(){
        return $this -> filterList;
    }
}
