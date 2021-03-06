<?php 
include "../template/header.php";
// koneksi ke DBMS
$conn = mysqli_connect('localhost','root','','db_website');


function query($query) {
  global $conn;
  $result4 = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result4) ) {
    $rows[] = $row;
  }
  return $rows;
}


function tambah($data) {
  global $conn;
    $deskripsi = htmlspecialchars($data["deskripsi"]);
 
  //  upload gambar
  $foto = upload();
  if( !$foto ) {
    return false; 
  }

$query = "INSERT INTO tbl_layanan 
          VALUES ('', '$foto', '$deskripsi')";
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

if( isset($_POST["submit"]) ){

  // cek apakah data berhasil ditambahkan atau tidak
  if( tambah($_POST) > 0 ) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      document.location.href = '../layanan.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      document.location.href = '../layanan.php';
    </script> 

    ";
   }
 }

?>

 <form action="" method="post" enctype="multipart/form-data">
     <div class="container-fluid">
      <h1>Tambah Layanan <hr></h1>

         <div class="col-sm-3">
            <label>Gambar</label>
             <img src="../img/web/<?= $layanan['foto']; ?>">
            <input type="file" name="foto">
           <br>
  
        <div class="form-group col-lg-20">
          <br>
          <label>Judul</label>
           <input type="text" name="deskripsi" class="form form-control" required>
           <br>
            <button class="btn btn-primary mt-1" type="submit" name="submit">Simpan</button>
           </div>
      </div>
    </div>
   </form>
     


  <?php 
include "../template/footer.php";
?>
