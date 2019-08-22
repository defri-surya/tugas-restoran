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
			<li><a href="makanan.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Makanan</a></li>
			<li class="active"><a href="minuman.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Minuman</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">
    <h3><span class="glyphicon glyphicon-briefcase"></span>  Data Minuman</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span> Tambah Minuman</button>
<br/>
<br/>

<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from minuman");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>


<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-4">Nama Minuman</th>
		<th class="col-md-3">Harga Jual</th>
		<th class="col-md-1">Jumlah</th>
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
			<td><?php echo $b['jumlah'] ?></td>
			<td>
				<a href="det-minuman.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit-minuman.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='hapus-minuman.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
</table>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Minuman</h4>
			</div>
			<div class="modal-body">
				<form action="tambah-minuman.php" method="post">
					<div class="form-group">
						<label>Nama</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama">
					</div>
					<div class="form-group">
						<label>Jenis</label>
						<input name="jenis" type="text" class="form-control" placeholder="Jenis">
					</div>
					<div class="form-group">
						<label>Harga Jual</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga Jual">
					</div>	
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>																	

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>