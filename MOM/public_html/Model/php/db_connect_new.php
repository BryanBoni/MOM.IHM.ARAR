<?php

//Import


class db_connect_new {

    private $dbName;
    private $userName;
    private $host;
    private $passwd;

    function __construct() {
        $this->dbName = 'ceramom';
        $this->userName = 'root';
        $this->host = 'localhost';
        $this->passwd = 'bnbj?makom';
    }

    /**
     * Here is the function to open a connection to the database
     * 
     * @return string|\PDO
     */
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
    
    /**
     * Used to retrive a vue of the input request form the database.
     * 
     * @param (type : String) $keyword : use in the SQL request for the where parameter.
     * @return type
     */
    public function requestGroup($requeteSQL){

        $pdodb = $this->connect();
        
        $rep = $pdodb->prepare($requeteSQL);

        $rep->execute();

        return $rep;
        
    }

}