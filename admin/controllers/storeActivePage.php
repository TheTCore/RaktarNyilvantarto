<?php

$pageTitle = "Aktivációs Oldal";

$query = "SELECT * FROM `stores` WHERE manager_id=" . $_SESSION['id'];
$active = $db->query($query);
if ($db->errno) {
    die($db->error);
}
$query = "SELECT * FROM `rights`";
$result = $db->query($query);
if ($db->errno) {
    die($db->error);
}

if (isset($_POST['activeSubmit'])) {
    foreach ($_POST as $k => $v) {
        if ($k != 'activeSubmit') {
            if (substr($k, 0, 6) == "stores") {
                
                $num = substr($k, -1);
                $keyname = 'activate' . $num;
                
                $a = (isset($_POST[$keyname])) ? 1 : 0;
                
                $query = "UPDATE stores SET active=$a WHERE id='$v'";
                
                $result = $db->query($query);
                if ($db->errno) {
                    die($db->error);
                }
            }
        }
    }

    header("Location: $HOST/raktarnyilvantarto/admin/?q=stores");
    exit;
}
?>