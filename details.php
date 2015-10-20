<?php

$naziv = $_POST['auto'];
$controller = new Controller();
$controller->naziv = $naziv;
$controller->getOne();
$row = $controller->model->oneRow;
extract($row);

echo "<div id='tablice'>";
    echo "<h3>Podaci o automobilu:</h3>";
    echo "<table class='table table-bordered'>";
        echo "<tr class='active'>";
            echo "<th>Naziv automobila</th>";
            echo "<th>Pogon</th>";
            echo "<th>Jedinica mjere</th>";
            echo "<th>Prosječna potrošnja</th>";
        echo "</tr>";
        echo "<tr class='success'>";
            echo "<td>$Naziv</td>";
            echo "<td>$Tip</td>";
            echo "<td>$JM</td>";
            echo "<td>$Potrosnja</td>";
        echo "</tr>";
    echo "</table>";

if($Tip) {
    $controller->tip = $Tip;
    $controller->getTip();
    $row2 = $controller->model->oneTip;
    extract($row2);

        echo "<h3>Podaci o energentu:</h3>";
        echo "<table class='table table-bordered'>";
            echo "<tr class='active'>";
                echo "<th>Energent</th>";
                echo "<th>Jedinica mjere</th>";
                echo "<th>Cijena (KN)</th>";
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
}
?>

<dl>
    <dt>Broj prijeđenih kilometara</dt>
    <dd>Ovdje upišite prosječan broj kilometara koje godišnje prijeđete s vlastitim automobilom.</dd>
</dl>

<div id="forma">
    <form name="forma" class="form-horizontal" method="post" action="View.php?m=save">
        <div class="form-group">
            <label for="kmh" class="col-sm-2 control-label">Iznos</label>
                 <div class="input-group col-sm-5">
                    <input type="text" id="kmh" name="kilometar" class="form-control">
                    <div class="input-group-addon">KM</div>
                 </div>
            </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="button" value="Izračunaj" class="btn btn-primary" onclick="calc()">
            </div>
        </div>

        <dl>
            <dt>Ukupni troškovi prijevoza</dt>
            <dd>Ovdje su prikazani ukupni godišnji troškovi prijevoza za izabrani automobil.</dd>
        </dl>

        <div class="form-group">
            <label for="trosak" class="col-sm-2 control-label">Trošak</label>
                <div class="input-group col-sm-5">
                     <input type="text" id="trosak" name="ukupniTroskovi" class="form-control">
                     <div class="input-group-addon">KN</div>
                    <?php
                        echo "<input type='hidden' name='ime' value='$Naziv'>";
                        echo "<input type='hidden' name='pogon' value='$Tip'>";
                    ?>
                 </div>
            </div>

        <div class="form-group">
            <div class='col-sm-offset-2 col-sm-10'>
                <input type='submit' value='Spremi' class='btn btn-primary'>
            </div>
        </div>
    </form>
</div>
