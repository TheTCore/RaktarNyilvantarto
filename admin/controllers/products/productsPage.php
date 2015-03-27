<?php


$pageTitle = "Termékek listája";

//termék adatok kigyűjtése:
$query = "SELECT products.*, items.store_id, items.amount FROM `products` left join items on items.product_id = products.id";
$products = $db->query($query);
if ($db->errno) {
	die($db->error);
}

