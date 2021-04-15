<?php
session_start();
$id_sp=$_GET['id_sp'];
// kiem tra ton tai session 2 chieu
if(isset($_SESSION['giohang'][$id_sp])){
    $_SESSION['giohang'][$id_sp]=$_SESSION['giohang'][$id_sp] +1;
}
else $_SESSION['giohang'][$id_sp]=1;

header("location: ../../index.php?page_layout=giohang");

?>