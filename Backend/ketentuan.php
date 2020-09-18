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
$result7 = mysqli_query($conn,"SELECT * FROM tbl_ketentuan");

if(isset($_POST['submit'])){
  $foto = $_POST['foto'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi']; 
  }

?>


  <h3><i class="fas fa-newspaper mr-2"></i>Isi Layanan</h3><hr>
   <section>
    <a  class="btn btn-primary mt-2 " href="lib_ketentuan/tambah.php">[+]Tambah</a><br>
       <div class="row">
        <br>

        <?php while($ketentuan = mysqli_fetch_assoc($result7)):  ?>
          <div class="col-sm-4 text-center">

            <ul class="list-group">
              <br>
              <li class="list-group-item">
                <br>
                <img src="img/web/<?= $ketentuan['foto']; ?>" width="50%" length="50%">
                <h3><?=$ketentuan['judul']; ?></h3>
                <p align="left"><?=$ketentuan['isi']; ?></p>
                 <a  class="btn btn-success" href="lib_ketentuan/edit.php?id=<?=$ketentuan['id'];?>">Edit</a> 
              <a  class="btn btn-danger" href="proses_hapus/hapus_ketentuan.php?id=<?=$ketentuan['id'];?>"  onclick="return confirm('yakin dihapus ?');">Hapus</a>
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

