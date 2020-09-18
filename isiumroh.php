<?php 
$conn = mysqli_connect('localhost','root','','db_website');
// $id = $_GET["id"];
$umroh1 = mysqli_query($conn,"SELECT * FROM tbl_ketentuan WHERE id IN ('1') ");
$umroh2 = mysqli_query($conn,"SELECT * FROM tbl_ketentuan WHERE id IN ('3') ");
$umroh3 = mysqli_query($conn,"SELECT * FROM tbl_ketentuan WHERE id IN ('5') ");
$umroh4 = mysqli_query($conn,"SELECT * FROM tbl_ketentuan WHERE id IN ('6') ");
$umroh5 = mysqli_query($conn,"SELECT * FROM tbl_ketentuan WHERE id IN ('7') ");
$umroh6 = mysqli_query($conn,"SELECT * FROM tbl_ketentuan WHERE id IN ('12') ");
// $ketentuan = mysqli_fetch_assoc($result7);
?>

<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title>PT SANTRI NIAGA</title>

  </head>
  <body>

    <!-- navbar -->
  
    <nav class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container-fluite">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="http://localhost/website/index.php" class="navbar-brand page-scroll" style="color:white">Back</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav navbar-right">
            </ul>
            </div>
      </div>
    </nav>

    <div class="jumbotron jumbotron bg-cover">
      <div class="overlay"></div>
      <div class="container">
        <br><br><br>
      <h1 class="text-center"><b>PAKET UMROH</b></h1> 
      </div>
    </div>
  </div>

    <style type="text/css">
      .jumbotron {
          height: 300px;
          background-image: url('img/bgn1.jpg');
          background-attachment: fixed;
          background-size: cover;
          background-position: 0 -5px;
          color: #eaeaea;
          overflow: hidden;
        }

        .ketentuan{
  background-color: #d8aae0;
  
}

.ketentuan .row{
font-size: 18px;
}
/*.ketentuan .thumbnail{
background-color: #d8aae0;
 
 }*/
    </style>



  <section class="ketentuan" id="ketentuan">
    <div class="container">

    <div class="row">
      <?php while($ketentuan =$umroh1->fetch_array()):  ?>

      <div class="col-sm-12 text-center"><br><br>
        <h4 class="text-center"><b><?=$ketentuan['judul']; ?></b></h4>
        <hr>
      </div>
    </div>

    <div class="row"> 
      <div class="col-md-4"><br><br>
           <img src="Backend/img/web/<?= $ketentuan['foto']; ?>" width="250"></div>
                  
        <div class="col-sm-8">
          <p><?=$ketentuan['isi']; ?></p> 
        </div> 
      </div>
     <?php endwhile;  ?> 
    </div>
  </section>



  <section class="ketentuan" id="ketentuan">
    <div class="container">

    <div class="row">
      <?php while($ketentuan =$umroh2->fetch_array()):  ?>

      <div class="col-sm-12 text-center"><br><br>
        <h4 class="text-center"><b><?=$ketentuan['judul']; ?></b></h4>
        <hr>
      </div>
    </div>

        <div class="row"> 
          <div class="col-md-4"><br><br>
            <img src="Backend/img/web/<?= $ketentuan['foto']; ?>" width="250"></div>
                  
        <div class="col-sm-8">
          <p><?=$ketentuan['isi']; ?></p> 
        </div> 
      </div>
     <?php endwhile;  ?> 
    </div>
  </section>



<section class="ketentuan" id="ketentuan">
    <div class="container">
 <div class="row">
      <?php while($ketentuan =$umroh3->fetch_array()):  ?>

      <div class="col-sm-12 text-center"><br><br>
        <h4 class="text-center"><b><?=$ketentuan['judul']; ?></b></h4>
        <hr>
      </div>
    </div>

        <div class="row"> 
          <div class="col-md-4"><br><br>
            <img src="Backend/img/web/<?= $ketentuan['foto']; ?>" width="250"></div>
                  
        <div class="col-sm-8">
          <p><?=$ketentuan['isi']; ?></p> 
        </div> 
      </div>
     <?php endwhile;  ?> 
    </div>
  </section>


<section class="ketentuan" id="ketentuan">
    <div class="container">
   <div class="row">
      <?php while($ketentuan =$umroh4->fetch_array()):  ?>

      <div class="col-sm-12 text-center"><br><br>
        <h4 class="text-center"><b><?=$ketentuan['judul']; ?></b></h4>
        <hr>
      </div>
    </div>

        <div class="row"> 
          <div class="col-md-4"><br><br>
            <img src="Backend/img/web/<?= $ketentuan['foto']; ?>" width="250"></div>
                  
        <div class="col-sm-8">
          <p><?=$ketentuan['isi']; ?></p> 
        </div> 
      </div>
     <?php endwhile;  ?> 
    </div>
  </section>


<section class="ketentuan" id="ketentuan">
    <div class="container">
   <div class="row">
      <?php while($ketentuan =$umroh5->fetch_array()):  ?>

      <div class="col-sm-12 text-center"><br><br>
        <h4 class="text-center"><b><?=$ketentuan['judul']; ?></b></h4>
        <hr>
      </div>
    </div>

        <div class="row"> 
          <div class="col-md-4"><br><br>
            <img src="Backend/img/web/<?= $ketentuan['foto']; ?>" width="250"></div>
                  
        <div class="col-sm-8">
          <p><?=$ketentuan['isi']; ?></p> 
        </div> 
      </div>
     <?php endwhile;  ?> 
    </div>
  </section>

  <section class="ketentuan" id="ketentuan">
    <div class="container">
   <div class="row">
      <?php while($ketentuan =$umroh6->fetch_array()):  ?>

      <div class="col-sm-12 text-center"><br><br>
        <h4 class="text-center"><b><?=$ketentuan['judul']; ?></b></h4>
        <hr>
      </div>
    </div>

        <div class="row"> 
          <div class="col-md-4"><br><br>
            <img src="Backend/img/web/<?= $ketentuan['foto']; ?>" width="250"></div>
                  
        <div class="col-sm-8">
          <p><?=$ketentuan['isi']; ?></p> 
        </div> 
      </div>
     <?php endwhile;  ?> 
    </div>
  </section>