<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edit Berita</title>
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
$id = $_GET["id"];

// query data service berdasarkan id
$berita = query("SELECT * FROM tbl_berita WHERE id = '$id'")[0];

// ambil data dari tabel berita
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

function ubah($data){
  global $conn;

  $id = $data["id"];
  $judul = htmlspecialchars($data["judul"]);
  $penulis = htmlspecialchars($data["penulis"]);
  $kategori = htmlspecialchars($data["kategori"]);
  $isi = $data["isi"];
  $fotolama = htmlspecialchars($data["fotolama"]);

  // cek apakah user pilih gambar baru atau tidak
  if( $_FILES['gambar'] ['error'] === 4 ) {
    $gambar = $fotolama;
  } else {
    $gambar = upload();
  }

  $query = "UPDATE tbl_berita SET
            judul ='$judul',
             penulis ='$penulis',
             id_kategori='$kategori',
             isi = '$isi', 
            gambar ='$gambar'
             WHERE id =  $id";

mysqli_query ($conn, $query);

return mysqli_affected_rows($conn);


}

function upload() {

  $namaFile = $_FILES['gambar'] ['name'];
  $ukuranFile =$_FILES ['gambar'] ['size'];
  $error = $_FILES ['gambar'] ['error'];
  $tmpName = $_FILES ['gambar'] ['tmp_name'];

  // cek apakah tidak ada gambar yanag di upload
  if($error === 4){
    echo "<script>
    alert('pilih gambar yang di pilih');
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
        document.location.href = '../berita.php';
        </script>";
    } else {
      echo "
      <script>
      alert('data gagal di edit')
        document.location.href = '../berita.php';
        </script>";
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
      <h1>Edit Berita</h1>
      <div class="row">
         <div class="col-sm-9">

           <input type="hidden" name="id" value="<?= $berita["id"]; ?>">
           <input type="hidden" name="fotolama" value="<?= $berita["gambar"]; ?>">

      <label for="judul" style="color: black;">Judul</label>
      <input type="teks" name="judul" required value="<?= $berita["judul"]; ?>" class =" form form-control">

      <br>

       <label for="isi" style="color: black;">Isi</label><br>
       <textarea id="editor" rows="10" name="isi" class="form-control" ><?php echo"$berita[isi]"; ?></textarea><br>

      <button class="btn btn-primary form-control mt-3" type="submit" name="submit">Simpan</button>
      </div>

      <div class="col-sm-3">

      <label for="penulis" style="color: black;">Penulis</label>
      <input type="" name="penulis" required value="<?= $berita["penulis"]; ?>" class =" form form-control">
      <br>

      <label>Kategori</label>
      <select name="kategori">
      <?php while($berita = mysqli_fetch_assoc($result2)):  ?>
      <option value="<?= $berita['id_kategori'] ?>"><?= $berita['kategori']?></option>
      <?php endwhile; ?>
     </select>
     <br>

      <label for="gambar">Gambar</label>
      <img src="../img/web/<?= $berita['gambar']; ?>" width="200">
      <br><br>
      <input type="file" name="gambar" id="gambar">
      <br>
      
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


