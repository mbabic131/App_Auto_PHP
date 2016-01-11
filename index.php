<?php
session_start();
ob_start();
include 'App/Controller/Controller.php';
include 'public/header.php';

if(!isset($_SESSION['username'])) {

    if($_GET['o'] == '' || $_GET['o'] == 'view' || $_GET['o'] == 'show_data' || $_GET['o'] == 'ask' || $_GET['o'] == 'upd' || $_GET['o'] == 'logout') {
        include 'public/login.php';
    }

    elseif ($_GET['o'] == 'login') {
        include 'public/login.php';
    }

    elseif ($_GET['o'] == 'register') {
        include 'public/register.php';
    }

    elseif ($_GET['o'] !== 'login') {
        include 'public/login.php';
    }

} elseif(isset($_SESSION['username'])) {

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

    elseif ($_GET['o'] == 'logout') {
        include 'App/Helpers/logout.php';
    }

}

include 'public/footer.php';

?>