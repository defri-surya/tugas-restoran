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
			<li><a href="about.php"><span class="glyphicon glyphicon-briefcase"></span>  About Us</a></li>
			<li><a href="contact.php"><span class="glyphicon glyphicon-briefcase"></span>  Contact</a></li>	
		</ul>
	</div>

	<div class="col-md-10">
	<h3><span class="glyphicon glyphicon-briefcase"></span>  Daftar Menu Restoran Kaliberkah</h3>
	<br/>

<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from makanan");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<table class="table">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-4">Nama Makanan</th>
		<th class="col-md-3">Harga Jual</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from makanan where nama like '$cari' or jenis like '$cari'");
	}else{
		$brg=mysql_query("select * from makanan limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			<td>
				<a href="penjualan.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Beli</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	</table>
<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from minuman");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<table class="table">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-4">Nama Minuman</th>
		<th class="col-md-3">Harga Jual</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from minuman where nama like '$cari' or jenis like '$cari'");
	}else{
		$brg=mysql_query("select * from minuman limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			<td>
				<a href="penjualan2.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Beli</a>
			</td>
		</tr>		
		<?php 
	}
	?>
</table>
</body>
</html>