<?php

class detailGroupeTools{
    private $_isStats = false;
    private $_isPhoto = false;
    private $_isDessin = false;
    private $_isBino = false;
    private $_isSpectro = false;
    
    public $_stats = array(); //tab 
    public $_photo = array(); //tab
    public $_dessin = array(); //tab
    public $_bino = array(); //tab
    public $_spectro = array(); //tab
    
    /**
     * 
     * @param type $_isStats
     * @param type $_isPhoto
     * @param type $_isDessin
     * @param type $_isBino
     * @param type $_isSpectro
     */
    function __construct($_isStats, $_isPhoto, $_isDessin, $_isBino, $_isSpectro) {
        $this->_isStats = $_isStats;
        $this->_isPhoto = $_isPhoto;
        $this->_isDessin = $_isDessin;
        $this->_isBino = $_isBino;
        $this->_isSpectro = $_isSpectro;
    }
    
    /**
     * 
     * @param type $pdobdd
     */
    function Display($pdobdd){
        $content = "";
        if($this->_isStats == true){
            $content .= ""
                    . "<div id=\"gppCaseStats\" class=\"row\">" //gppCaseStats
                        . "<center><div>"
                    
                            . "<table class=\"\">"
                                . "<thead>"
                                    . "<tr>"
                                        . "<th><a>Tableau complet</a></th> <th>CaO</th> <th>Fe<SUB>2</SUB>O<SUB>3</SUB></th> <th>TiO<SUB>2</SUB></th> <th>K<SUB>2</SUB>O</th> <th>SiO<SUB>2</SUB></th> <th>Al<SUB>2</SUB>O<SUB>3</SUB></th> <th>MgO</th> <th>MnO</th> <th>Na<SUB>2</SUB>O</th> <th>P<SUB>2</SUB>0<SUB>5</SUB></th> <th>Zr</th> <th>Sr</th> <th>Rb</th> <th>Zn</th> <th>Cr</th> <th>Ni</th> <th>La</th> <th>Ba</th> <th>V</th> <th>Ce</th> <th>Y</th> <th>Th</th> <th>Pb</th> <th>Cu</th>"
                                    . "</tr>"
                                . "<thead>"
                                . "<tbody>"
                                    . "<tr>"
                                        . "<td><b>Moyenne (m)</b></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>"
                                    . "</tr>"
                                    . "<tr>"
                                        . "<td><b>Ecart-type (&sigma;)</b></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>"
                                    . "</tr>"
                                    . "<tr>"
                                        . "<td><b>Ecart-type réduit <br />(&sigma; / m)</b></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>"
                                    . "</tr>"
                                . "</tbody>"
                            . "</table>"          
                        . "</div></center>"
                    . "</div>";
        }
        
        $content .= ""
                    . "<div class=\"row\">";
        
        //PHOTO CONTENT
        if($this->_isPhoto){
            $content .= ""
                        . "<div class=\"col-sm-6\" id=\"gppCase\">"
                            . "<div class=\"zoom-gallery\">";
            $nbPic = 16;
            for($it = 1; $it < $nbPic; $it++){//(temporary) for each image found, add it to content
                $content = $content 
                                . "<a href=\"../Ressources/tesson.JPG\" data-source=\"../Ressources/tesson.JPG\" title=\"LEV730\" class=\"col-lg-4 col-md-6 col-sm-6 col-xs-6\">"
                                    . "<img src=\"../Ressources/tesson.JPG\" class = \"img_file_gallerie\" />"
                                . "</a>";
            }
            $content .= ""
                            . "</div>"
                        . "</div>";
        }
        
        //DESSIN CONTENT
        if($this->_isDessin){
            $content .= ""
                        . "<div class=\"col-sm-6\" id=\"gppCase\">"
                            . "<div class=\"zoom-gallery\">";
            $nbPic = 16;
            for($it = 1; $it < $nbPic; $it++){//(temporary) for each image found, add it to content
                $content = $content 
                                . "<a href=\"https://encyclopedieberbere.revues.org/docannexe/image/1996/img-12-small480.png\" data-source=\"https://encyclopedieberbere.revues.org/docannexe/image/1996/img-12-small480.png\" title=\"LEV730-Dessin\" class=\"col-lg-4 col-md-6 col-sm-6 col-xs-6\">"
                                    . "<img src=\"https://encyclopedieberbere.revues.org/docannexe/image/1996/img-12-small480.png\" class = \"img_file_gallerie\" />"
                                . "</a>";
            }
            $content .= ""
                            . "</div>"
                        . "</div>";
        }
        
        //Bino CONTENT
        if($this->_isBino){
            $content .= ""
                        . "<div class=\"col-sm-6\" id=\"gppCase\">"
                            . "<div class=\"zoom-gallery\">";
            $nbPic = 16;
            for($it = 1; $it < $nbPic; $it++){//(temporary) for each image found, add it to content
                $content = $content 
                                . "<a href=\"../Ressources/CBA513_3_photobino.jpg\" data-source=\"../Ressources/CBA513_3_photobino.jpg\" title=\"CBA513_3_photobino\" class=\"col-lg-4 col-md-6 col-sm-6 col-xs-6\">"
                                    . "<img src=\"../Ressources/CBA513_3_photobino.jpg\" class = \"img_file_gallerie\" />"
                                . "</a>";
            }
            $content .= ""
                            . "</div>"
                        . "</div>";
        }
        
        
        //
        //Spectro Content
        if($this->_isSpectro){
            $content .= ""
                        . "<div class=\"col-sm-6\" id=\"gppCase\">"
                            . "<div class=\"zoom-gallery\">";
            $nbPic = 16;
            for($it = 1; $it < $nbPic; $it++){//(temporary) for each image found, add it to content
                $content = $content 
                                . "<a href=\"../Ressources/C3282X20LN.png\" data-source=\"../Ressources/C3282X20LN.png\" title=\"C3282X20LN\" class=\"col-lg-4 col-md-6 col-sm-6 col-xs-6\">"
                                    . "<img src=\"../Ressources/C3282X20LN.png\" class = \"img_file_gallerie\" />"
                                . "</a>";
            }
            $content .= ""
                            . "</div>"
                        . "</div>";
        }
        
        
        $content .= ""
                    . "</div>";
        
        return $content;
    }
    
    /*
     * 
     */
    public function echDisplay($mode){
       $content = "";
       
       
        
       return $content;
    }
    /**
     * 
     * @param type $_isStats
     * @param type $_isPhoto
     * @param type $_isDessin
     * @param type $_isBino
     * @param type $_isSpectro
     */
    function set_all($_isStats, $_isPhoto, $_isDessin, $_isBino, $_isSpectro) {
        $this->_isStats = $_isStats;
        $this->_isPhoto = $_isPhoto;
        $this->_isDessin = $_isDessin;
        $this->_isBino = $_isBino;
        $this->_isSpectro = $_isSpectro;
    }
    
    
    
    function get_isStats() {
        return $this->_isStats;
    }

    function get_isPhoto() {
        return $this->_isPhoto;
    }

    function get_isDessin() {
        return $this->_isDessin;
    }

    function get_isBino() {
        return $this->_isBino;
    }

    function get_isSpectro() {
        return $this->_isSpectro;
    }

    function set_isStats($_isStats) {
        $this->_isStats = $_isStats;
    }

    function set_isPhoto($_isPhoto) {
        $this->_isPhoto = $_isPhoto;
    }

    function set_isDessin($_isDessin) {
        $this->_isDessin = $_isDessin;
    }

    function set_isBino($_isBino) {
        $this->_isBino = $_isBino;
    }

    function set_isSpectro($_isSpectro) {
        $this->_isSpectro = $_isSpectro;
    }



}

