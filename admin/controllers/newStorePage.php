<?php

$pageTitle = "Új raktár felvitele";

//felhasználó adatok kigyűjtése:
$query = "SELECT * FROM `stores`";
$result = $db->query($query);
if ($db->errno) {
    die($db->error);
}

if (isset($_POST['storeSubmit'])) {

    $storeID = $_POST['id'];
    $storePostalCode = ($_POST['post_code']);
    $storeCity = $_POST['city'];
    $storeAddress = $_POST['address'];
    $storeManager = $_POST['manager_id'];
    
    if (empty($storeID) || empty($storePostalCode) || empty($storeCity) || empty($storeAddress) || empty($storeManager)) {
        
        $_SESSION['msg'] = "Minden mezőt ki kell tölteni!";
        header("Location: $HOST/raktarnyilvantarto/admin/?q=newstore");
        
    } else {
        // db-be írás:
        $query = "INSERT INTO stores (id, post_code, city, address, manager_id) "
                . "VALUES ('$storeID', '$storePostalCode', '$storeCity', '$storeAddress', '$storeManager');";
        $result = $db->query($query);
        if ($db->errno) {
            die($db->error);
        }
        header("Location: $HOST/raktarnyilvantarto/admin/?q=stores");
    }


    exit;
}
?>