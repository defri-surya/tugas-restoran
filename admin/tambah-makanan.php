<?php 
include 'conect.php';
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];

mysql_query("insert into makanan values('','$nama','$jenis','$harga','$jumlah')");
header("location:makanan.php");

 ?>