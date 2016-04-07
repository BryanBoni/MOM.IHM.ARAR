<?php
class object {

    private $image;
    private $title;
    private $description;
    
    function __construct($image, $title, $description) {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
    }

}
