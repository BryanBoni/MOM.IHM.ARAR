<?php

class filer {

    function __construct() {
        
    }

    function createFile() {
        $content = "";
        if (mkdir("../Ressources/temp")) {
            $content = $content . "File create";
        } else {
            $content = $content . "Fail file creation";
        }
        return $content;
    }
    
    function deleteFile() {
        
    }

}
