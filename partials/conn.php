<?php 
$server="localhost";
$username="root";
$password="";
$database="construction";

$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
    echo "<script>alert('Something Error......');</script>";
}
?>