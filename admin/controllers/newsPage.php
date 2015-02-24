<?php

$pageTitle = "Hírek rögzítése";

// login form feldolgozása:
if (isset($_POST['newsSubmit'])) {
  
	$newsTitle = $_POST['title'];
	$newsLead = $_POST['lead'];
	$newsText = $_POST['text'];
	$newsDate = $_POST['date'];

	
	// db-be írás:
	$query = "INSERT INTO news (title, lead, text, date) VALUES ('$newsTitle', '$newsLead', '$newsText', '$newsDate');";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['msg'] = 'Hír rögzítve.';
		
	header("Location: $HOST/admin/?q=hirek");
	exit;
}

?>