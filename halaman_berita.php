<?php 
$conn = mysqli_connect('localhost','root','','db_website');
$id = $_GET["id"];
$result2 = mysqli_query($conn, "SELECT * FROM tbl_berita,tbl_kategori where tbl_berita.id_kategori=tbl_kategori.id_kategori and id=$id");
$berita = mysqli_fetch_assoc($result2);
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

          <a href="http://localhost/website/moreberita.php" class="navbar-brand page-scroll" style="color:white">Back</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav navbar-right">
            </ul>
            </div>
      </div>
    </nav>


<section class="text-center" style="margin-top: 80px;">
	<div class="container">
		<div class="col-sm-12">
                <h2><b><?=$berita['judul']; ?></b></h2>
                <h5 style="font-size: 16px">Ditulis oleh : <?=$berita['penulis']; ?></h5>
                <h5 style="">Kategori : <?=$berita['kategori']; ?></h5><br>
                <p><?=$berita['isi']; ?></p>
		</div>
	</div>
</section>
  </body>
</html>