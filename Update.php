<?php

include 'App/Controller.php';
include 'header.php';

//retrive id of selected row and send data to Controller class 
$id = $_GET['id'];
$conn = new Controller();
$conn->id = $id;
$conn->SetToUpdate();

?>

<h3>Izmjena podataka:</h3>
<br />

<form name="update_forma" action="View.php?id=<?php echo $id; ?>&m=edit" method="post" class="form-horizontal">

    <div class="form-group">
        <label for="auto" class="col-sm-2 control-label">Naziv automobila</label>
        <div class="col-sm-5">
            <input type="text" id="auto" name="naziv_auto" value="<?php echo $conn->ime; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="teh" class="col-sm-2 control-label">Pogon</label>
        <div class="col-sm-5">
             <input type="text" id="teh" name="pogon_auto" value="<?php echo $conn->pogon; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="kilo" class="col-sm-2 control-label">Broj prijeđenih kilometara</label>
        <div class="col-sm-5">
            <input type="text" id="kilo" name="kilometri_auto" value="<?php echo $conn->kmh; ?>">
        </div>
    </div>

    <div class="form-group">
         <label for="trosak" class="col-sm-2 control-label">Ukupni troškovi</label>
        <div class="col-sm-5">
            <input type="text" id="trosak" name="troskovi_auto" value="<?php echo $conn->cost; ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" value="Izmjeni" class="btn btn-primary">
        </div>
    </div>

</form>

<?php

include 'footer.php';