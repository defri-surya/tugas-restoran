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
			<li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
			<li><a href="about.php"><span class="glyphicon glyphicon-briefcase"></span>  About Us</a></li>
			<li><a href="contact.php"><span class="glyphicon glyphicon-briefcase"></span>  Contact</a></li>		
		</ul>
    </div>
    <div class="col-md-10">
    <h3><span class="glyphicon glyphicon-briefcase"></span> Transaksi Pembelian Minuman</h3>
    <a class="btn" href="home.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
        <?php
        include "conect.php";
        include "function.php";
 
        $LastID=FormatNoTrans(OtomatisID());
        ?>
        <?php
        session_start();
        if((empty($_GET["destroy"])==FALSE)){
         session_destroy();
 
        }
        ?>
        <form name="f" method="post" action="";">
        <br/>
            <table>
                <tr>
                    <td>Kode Pembelian </td>
                    <td>:</td>
                    <td><input type="text" name="id" disabled value="<?php echo $LastID ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><input type="text" name="tanggal" disabled value="<?php date_default_timezone_set("Asia/Jakarta");echo date("d-m-Y");?>" />
                    </td>
                </tr>
               
                <tr>
                    <td>Nama Minuman</td>
                    <td>:</td>
                    <td>
                        <select name="nama">
                        <?php  
                            include 'conect.php';
                            $query = "SELECT nama FROM minuman";
                            $exec = mysql_query($query);
                            while($row = mysql_fetch_assoc($exec))
                            {
                                $Nama = $row["nama"];
                                echo "<option value='".$row['nama']."'>".$row['nama']."</option>";
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                   
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>:</td>
                    <td><input type="number" required name="jumlah" value="1"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="button" value="Tambah" />
                    </td>
                </tr>
            </table>
        </form>    
        <form action="struk2.php" method="post">
        <br/>
        <br/>
        <br/>
        <br/>
        <table class="table table-hover">
                            <tr style="background-color:#E8DEBD">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Nama Minuman</th>
                            <th style="text-align:center">Harga</th>
                            <th style="text-align:center">Jumlah</th>
                            <th style="text-align:center">Total</th>
                            <th style="text-align:center" hidden>Kode Barang</th>
            <?php
            $awal=1;$sub=0;$total=0;
            if (@$_POST["nama"]!=''){
                if (empty($_SESSION["isi"])==TRUE){
                    $_SESSION["isi"]=1;
                }else{
                    $_SESSION["isi"]++;
                }
                @$nama = $_POST['nama'];
                $tampil = mysql_fetch_array(mysql_query("select nama, harga from minuman where nama = '$nama'"));
                @$nama = $tampil["nama"];
                @$harga = $tampil["harga"];
                @$stok = trim($_POST["jumlah"]);
                @$sub=$harga*$stok;
                $tampilid=mysql_fetch_array(mysql_query("select id from minuman where nama='$nama'"));
                @$id=$tampilid["id"];
               
               
                //@$xx=$xx+$sub;
                $_SESSION["akhir"][$_SESSION["isi"]]=array($nama,$harga,$stok,$sub,$id);
            }//else{
                //echo "<script type='text/javascript'>alert('Silahkan isi terlebih dahulu!')</script>";
            //}
 
                @$awal = $_SESSION["isi"];
               
                for ($i=0;$i<=$awal;$i++) {
                if (@$_SESSION['akhir'][$i][0]!=''){ ?>
                    <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo @$_SESSION['akhir'][$i][0] ?></td>
                            <td><?php echo @$_SESSION['akhir'][$i][1] ?></td>
                            <td><?php echo @$_SESSION['akhir'][$i][2] ?></td>
                            <td><?php echo @$_SESSION['akhir'][$i][3] ?></td>
                            <td hidden><?php echo @$_SESSION['akhir'][$i][4] ?></td>
                    </tr>
                       
                   
                    <?php }
                    $total=@$_SESSION['akhir'][$i][3]+$total;
                    @$_SESSION['total'] = $total;
                }
           
            ?>
           
            <tr>
           
            <tr>
                <td colspan=4>
                <?php echo "Total Harga";?>
                </td>
                    <td>
                    <?php echo " Rp. $total";?>
                    </td>
            </tr>
            <tr>
            <td colspan=6>
                <input type='submit' value="Simpan" name="Simpan"/>
            </td>
            </tr>            
            </tr>
                       
            </table>
        </form>
    </div>