<?php

session_start();

// Aktuális lap kiválasztása:
$page = 'login';
if(isset($_GET['q'])){
    if(isset($_SESSION['logged'])) $page = $_GET['q'];

    // Aktuális lap betöltése:
}switch($page){
    case 'login';
        include('controllers/loginPage.php');
        include('views/loginPage.php');
        break;
    case 'hirek';
        break;
    case 'kijelentkezes';
        unset($_SESSION['logged']);
        include('controllers/loginPage.php');
        include('views/loginPage.php');
        break;
        
    default:
        include('controllers/loginPage.php');
        include('views/loginPage.php');
}

$db->close();

