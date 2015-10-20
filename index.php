<?php

include 'App/Controller.php';
include 'header.php';

    if($_GET['o'] == '') {
        include 'Unos.php';
    }

    else if($_GET['o'] == 'view') {
        include 'details.php';
    }

include 'footer.php';
?>