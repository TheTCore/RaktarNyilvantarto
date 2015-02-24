<?php

$pageTitle = "Bejelentkezés";

$succes = false;

// login form feldolgozása:
if (isset($_POST['loginSubmit'])) {
  
	$uName = $_POST['uName'];
	$uPass = $_POST['uPass'];
	
	
	// acc a db-ből:

	$query = "SELECT * FROM `users` WHERE `uname`='$uName'";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	// kiszedem az eredményből az 1db sort:
	$uData = $result->fetch_array();
	
	if ($uData['upass'] == $uPass) $success = true;
	
	if ($success) {
		// admin oldalakhoz hozzáférés
		$_SESSION['logged'] = true;
	}
	
	header("Location: $HOST/raktarnyilvantarto/admin/?q=hirek");
	exit;
}

?>