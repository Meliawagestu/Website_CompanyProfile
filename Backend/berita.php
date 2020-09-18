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
$result2 = mysqli_query($conn, "SELECT * FROM tbl_berita ORDER BY id DESC");


// tombol cari ditekan
if( isset($_POST["cari"]) ) {
  $keyword = $_POST["keyword"];

  $result2 = mysqli_query($conn, "SELECT * FROM tbl_berita
          WHERE judul LIKE  '%$keyword%' OR 
          penulis LIKE '%$keyword%' OR
          isi LIKE '%$keyword%'
          order by tbl_berita.id asc

      ");
}


 function query($query) {
  global $conn;
  $result2 = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result2) ) {
    $rows[] = $row;
  }
  return $rows;
}
?>

 
  <h3><i class="fas fa-newspaper mr-2"></i>Berita</h3><hr>
   <section>
    <a  class="btn btn-primary mt-2" href="lib_berita/index.php">[+]Tambah</a>

 <!-- pencarian -->
       <div class="col-md-12">
          <form action="" method="post" style="padding-left: 600px;" class="form-inline my-2 my-lg-0">
            <input type="text" name="keyword" class="form-control mr-sm-2"  size="25" autofocus 
                placeholder="masukkan keyword pencarian..." autocomplete="on">
              <button class="btn btn-info" type="submit" class="form-control" name="cari">Cari</button>
          </form>
<br>

<!-- form berita -->
       <div class="row">
        <?php while($berita = mysqli_fetch_assoc($result2)): ?>
          <div class="col-sm-3 text-center">
            <ul class="list-group"> <br>
              <li class="list-group-item">
                <img src="img/web/<?= $berita['gambar']; ?>"  width="150" height="100">
                <h5><?=$berita['judul']; ?></h5>
               <a  class="btn btn-success" href="lib_berita/edit.php?id=<?=$berita['id'];?>">Edit</a> 
              <a  class="btn btn-danger" href="proses_hapus/hapus_berita.php?id=<?=$berita['id'];?>"  onclick="return confirm('yakin dihapus ?');">Hapus</a>
              </li>
            </ul>
          </div>
<?php endwhile;  ?>

       </div>
    </div>
  </section>

 <?php 
include "template/footer.php";
?>

