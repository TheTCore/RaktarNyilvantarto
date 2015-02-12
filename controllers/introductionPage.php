<?php

$pageTitle ="Bemutatkozás";

$query = "SELECT * FROM  `pages` WHERE `id`='bemutatkozas'";
$result = $db->query($query);
if ($db->errno) {
    die($db->error);
}
$page = $result->fetch_array();