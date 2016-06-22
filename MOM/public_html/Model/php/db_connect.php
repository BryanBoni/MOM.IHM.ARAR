<?php

//Import
include_once (dirname(dirname(__FILE__)) . "/php/object.php");

class db_connect {

    private $dbName;
    private $userName;
    private $host;
    private $passwd;

    function __construct() {
        $this->dbName = 'ceramom_bis';
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

//Part rechAvc
    public function selection($keyword, $start, $stop) {
        /*
          used to access the database and prepare a query to it,
          return this query.
         */
        $pdodb = $this->connect();
        $stop = $stop + 50;
        $requete = "SELECT DISTINCT wast.options as was, p.atelier, p.excavation, p.museum, date.dating_general, date.dating_precise, d.coating, cat.options as catopt, che.num_chemistry, s.id as objectId, s.free_description, s.nom, si.name_site, t.name_town, r.name_region, c.name_country, d.decoration, d.form, d.typology,  gd.url_doc, lgd.id_graphical_doc
                FROM sample_new s 
                LEFT JOIN subsample sub ON s.id=sub.id_sample
                LEFT JOIN dating date ON s.id_dating=date.id
                LEFT JOIN chemistry che ON sub.id=che.id_subsample
                LEFT JOIN category cat ON s.id_category=cat.id
                LEFT JOIN description d ON s.id_description=d.id
                LEFT JOIN waster wast ON d.id_waster=wast.id
                LEFT JOIN provenance p ON s.id_provenance=p.id 
                LEFT JOIN location l ON p.id_location=l.id 
                LEFT JOIN site si ON l.id_site=si.id 
                LEFT JOIN town t ON l.id_town=t.id 
                LEFT JOIN region r ON l.id_region=r.id 
                LEFT JOIN country c ON l.id_country=c.id 
                LEFT JOIN link_graphical_doc_to_sample lgd ON s.id=lgd.id_sample
                LEFT JOIN graphical_document gd ON lgd.id_graphical_doc=gd.id
                WHERE s.nom like '%$keyword%' or t.name_town like '%$keyword%' or r.name_region like '%$keyword%' or c.name_country like '%$keyword%' or si.name_site like '%$keyword%' or p.workshop  like '%$keyword%' or p.museum  like '%$keyword%' or p.private_collection like '%$keyword%' or p.atelier like '%$keyword%' or p.excavation like '%$keyword%' or p.geolocation like '%$keyword%' or p.contact like '%$keyword%' or p.free_description like '%$keyword%' GROUP BY nom ORDER BY CAST(nom AS UNSIGNED)
                LIMIT $start , $stop";
        /* $rep = $pdodb->query($requete); */
        $rep = $pdodb->prepare($requete);
        return $rep;
    }

    public function count($keyword) {
        $countList = array();
        $pdodb = $this->connect();
        $requete = "SELECT COUNT(*) as c
                    FROM sample_new s 
                    LEFT JOIN description d ON s.id_description=d.id
                    LEFT JOIN provenance p ON s.id_provenance=p.id 
                    LEFT JOIN location l ON p.id_location=l.id 
                    LEFT JOIN site si ON l.id_site=si.id 
                    LEFT JOIN town t ON l.id_town=t.id 
                    LEFT JOIN region r ON l.id_region=r.id 
                    LEFT JOIN country c ON l.id_country=c.id 
                    WHERE t.name_town like '%$keyword%' or r.name_region like '%$keyword%' or c.name_country like '%$keyword%' or si.name_site like '%$keyword%' or p.workshop  like '%$keyword%' or p.museum  like '%$keyword%' or p.private_collection like '%$keyword%' or p.atelier like '%$keyword%' or p.excavation like '%$keyword%' or p.geolocation like '%$keyword%' or p.contact like '%$keyword%' or p.free_description like '%$keyword%'";
        $rep = $pdodb->prepare($requete);
        

        return $rep;
    }

    public function filter($keyword) {
        /*
          used for the filter menu
         */
        $pdodb = $this->connect();
        $requete = "SELECT s.id, s.free_description, s.nom, si.name_site, t.name_town, r.name_region, c.name_country, d.decoration, d.form, d.typology
                    FROM sample_new s 
                    LEFT JOIN description d ON s.id_description=d.id
                    LEFT JOIN provenance p ON s.id_provenance=p.id 
                    LEFT JOIN location l ON p.id_location=l.id 
                    LEFT JOIN site si ON l.id_site=si.id 
                    LEFT JOIN town t ON l.id_town=t.id 
                    LEFT JOIN region r ON l.id_region=r.id 
                    LEFT JOIN country c ON l.id_country=c.id 
                    WHERE t.name_town like '%$keyword%' or r.name_region like '%$keyword%' or c.name_country like '%$keyword%' or si.name_site like '%$keyword%' or p.workshop  like '%$keyword%' or p.museum  like '%$keyword%' or p.private_collection like '%$keyword%' or p.atelier like '%$keyword%' or p.excavation like '%$keyword%' or p.geolocation like '%$keyword%' or p.contact like '%$keyword%' or p.free_description like '%$keyword%'";
        $rep = $pdodb->prepare($requete);
        
        return $rep;
    }

//End part rechAvc
//Part Details

    private function countTreatement() {
        
    }

    public function getIMG($keyword) {
        /*
          used to access the database and prepare a query to it,
          return this query.
         */
        $pdodb = $this->connect();
        $requete = "SELECT s.id, gd.url_doc 
                    FROM sample_new s 
                    LEFT JOIN link_graphical_doc_to_sample lgd ON s.id=lgd.id_sample
                    LEFT JOIN graphical_document gd ON lgd.id_graphical_doc=gd.id
                    WHERE s.id = " . $keyword;

        $rep = $pdodb->prepare($requete);
        $rep->execute();
        return $rep;
    }

    public function getDetail($id) {
        //Get general information from a sample
        $pdodb = $this->connect();
        $requete = "SELECT s.nom, che.num_chemistry, date.dating_general, date.dating_precise
                    FROM sample_new s
                    LEFT JOIN subsample sub ON s.id=sub.id_sample
                    LEFT JOIN dating date ON s.id_dating=date.id
                    LEFT JOIN chemistry che ON sub.id=che.id_subsample
                    LEFT JOIN supposed_origin sup1 ON s.id_orsupp1=sup1.id
                    WHERE s.id = " . $id;

        $rep = $pdodb->prepare($requete);
        
        return $rep;
    }
    
    public function getChemistry($id){
        //Get chimical informations from a sample
        $pdodb = $this->connect();
        $requete = "SELECT s.id, che.free_description, che.num_chemistry, che.date_analysis, che.num_elements_analysis, che.method, che.CaO, che.Fe2O3, che.TiO2, che.K2O, che.SiO2, che.Al2O3, che.MgO, che.MnO, che.Na2O, che.P2O5, che.Zr, che.Sr, che.Rb, che.Zn, che.Cr, che.Ni, che.La, che.Ba, che.V, che.Ce, che.Y, che.Th, che.Pb, che.Cu
                    FROM sample_new s
                    LEFT JOIN subsample sub ON s.id=sub.id_sample
                    LEFT JOIN dating date ON s.id_dating=date.id
                    LEFT JOIN chemistry che ON sub.id=che.id_subsample
                    WHERE s.id = " . $id;

        $rep = $pdodb->prepare($requete);
        return $rep;
    }

    public function getNature($id) {
        $pdodb = $this->connect();
        $requete = "SELECT s.id, s.nom
                    FROM sample_new s
                    LEFT JOIN subsample sub ON s.id=sub.id_sample
                    LEFT JOIN dating date ON s.id_dating=date.id
                    LEFT JOIN chemistry che ON sub.id=che.id_subsample
                    WHERE s.id = " . $id;

        $rep = $pdodb->prepare($requete);
        return $rep;
    }
}

//End part Details