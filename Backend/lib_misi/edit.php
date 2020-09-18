<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edit Misi</title>
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

// query data service berdasarkan id
$result1 = mysqli_query($conn,"SELECT * FROM tbl_misi where id = 1");
$misi = mysqli_fetch_assoc($result1);

// // ambil data dari tabel misi
// $result1 = mysqli_query($conn,"SELECT * FROM tbl_kategori");



function query($query) {
  global $conn;
  $result1 = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result1) ) {
    $rows[] = $row;
  }
  return $rows;
}

function ubah($data){
  global $conn;


  $misi = $data["misi"];

  $query = "UPDATE tbl_misi SET misi = '$misi' where id = 1";

mysqli_query ($conn, $query);

return mysqli_affected_rows($conn);


}

if(isset($_POST['submit'])){
    
    if( ubah($_POST) > 0){
      echo "
        <script>
        alert('data berhasil di edit')
        document.location.href = '../visimisi.php';
        </script>";
    } else {
      echo "
      <script>
      alert('data gagal di edit')
        document.location.href = '../visimisi.php';
        </script>";
    }
  }

?>

<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
      <a class="navbar-brand" href="http://localhost/website/Backend/visimisi.php"> <b>PT.SANTRI NIAGA</b></a> 
      <br>   
    </nav>
  <div class="container">
  <!-- ini misi -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
      <h1>Edit Misi</h1>
      <div class="row">
         <div class="col-sm-9">

       <textarea id="editor" rows="10" name="misi" class="form-control" ><?php echo"$misi[misi]"; ?></textarea><br>
      <button class="btn btn-primary form-control mt-3" type="submit" name="submit">Simpan</button>
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


