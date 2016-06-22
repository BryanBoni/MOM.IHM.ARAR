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
                $content = $this -> listDisplay();
                break;
            case "ImageText":
                $content = $this -> minDisplay();
                break;
            case "Image":
                $content = $this ->imageDisplay();
                break; 
        }
        return $content;
    }

    public function imageDisplay() {
        $content = "";
        
        $content = $content . ""
                
                .   "<div class = \" col-xs-6 col-sm-6 col-md-4 col-lg-3\" id = \"imageDisplay\">"//imageDisplay
                .       ""
                .       "<div class = \"thumbnail\" style = \"margin-bottom: 0px;\"><center>"
                .           ""
                .           "<h3 style=\"margin: 0px; color: #8e3c06;\">" . $this -> _title . "</h3></center>"
                .           "<img src = " . $this -> _image . "></img>"

                .       "</div>"
                .               "<p><form action = \"details.php\" method = \"post\"><button style = \"width: 100%; margin-bottom: 40px;\" type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" class = \"btn btn-primary\" role = \"button\">Voir détails...</button></form></p>"
                . ""
                .   "</div>"
                ;
        return $content;
    }
    
    public function minDisplay(){
        $content = "";
        
        $content = $content . ""
                
                .   "<div class = \"col-xs-offset-1 col-xs-10 col-sm-6 col-sm-offset-0 col-md-4 col-lg-3\" id = \"minDisplay\">"
                .       "<div class = \"thumbnail\" style = \"margin-bottom: 10px;\">"
                .           "<img src = " . $this -> _image . "></img>"
                .           "<div class = \"caption\">"
                .               "<center><b><h4>" . $this -> _title . "</h4></b></center>"
                .               "<p style=\"text-align: left;\">" . $this -> _description ."</p>"
                .           "</div>"
                .       "</div>"
                .               "<form action = \"details.php\" method = \"post\"><button style = \"width: 100%; margin-bottom: 40px;\" type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" class = \"btn btn-primary\" role = \"button\">Voir détails...</button></form>"
                
                .   "</div>"
                ;
        return $content;
    }
    
    public function listDisplay(){
        $content = "";
        
        $content = $content . ""
                . "<div id = \"listDisplay\"><div class = \"row\">"
                .   "<div class = \"col-xs-5 col-md-5 col-lg-3 col-sm-5\" id = \"this\">"
                .       "<img src = " . $this -> _image . "></img>"
                .   "</div>"
                .   "<div class = \"col-md-7 col-lg-9 col-sm-7\" style=\"height: 150px; text-align: left; overflow: auto;\">"
                .       "<h4>" . $this -> _title . "</h4>"
                .       "<p>" . $this -> _description . "<br/>"
                .       "</p>"
                .   ""
                .   "</div>"
                
                . "</div>"
                
                . "</div><form action = \"details.php\" method = \"post\"><button type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" style = \"float: right; margin-right: 10px;\" class = \"btn btn-primary\" role = \"button\">Voir détails...</button></form><br /><br />"
                ;
        return $content;
    }
}
