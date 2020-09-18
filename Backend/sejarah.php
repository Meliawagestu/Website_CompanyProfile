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
$result6 = mysqli_query($conn,"SELECT * FROM tbl_sejarah where id = 1");
$sejarah = mysqli_fetch_assoc($result6);
?>
  <h3><i class="far fa-id-card mr-2"></i>Sejarah</h3><hr>
  <section class="mt-2">
    <div class="container">
      <div class="col-sm-12">
        <ul class="list-group">
          <li class="list-group-item"><h5><?=$sejarah['sejarah']; ?></h5></li>
        </ul>
      </div>
       <a  class="btn btn-success mt-2 ml-3" href="http://localhost/website/Backend/lib_sejarah/edit.php">Edit</a>
    </div>
  </section>
<?php 
include "template/footer.php";
?>
