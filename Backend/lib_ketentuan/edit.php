<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edit Isi Layanan</title>
	  <!-- Required meta tags -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/website/Backend/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/website/Backend/lib_ketentuan/summernote.css">
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
$id = $_GET["id"];


// query data ketentuan berdasarkan id
$ketentuan = query("SELECT * FROM tbl_ketentuan WHERE id = '$id'")[0];

// ambil data dari tabel ketentuan
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

function ubah($data){
  global $conn;

  $id = $data["id"];
  $judul = htmlspecialchars($data["judul"]);
  $isi = $data["isi"];
  $fotolama = htmlspecialchars($data["fotolama"]);

  // cek apakah user pilih foto baru atau tidak
  if( $_FILES['foto'] ['error'] === 4 ) {
    $foto = $fotolama;
  } else {
    $foto = upload();
  }

  $query = "UPDATE tbl_ketentuan SET 
            judul ='$judul', isi = '$isi', 
            foto ='$foto' 
            WHERE id = $id";

mysqli_query ($conn, $query);

return mysqli_affected_rows($conn);


}

function upload() {

  $namaFile = $_FILES['foto'] ['name'];
  $ukuranFile =$_FILES ['foto'] ['size'];
  $error = $_FILES ['foto'] ['error'];
  $tmpName = $_FILES ['foto'] ['tmp_name'];

  // cek apakah tidak ada foto yanag di upload
  if($error === 4){
    echo "<script>
    alert('pilih foto yang di pilih');
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
    
    if( ubah($_POST) > 0){
      echo "
        <script>
        alert('data berhasil di edit')
        document.location.href = '../ketentuan.php';
        </script>";
    } else {
      echo "
      <script>
      alert('data gagal di edit')
        document.location.href = '../ketentuan.php';
        </script>";
    }
  }

?>

<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
      <a class="navbar-brand" href="http://localhost/website/Backend/ketentuan.php"> <b>PT.SANTRI NIAGA</b></a>    
    </nav>
  <div class="container">
  <!-- ini ketentuan -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
      <h1>Edit Isi Layanan</h1>
      <div class="row">
         <div class="col-sm-9">

           <input type="hidden" name="id" value="<?= $ketentuan["id"]; ?>">
           <input type="hidden" name="fotolama" value="<?= $ketentuan["foto"]; ?>">

      <label for="judul" style="color: black;">Judul</label>
      <input type="teks" name="judul" required value="<?= $ketentuan["judul"]; ?>" class ="form form-control">
      <br>

       <label for="isi" style="color: black;">Deskripsi</label><br>
       <textarea id="editor" rows="10" name="isi" class="form-control" ><?php echo"$ketentuan[isi]"; ?></textarea><br>
      <button class="btn btn-primary form-control mt-3" type="submit" name="submit">Simpan</button>
     </div>
    <div class="col-sm-3">

      <label for="foto">Gambar</label>
      <img src="../img/web/<?= $ketentuan['foto']; ?>" width="200">
      <input type="file" name="foto" id="foto">
      <br>

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


