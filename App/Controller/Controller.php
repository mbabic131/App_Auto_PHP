<?php

include 'App/Model/Model.php';

class Controller {

    //variables for storing user input or selection
    public  $name;
    public  $type;
    public  $model;
    public  $stmt;

    public  $id;
    public  $kmh;
    public  $cost;
    public  $car;
    public  $drive;

    public $rows;

    public function __construct() {
        //instatitation of new Model object
        $this->model = new Model();
    }

    //function that calls getname() from Model class, returns a list of all cars in a database
    public function getName() {
        $this->model->getName();
        $this->stmt = $this->model->oneRow;
    }

    //function that calls readOne() from Model class, returns one row from database
    public function getOne() {
        $this->model->name = $this->name;
        $this->model->readOne();
    }

    //function that calls readTip() from Model class, returns one row from energenti table 
    public function getType() {
        $this->model->type = $this->type;
        $this->model->readType();
    }

    //retrieve data from user input, send data to Model class and call save_info() function 
    public function setInfo() {
        $this->kmh = htmlspecialchars($_POST['kilometar']);
        $this->cost = htmlspecialchars( $_POST['ukupniTroskovi']);
        $this->car = $_POST['ime'];
        $this->drive = $_POST['pogon'];

        $this->model->cost = $this->cost;
        $this->model->kmh = $this->kmh;
        $this->model->car = $this->car;
        $this->model->drive = $this->drive;

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
        $this->car = $this->model->car;
        $this->drive = $this->model->drive;
        $this->kmh = $this->model->kmh;
        $this->cost = $this->model->cost;
    }

    //retrive data from user input and send data to Model class and call updateRow() function
    public function update() {
        $this->model->kmh = $_POST['car_kmh'];
        $this->model->cost = $_POST['car_costs'];
        $this->model->car = $_POST['car_name'];
        $this->model->drive = $_POST['car_drive'];

        $this->model->updateRow(); //function that updates row
    }
}