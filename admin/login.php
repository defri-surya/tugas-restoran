<?php  
   // Lampirkan dbconfig 
   require_once "dbconfig.php"; 
   // Cek status login user 
   if($user->isLoggedIn()){ 
     header("location: header.php"); //redirect ke index 
   } 
   //jika ada data yg dikirim 
   if(isset($_POST['kirim'])){ 
     $username = $_POST['uname']; 
     $password = $_POST['pass']; 
     // Proses login user 
     if($user->login($username, $password)){ 
       header("location: header.php"); 
     }else{ 
       // Jika login gagal, ambil pesan error 
       $error = $user->getLastError(); 
     } 
   } 
  ?> 

 <!DOCTYPE html>  
 <html>  
   <head> 
     <meta charset="utf-8"> 
     <title>Login</title> 
     <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8"> 
   </head> 
   <body> 
     <div class="login-page"> 
      <div class="form"> 
       <form class="login-form" method="post"> 
        <?php if (isset($error)): ?> 
          <div class="error"> 
            <?php echo $error ?> 
          </div> 
        <?php endif; ?> 
        <input type="username" name="uname" placeholder="username" required/> 
        <input type="password" name="pass" placeholder="password" required/> 
        <button type="submit" name="kirim">login</button>
        <p class="message">Belum Mempunyai Akun ? <a href="register.php">Buat Akun Baru</a></p>
       </form> 
      </div> 
     </div> 
   </body> 
 </html>  