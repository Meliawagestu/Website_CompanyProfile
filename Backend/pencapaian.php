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
$result9 = mysqli_query($conn,"SELECT * FROM tbl_pencapaian ORDER BY id DESC");

if(isset($_POST['submit'])){
  $foto = $_POST['foto'];
  $deskripsi = $_POST['deskripsi'];
  }
?>

<h3><i class="fas fa-window-restore mr-2"></i>Pencapaian</h3><hr>
   <section>
    <a  class="btn btn-primary mt-2 " href="proses_tambah/tambah_pencapaian.php">[+]Tambah</a>
       <section class="pencapaian" id="pencapaian">
      <div class="container">
        <form action="" method="post">
        <div class="row">
          <div class="col-sm-12 text-center">
          </div>
        </div>
        </form>

      <div class="row">
        <?php while($pencapaian = mysqli_fetch_assoc($result9)):  ?>
          <div class="col-sm-3 text-center">

            <div class="thumbnail"><br>
              <img src="img/web/<?= $pencapaian['foto']; ?>" width="50%" length="50%">
              <h5><?=$pencapaian['deskripsi'];?></h5><br>

              <a  class="btn btn-success" href="proses_edit/edit_pencapaian.php?id=<?=$pencapaian['id'];?>">Edit</a> 
              <a  class="btn btn-danger" name="hapus" href="proses_hapus/hapus_pencapaian.php?id=<?=$pencapaian['id'];?>" onclick="return confirm('yakin dihapus ?');">Hapus</a>
            </div>
          </div>
<?php endwhile;  ?>
        </div>
    </section>
    </div>
<?php 
include "template/footer.php";
  ?>
