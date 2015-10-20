<?php

include 'App/Controller.php';
include 'header.php';


$id = $_GET['id'];

//message for delete confirmation
if(isset($id) & $_GET['o'] == 'ask') {
	echo "<h3>Jeste li sigurni da želite obrisati podatke?</h3>";
	echo "<a href='View.php?id=$id&m=delete'><p>DA</p></a>";
	echo "<a href='View.php'><p>NE</p></a>";
}

include 'footer.php';

