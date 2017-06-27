<?php

class searchChi {

    private $_image;
    private $_title;
    private $_refDeGroupe;
    private $_description;
    private $_objId;

    function __construct($image, $title, $refDeGroupe, $description, $objId) {
        $this -> _image = $image;
        $this -> _title = $title;
        $this -> _refDeGroupe = $refDeGroupe;
        $this -> _description = $description;
        $this -> _objId = $objId;
    }

    function setObject($image, $title, $refDeGroupe, $description, $objId) {
        $this -> _image = $image;
        $this -> _title = $title;
        $this -> _refDeGroupe = $refDeGroupe;
        $this -> _description = $description;
        $this -> _objId = $objId;
    }

    public function listDisplay() {
        $content = "";
        
        $content = $content . ""
                
                . "<div id=\"listChi\" class=\"row\">"
                    . "<div class=\"col-xs-5 col-md-5 col-lg-3 col-sm-5\" id=\"\">"
                        . "<img src=\"$this->_image\"/>"
                    . "</div>"
                    . "<div class=\"col-md-7 col-lg-9 col-sm-7\" >"
                        . "<h3>$this->_title</h3>"
                        . "<p>$this->_description</p>"
                        . "<form action = \"detailsGroupe.php\" method = \"post\"><button type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" style = \"margin-right: 10px;\" class = \"btn btn-warning\" role = \"button\">Voir détails...</button></form><br /><br />"
                    . "</div>"
                . "</div>";
            //    . "<form action = \"#\" method = \"post\"><button type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" style = \"float: right; margin-right: 10px;\" class = \"btn btn-warning\" role = \"button\">Voir détails...</button></form><br /><br />";
        
        return $content;
    }

}
