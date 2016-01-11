<?php

include 'App/DB/DB_Conn.php';

class Model {

    //database connection
    protected $_db;

    //public vars for storing data
    public $name;
    public $oneRow;

    public $type;
    public $oneType;

    public $id;
    public $kmh;
    public $cost;
    public $car;
    public $drive;

    public $allRows;

    //connection to a database
    public function __construct() {
        $this->_db = DB_Conn::getConnection();
    }

    public function login($user, $pass) {

        $query = "SELECT username, password FROM users WHERE username = ?";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $user);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $hash = $row['password'];

        if($row['username'] == $user && password_verify($pass, $hash)) {

            return true;

        } else {

            return false;
        }
    }

    public function register($username, $password) {

        $options = [
            'cost' => 10,
        ];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT, $options);

        $query = "INSERT INTO users SET username = ?, password = ?";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $hashed_password);

        if($stmt->execute()) {

            return true;
            
        } else {

            return false;
        }
    }

    //retrive all cars from table auti and save data to public var $oneRow
    public function getName() {

        $query = "SELECT Naziv FROM auti";

        $stmt = $this->_db->prepare($query);
        $stmt->execute();

        $this->oneRow = $stmt;
    }

    //retrive data about selected car from table auti and save this data to public var $oneRow
    public function readOne() {

        $query = "SELECT ID, Naziv, Tip, JM, Potrosnja FROM auti WHERE Naziv = ?";

        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $this->name);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->oneRow = $row;
    }

    //retrive data about drive option for selected car from table energenti and save data to public var $oneTip
    public function readType() {

        $query = "SELECT Pogon, JM, Cijena FROM energenti WHERE Pogon = ?";

        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $this->type);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->oneType = $row;
    }

    //retrive data about selected car from autosave table and send data to public vars
    public function getInfoById() {

        $query = "SELECT Automobil, Pogon, Broj_kmh, Ukupni_troskovi FROM autosave WHERE id = ?";

        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);

        $this->car = $Automobil;
        $this->drive = $Pogon;
        $this->kmh = $Broj_kmh;
        $this->cost = $Ukupni_troskovi;
    }

    //save data into table autosave 
    public function save_info() {

        $query = "INSERT INTO autosave SET user_id = ?, Automobil = ?, Pogon = ?, Broj_kmh = ?, Ukupni_troskovi = ?";

        $stmt = $this->_db->prepare($query);

        $username = $_SESSION['username'];
        $user_id = $this->get_user_id($username);

        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $this->car);
        $stmt->bindParam(3, $this->drive);
        $stmt->bindParam(4, $this->kmh);
        $stmt->bindParam(5, $this->cost);

        if($stmt->execute()) {

            return true;

        } else {

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

        $stmt->bindParam(':Automobil', $this->car);
        $stmt->bindParam(':Pogon', $this->drive);
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

        $username = $_SESSION['username'];
        $user_id = $this->get_user_id($username);

        $query = "SELECT
                    id, Automobil, Pogon, Broj_kmh, Ukupni_troskovi
            FROM autosave WHERE user_id = ? 
            LIMIT
                {$from_record_num}, {$records_per_page}";

        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $user_id);
        $stmt->execute();

        $this->allRows = $stmt;
    }

    //get user id
    public function get_user_id($username) {

        $query = "SELECT user_id FROM users WHERE username = ?";

        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->execute();

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            return $row['user_id'];
        } else {

            return false;
        }
    }

    //count rows for pagination
    public function countAll() {

        $query = "SELECT id From autosave WHERE user_id = ?";

        $stmt = $this->_db->prepare($query);

        $username = $_SESSION['username'];
        $user_id = $this->get_user_id($username);

        $stmt->bindParam(1, $user_id);
        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }
} 