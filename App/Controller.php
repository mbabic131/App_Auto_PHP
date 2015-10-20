<?php

include 'Model.php';

class Controller {

    //variables for storing user input or selection
    public  $naziv;
    public  $tip;
    public  $model;
    public  $stmt;

    public  $id;
    public  $kmh;
    public  $cost;
    public  $ime;
    public  $pogon;

    public $rows;

    public function __construct() {
        $this->model = new Model();
    }

    //function that calls getNaziv() from Model class, returns a list of all cars in a database
    public function getName() {
        $this->model->getNaziv();
        $this->stmt = $this->model->oneRow;
    }

    //function that calls readOne() from Model class, returns one row from database
    public function getOne() {
        $this->model->naziv = $this->naziv;
        $this->model->readOne();
    }

    //function that calls readTip() from Model class, returns one row from energenti table 
    public function getTip() {
        $this->model->tip = $this->tip;
        $this->model->readTip();
    }

    //retrieve data from user input, send data to Model class and call save_info() function 
    public function setInfo() {
        $this->kmh = htmlspecialchars($_POST['kilometar']);
        $this->cost = htmlspecialchars( $_POST['ukupniTroskovi']);
        $this->ime = $_POST['ime'];
        $this->pogon = $_POST['pogon'];

        $this->model->cost = $this->cost;
        $this->model->kmh = $this->kmh;
        $this->model->ime = $this->ime;
        $this->model->pogon = $this->pogon;

        $this->model->save_info();
    }

    //function that call readAll() from Model class, retrive all data from table autosave
    public function getAllRows($from_record_num, $records_per_page) {
        $this->model->readAll($from_record_num, $records_per_page);
        $this->rows = $this->model->allRows;
    }

    //delete a row in a autosave table
    public function delete() {
        $this->model->id = $this->id; //id of row to be deleted
        $this->model->deleteRow();
    }

    //retrieve data of a row to be updated
    public function setToUpdate() {
        $this->model->id = $this->id; //id or row to be updated

        $this->model->getInfoById(); 
        $this->ime = $this->model->ime;
        $this->pogon = $this->model->pogon;
        $this->kmh = $this->model->kmh;
        $this->cost = $this->model->cost;
    }

    //retrive data from user input and send data to Model class and updateRow() function
    public function update() {
        $this->model->kmh = $_POST['kilometri_auto'];
        $this->model->cost = $_POST['troskovi_auto'];
        $this->model->ime = $_POST['naziv_auto'];
        $this->model->pogon = $_POST['pogon_auto'];

        $this->model->updateRow(); //function that updates row
    }
}