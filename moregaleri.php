<?php
$conn = mysqli_connect('localhost','root','','db_website');
$result3 = mysqli_query($conn, "SELECT * FROM tbl_galeri ORDER BY id DESC");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
  $keyword = $_POST["keyword"];

  $result2 = mysqli_query($conn, "SELECT * FROM tbl_galeri
          WHERE deskripsi LIKE  '%$keyword%' 
          order by tbl_galeri.id asc

      ");
}

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

          <a href="index.php" class="navbar-brand page-scroll" style="color:white">PT.Santri Niaga</a>
            </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right"></ul>
        </div>
      </div>
    </nav>


  <div class="jumbotron jumbotron bg-cover">
      <div class="overlay"></div>
      <div class="container">
        <br><br><br>
      <h1 class="text-center"><b>GALERI PT.SANTRI NIAGA</b></h1> 
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
          /*overflow: hidden;

          
*/
        }


    </style>


        <section class="galeri" id="galeri">
      <div class="container">
         <br><br>

          <!-- pencarian -->
       <div class="col-md-12">
          <form action="" method="post" style="padding-left: 380px;" class="form-inline my-2 my-lg-0">
            <input type="text" name="keyword" class="form-control mr-sm-2"  size="40" autofocus 
                placeholder="masukkan keyword pencarian..." autocomplete="off">
              <button class="btn btn-info" type="submit" name="cari">Cari</button>
          </form>
<br><br>


          <div class="row">
            <?php while($galeri =mysqli_fetch_assoc($result3)):  ?>
              <div class="col-sm-3 text-center">
                <ul class="list-group" width="200" height="150">
                  <li class="list-group-item">
                    <img src="Backend/img/web/<?= $galeri['foto']; ?>" width="200" height="150">
              <h4><?=$galeri['deskripsi']; ?></h4>

            </li>
          </ul>
        </div>
      <?php endwhile;  ?>
    </div>
  </div>
</section>
        
      </div>

  </body>
</html>