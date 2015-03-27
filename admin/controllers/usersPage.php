<?php

$pageTitle = "Felhasználók kezelése";

//felhasználó adatok kigyűjtése:
$query = "SELECT * FROM `users`";
$result = $db->query($query);
if ($db->errno) {
	die($db->error);
}

//jogosultságok kigyűjtése:
$query = "SELECT * FROM `rights`";
$result = $db->query($query);
if ($db->errno) {
	die($db->error);
}
//még nem publikált hírek kigyűjtése:
$query = "SELECT * FROM `users` WHERE active=0";
$inactive = $db->query($query);
if ($db->errno) {
	die($db->error);
}

$rights = array();
$c = 0;
while ($uData = $result->fetch_array()) {
	$rights[$c]['id'] = $uData['id'];
	$rights[$c]['description'] = $uData['description'];
	$c++;
}

// users form feldolgozása:
if (isset($_POST['usersSubmit'])) {
  
	$userName = $_POST['uname'];
	$userPass = crypt($_POST['upass']);
	$userRealName = $_POST['name'];
	$userEmail = $_POST['email'];
	$userRights = $_POST['rights'];
        $userActive = $_POST['active'];
        $userPhone = $_POST['phone'];
	
	// db-be írás:
	$query = "INSERT INTO users (uname, upass, name, email, rights, active, phone) "
                . "VALUES ('$userName', '$userPass', '$userRealName', '$userEmail', '$userRights', '$userActive', '$userPhone');";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['msg'] = 'Felhasználó rögzítve.';
		
	header("Location: $HOST/raktarnyilvantarto/admin/?q=felhasznalok");
	exit;
}

// felhasználó keresés form feldolgozása:
if (isset($_POST['searchSubmit'])) {
  
	$where = '';
	$userName = $_POST['uname'];
	if (!empty($userName)) $where.= (!empty($where)) ? " AND uname LIKE '%$userName%'"  : "uname LIKE '%$userName%'";
	$userRealName = $_POST['name'];
	if (!empty($userRealName)) $where.= (!empty($where)) ? " AND `name` LIKE '%$userRealName%'"  : "`name` LIKE '%$userRealName%'";
	$userEmail = $_POST['email'];
        if (!empty($userEmail)) $where.= (!empty($where)) ? " AND email LIKE '%$userEmail%'"  : "email LIKE '%$userEmail%'";
        
	$query = (!empty($where)) ? "SELECT * FROM `users` WHERE $where" : "SELECT * FROM `users` LIMIT 10";
	$found = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['sresult'] = array();
	$c = 0;
	while ($userData = $found->fetch_array()) {
		$_SESSION['sresult'][$c]['uname'] = $userData['uname'];
		$_SESSION['sresult'][$c]['name'] = $userData['name'];
		$_SESSION['sresult'][$c]['email'] = $userData['email'];
		$c++;
	}	

	header("Location: $HOST/raktarnyilvantarto/admin/?q=felhasznalok");
	exit;
}
// felhasználó aktiválása form feldolgozása:
if (isset($_POST['activeSubmit'])) {
  
	foreach ($_POST as $k => $v) {
		if ($k != 'activeSubmit') {
			$query = "UPDATE users SET active=1 WHERE id=$v";
			$result = $db->query($query);
			if ($db->errno) {
				die($db->error);
			}
		}
	}
	
	header("Location: $HOST/raktarnyilvantarto/admin/?q=felhasznalok");
	exit;
}
?>