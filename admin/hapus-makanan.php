<?php 
include 'conect.php';
$id=$_GET['id'];
mysql_query("delete from makanan where id='$id'");
header("location:makanan.php");

?>