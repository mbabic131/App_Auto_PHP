<?php

function validate_input($data) {

  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function validate_numbers_input($number, $min, $max) {

	if(empty($number)) {
		return false;
	}
	elseif (!is_numeric($number)) {
		return false;
	}
	elseif($number < 0) {
		return false;
	}
	elseif ($number < $min) {
		return false;
	}
	elseif ($number > $max) {
		return false;
	}
	else {
		return true;
	}
}

?>