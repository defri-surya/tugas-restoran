<?php 
include 'conect.php';
$id=$_POST['id'];
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];

mysql_query("update minuman set nama='$nama', jenis='$jenis', harga='$harga', jumlah='$jumlah' where id='$id'");
header("location:minuman.php");

?>