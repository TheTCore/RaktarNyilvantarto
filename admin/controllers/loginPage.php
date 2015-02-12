<?php

$pageTitle = "Bejelentkezés";
// Hírek kiolvasása adatbázisból:
$success=false;
if(isset($_POST['loginSubmit'])){
    $uName=$_POST['uName'];
    $uPass=$_POST['uPass'];
    $query = "SELECT * FROM `users` WHERE uname='$uName'";
    $result=$db->query($query);
    if ($db->errno) die($db->error);
    $uData=$result->fetch_array();
    if($uData['upass']==$uPass){
        $success=true;
    }
    if($success)$_SESSION['logged']=header('Location:http://localhost/kportal/admin/');
    exit;
}



