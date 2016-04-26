<?php

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
        /* $dbConnect = mysql_connect($this->host, $this->userName, $this->passwd);

          if ($dbConnect) {
          $db = mysql_select_db($this->dbName, $dbConnect);
          if (!$db) {
          die("The database " . $this->dbName . " cannot be accessed!");
          }
          mysql_query("set names 'utf8'", $dbConnect);
          } else {
          die("Connexion impossible / Connection failed!");
          } */

        try {
            $pdodb = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->userName, $this->passwd);
            $pdodb->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            $msg = 'Erreur PDO dans ' . $e->getFile() . $e->getLine() . ' :' . $e->getMessage();
            return $msg;
        }

        return $pdodb;
    }

    public function selection($keyword) {
        $content = "";
       // $pdodb = $this->connect();
         try {
          $pdodb = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->userName, $this->passwd);
          $pdodb->exec('SET NAMES utf8');

          } catch (PDOException $e) {
          $msg = 'Erreur PDO dans ' . $e->getFile() . $e->getLine() . ' :' . $e->getMessage();
          return $msg;
          } 

          
         // $rep = $pdodb ->query("SELECT * FROM atelier");
        
        $rep = $pdodb->query("SELECT s.nom, si.name_site, t.name_town, r.name_region, c.name_country FROM sample_new s LEFT JOIN provenance p ON s.id_provenance=p.id LEFT JOIN location l ON p.id_location=l.id LEFT JOIN site si ON l.id_site=si.id LEFT JOIN town t ON l.id_town=t.id LEFT JOIN region r ON l.id_region=r.id LEFT JOIN country c ON l.id_country=c.id WHERE t.name_town like '%$keyword%' or r.name_region like '%$keyword%' or c.name_country like '%$keyword%'"); // or s.name_site like '%$keyword%' or t.name_provenance  like '%$keyword%'
        
        while($data = $rep -> fetch()){
            foreach ($data as $value) {
                $content = $content . $value . "<br />";
            }
        }        
        /*
        foreach (array_expression as $key => $value) {
            //commandes
        }*/
        $rep->closeCursor();
        return $content;
    }
}
