<?php

include_once (dirname(dirname(__FILE__)) . "/php/db_connect_new.php");
include_once (dirname(dirname(__FILE__)) . "/php/searchChi.php");

class db_traitement_group{
    function __construct() {
    }
    
    /**
     * 
     * @param type $rep
     * @return type
     */
    public function doGroupList($rep, $isConnect, $isOnBiblio){
        $content = "";
        //$accesDb = new db_connect();
        $tempContent = "";
        $nbGroupRes = 0;
        $nom = "";
        $searchChi = new searchChi(" ", " ", " ", " ", " ", " "); 

        $rep->execute();
        
        while($data = $rep->fetch(PDO::FETCH_ASSOC)){
            if ($isOnBiblio == true) {
                $nom = $data['nomGrp'];
            } else {
                $nom = $data['nomSGrp'];
            }

            $searchChi ->setObject(
                    $data['urlGrp'],
                    $nom,
                    $data['grpResum'],
                    $data['idGrp'],
                    $data['nbElt'],
                    "Super-groupe");

            $tempContent .= $searchChi->listDisplay($isConnect); 
            
            $nbGroupRes++;
                
        }
        
        $content .= "<p style=\"margin-left: 10px; text-align: left;\">Groupes trouvés :<b style=\"color: black;\"> $nbGroupRes</b></p>";
        
        $content .= $tempContent;
        $rep->closeCursor();
        return $content;
    }
    
    /**
     * 
     * @param type $rep
     * @return string
     */
    public function doGroupEchantillionList($rep){
        $content = "";
        
        $rep->execute();
        $data = $rep->fetch();
        
        $content = $content
                    . "<div class=\"col-lg-6\"><div class=\"row\" style=\"margin: 10px 10px 0px 10px;\">"
                    . "<div class=\"row\" id=\"groupeListElement\">"
                        . "<div class=\"col-sm-3 col-xs-12\"><img src=\"" . $data['url'] . "\" /></div>"
                        . "<div class=\"col-sm-9 col-xs-12\">"
                            . "<p style=\"text-align: justify; color: black; max-height: 100px; overflow: auto;\">" . $data['description'] . "</p>"
                            . "<p style=\"text-align: justify; color: black; max-height: 100px; overflow: auto;\">" . $data['location'] . "</p>" //localisation dans l'armoire
                        . "</div>"    
                    . "</div>"
                    . "<div class=\"col-xs-12\" style=\"margin-bottom: 10px; padding: 0px;\">"
                        . "<form action = \"/details.php?" . $data['echId'] . "\" method = \"post\"><button style=\"width: 100%; border-radius: 0px 0px 10px 10px;\" type=\"submit\" class=\"btn btn-warning\" role=\"button\">Voir détails</button></form>"
                    . "</div>"
                    . "</div></div>";
        
        $rep->closeCursor();
        
        return $content;
    }
    
   /**
    * 
    * @param type $rep
    * @return type
    */
   public function doSuperGroupDetail($rep){
       
       $rep->execute();
       $data = $rep->fetch();
       
       $rep->closeCursor();
       return $data;
   }
   
   /**
    * 
    * @param type $rep
    * @return type
    */
   public function doGroupDetail($rep){
       $rep->execute();
       $data = $rep->fetch();
       
       $rep->closeCursor();
       return $data;
   }
}