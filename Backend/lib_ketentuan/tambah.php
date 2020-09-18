<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Tambah Isi Layanan</title>
	  <!-- Required meta tags -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/website/Backend/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/lib_berita/summernote.css">
    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/lib_berita/bootstrap.css"> -->

    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/admin.css"> -->
    <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/fontawesome-free/css/all.min.css">

	<link href="bootstrap.css" rel="stylesheet">
	<script src="jquery.js"></script>
	<script src="bootstrap.js"></script>
	<link href="summernote.css" rel="stylesheet">
	<script src="summernote.js"></script>
</head>
<?php 
// koneksi ke DBMS
$conn = mysqli_connect('localhost','root','','db_website');

// ambil data kategori
$result7 = mysqli_query($conn,"SELECT * FROM tbl_katentuan");

function query($query) {
  global $conn;
  $result7 = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result7) ) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data) {
  global $conn;
  $judul = htmlspecialchars($data["judul"]);
  $isi = $data["isi"];
 
  //  upload gambar
  $foto = upload();
  if( !$foto ) {
    return false; 
  }


  $query = "INSERT INTO tbl_ketentuan 
            VALUES ('', '$foto', '$judul', '$isi')";
  
  mysqli_query($conn,$query);

  return mysqli_affected_rows($conn);
}


function upload(){
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name']; 

  //  cek apakah tidak ada gambar yang di upload
  if( $error === 4 ) {
    echo "<script>
        alert('pilih gambar terlebih dahulu!');
    </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
    echo "<script>
        alert('yang anda upload bukan gambar!');
    </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  $folder = "../img/web/";
  
move_uploaded_file($tmpName, $folder.$namaFileBaru);

  return $namaFileBaru;

}

if(isset($_POST['submit'])){
 
 // cek apakah data berhasil ditambahkan atau tidak
  if( tambah($_POST) > 0 ) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      document.location.href = '../ketentuan.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      document.location.href = '../ketentuan.php';
    </script> 

    ";
   }
 }
?>


  <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
      <a class="navbar-brand" href="http://localhost/website/Backend/berita.php"> <b>PT.SANTRI NIAGA</b></a>    
  </nav>

	<div class="container">
	<!-- ini berita -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
      <h1>Tambah Isi Layanan<hr></h1>
       <div class="row">
         <div class="col-sm-9">
          
          <label>Judul</label>
           <input type="text" name="judul" class="form form-control" required>
           <br>

          <label>Deskripsi</label>
          <textarea type="text" name="isi" class="form-control" id="editor"></textarea>
      
          <button class="btn btn-primary form-control mt-3" type="submit" name="submit">Simpan</button>
        </div>

          <div class="col-sm-3">

          <label>Gambar</label>
             <img src="../img/web/<?= $ketentuan['foto']; ?>"><br>
             <input type="file" name="foto">
             

         
       </div>
     </div>
   </div>
  </form>
 </div>


	<script>
		$(document).ready(function(){
			$('#editor').summernote({
				height:200,
				
			});
		});

	</script>

</html>