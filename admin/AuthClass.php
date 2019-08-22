<?php  
/*** Class Auth untuk melakukan login dan registrasi user baru */ 
   class Auth
   {
     private $db; //Menyimpan Koneksi database pada variabel $db
     private $error; //Menyimpan Error Message pada variabel $error
     ## Contructor untuk class Auth, membutuhkan satu parameter yaitu koneksi ke database ##
     function __construct($db_conn) 
     { 
       $this->db = $db_conn; 
       // Mulai session  
       session_start(); 
     }

     ### Start : fungsi login user ###  
     public function login($username, $password) 
     { 
       try 
       { 
         // Ambil data dari database 
         $stmt = $this->db->prepare("SELECT * FROM admin WHERE uname = :username"); 
         $stmt->bindParam(":username", $username); 
         $stmt->execute(); 
         $data = $stmt->fetch(); 
         // Jika jumlah baris > 0 
         if($stmt->rowCount() > 0){ 
           // jika password yang dimasukkan sesuai dengan yg ada di database 
           if(password_verify($password, $data['pass'])){ 
             $_SESSION['user_session'] = $data['id']; 
             return true; 
           }else{ 
             $this->error = "username atau Password Salah"; 
             return false; 
           } 
         }else{ 
           $this->error = "username atau Password Salah"; 
           return false; 
         } 
       } catch (PDOException $e) { 
         echo $e->getMessage(); 
         return false; 
       } 
     } 
     ### End : fungsi login user ###

     ### Start : fungsi cek login user ###  
     public function isLoggedIn(){ 
       // Apakah user_session sudah ada di session 
       if(isset($_SESSION['user_session'])) 
       { 
         return true; 
       } 
     } 
     ### End : fungsi cek login user ###  

     ### Start : fungsi ambil data user yang sudah login ###   
     public function getUser(){ 
       // Cek apakah sudah login 
       if(!$this->isLoggedIn()){ 
         return false; 
       } 
       try { 
         // Ambil data user dari database 
         $stmt = $this->db->prepare("SELECT * FROM admin WHERE id = :id"); 
         $stmt->bindParam(":id", $_SESSION['user_session']); 
         $stmt->execute(); 
         return $stmt->fetch(); 
       } catch (PDOException $e) { 
         echo $e->getMessage(); 
         return false; 
       } 
     } 
     ### End : fungsi ambil data user yang sudah login ### 

     ### Start : Registrasi User baru ###
     public function register($nama, $uname, $pass) 
     { 
       try 
       { 
         // buat hash dari password yang dimasukkan 
         $hashPasswd = password_hash($pass, PASSWORD_DEFAULT); 
         //Masukkan user baru ke database 
         $stmt = $this->db->prepare("INSERT INTO admin (nama, uname, pass) VALUES(:nama, :uname, :pass)"); 
         $stmt->bindParam(":nama", $nama); 
         $stmt->bindParam(":uname", $uname); 
         $stmt->bindParam(":pass", $hashPasswd); 
         $stmt->execute(); 
         return true; 
       }catch(PDOException $e){ 
         // Jika terjadi error 
         if($e->errorInfo[0] == 23000){ 
           //errorInfor[0] berisi informasi error tentang query sql yg baru dijalankan 
           //23000 adalah kode error ketika ada data yg sama pada kolom yg di set unique 
           $this->error = "Username sudah digunakan!"; 
           return false; 
         }else{ 
           echo $e->getMessage(); 
           return false; 
         } 
       } 
     }
     ### End : Registrasi User baru ### 

     ### Start : fungsi Logout user ###  
     public function logout(){ 
       // Hapus session 
       session_destroy(); 
       // Hapus user_session 
       unset($_SESSION['user_session']); 
       return true; 
     } 
     ### End : fungsi Logout user ###  

     ### Start : fungsi ambil error terakhir yg disimpan di variable error ###  
     public function getLastError(){ 
       return $this->error; 
     } 
     ### End : fungsi ambil error terakhir yg disimpan di variable error ###  
   } 
 ?> 