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
$result4 = mysqli_query($conn, "SELECT * FROM tbl_layanan");


// ketika tombol submit ditekan
if(isset($_POST['submit'])){
  $foto = $_POST['foto'];
  $deskripsi = $_POST['deskripsi'];
  }

?>
 
  <h3><i class="far fa-image mr-2"></i>Layanan</h3><hr>
     <!--  <a  class="btn btn-primary mt-2 ml-3" href="proses_tambah/tambah_layanan.php">[+]Tambah</a> -->
        
        <section class="layanan" id="layanan">
          <div class="container">
            <form action="" method="post">
              <div class="row">
                <div class="col-sm-12 text-center">
              </div>
            </div>
          </form>

      <div class="row text-center">
        <?php while($layanan = mysqli_fetch_assoc($result4)):  ?>
          <div class="col-xs-6 col-md-4">
            <div class="thumbnail"><br>
              <img src="img/web/<?= $layanan['foto']; ?>" width="80%">
                <h5><?=$layanan['deskripsi'];?></h5><br>

          <a class="btn btn-success" href="proses_edit/edit_layanan.php?id=<?=$layanan['id'];?>">Edit</a> 

         <!--  <a class="btn btn-danger" href="proses_hapus/hapus_layanan.php?id=<?=$layanan['id'];?>" onclick="return confirm('yakin dihapus ?');">Hapus</a> -->
          </div>
        </div>
      <?php endwhile;  ?>
    </div>
  </section>
 </div>


  <?php 
    include "template/footer.php";
  ?>



