<?php
class object {

    private $_image;
    private $_title;
    private $_description;
    
    function __construct($image, $title, $description) {
        $this-> _image = $image;
        $this-> _title = $title;
        $this-> _description = $description;
    }
    
    function setObject($image, $title, $description){
        $this-> _image = $image;
        $this-> _title = $title;
        $this-> _description = $description;
    }

    
    public function minDisplay(){
        $content = "";
        
        $content = $content . ""
                . "<div class = \"row\" id = \"ooo\">"
                .   "<div class = \"col-xs-offset-1 col-xs-3 col-md-4\" >"
                .       "<div class = \"thumbnail\">"
                .           "<img src = " . $this -> _image . "></img>"
                .           "<div class = \"caption\">"
                .               "<h3>" . $this -> _title . "</h3>"
                .               "<p>" . $this -> _description ."</p>"
                .           "</div>"
                .       "</div>"
                .   "</div>"
                . "</div>";
        return $content;
    }
}
