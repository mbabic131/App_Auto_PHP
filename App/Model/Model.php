<?php

include 'App/DB/DB_Conn.php';

class Model {

    //public vars for storing data
    protected $_db;

    public $naziv;
    public $oneRow;

    public $tip;
    public $oneTip;

    public $id;
    public $kmh;
    public $cost;
    public $ime;
    public $pogon;

    public $allRows;

    //connection to a database
    public function __construct() {
        $this->_db = DB_Conn::getConnection();
    }

    //retrive all cars from table auti and save data to public var $oneRow
    public function getNaziv() {

        $query = "SELECT Naziv FROM auti";

        $stmt = $this->_db->prepare($query);
        $stmt->execute();

        $this->oneRow = $stmt;
    }

    //retrive data about selected car from table auti and save this data to public var $oneRow
    public function readOne() {

        $query = "SELECT ID, Naziv, Tip, JM, Potrosnja FROM auti WHERE Naziv = ?";

        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $this->naziv);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->oneRow = $row;
    }

    //retrive data about drive option for selected car from table energenti and save data to public var $oneTip
    public function readTip() {

        $query = "SELECT Pogon, JM, Cijena FROM energenti WHERE Pogon = ?";

        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $this->tip);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->oneTip = $row;
    }

    //retrive data about selected car from autosave table and send data to public vars
    public function getInfoById() {

        $query = "SELECT Automobil, Pogon, Broj_kmh, Ukupni_troskovi FROM autosave WHERE id = ?";

        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);

        $this->ime = $Automobil;
        $this->pogon = $Pogon;
        $this->kmh = $Broj_kmh;
        $this->cost = $Ukupni_troskovi;
    }

    //save data into table autosave 
    public function save_info() {

        $query = "INSERT INTO autosave SET Automobil = ?, Pogon = ?, Broj_kmh = ?, Ukupni_troskovi = ?";

        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $this->ime);
        $stmt->bindParam(2, $this->pogon);
        $stmt->bindParam(3, $this->kmh);
        $stmt->bindParam(4, $this->cost);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //select all data from table autosave
    public function fetchAll() {

        $query = "SELECT id, Automobil, Pogon, Broj_kmh, Ukupni_troskovi FROM autosave";

        $stmt = $this->_db->prepare($query);
        $stmt->execute();

        $this->allRows = $stmt;
    }

    //delete selected row from table autosave
    public function deleteRow() {

        $query = "DELETE FROM autosave WHERE id = ?";

        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($result = $stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //function that updates selected row in autosave table
    public function updateRow() {

        $query = "UPDATE autosave SET Automobil = :Automobil, Pogon = :Pogon, Broj_kmh = :Broj_kmh, Ukupni_troskovi = :Ukupni_troskovi
                    WHERE id = :id";

        $stmt = $this->_db->prepare($query);

        $stmt->bindParam(':Automobil', $this->ime);
        $stmt->bindParam(':Pogon', $this->pogon);
        $stmt->bindParam(':Broj_kmh', $this->kmh);
        $stmt->bindParam(':Ukupni_troskovi', $this->cost);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //retrive data from autosave table and limit rows for pagination
    function readAll($from_record_num, $records_per_page){

        $query = "SELECT
                    id, Automobil, Pogon, Broj_kmh, Ukupni_troskovi
            FROM autosave
            LIMIT
                {$from_record_num}, {$records_per_page}";

        $stmt = $this->_db->prepare($query);
        $stmt->execute();

        $this->allRows = $stmt;
    }

    //count rows for pagination
    public function countAll() {

        $query = "SELECT id From autosave";

        $stmt = $this->_db->prepare($query);
        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }
} 