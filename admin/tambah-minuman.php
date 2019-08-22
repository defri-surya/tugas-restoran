<?php 
include 'conect.php';
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];

mysql_query("insert into minuman values('','$nama','$jenis','$harga','$jumlah')");
header("location:minuman.php");

 ?>