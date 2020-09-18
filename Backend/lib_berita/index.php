<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Tambah Berita</title>
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
$result2 = mysqli_query($conn,"SELECT * FROM tbl_kategori");

function query($query) {
  global $conn;
  $result2 = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result2) ) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data) {
  global $conn;

  $judul = htmlspecialchars($data["judul"]);
  $penulis = htmlspecialchars($data["penulis"]);
  $kategori = htmlspecialchars($data["kategori"]);
  $isi = $data["isi"];
 
  //  upload gambar
  $gambar = upload();
  if( !$gambar ) {
    return false; 
  }

  $query = "INSERT INTO tbl_berita 
          VALUES ('', '$judul', '$penulis', '$kategori', '$isi', '$gambar')";
  mysqli_query($conn,$query);
  return mysqli_affected_rows($conn);
}

function upload(){

  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name']; 

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

if( isset($_POST["submit"]) ){

  // cek apakah data berhasil ditambahkan atau tidak
  if( tambah($_POST) > 0 ) {
    echo "
 		 <script>
      alert('data berhasil ditambahkan!');
      document.location.href = '../berita.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      document.location.href = '../berita.php';
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
  <div class="row">
    <div class="col-sm-9">
        <label>Judul</label>
          <input type="text" name="judul" class="form-control" required>
            <br>
          
          <label>Isi Berita</label>
            <textarea type="text" name="isi" class="form-control" id="editor"></textarea>
              <br><br>
             <button class="btn btn-info form-control mt-3" type="submit" name="submit">Kirim</button>
         </div>

        <div class="col-sm-3">
           <label>Penulis</label>
            <input type="" class="form-control" name="penulis" required>
          <br>

          <label>Kategori</label><br>
            <select name="kategori">
              <?php while($berita = mysqli_fetch_assoc($result2)):  ?>
               <option class="form form-control" value="<?= $berita['id_kategori'] ?>"><?= $berita['kategori']?></option>
             <?php endwhile; ?>
            </select>
            <br><br>

          <label>Gambar</label>
            <img src="../img/web/<?= $berita['gambar']; ?>">
              <input type="file" name="gambar">
        </div>
      </from>
    </div>

  </div>

	</div>
	<script>
		$(document).ready(function(){
			$('#editor').summernote({
				height:200,
				
			});
		});

	</script>

</html>