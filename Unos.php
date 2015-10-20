<script type="text/javascript">

    $(document).ready(function() {
        $("#tijelo").hide();
    });

    $(document).ready(function() {
        $("#opis").click(function() {
            $("#tijelo").toggle();
        });
    });

</script>

<div class="col-lg-7">
    <button class="btn btn-default" id="opis">O aplikaciji
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
</div>

<br /><br />

<div class="col-lg-7" id="tijelo">
<div class="panel panel-info">
    <div class="panel-heading">Opis aplikacije</div>
    <div class="panel-body">
        <p>Aplikacija omogućava okviran izračun godišnjih troškova energenata za pojedine automobile.<br />
        Cilj je omogučiti usporedbu troškova između benzinskih, dizelskih, hibridnih i električnih vozila, <br />
        te utvrditi koji tip pogona je najisplativiji.</p>
    </div>
</div>
</div>

<div id="forma">
    <form action="?o=view" name="mojaforma" class="form-horizontal" method="post">

        <div class="form-group">
            <h3 class="col-sm-offset-2">Izaberite automobil:</h3>
            <br />
            <label for="auto" class="col-sm-5 control-label">Automobil:</label>
            <div class="col-sm-5">
                <select name='auto' class='form-control'>
                    <?php
                    //fill select element with data from database (names of all cars)
                    $controller = new Controller();
                    $controller->getName();
                    $stmt = $controller->stmt;

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        echo "<option>{$Naziv}</option>";
                    };
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-primary">Dalje</button>
            </div>
        </div>

    </form>
</div>