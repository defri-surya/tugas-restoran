<?php
session_start();
include "conect.php";
include "function.php";
$LastID=FormatNoTrans(OtomatisID());
$total=$_SESSION['total'];
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("y-m-d");
 
$sql = mysql_query("insert into penjualan(id, tanggal, total) values ('$LastID','$tanggal','$total')");
 
$awal = $_SESSION['isi'];
    $j=0;
    while($j <= $awal){
        $id = @$_SESSION['akhir'][$j][4];
        $stok = @$_SESSION['akhir'][$j][2];
        $sub = @$_SESSION['akhir'][$j][3];
       
        if($LastID!="" and $id!="" and $stok!=""){
            $query = mysql_query("
                INSERT INTO detailpenjualan (idtransaksi,kodebrg,stok,harga)
                values('$LastID','$id','$stok','$sub')
            ");
            $tampilid=mysql_fetch_array(mysql_query("select jumlah from minuman where id='$id'"));
            @$stok_jual2=$tampilid["jumlah"];
            @$stok_jual3=$stok_jual2-$stok;
            $query3 = mysql_query("
                update minuman set jumlah='$stok_jual3' where id='$id'
            ");
        }
        $j++;
    }
    echo "<script type='text/javascript'>alert('Data berhasil disimpan')</script>";
    echo "<script>document.location.href='home.php';</script>";
    unset($_SESSION['isi']);
    unset($_SESSION['nilai']);
    echo "".mysql_error();
 
?>