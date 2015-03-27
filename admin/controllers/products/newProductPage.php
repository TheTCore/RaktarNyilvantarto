<?php

$pageTitle = "Új termék felvitele";

//termék adatok kigyűjtése:
$query = "SELECT * FROM `products`";
$result = $db->query($query);
if ($db->errno) {
	die($db->error);
}

$query = "SELECT * FROM `items`";
$result = $db->query($query);
if ($db->errno) {
	die($db->error);
}

if (isset($_POST['productSubmit'])) {
  
	$productID = $_POST['id'];
	$productName = ($_POST['name']);
	$productDescription = $_POST['description'];
	$productPrice = $_POST['price'];
        $itemStoreID = $_POST['store_id'];
        $itemStoreAmount = $_POST['amount'];
	
	// db-be írás:
	$query = "INSERT INTO products (id, name, description, price) "
                . "VALUES ('$productID', '$productName', '$productDescription', '$productPrice');";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
        
	$query = "INSERT INTO items (id, store_id, product_id, amount) "
                . "VALUES ( 'NULL' , '$itemStoreID', '$productID', '$itemStoreAmount');";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
		
	header("Location: $HOST/raktarnyilvantarto/admin/?q=products");
	exit;
}
?>