<?php 
// penggunaan session
session_start();

if( !isset($_SESSION["Admin"]) ) {
 header("Location: http://localhost/website/form login/login.php");
 exit;
}

// pemanggilan header 
include "template/header.php";
$conn = mysqli_connect('localhost','root','','db_website');
$result3 = mysqli_query($conn,"SELECT * FROM tbl_galeri");


if(isset($_POST['submit'])){
  $foto = $_POST['foto'];
  $deskripsi = $_POST['deskripsi'];
  }

?>
 
    <h3><i class="far fa-image mr-2"></i>Galeri</h3><hr>
        <a  class="btn btn-primary mt-2 ml-3" href="proses_tambah/tambah_galeri.php">[+]Tambah</a>
        <section class="galeri" id="galeri">
      <div class="container">
        <form action="" method="post">
        <div class="row">
          <div class="col-sm-12 text-center">
          </div>
        </div>
        </form>

      <div class="row">
        <?php while($galeri = mysqli_fetch_assoc($result3)):  ?>
          <div class="col-xs-6 col-md-3">
            <div class="thumbnail"><br>
              <img src="img/web/<?= $galeri['foto']; ?>" width="100%">
              <h5><?=$galeri['deskripsi'];?></h5><br>

              <a  class="btn btn-success" href="proses_edit/edit_galeri.php?id=<?=$galeri['id'];?>">Edit</a> 
              <a  class="btn btn-danger" name="hapus" href="proses_hapus/hapus_galeri.php?id=<?=$galeri['id'];?>" onclick="return confirm('yakin dihapus ?');">Hapus</a>
            </div>
          </div>
<?php endwhile;  ?>
        </div>
    </section>
    </div>
<?php 
include "template/footer.php";
  ?>



