<?php 
// penggunaan session
session_start();

if( !isset($_SESSION["Admin"]) ) {
 header("Location: http://localhost/website/form login/login.php");
 exit;
}

include "template/header.php";
$conn = mysqli_connect('localhost','root','','db_website');
$result = mysqli_query($conn,"SELECT * FROM tbl_visi where id_visi = 2");
$visi = mysqli_fetch_assoc($result);
$result1 = mysqli_query($conn,"SELECT * FROM tbl_misi where id = 1");
$misi = mysqli_fetch_assoc($result1);
?>
  <section class="mt-4">
    <div class="container">
      <div class="col-sm-12">
        <label><h3><i class="fas fa-braille mr-2"></i> VISI</h3></label>
        <ul class="list-group">
          <li class="list-group-item"><h5><?=$visi['visi']; ?></h5></li>
        </ul>
      </div>
       <a  class="btn btn-success mt-2 ml-3" href="http://localhost/website/Backend/proses_edit/edit_visimisi.php">Edit</a>
       <div class="col-sm-12 mt-5">
        <label><h3><i class="fas fa-braille mr-2"></i>MISI</h3></label>
        <ul class="list-group">
          <li class="list-group-item"><h5><?=$misi['misi']; ?></h5></li>
        </ul>
      </div>
      <a  class="btn btn-success mt-2 ml-3" href="http://localhost/website/Backend/lib_misi/edit.php">Edit</a>
  </section>
<?php 
include "template/footer.php";
?>
