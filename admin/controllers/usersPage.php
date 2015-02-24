<?php

$pageTitle = "Felhasználók rögzítése";

// login form feldolgozása:
if (isset($_POST['userSubmit'])) {
    include ('views/includes/header.php');

    $usersUname = $_POST['userName'];
    $usersUpass = $_POST['userPass'];

    

    // db-be írás:

$query = "INSERT INTO users (id, uname, upass) VALUES (NULL, '$usersUname', '$usersUpass');";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
    $_SESSION['msg'] = 'Felhasználó rögzítve.';
    header("Location: ?q=users");



    include ('views/includes/footer.php');
    die();
}
?>

