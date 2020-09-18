<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edit Sejarah</title>
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
$result6 = mysqli_query($conn,"SELECT * FROM tbl_sejarah where id = 1");
$sejarah = mysqli_fetch_assoc($result6);


function query($query) {
  global $conn;
  $result6 = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result6) ) {
    $rows[] = $row;
  }
  return $rows;
}

function ubah($data){
  global $conn;


  $sejarah = $data["sejarah"];

  $query = "UPDATE tbl_sejarah SET sejarah = '$sejarah' where id = 1";

mysqli_query ($conn, $query);

return mysqli_affected_rows($conn);


}

if(isset($_POST['submit'])){
    
    if( ubah($_POST) > 0){
      echo "
        <script>
        alert('data berhasil di edit')
        document.location.href = '../sejarah.php';
        </script>";
    } else {
      echo "
      <script>
      alert('data gagal di edit')
        document.location.href = '../sejarah.php';
        </script>";
    }
  }

?>

<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
      <a class="navbar-brand" href="http://localhost/website/Backend/sejarah.php"> <b>PT.SANTRI NIAGA</b></a> 
      <br>   
    </nav>
  <div class="container">
  <!-- ini sejarah -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
      <h1>Edit Sejarah</h1>
      <div class="row">
         <div class="col-sm-9">

       <textarea id="editor" rows="10" name="sejarah" class="form-control" ><?php echo"$sejarah[sejarah]"; ?></textarea><br>
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


