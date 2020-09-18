<?php 
$conn = mysqli_connect('localhost','root','','db_website');
$result = mysqli_query($conn,"SELECT * FROM tbl_visi where id_visi = 2");
$result1 = mysqli_query($conn,"SELECT * FROM tbl_misi where id = 1");
$result2 = mysqli_query($conn,"SELECT * FROM tbl_berita ORDER BY id DESC LIMIT 8");
$result3 = mysqli_query($conn,"SELECT * FROM tbl_galeri");
$result5 = mysqli_query($conn,"SELECT * FROM tbl_struktur");
$result6 = mysqli_query($conn,"SELECT * FROM tbl_sejarah where id = 1");
$result8 = mysqli_query($conn,"SELECT * FROM tbl_prestasi");
$result9 = mysqli_query($conn,"SELECT * FROM tbl_pencapaian");
$layanan1 = mysqli_query($conn,"SELECT * FROM tbl_layanan WHERE id IN ('1')");
$layanan2 = mysqli_query($conn,"SELECT * FROM tbl_layanan WHERE id IN ('2')");
$layanan3 = mysqli_query($conn,"SELECT * FROM tbl_layanan WHERE id IN ('6')");
$more1 = mysqli_query($conn,"SELECT * FROM tbl_struktur WHERE id IN ('1') ");
$more2 = mysqli_query($conn,"SELECT * FROM tbl_struktur WHERE id IN ('2') ");
$more3 = mysqli_query($conn,"SELECT * FROM tbl_struktur WHERE id IN ('3') ");
$more4 = mysqli_query($conn,"SELECT * FROM tbl_struktur WHERE id IN ('4') ");
$more5 = mysqli_query($conn,"SELECT * FROM tbl_struktur WHERE id IN ('5') ");
$visi = mysqli_fetch_assoc($result);
$misi = mysqli_fetch_assoc($result1);
$sejarah = mysqli_fetch_assoc($result6);
?>


<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="shortcut icon" href="favicon.ico">
   <title>PT SANTRI NIAGA</title>
    


    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<!-- navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#home" class="navbar-brand page-scroll" style="color:white">PT.Santri Niaga</a>
    </div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav navbar-right">
  <li class="dropdown" style="background-color: #66326f;">
    <a class="nv dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Tentang</a>
      <div class="dropdown-menu" style="background-color: #66326f; ">
        <div class="text-center">
          <a href="#about" class="page-scroll" style="color:white">Sejarah</a><br>
          <a href="#visimisi" class="page-scroll" style="color:white">Visi Misi</a>
      </div>
    </div>
  </li>
                         
    <li><a href="#service" class="page-scroll"  style="color:white">Layanan</a></li>
    <li><a href="#galeri" class="page-scroll" style="color:white">Galeri</a></li>
    <li><a href="#prestasi" class="page-scroll" style="color:white">Prestasi</a></li>
    <li><a href="#pencapaian" class="page-scroll" style="color:white">Pencapaian</a></li>
    <li><a href="#structur" class="page-scroll" style="color:white">Struktur</a></li>
    <li><a href="#berita" class="page-scroll" style="color:white">Berita</a></li>
    <li><a href="#kontak" class="page-scroll" style="color:white">Kontak</a></li>
  </ul>
</div>
</div>
</nav>

    

    <!-- jumbotron -->
     <div class="jumbotron jumbotron bg-cover">
      <div class="overlay"></div>
      <div class="container">
      <img src="img/web/logoo.png" class="text-left">
      <h1>PT. SANTRI NIAGA</h1>
      <p>TOURS AND TRAVEL</p>
      </div>
    </div>
    <!-- akhir jumbotron -->


    <!-- sejarah -->
    <section class="about" id="about">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center">Sejarah</h2>
            <hr>
         </div>
        </div>

        <div class="row">

             <div class="gerakk">
              <div class="text-center">
            <img src="img/web/logoo.png" width="200">
              </div>
              </div>
              <br>


      <p>
    <div class="text-center">
        <a class="btn"  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="color: white">Klik disisni</a>
    </div>

      </p>
    <div class="collapse" id="collapseExample">

      <div class="text-center">
         <?=$sejarah['sejarah']; ?>
         <br><br>
         </div>
    </div>
         
        <!--  <div class="col-lg-20 col-sm-offsect-5">
          <div class="text-center">
         <?=$sejarah['sejarah']; ?>
         <br><br>
         </div>
         </div>
 -->
         

     
    </div>
  </section>
  <!-- akhir sejarah -->


    <!-- Visi Misi -->

    <section class="visimisi" id="visimisi">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center">Visi Misi</h2>
            <hr>
          </div>
        </div>

          <div class="row">
            <div class="gerak">
              <div class="col-md-6">
                <img src="img/client/vs1.png" width="550">
              </div>
            </div>
          

         <div class="col-md-6">
          <h3 class="text-center"><b>Visi</b></h3>
          <p class="text-center"><?=$visi['visi']; ?></p>

          <br>
 
         <h3 class="text-center"><b>Misi</b></h3>
             <p class="text-center"><?=$misi['misi']; ?></p>
          </div>
        </div>
        </div>
   
    </section>
          

  <!-- layanan-->
   <section class="service" id="service">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Layanan</h2>
              <hr>
            </div>
          </div>

      <div class="row">
        <?php while($layanan =$layanan1->fetch_array()):  ?>
          <div class="col-xs-12 col-md-4 col-lg-4">
            <div class="thumbnail">
              <img src="Backend/img/web/<?= $layanan['foto']; ?>" width="200">
              <hr>
              <a href="isiumroh.php"><h4 class="text-center"><?=$layanan['deskripsi'];?></h4></a>
            </div>
          </div>
<?php endwhile;  ?>

<div class="row">
        <?php while($layanan =$layanan2->fetch_array()):  ?>
          <div class="col-xs-12 col-md-4 col-lg-4">
            <div class="thumbnail">
              <img src="Backend/img/web/<?= $layanan['foto']; ?>" width="200">
              <hr>
              <a href="isitour.php"><h4 class="text-center"><?=$layanan['deskripsi'];?></h4></a>
            </div>
          </div>
<?php endwhile;  ?>

<div class="row">
        <?php while($layanan =$layanan3->fetch_array()):  ?>
          <div class="col-xs-12 col-md-4 col-lg-4">
            <div class="thumbnail">
              <img src="Backend/img/web/<?= $layanan['foto']; ?>" width="200">
              <hr>
              <a href="isihaji.php"><h4 class="text-center"><?=$layanan['deskripsi'];?></h4></a>
            </div>
          </div>
<?php endwhile;  ?>
</section>
<!-- end layanan -->

<!-- galeri -->
<section class="galeri" id="galeri">
<div class="container">
<div class="col-sm-12 text-center">
  <h1>Galeri</h1>
       <hr>
  </div>

<div class="row">
  <?php while($galeri = mysqli_fetch_assoc($result3)):  ?>
    <div class="col-xs-6 col-md-3">
      <div class="sentuh">
        <div class="thumbnail"> 
        <a href="Backend/img/web/<?= $galeri['foto']; ?>"><img src="Backend/img/web/<?= $galeri['foto']; ?>"></a>
        <h4 class="text-center"><?=$galeri['deskripsi'];?></h4>
      </div>
    </div>
</div>
<?php endwhile;  ?>
</section>
<!-- End galeri -->


      
<!-- Prestasi -->

      <section class="prestasi" id="prestasi">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
            <h2>Prestasi</h2>
            <hr>
          </div>
        </div>


        <div class="row">
          <?php while($prestasi = mysqli_fetch_assoc($result8)):  ?>
            <div class="col-xs-12 col-md-4">
              <div class="thumbnail">
                <img class="img" width="100" src="Backend/img/web/<?= $prestasi['foto']; ?>">
                 <h3 class="text-center"><b><?=$prestasi['judul']; ?></b></h3>
                 <span class="text-center"><?=$prestasi['isi']; ?><br></span> 
              </div>
            </div>
          <?php endwhile;  ?>
          <br><br>
        </div>
        </section>
        <!-- End Prestasi -->


      <!-- Pencapaian -->
       <section class="pencapaian" id="pencapaian">
        <div class="container">
          <div class="row"> 
         <div class="col text-center">
           <h1>Pencapaian</h1>
          <hr>
        </div>
         </div>

          <div class="row text-center">          
            <?php while($pencapaian = mysqli_fetch_assoc($result9)):  ?>
              <div class="col-xs-6 col-md-3">
                <div class="thumbnail"> 
                  <img src="Backend/img/web/<?= $pencapaian['foto']; ?>" width="90%">
                 <h4><?=$pencapaian['deskripsi'];?></h4>
                </div>
              </div>
            <?php endwhile;  ?>
            </section>

  <!-- End Pencapaian-->
      

  <!-- struktur -->
  <section class="structur" id="structur">
    <div class="container">
      <div class="row">
        <h2 class="col-sm-12 text-center" style="font-family: monserrat">Struktur</h2><hr>
      <div class="col-lg-12 text-center">
    </div>
  </div>

  <?php while($struktur =$more1->fetch_array()):  ?>
    <div class="col-sm-12 text-center">
      <img src="Backend/img/web/<?= $struktur['foto']; ?>" style="margin-right: 40px;" width="250" class="img-circle img-fluid">
        <h5><b><?=$struktur['jabatan']; ?></b></h5>
        <h5><?=$struktur['nama']; ?></h5>
    </div>
  <?php endwhile;  ?>


  <?php while($struktur =$more2->fetch_array()):  ?>
    <div class="col-sm-6 text-center">
      <img src="Backend/img/web/<?= $struktur['foto']; ?>" style="margin-right: 40px;" width="250" class="img-circle img-fluid">
        <h5><b><?=$struktur['jabatan']; ?></b></h5>
        <h5><?=$struktur['nama']; ?></h5>
    </div>
  <?php endwhile;  ?>


  <?php while($struktur =$more3->fetch_array()):  ?>
    <div class="col-sm-6 text-center">
      <img src="Backend/img/web/<?= $struktur['foto']; ?>" style="margin-right: 40px;" width="250" class="img-circle img-fluid">
        <h5><b><?=$struktur['jabatan']; ?></b></h5>
        <h5><?=$struktur['nama']; ?></h5>  
    </div>
  <?php endwhile;  ?>


  <?php while($struktur =$more4->fetch_array()):  ?>
    <div class="col-sm-6 text-center">
      <img src="Backend/img/web/<?= $struktur['foto']; ?>" style="margin-right: 40px;" width="250" class="img-circle img-fluid">
        <h5><b><?=$struktur['jabatan']; ?></b></h5>
        <h5><?=$struktur['nama']; ?></h5>
      </div>
  <?php endwhile;  ?>


  <?php while($struktur =$more5->fetch_array()):  ?>
    <div class="col-sm-6 text-center">
      <img src="Backend/img/web/<?= $struktur['foto']; ?>" style="margin-right: 40px;" width="250" class="img-circle img-fluid">
        <h5><b><?=$struktur['jabatan']; ?></b></h5>
        <h5><?=$struktur['nama']; ?><br><br></h5>     
      </div>
  <?php endwhile;  ?>
</section>

  <!-- berita -->
    <section class="berita" id="berita">  
      <div class="container">
        <div class="col-sm-12 text-center">
        <h1>Berita</h1>
        <hr>
      </div>


     <div class="row">
       <?php while($berita =mysqli_fetch_assoc($result2)):  ?> 
        <div class="col-sm-3 text-center">
          <div class="thumbnail">
          <ul class="list-group"> 
              <img src="Backend/img/web/<?= $berita['gambar']; ?>" width="180" height="150">
              <h3><?=$berita['judul']; ?></h3>
              <a href="http://localhost/website/halaman_berita.php?id=<?=$berita['id']; ?>" class="btn btn-primary">Selengkapnya</a>
          </ul>
           </div>
        </div>
       <?php endwhile;  ?> 
    </div>
    <div class="text-center">
    <a href="http://localhost/website/moreberita.php" class="btn btn-danger">Lihat Semua Berita</a><br><br>
    </div>
  </div>
  
</section>      
<!-- ini akhiran berita -->
 

<!-- map dan kontak -->
<section class="kontak" id="kontak">
<div class="container">
  <div class="row">
    <h2 class="col-sm-12 text-center" style="font-family: monserrat">Kontak</h2>
    <hr>
  </div>

<div class="row">
<div class="col-md-6">
  <div id="alamat main-alamat">
    <div class="row text-center">
      <div class="col-md-12">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.7423505515526!2d108.20560571432199!3d-7.382744674718821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f57c6cbc5dc15%3A0x966886116a79d198!2sPT.%20Santri%20Niaga!5e0!3m2!1sid!2sid!4v1567344062229!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </div>
  </div>
</div>
      
<div class="col-md-6">
<h3 class="text-center"><b>Hubungi kami :</b></h3><br>
  <div class="text-center">
    <a href="https://api.whatsapp.com/send?text=Assalam%27alaikum%2C%20perkenalkan%20nama%20saya=6285317463933"
        "><img src="img/whsa1.png" width="65">WhatsApp</a><br><br>
    <a href="https://instagram.com/umroh_tasikmalaya?igshid=pqvcfj06unuw"><img src="img/web/ig.png" width="50"> Instagram</a><br><br>
    <a href="https://www.facebook.com/Santriniagatoursandtravel/"><img src="img/fbcc1.png" width="50"> Facebook</a><br><br>
    <a href="https://youtube.com/channel/UC5PCeDGuZW-xAKQOBxMqEfw"><img src="img/ybbb1.png" 
          width="55"> Youtube</a>
    </div>
   </div>
  </div>
 </div>
</section>

<!-- footer -->
<footer>
  <div class="container text-center">
    <div class="row">
      <div class="col-sm-12">
          <p>Jl. Sukalaya Barat No.54/31 Tasikmalaya - Jawa Barat - Indonesia <br>
               &copy; copyright 2019  | built by. PT Santri Niaga </p><br>
      <div class="text-center">
           <img src="img/Client/sn (9).jpg" width="80" height="50">
           <img src="img/Client/sn (10).jpg" width="80" height="50">
           <img src="img/Client/sn (11).jpg" width="80" height="50">
           <img src="img/Client/sn (7).jpg" width="80" height="50">
           <img src="img/Client/sn (8).jpg" width="80" height="50">
           <img src="img/Client/sn (9).jpg" width="80" height="50">
           <br>
          </div>
        </div>
      </div> 
    </div>
</footer>
<!-- akhir footer -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
 -->
  </body>
</html>