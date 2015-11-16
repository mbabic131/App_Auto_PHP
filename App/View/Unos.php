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
    <button class="btn btn-default" id="opis">About App
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
</div>

<br /><br />

<div class="col-lg-7" id="tijelo">
<div class="panel panel-info">
    <div class="panel-heading">App description</div>
    <div class="panel-body">
        <p>The application allows users to perform calculations of the annual costs for fuel for certain car.
            The goal is to enable comparison between the cost of gasoline, diesel, hybrid and electric vehicles and
            to determine which type of drive is the most cost-effective.</p>
    </div>
</div>
</div>

<div id="forma">
    <form action="?o=view" name="mojaforma" class="form-horizontal" method="post">

        <div class="form-group">
            <h3 class="col-sm-offset-2">Choose a car:</h3>
            <br />
            <label for="auto" class="col-sm-5 control-label">Car:</label>
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
                <button type="submit" class="btn btn-primary">Next =></button>
            </div>
        </div>

    </form>
</div>