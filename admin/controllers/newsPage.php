<?php

$pageTitle = "Hírek rögzítése";


//rovatok kigyűjtése:
$query = "SELECT * FROM `tags`";
$result = $db->query($query);
if ($db->errno) {
	die($db->error);
}

$tags = array();
$c = 0;
while ($tagData = $result->fetch_array()) {
	$tags[$c]['id'] = $tagData['id'];
	$tags[$c]['description'] = $tagData['description'];
	$c++;
}

// login form feldolgozása:
if (isset($_POST['newsSubmit'])) {
  
	$newsTitle = $_POST['title'];
	$newsLead = $_POST['lead'];
	$newsText = $_POST['text'];
	$newsDate = $_POST['date'];
	$newsTag = $_POST['tag'];
	$newsPublished = (isset($_POST['published'])) ? 1 : 0;
	
	// db-be írás:
	$query = "INSERT INTO news (title, lead, text, date, tag, published) VALUES ('$newsTitle', '$newsLead', '$newsText', '$newsDate', '$newsTag', '$newsPublished');";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['msg'] = 'Hír rögzítve.';
		
	header("Location: $HOST/admin/?q=hirek");
	exit;
}

?>