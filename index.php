<?php

session_start();

$db = new mysqli('localhost', 'root', '', 'phpportal');
$db->set_charset('utf8');

// Aktuális lap kiválasztása:
$page = 'kezdolap';
if (isset($_GET['q'])) {
  $page = $_GET['q'];
}

// Aktuális lap betöltése:
switch ($page) {
  case 'kezdolap':
    include('controllers/frontPage.php');
    include('views/frontPage.php');
    break;
  case 'bemutatkozas':
    include('controllers/introductionPage.php');
    include('views/introductionPage.php');
    break;
  case 'kepgaleria':
    $pageTitle = "Képgaléria";
    include('views/imageGalleryPage.php');
    break;    
  case 'kapcsolat':
    include('controllers/contactPage.php');
    include('views/contactPage.php');
    break;    
  default:
    $pageTitle = "Oldal nem található";
    include('views/404Page.php');
}

$db->close();
