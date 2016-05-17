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

        
    function setObject($image, $title, $description, $id){
        $this-> _image = $image;
        $this-> _title = $title;
        $this-> _description = $description;
        $this -> _objId = $id;
    }
    
    public function selectDisplay($mode){
        $content = "";
        switch ($mode){
            case "List" :
                $content = $this ->listDisplay();
                break;
            case "ImageText":
                $content = $this -> minDisplay();
                break;
            case "Image":
                break; 
        }
        return $content;
    }

    
    public function minDisplay(){
        $content = "";
        
        $content = $content . ""
                
                .   "<div class = \" col-xs-12 col-sm-6 col-md-4 col-lg-3\" id = \"minDisplay\">"
                .       "<div class = \"thumbnail\">"
                .           "<img src = " . $this -> _image . "></img>"
                .           "<div class = \"caption\">"
                .               "<h3>" . $this -> _title . "</h3>"
                .               "<p>" . $this -> _description ."</p>"
                .               "<p><form action = \"details.php\" method = \"post\"><button type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" class = \"btn btn-primary\" role = \"button\">Voir détails...</button></form></p>"
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
                .   "<div class = \"col-md-4 col-lg-3 col-sm-5\" id = \"this\">"
                .       "<img src = " . $this -> _image . "></img>"
                .   "</div>"
                .   "<div class = \"col-md-8 col-lg-9 col-sm-7\">"
                .       "<h4>" . $this -> _title . "</h4>"
                .       "<p>" . $this -> _description . "</p>"
                .   "<form action = \"details.php\" method = \"post\"><button type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" style = \"float: right;\" class = \"btn btn-primary\" role = \"button\">Voir détails...</button></form>"
                .   "</div>"
                
                . "</div>"
                
                . "</div><br />"
                ;
        return $content;
    }
}
