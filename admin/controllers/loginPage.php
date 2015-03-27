<?php

$pageTitle = "Bejelentkezés / Regisztráció";

error_reporting(E_ERROR | E_WARNING | E_PARSE);

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

    //if ($uData['upass'] == $uPass) $success = true; //hash nélküli jelszók ellenőrzése
    if ($uData['upass'] == crypt($uPass, $uData['upass'])) {
        $success = true;  //hashed password ellenőrzése
    }

    if ($success) {
        // admin oldalakhoz hozzáférés
        if ($uData['active'] == 1) {
            $_SESSION['logged'] = true;
            $_SESSION['name'] = $uData['name'];
            $_SESSION['rights'] = $uData['rights'];
            $_SESSION['id'] = $uData['id'];
        } else {
            $_SESSION['msg2'] = "<b>A felhasználó inaktív!<br>Lépjen kapcsolatba egy adminisztrátorral.</b>";
        }
    } else {
        $_SESSION['msg3'] = "<b>Hibás felhasználónév vagy jelszó!</b>";
    }

    header("Location: $HOST/raktarnyilvantarto/admin");
    exit;
}
//felhasználó adatok kigyűjtése:
$query = "SELECT * FROM `users`";
$rresult = $db->query($query);
if ($db->errno) {
    die($db->error);
}

$error = false;

if (isset($_POST['regSubmit'])) {

    $userName = $_POST['ruName'];
    $userPass = (!empty($_POST['ruPass'])) ? crypt($_POST['ruPass']) : '';
    $userRealName = $_POST['ruRealName'];
    $userEmail = $_POST['ruEmail'];

    if (empty($userName) || empty($userPass) || empty($userEmail) || empty($userRealName)) {
        $_SESSION['msg'] = "Minden mezőt ki kell tölteni!";
    } else {
        // db-be írás:
        $query = "INSERT INTO users (uname, upass, name, email) "
                . "VALUES ('$userName', '$userPass', '$userRealName', '$userEmail');";
        $rresult = $db->query($query);
        if ($db->errno) {
            die($db->error);
        }

        $_SESSION['msg'] = 'Felhasználó rögzítve. Lépjen kapcsolba egy adminisztrátorral.';

        header("Location: $HOST/raktarnyilvantarto/admin/?q=login");
        exit;
    }
}
?>