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

    public function selection() {
        $pdo = $this -> connect();
        /*try {
            $pdodb = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->userName, $this->passwd);
            $pdodb->exec('SET NAMES utf8');
            
        } catch (PDOException $e) {
            $msg = 'Erreur PDO dans ' . $e->getFile() . $e->getLine() . ' :' . $e->getMessage();
            return $msg;
        }*/
        
        $rep = $pdo -> query('SELECT * FROM atelier');
        $content = "id: ".$data["id"]." libelle: ".$data["libelle"];
        while($data = $rep -> fetch()){//got to the next line.
            $content = "id: ".$data["id"]." libelle: ".$data["libelle"];
        }
        $rep -> closeCursor();
        return $content;
    }
}
