<?php

include_once (dirname(dirname(__FILE__)) . "/php/object.php");

class db_connect {

    private $dbName;
    private $userName;
    private $host; //'localhost';
    //$port = '3316';
    private $passwd;

    function __construct() {
        $this->dbName = 'ceramom_3';
        $this->userName = 'root';
        $this->host = 'localhost';
        $this->passwd = 'ceramom%69';
    }

    public function connect() {
        try {
            $pdodb = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->userName, $this->passwd);
            $pdodb->exec('SET NAMES utf8');
            return $pdodb;
        } catch (PDOException $e) {
            $msg = 'Erreur PDO dans ' . $e->getFile() . $e->getLine() . ' :' . $e->getMessage();
            return $msg;
        }
    }

    public function selection($keyword) {
        /*

         */
        $pdodb = $this->connect();

        $rep = $pdodb->query("SELECT s.free_description, s.nom, si.name_site, t.name_town, r.name_region, c.name_country, d.decoration, d.form, d.typology  
                FROM sample_new s 
                LEFT JOIN description d ON s.id_description=d.id
                LEFT JOIN provenance p ON s.id_provenance=p.id 
                LEFT JOIN location l ON p.id_location=l.id 
                LEFT JOIN site si ON l.id_site=si.id 
                LEFT JOIN town t ON l.id_town=t.id 
                LEFT JOIN region r ON l.id_region=r.id 
                LEFT JOIN country c ON l.id_country=c.id 
                WHERE t.name_town like '%$keyword%' or r.name_region like '%$keyword%' or c.name_country like '%$keyword%' or si.name_site like '%$keyword%' or p.workshop  like '%$keyword%' or p.museum  like '%$keyword%' or p.private_collection like '%$keyword%' or p.atelier like '%$keyword%' or p.excavation like '%$keyword%' or p.geolocation like '%$keyword%' or p.contact like '%$keyword%' or p.free_description like '%$keyword%'");
        return $rep;
    }

    /*private function analyse($rep, $mode) {
        $content = "";
        $objet = new object("../Ressources/objectBeta/fry.png", "", "", 1001);
        $descritption = "";
        while ($data = $rep->fetch()) {
            $descritption = "<b>Description : </b>" . $data['decoration'] . " " . $data['form'] . " " . $data['typology'] . ".<br /><b>Location : </b>" . $data['name_site'] . " , " . $data['name_town'] . " , " . $data['name_region'] . " , " . $data['name_country'] . " , ";
            $objet->setObject("../Ressources/objectBeta/fry.png", $data['free_description'], $descritption);
            $content = $content . $objet -> selectDisplay($mode);
            //$content = $content . $objet -> minDisplay();
           /* if ($mode == "List") {
                $content = $objet->LisDisplay();
            } else if ($mode == "Image&Text") {
                $content = $objet->minDisplay();
            } else {
                $content = $content . "Image ici";
            }*//*
            $content = $content . "<br />";
        }
        $rep->closeCursor();
        return $content;
    }*/

}
