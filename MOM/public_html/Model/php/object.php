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
                
                .   "<div class = \" col-xs-6 col-sm-6 col-md-4 col-lg-3\" id = \"imageDisplay\">"
                .       ""
                .       "<div class = \"thumbnail\"><center>"
                .           ""
                .           "<h2 style=\"margin: 0px;\">" . $this -> _title . "</h2></center>"
                .           "<img src = " . $this -> _image . "></img>"
                .           "<div class = \"caption\">"
                .               "<p><form action = \"details.php\" method = \"post\"><button style = \"width: 100%;\" type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" class = \"btn btn-primary\" role = \"button\">Voir détails...</button></form></p>"
                .           "</div>"
                .       "</div>"
                . ""
                .   "</div>"
                ;
        return $content;
    }
    
    public function minDisplay(){
        $content = "";
        
        $content = $content . ""
                
                .   "<div class = \"col-xs-offset-1 col-xs-10 col-sm-6 col-sm-offset-0 col-md-4 col-lg-3\" id = \"minDisplay\">"
                .       "<div class = \"thumbnail\">"
                .           "<img src = " . $this -> _image . "></img>"
                .           "<div class = \"caption\">"
                .               "<center><h3>" . $this -> _title . "</h3></center>"
                .               "<p style=\"text-align: left;\">" . $this -> _description ."</p>"
                .               "<p id=\"minBtn\"><form action = \"details.php\" method = \"post\"><button type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" class = \"btn btn-primary\" role = \"button\">Voir détails...</button></form></p>"
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
                .   "<div class = \"col-xs-5 col-md-5 col-lg-3 col-sm-5\" id = \"this\">"
                .       "<img src = " . $this -> _image . "></img>"
                .   "</div>"
                .   "<div class = \"col-md-7 col-lg-9 col-sm-7\" style=\"text-align: left; overflow: auto;\">"
                .       "<h4>" . $this -> _title . "</h4>"
                .       "<p>" . $this -> _description . "<br/><br/>"
                .           "<b>Datation : </b><br/>"
                .           "<b>n° Analyses :</b>"
                .       "</p>"
                .   ""
                .   "</div>"
                
                . "</div>"
                
                . "</div><form action = \"details.php\" method = \"post\"><button type = \"submit\" value = \"$this->_objId\" name = \"objectId\" id=\"objectIdBtn\" style = \"float: right; margin-right: 10px;\" class = \"btn btn-primary\" role = \"button\">Voir détails...</button></form><br /><br />"
                ;
        return $content;
    }
}
