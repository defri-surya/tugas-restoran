<?php 
include 'conect.php';
// Lampirkan dbconfig 
require_once "dbconfig.php"; 
// Cek status login user 
if(!$user->isLoggedIn()){ 
  header("location: login.php"); //Redirect ke halaman login 
} 
// Ambil data user saat ini 
$currentUser = $user->getUser();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Restoran Kaliberkah</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">Restoran Kaliberkah</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-user"> Hallo, <?php echo $currentUser['nama'] ?></span></a></li>
				</ul>
			</div>
		</div>
	</div>


	<div class="col-md-2">
		<div class="row">
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
            <li><a href="header.php"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
            <li class="active"><a href="user.php"><span class="glyphicon glyphicon-user"></span>  Data Admin</a></li>
			<li><a href="makanan.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Makanan</a></li>
			<li><a href="minuman.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Minuman</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
		</ul>
	</div>
<div class="col-md-10">
    <h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Admin</h3>
<a class="btn" href="user.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from admin where id='$id'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="proses-edit-user.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" class="form-control" name="uname" value="<?php echo $d['uname'] ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" class="form-control" name="pass" value="<?php echo $d['pass'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>