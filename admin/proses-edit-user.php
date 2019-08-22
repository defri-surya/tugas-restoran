<?php 
include 'conect.php';
$id=$_POST['id'];
$nama=$_POST['nama'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];

mysql_query("update admin set nama='$nama', uname='$uname', pass='$pass' where id='$id'");
header("location:user.php");

?>