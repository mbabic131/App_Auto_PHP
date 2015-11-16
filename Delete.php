<?php

include 'App/Controller.php';
include 'header.php';


$id = $_GET['id'];

//message for delete confirmation
if(isset($id) & $_GET['o'] == 'ask') {
	echo "<h3>Are you sure that you want to delete this row from database?</h3>";
	echo "<a href='View.php?id=$id&m=delete'><p>YES</p></a>";
	echo "<a href='View.php'><p>NO</p></a>";
}

include 'footer.php';

