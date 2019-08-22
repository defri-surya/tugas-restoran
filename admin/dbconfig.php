<?php 
      try 
      {
           //membuat koneksi dengan database
           $con = new PDO('mysql:host=localhost;dbname=project_pbo', 'root', '', array(PDO::ATTR_PERSISTENT => true)); 
      } 
      catch(PDOException $e) 
      { 
           //menampilkan pesan jika koneksi gagal
           echo $e->getMessage(); 
      } 
      //mengambil data dari AuthClass
      include_once 'AuthClass.php'; 
      $user = new Auth($con); 
?>