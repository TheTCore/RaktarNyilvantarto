<?php


$pageTitle = "Raktárak listája";

//raktár adatok kigyűjtése:
$query = "SELECT * FROM `stores` WHERE active=1";
$stores = $db->query($query);
if ($db->errno) {
	die($db->error);
}

//Raktárak közötti keresés
if (isset($_POST['storeSearchSubmit'])) {
  
	$where = '';
	$storeID = $_POST['store_id'];
	if (!empty($storeID)) $where.= (!empty($where)) ? " AND `id` LIKE '%$storeID%'"  : "`id` LIKE '%$storeID%'";
	$storeCity = $_POST['city'];
	if (!empty($storeCity)) $where.= (!empty($where)) ? " AND `city` LIKE '%$storeCity%'"  : "`city` LIKE '%$storeCity%'";
        
	$query = (!empty($where)) ? "SELECT * FROM `stores` WHERE $where" : "SELECT * FROM `stores` LIMIT 10";
	$found = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['sresult'] = array();
	$c = 0;
	while ($userData = $found->fetch_array()) {
		$_SESSION['sresult'][$c]['id'] = $userData['id'];
		$_SESSION['sresult'][$c]['city'] = $userData['city'];
                $_SESSION['sresult'][$c]['post_code'] = $userData['post_code'];
                $_SESSION['sresult'][$c]['address'] = $userData['address'];
                $_SESSION['sresult'][$c]['manager_id'] = $userData['manager_id'];
		$c++;
	}	

	header("Location: $HOST/raktarnyilvantarto/admin/?q=stores");
	exit;
}