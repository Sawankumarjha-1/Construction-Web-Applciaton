<?php 
if(!isset($_SESSION['construction_admin_login'])){
    echo "<script>location.href='login.php';</script>";
    die();
}
?>