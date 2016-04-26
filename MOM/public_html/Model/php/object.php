<?php
class object {

    private $_image;
    private $_title;
    private $_description;
    private $_objId;
    
    
    function __construct($_image, $_title, $_description, $objId) {
        $this->_image = $_image;
        $this->_title = $_title;
        $this->_description = $_description;
        $this->_objId = $objId;
    }

        
    function setObject($image, $title, $description){
        $this-> _image = $image;
        $this-> _title = $title;
        $this-> _description = $description;
    }

    
    public function minDisplay(){
        $content = "";
        
        $content = $content . ""
                
                .   "<div class = \" col-xs-6 col-sm-6 col-md-4 col-lg-3\" >"
                .       "<div class = \"thumbnail\">"
                .           "<img src = " . $this -> _image . "></img>"
                .           "<div class = \"caption\">"
                .               "<h3>" . $this -> _title . "</h3>"
                .               "<p>" . $this -> _description ."</p>"
                .               "<p><a href = \"details.php?ObjectId=\"".$this -> _objId."\"\" class = \"btn btn-primary\" role = \"button\">Voir détails...</a></p>"
                .           "</div>"
                .       "</div>"
                .   "</div>"
                ;
        return $content;
    }
    
    public function listDisplay(){
        $content = "";
        
        $content = $content . ""
                . "<div id = \"listDisplay\"><div class = \"row\">"
                .   "<div class = \"col-sm-2\"><img src = " . $this -> _image . "></img></div>"
                .   "<div class = \"col-sm-10\">"
                .       "<h4>" . $this -> _title . "</h4><br />"
                .       "<p>" . $this -> _description . "</p>"
                .   "</div>"
                . "</div></div>";
        return $content;
    }
}
