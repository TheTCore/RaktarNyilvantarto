<?php

session_start();

require_once 'config.php';
$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$db->set_charset('utf8');

// Aktuális lap kiválasztása:
$page = 'kezdolap';
if(isset($_GET['q'])){
    $page = $_GET['q'];
}
// Aktuális lap betöltése:
switch ($page){
    case 'kezdolap';
        include('controllers/frontPage.php');
        include('views/frontPage.php');
        break;
    case 'bemutatkozas';
        include('controllers/introductionPage.php');
        include('views/introductionPage.php');
        break;
    case 'kepgaleria';
        include('controllers/imageGalleryPage.php');
        include('views/imageGalleryPage.php');
        break;
    case 'kapcsolat';
        include('controllers/contactPage.php');
        include('views/contactPage.php');
        break;
    default:
        $pageTitle = "404 error";
        include('views/404Page.php');
}

$db->close();

