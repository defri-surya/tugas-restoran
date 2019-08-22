<?php 
include 'conect.php';
// Lampirkan dbconfig 
require_once "dbconfig.php"; 
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
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
		</div>
	</div>
	

	<div class="col-md-2">
		<div class="row">
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
			<li><a href="About.php"><span class="glyphicon glyphicon-briefcase"></span>  About Us</a></li>
			<li><a href="contact.php"><span class="glyphicon glyphicon-briefcase"></span>  Contact</a></li>
			<li><a href="galeri.php"><span class="glyphicon glyphicon-briefcase"></span>  Gallery</a></li>		
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
	</table>
	<?php 
}
?>