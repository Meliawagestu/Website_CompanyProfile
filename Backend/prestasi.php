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
$result8 = mysqli_query($conn,"SELECT * FROM tbl_prestasi");

if(isset($_POST['submit'])){
  $foto = $_POST['foto'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  }
?>

 
  <h3><i class="fas fa-window-restore mr-2"></i>Prestasi</h3><hr>
   <section>
    <a  class="btn btn-primary mt-2 " href="proses_tambah/tambah_prestasi.php">[+]Tambah</a><br>
       <div class="row">
        <br>

        <?php while($prestasi = mysqli_fetch_assoc($result8)):  ?>
          <div class="col-sm-3 text-center">

            <ul class="list-group">
              <br>
              <li class="list-group-item">
                <br>
                <img src="img/web/<?= $prestasi['foto']; ?>" width="50%" length="50%">
                <h3><?=$prestasi['judul']; ?></h3>
                <p><?=$prestasi['isi']; ?></p>
                 <a  class="btn btn-success" href="proses_edit/edit_prestasi.php?id=<?=$prestasi['id'];?>">Edit</a> 
              <a  class="btn btn-danger" href="proses_hapus/hapus_prestasi.php?id=<?=$prestasi['id'];?>"  onclick="return confirm('yakin dihapus ?');">Hapus</a>
              </li>
            </ul>
          </div>
<?php endwhile;  ?>
       </div>
    </div>
  </section>
  <section class="mt-5">
  </section>
 <?php 
include "template/footer.php";
?>

