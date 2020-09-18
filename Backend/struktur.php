<?php
// penggunaan session
session_start();

if( !isset($_SESSION["Admin"]) ) {
 header("Location: http://localhost/website/form login/login.php");
 exit;
}

  // pemanggilan header 
include "template/header.php";
// koneksi database
$conn = mysqli_connect('localhost','root','','db_website');
$result5 = mysqli_query($conn,"SELECT * FROM tbl_struktur");

?>
        <div id="structur">
          <h2><i class="fas fa-sitemap mr-2"></i>Struktur Organisasi</h2><hr>
      <div class="container">
        <div class="row">
          <?php while($struktur = mysqli_fetch_assoc($result5)):  ?>
            <div class="col-lg-4 text-center">
              <img src="img/web/<?= $struktur['foto']; ?>" width="50%">
                <p><b><?=$struktur['jabatan']; ?></b></p>
                <p><?=$struktur['nama']; ?></p>
          <a class="btn btn-success" href="proses_edit/edit_struktur.php?id=<?=$struktur['id'];?>">Edit</a>
                <br><br>
              </div>
            <?php endwhile;  ?>
          </div>
        </div>
      </div>
    
<?php 
include "template/footer.php";
?>


  