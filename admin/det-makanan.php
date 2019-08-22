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
			<li><a href="user.php"><span class="glyphicon glyphicon-user"></span>  Data Admin</a></li>		
			<li class="active"><a href="makanan.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Makanan</a></li>
			<li><a href="minuman.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Minuman</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">
<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Makanan</h3>
<a class="btn" href="makanan.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from makanan where id='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?php echo $d['jenis'] ?></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><?php echo $d['jumlah'] ?></td>
		</tr>
	</table>
	<?php 
}
?>