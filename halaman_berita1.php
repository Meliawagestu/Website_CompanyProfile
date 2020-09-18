<?php 
$conn = mysqli_connect('localhost','root','','db_website');
$id = $_GET["id"];
$result2 = mysqli_query($conn, "SELECT * FROM tbl_berita where id = $id");
$berita = mysqli_fetch_assoc($result2);




?>

<!-- 
***************************************************

Bootstrap 4 Responsive News Page by reactexperience

***************************************************
 -->
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
             <ul class="nav navbar-nav navbar-right">
            </ul>
            </div>
      </div>
    </nav>
    </div>
        
    <div class="container" style="margin-top: 70px;">
    <div class="row">
    <div class="col-lg-10">

    <div class="container " >
            <div class="berita mt-5">
            <div class="col-lg-10">
                <h2><b><?=$berita['judul']; ?></b></h2>
                <h5 style="font-size: 16px">Ditulis oleh : <?=$berita['penulis']; ?></h5>
                <h5 style="">Kategori : <?=$berita['kategori']; ?></h5>
               
         
                <div class="col-lg-11">
                    <p><?=$berita['isi']; ?></p>
                </div>
            </div>
        </div>
        
        <div class="rekomendasi mt-5">
            <div class="col-lg-3">
                <h3>Recommended News</h3>
                <hr>
                <div class="card text-center">
                    <div class="card-body">
                        <div class="row">
                   <div class="col">
                       <img src="img/berita.png" class="img-thumbnail" alt="">
                       <a href="#">News Title</a>
                   </div>
                   <div class="col">
                       <img src="img/berita.png" class="img-thumbnail" alt="">
                       <a href="#">News Title</a>
                   </div>
                   <div class="col">
                       <img src="img/berita.png" class="img-thumbnail" alt="">
                       <a href="#">News Title</a>
                   </div>
                   <div class="col>
                       <img src="img/berita.png" class="img-thumbnail" alt="">
                       <a href="#">News Title</a>
                   </div>
               </div>
            </div>
            </div>
        </div>       
    </div>


    </div>

</div>

<div class="col-lg-2 mt-5">
    <div class="related d-none d-md-block d-md-none">
        <div class="card text-center">
            <div class="card-body">
                <h3>Related Post</h3>
                <hr>
                    <img src="img/berita.png" class="img-thumbnail" alt="">
                    <a href="#">News Title</a>
                    <img src="img/berita.png" class="img-thumbnail" alt="">
                    <a href="#">News Title</a>
                    <img src="img/berita.png" class="img-thumbnail" alt="">
                    <a href="#">News Title</a>
                    <img src="img/berita.png" class="img-thumbnail" alt="">
                    <a href="#">News Title</a>
                    <img src="img/berita.png" class="img-thumbnail" alt="">
                    <a href="#">News Title</a>
                    <img src="img/berita.png" class="img-thumbnail" alt="">
                    <a href="#">News Title</a>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body text-center">
                <h5>Advertise Here</h5>
            </div>
        </div>

    </div>
</div>
</div>

</div>

<footer>
    <br>
    <h5 class="text-center">Footer</h5>
</footer>

    <!-- Optional JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>