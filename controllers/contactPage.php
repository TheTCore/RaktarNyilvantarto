<?php

$pageTitle = "Kapcsolat";

// oldal tartalmának betöltése adatbázisból:

$query = "SELECT * FROM `pages` WHERE `id`='kapcsolat'";
$result = $db->query($query);
if ($db->errno) {
  die($db->error);
}

// kiszedem az eredményből az 1db sort:
$page = $result->fetch_array();
