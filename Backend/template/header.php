<!doctype html>
  <html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="http://localhost/website/Backend/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/lib_berita/summernote.css">
  ss<link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/fontawesome-free/css/all.min.css">
  <title>PT.SANTRI NIAGA</title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar bg-warning fixed-top" >
  <a class="navbar-brand" href="http://localhost/website/Backend/dashboard.php"><b style="color:black">PT.SANTRI NIAGA</b></a>
  <form class="form-inline my-2 my-lg-0 ml-auto"></form>  
    <ul class="navbar-nav ml-auto ml-md-8">
      <li class="nav-item dropdown no-arrow">
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <li><a  href="template/logout.php" onclick="return confirm('Apakah anda yakin ingin logout?');" style="color:black">Logout</a></li>
        </div>
      </li>
    </ul>
</nav>
<div id="wrapper"></div>
<!-- akhiran navbar -->

<div class="row no-gutters mt-4">
  <div class="col-md-2 bg-dark pr-3 pt-1">
    <ul class="nav flex-column ml-3 mb-2">
      <li class="nav-item">
        <a class="nav-link active text-white" href="http://localhost/website/Backend/dashboard.php"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a><hr class="bg-secondary mb-2">
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="http://localhost/website/Backend/sejarah.php"><i class="far fa-id-card mr-2"></i>  Sejarah </a><hr class="bg-secondary mb-2">
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="http://localhost/website/Backend/visimisi.php"><i class="fas fa-braille mr-2"></i> Visi Misi</a><hr class="bg-secondary mb-2">
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="http://localhost/website/Backend/layanan.php"><i class="fab fa-servicestack mr-2"></i>Layanan</a><hr class="bg-secondary mb-2">
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="http://localhost/website/Backend/ketentuan.php"><i class="fas fa-fan mr-2"></i>Isi Layanan</a><hr class="bg-secondary mb-2">
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="http://localhost/website/Backend/galeri.php"><i class="far fa-image mr-2"></i>Galeri</a><hr class="bg-secondary mb-2">
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="http://localhost/website/Backend/prestasi.php"><i class="fas fa-window-restore mr-2"></i>Prestasi</a><hr class="bg-secondary mb-2">
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="http://localhost/website/Backend/pencapaian.php"><i class="fas fa-window-restore mr-2"></i>Pencapaian</a><hr class="bg-secondary mb-2">
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="http://localhost/website/Backend/struktur.php"><i class="fas fa-sitemap mr-2"></i>Struktur</a><hr class="bg-secondary mb-2">
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="http://localhost/website/Backend/berita.php"><i class="fas fa-newspaper mr-2"></i>Berita</a><hr class="bg-secondary mb-2">
      </li>
    </ul>
  </div>
<div class="col-md-10 p-5 pt-2 ">