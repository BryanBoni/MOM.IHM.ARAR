<?php

//Import
include_once (dirname(dirname(__FILE__)) . "/php/object.php");

class db_connect {

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
    /**
     * TODO : complete the request for the function dataBase($rep, $objet, $mode, $nbPage) 
     * in db_traitement.php
     * 
     * @param type $keyword
     * @param type $start
     * @param type $stop
     * @return type
     */
    public function selection($keyword, $start, $stop) {
        /*
          used to access the database and prepare a query to it,
          return this query.
         */
        $pdodb = $this->connect();
        $stop = $stop + 50;
        $requete = "SELECT DISTINCT s.id AS id_sample, s.name as nameSample, p.workshop as workshopPorv, p.museum as museumProv, p.excavation as excavationProv, d.dating_general as sampleDatingGeneral, d.dating_precise as sampleDP, descr.coating as sampleCoating, descr.decoration as decoration, descr.form as form, gd.url_doc as url_document
                FROM sample s 
                LEFT JOIN provenance p ON p.id=s.id_provenance
                LEFT JOIN location loc_p ON loc_p.id=p.id_location
                LEFT JOIN site sp ON sp.id=loc_p.id_site
                LEFT JOIN town tp ON tp.id=loc_p.id_town
                LEFT JOIN region rp ON rp.id=loc_p.id_region
                LEFT JOIN country cp ON cp.id=loc_p.id_country
                LEFT JOIN description descr ON descr.id=s.id_description
                LEFT JOIN dating d ON d.id=s.id_dating
                LEFT JOIN category c ON c.id=s.id_category
                LEFT JOIN link_gd_to_sample lgts ON lgts.id_sample=s.id
            	LEFT JOIN graphical_document gd ON gd.id=lgts.id_gd
                WHERE s.name like '%$keyword%' or p.workshop like '%$keyword%' or p.museum like '%$keyword%' or p.excavation like '%$keyword%'  or d.dating_general like '%$keyword%' or d.dating_precise like '%$keyword%' or descr.coating like '%$keyword%' or descr.decoration like '%$keyword%' or descr.form like '%$keyword%' AND s.id IS NOT NULL AND gd.doc_par_defaut=1
                ORDER BY s.name"
                /*LIMIT $start , $stop"*/;
        /* $rep = $pdodb->query($requete); */
        $rep = $pdodb->prepare($requete);
        return $rep;
    }

    public function count($keyword) {
        $countList = array();
        $pdodb = $this->connect();
        $requete = "SELECT COUNT(*) as count
                    FROM sample s 
                    LEFT JOIN description d ON s.id_description=d.id
                    LEFT JOIN provenance p ON s.id_provenance=p.id 
                    LEFT JOIN location l ON p.id_location=l.id 
                    LEFT JOIN site si ON l.id_site=si.id 
                    LEFT JOIN town t ON l.id_town=t.id 
                    LEFT JOIN region r ON l.id_region=r.id 
                    LEFT JOIN country c ON l.id_country=c.id 
                    WHERE t.name_town like '%$keyword%' or r.name_region like '%$keyword%' or c.name_country like '%$keyword%' or si.name_site like '%$keyword%' or p.workshop  like '%$keyword%' or p.museum  like '%$keyword%' or p.private_collection like '%$keyword%' or p.excavation like '%$keyword%' or p.fd_site like '%$keyword%' or p.contact like '%$keyword%' or p.free_description like '%$keyword%'";
        $rep = $pdodb->prepare($requete);


        return $rep;
    }

    public function filter($keyword) {
        /*
          used for the filter menu
         */
        $pdodb = $this->connect();
        $requete = "SELECT s.id, s.free_description, s.nom, si.name_site, t.name_town, r.name_region, c.name_country, d.decoration, d.form, d.typology
                    FROM sample s 
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
                    FROM sample s 
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
        $requete = "SELECT sto.nom as stoNom, po.options as pObj, fm.options as fm, cat.options as cat, s.nom, che.num_chemistry, date.dating_general, date.dating_precise, d.form, d.typology, d.paste, d.decoration, d.coating, d.stamps, d.free_description as descFree
                    FROM sample s
                    LEFT JOIN subsample sub ON s.id=sub.id_sample
                    LEFT JOIN dating date ON s.id_dating=date.id
                    LEFT JOIN chemistry che ON sub.id=che.id_subsample
                    LEFT JOIN description d ON s.id_description=d.id
                    LEFT JOIN firing_mode fm ON d.id_firing_mode=fm.id
                    LEFT JOIN category cat ON s.id_category=cat.id
                    LEFT JOIN link_descr_to_part_object ldp ON d.id=ldp.id_description
                    LEFT JOIN part_object po ON ldp.id_part_object=po.id
                    LEFT JOIN supposed_origin sup1 ON s.id_orsupp1=sup1.id
                    LEFT JOIN storage_outside_laboratory sto ON s.id_storage_outside_lab=sto.id
                    WHERE s.id = " . $id;

        $rep = $pdodb->prepare($requete);

        return $rep;
    }

    public function getChemistry($id) {
        //Get chimical informations from a sample
        $pdodb = $this->connect();
        $requete = "SELECT s.id, che.free_description, che.num_chemistry, che.date_analysis, che.num_elements_analysis, che.method, che.CaO, che.Fe2O3, che.TiO2, che.K2O, che.SiO2, che.Al2O3, che.MgO, che.MnO, che.Na2O, che.P2O5, che.Zr, che.Sr, che.Rb, che.Zn, che.Cr, che.Ni, che.La, che.Ba, che.V, che.Ce, che.Y, che.Th, che.Pb, che.Cu
                    FROM sample s
                    LEFT JOIN subsample sub ON s.id=sub.id_sample
                    LEFT JOIN dating date ON s.id_dating=date.id
                    LEFT JOIN chemistry che ON sub.id=che.id_subsample
                    WHERE s.id = " . $id;

        $rep = $pdodb->prepare($requete);
        return $rep;
    }

    public function getNature($id) {
        $pdodb = $this->connect();
        $requete = "SELECT s.id, s.nom, nat.options
                    FROM sample s
                    LEFT JOIN subsample sub ON s.id=sub.id_sample
                    LEFT JOIN dating date ON s.id_dating=date.id
                    LEFT JOIN chemistry che ON sub.id=che.id_subsample
                    LEFT JOIN nature nat ON sub.id_nature=nat.id
                    WHERE s.id = " . $id;

        $rep = $pdodb->prepare($requete);
        return $rep;
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function getDescription($id) {
        $pdodb = $this->connect();
        $stop = $stop + 50;
        $requete = "SELECT s.id, d.form, d.typology, d.paste
                FROM sample s 
                LEFT JOIN subsample sub ON s.id=sub.id_sample
                LEFT JOIN description d ON s.id_description=d.id
                WHERE s.id=$id";
        /* $rep = $pdodb->query($requete); */
        $rep = $pdodb->prepare($requete);
        return $rep;
    }

    /**
     * 
     * @param type $keyword
     * @return type
     */
    public function groupSelection($keyword) {
        $pdodb = $this->connect();

        $requete = "SELECT gr.name_grpe FROM groups gr";

        $rep = $pdodb->prepare($requete);
        return $rep;
    }

}


//End part Details