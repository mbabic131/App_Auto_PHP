<?php

if(isset($_POST['auto']) && !empty($_POST['auto'])) {

    include_once 'App/Helpers/validation.php';

    $name = validate_input($_POST['auto']);
    $controller = new Controller();
    $controller->name = $name;
    $controller->getOne();

    $row = $controller->model->oneRow;

    if($row) {
        extract($row);

        echo "<div id='tablice'>";
            echo "<h3>About car:</h3>";
            echo "<table class='table table-bordered'>";
                echo "<tr class='active'>";
                    echo "<th>Car model</th>";
                    echo "<th>Drive</th>";
                    echo "<th>Unit</th>";
                    echo "<th>Average fuel consumption</th>";
                echo "</tr>";
                echo "<tr class='success'>";
                    echo "<td>$Naziv</td>";
                    echo "<td>$Tip</td>";
                    echo "<td>$JM</td>";
                    echo "<td>$Potrosnja</td>";
                echo "</tr>";
            echo "</table>";

        } else {

            echo "<h6 class='bg-warning text-center'>Unable to load car information.</h6>";
        }

    if($Tip) {
        $controller->type = $Tip;
        $controller->getType();
        $row2 = $controller->model->oneType;
        extract($row2);

            echo "<h3>About drive:</h3>";
            echo "<table class='table table-bordered'>";
                echo "<tr class='active'>";
                    echo "<th>Drive</th>";
                    echo "<th>Unit</th>";
                    echo "<th>Price ($)</th>";
                echo "</tr>";
                echo "<tr class='info'>";
                    echo "<td>$Pogon</td>";
                    echo "<td>$JM</td>";
                    echo "<td>$Cijena</td>";
                echo "</tr>";
             echo "</table>";
        echo "</div>";

    echo "<form name='moja'>";
        echo "<input type='hidden' id='cij' name='poc' value='$Cijena''>";
        echo "<input type='hidden' id='pot' name='cok' value='$Potrosnja'>";
    echo "</form>";

    } else {

        echo "<h6 class='bg-warning text-center'>Unable to load drive information.</h6>";
    }
    ?>

    <dl>
        <dt>Annual mileage</dt>
        <dd>Enter the average annual number of kilometers that you cross by car.</dd>
    </dl>

    <div id="forma">
        <form name="forma" class="form-horizontal" method="post" action="index.php?o=show_data&m=save">
            <div class="form-group">
                <label for="kmh" class="col-sm-2 control-label">Amount</label>
                     <div class="input-group col-sm-5">
                        <input type="text" id="kmh" name="kilometar" class="form-control">
                        <div class="input-group-addon">KM</div>
                     </div>
                </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" value="Calculate" class="btn btn-primary" onclick="calc()">
                </div>
            </div>

            <dl>
                <dt>Total costs</dt>
                <dd>Here are the total annual fuel cost of the selected car.</dd>
            </dl>

            <div class="form-group">
                <label for="trosak" class="col-sm-2 control-label">Cost</label>
                    <div class="input-group col-sm-5">
                         <input type="text" id="trosak" name="ukupniTroskovi" class="form-control">
                         <div class="input-group-addon">$</div>
                        <?php
                            echo "<input type='hidden' name='ime' value='$Naziv'>";
                            echo "<input type='hidden' name='pogon' value='$Tip'>";
                        ?>
                     </div>
                </div>

            <div class="form-group">
                <div class='col-sm-offset-2 col-sm-10'>
                    <input type='submit' value='Save' class='btn btn-primary'>
                </div>
            </div>
        </form>
    </div>

<?php 

} else {

    header("Location: index.php");
}

?>
