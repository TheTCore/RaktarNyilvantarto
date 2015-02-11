<?php

$pageTitle = "Bemutatkozás";

// oldal tartalmának betöltése adatbázisból:

$query = "SELECT * FROM `pages` WHERE `id`='bemutatkozas'";
$result = $db->query($query);
if ($db->errno) {
  die($db->error);
}

// kiszedem az eredményből az 1db sort:
$page = $result->fetch_array();
