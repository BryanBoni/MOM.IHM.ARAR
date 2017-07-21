<?php

class searchChi {

    private $_image; // the main picture of the groupe or the first
    private $_title; // the name of the groupe
    //private $_refDeGroupe; //The ref maybe
    private $_description; //the description of the group
    private $_objId; // the id used to identified it on the bdd
    private $_nbElt; // number of element of the groupe
    private $_categorie; // is groupe or super groupe

    /**
     * the constructor for an object displayable on rechGroupeChi.php.
     * 
     * @param type $image
     * @param type $title
     * @param type $description
     * @param type $objId
     * @param type $nbElt
     */
    function __construct($image, $title,/* $refDeGroupe,*/ $description, $objId, $nbElt, $categorie) {
        $this -> _image = $image;
        $this -> _title = $title;
        //$this -> _refDeGroupe = $refDeGroupe;
        $this -> _description = $description;
        $this -> _objId = $objId;
        $this -> _nbElt = $nbElt;
        $this -> _categorie = $categorie;
    }

    /**
     * Used to change all the variable once.
     * 
     * @param type $image
     * @param type $title
     * @param type $description
     * @param type $objId
     * @param type $nbElt
     */
    function setObject($image, $title,/* $refDeGroupe,*/ $description, $objId, $nbElt, $categorie) {
        $this -> _image = $image;
        $this -> _title = $title;
        //$this -> _refDeGroupe = $refDeGroupe;
        $this -> _description = $description;
        $this -> _objId = $objId;
        $this -> _nbElt = $nbElt;
        $this -> _categorie = $categorie;
    }

    /**
     * Used make a display of the data gather from the database for the chemical group 
     * 
     * 
     * @return string
     */
    public function listDisplay($isConnect) {
        $content = "";
        
        $content = $content . ""
                
                . "<div id=\"listChi\" class=\"row\">"
                    . "<div class=\"col-md-5 col-lg-3 col-sm-5 \" id=\"\">"
                        . "<div class=\"zoom-gallery\">"
                            . "<a href=\"" . $this->_image. "\" data-source=\"" . $this->_image. "\" title=\"".$this->_image."\">"
                                . "<img src=\"$this->_image\"/>"
                            . "</a>"
                        . "</div>"
                    . "</div>"
                    . "<div class=\"col-md-7 col-lg-9 col-sm-7\" >"
                        . "<h3>$this->_title</h3>"
                        . "<p>$this->_description</p>";
        if($isConnect == true){
            $content .= "<p><b style=\"color: #8e3c06;\">Catégorie :</b> $this->_categorie</p>";
        }
        
        $content = $content . ""
                        . "<p><b style=\"color: #8e3c06;\">Nombre d'échantillons :</b> $this->_nbElt</p>"
                        . "<form action = \"detailsGroupe.php\" method = \"post\"><button type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" style = \"margin-right: 10px;\" class = \"btn btn-warning\" role = \"button\">Voir détails...</button></form><br /><br />"
                    . "</div>"
                . "</div>";
            //    . "<form action = \"#\" method = \"post\"><button type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" style = \"float: right; margin-right: 10px;\" class = \"btn btn-warning\" role = \"button\">Voir détails...</button></form><br /><br />";
        
        return $content;
    }
    
    function get_categorie() {
        return $this->_categorie;
    }

    function set_categorie($_categorie) {
        $this->_categorie = $_categorie;
    }

        
    function set_image($_image) {
        $this->_image = $_image;
    }

    function set_title($_title) {
        $this->_title = $_title;
    }

    /*function set_refDeGroupe($_refDeGroupe) {
        $this->_refDeGroupe = $_refDeGroupe;
    }*/

    function set_description($_description) {
        $this->_description = $_description;
    }

    function set_objId($_objId) {
        $this->_objId = $_objId;
    }

    function set_nbElt($_nbElt) {
        $this->_nbElt = $_nbElt;
    }


}
