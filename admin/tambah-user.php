<?php 
include 'conect.php';
$nama=$_POST['nama'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];

mysql_query("insert into admin values('','$nama','$uname','$pass')");
header("location:user.php");

 ?>