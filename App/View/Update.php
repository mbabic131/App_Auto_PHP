<?php

//retrive id of selected row and send data to Controller class 
$id = $_GET['id'];
$conn = new Controller();
$conn->id = $id;
$conn->SetToUpdate();

?>

<h3>Update data:</h3>
<br />

<form name="update_form" action="index.php?o=show_data&id=<?php echo $id; ?>&m=edit" method="post" class="form-horizontal">

    <div class="form-group">
        <label for="auto" class="col-sm-2 control-label">Car model</label>
        <div class="col-sm-5">
            <input type="text" id="auto" name="car_name" value="<?php echo $conn->car; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="teh" class="col-sm-2 control-label">Drive</label>
        <div class="col-sm-5">
             <input type="text" id="teh" name="car_drive" value="<?php echo $conn->drive; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="kilo" class="col-sm-2 control-label">Annual mileage</label>
        <div class="col-sm-5">
            <input type="text" id="kilo" name="car_kmh" value="<?php echo $conn->kmh; ?>">
        </div>
    </div>

    <div class="form-group">
         <label for="trosak" class="col-sm-2 control-label">Total costs</label>
        <div class="col-sm-5">
            <input type="text" id="trosak" name="car_costs" value="<?php echo $conn->cost; ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </div>

</form>