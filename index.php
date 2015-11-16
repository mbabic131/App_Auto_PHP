<?php

include 'App/Controller/Controller.php';
include 'public/header.php';

    if($_GET['o'] == '') {
        include 'App/View/Unos.php';
    }

    else if($_GET['o'] == 'view') {
        include 'App/View/details.php';
    }

    elseif ($_GET['o'] == 'show_data') {
    	include 'App/View/View.php';
    }

    elseif ($_GET['o'] == 'ask') {
    	include 'App/View/Delete.php';
    }

    elseif ($_GET['o'] == 'upd') {
    	include 'App/View/Update.php';
    }

include 'public/footer.php';

?>