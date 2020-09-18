<?php
session_start();

if( !isset($_SESSION["Admin"]) ) {
 header("Location: http://localhost/website/form login/login.php");
 exit;
}
include "template/header.php";
?>
    <div class="col-md-10 p-2 pt-2 text-center">
      <h2>Selamat Datang Admin</h2><hr>
      <br>
      <img src="sn (1).jpg">
          
<?php 
include "template/footer.php";
?>


