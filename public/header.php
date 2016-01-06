<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="public/JS/izracun.js"></script>
    <link href="public/CSS/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="public/CSS/CSS.css" rel="stylesheet">
    <script type="text/javascript" src="public/JS/jquery-1.9.1.js"></script>
    <link href="CSS/Login_CSS.css" rel="stylesheet">
    
    <title>Fuel costs</title>
</head>
<body>

<div class="container">

    <div class="jumbotron">
        <center><h1>Costs of car fuel</h1></center>
    </div>

<?php

if(isset($_SESSION['username'])) {

    $navigation = <<<DELIMITER
    <nav class="navbar">
    <ul class="nav nav-tabs">
         <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
         <li><a href="index.php?o=show_data"><span class="glyphicon glyphicon-th"></span> Data</a></li>
         <li><a href="index.php?o=logout"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
    </ul>
     <p>You are loged in as: $_SESSION[username]</p>
</nav>
DELIMITER;

    echo $navigation;
}

?>
