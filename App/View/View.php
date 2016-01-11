<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;
$from_record_num = ($records_per_page * $page) - $records_per_page;

$conn = new Controller();

//show message and call function depending on selected action (save, delete, edit)
if($_GET['m'] == 'save') {
    $save_to_db = $conn->setInfo();

    if($save_to_db) {

        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
        echo "Saved to database.";
        echo "</div>";

    } else {

        echo "<div class='alert alert-danger col-md-6 col-md-offset-3'><strong>Unable to save the data.</strong> Check if the input for Amount is number greater then zero and try again.</div>";
    }
}
elseif ($_GET['m'] == 'delete') {
    $id = $_GET['id'];
    $conn->id = $id;

    $delete_row = $conn->delete();

    if($delete_row) {

        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
        echo "Row is deleted from database.";
        echo "</div>";

    } else {

       echo "<div class='alert alert-danger col-md-6 col-md-offset-3'><strong>Unable to delete the data.</strong> 
                Try again.</div>"; 
    }
}

elseif ($_GET['m'] == 'edit') {
    $id = $_GET['id'];
    $conn = new Controller();
    $conn->id = $id;
    $conn->SetToUpdate();

    $update_row = $conn->update();

    if($update_row) {
        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
        echo "Row is updated.";
        echo "</div>";

    } else {

        echo "<div class='alert alert-danger col-md-6 col-md-offset-3'><strong>Unable to update the data.</strong> Check if you input correct data and try again.</div>"; 
    }
}

$conn->getAllRows($from_record_num, $records_per_page);
$rows = $conn->rows;

$num = $rows->rowCount();

if($num>0) {
    echo "<div>";
    echo "<table class='table table-bordered table-hover'>";
    echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Car model</th>";
        echo "<th>Drive</th>";
        echo "<th>Annual mileage</th>";
        echo "<th>Tottal costs ($)</th>";
        echo "<th>#</th>";
    echo "</tr>";

    while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
             echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$Automobil}</td>";
                echo "<td>{$Pogon}</td>";
                echo "<td>{$Broj_kmh}</td>";
                echo "<td>{$Ukupni_troskovi}</td>";
                echo "<td>";
                    echo "<a href='index.php?id={$id}&o=ask'><span class='glyphicon glyphicon-remove'></span> DEL</a> | ";
                    echo "<a href='index.php?id={$id}&o=upd'><span class='glyphicon glyphicon-edit'></span> EDIT</a>";
                echo "</td>";
            echo "</tr>";
    };

    echo "</table>";
    echo "</div>";

include_once 'Pagination.php';

}

else {

    echo "<h4 class='text-center'>You have not saved any data to database.</h4>";
}
