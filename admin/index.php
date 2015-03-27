<?php

session_start();

require_once '../config.php';
$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$db->set_charset('utf8');

// Aktuális lap kiválasztása:
$page = 'login';
if (isset($_GET['q'])) {
    if (isset($_SESSION['logged']))
        $page = $_GET['q'];
}

// Aktuális lap betöltése:
switch ($page) {
    case 'login':
        include('controllers/loginPage.php');
        include('views/loginPage.php');
        break;
    case 'stores':
        include('controllers/storesPage.php');
        include('views/storesPage.php');
        break;
    case 'newstore':
        include('controllers/newStorePage.php');
        include('views/newStorePage.php');
        break;
    case 'storeactive':
        include('controllers/storeActivePage.php');
        include('views/storeActivePage.php');
        break;
    case 'products':
        include('controllers/products/productsPage.php');
        include('views/products/productsPage.php');
        break;
    case 'newproduct':
        include('controllers/products/newProductPage.php');
        include('views/products/newProductPage.php');
        break;
    case 'felhasznalok':
        include('controllers/usersPage.php');
        include('views/usersPage.php');
        break;
    case 'kijelentkezes':
        //session_regenerate_id(false);
        session_unset();
        include('controllers/loginPage.php');
        include('views/loginPage.php');
        break;
    default:
        include('controllers/loginPage.php');
        include('views/loginPage.php');
}

$db->close();