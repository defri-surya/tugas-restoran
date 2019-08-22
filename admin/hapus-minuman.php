<?php 
include 'conect.php';
$id=$_GET['id'];
mysql_query("delete from minuman where id='$id'");
header("location:minuman.php");

?>