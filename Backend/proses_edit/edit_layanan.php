<?php 
include "../template/header.php";
$conn = mysqli_connect('localhost','root','','db_website');

// ambil data dari URL
$id = $_GET["id"];

// query data layanan berdasarkan id
$layanan = query("SELECT * FROM tbl_layanan WHERE id = '$id'")[0];

function query($query) {
  global $conn;
    $result4 = mysqli_query($conn, $query);
      $rows = [];
      while( $row = mysqli_fetch_assoc($result4) ) {
      $rows[] = $row;
    }
  return $rows;
}


function ubah($data){
  global $conn;
  
  $id = $data["id"];
  $deskripsi = htmlspecialchars($data["deskripsi"]);
  $fotolama = htmlspecialchars($data["fotolama"]);

  // cek apakah user pilih gambar baru atau tidak
  if( $_FILES['foto'] ['error'] === 4 ) {
    $foto = $fotolama;
      } else {
    $foto = upload();
  }

  $query = "UPDATE tbl_layanan SET 
          deskripsi = '$deskripsi',
          foto = '$foto'
          WHERE id = $id
          ";
  mysqli_query($conn, $query);

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

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])){
    
    // cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0) {
      echo "
        <script>
        alert('data berhasil di ubah')
        document.location.href = '../layanan.php';
        </script>";
    } else {
      echo "
      <script>
      alert('data gagal di ubah')
        document.location.href = '../layanan.php';
        </script>";
    }
  }
?>
     
<form action="" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
    <h1>Edit Layanan<hr></h1>

  <div class="col-sm-6">
    <input type="hidden" name="id" value="<?= $layanan["id"]; ?>">
    <input type="hidden" name="fotolama" value="<?= $layanan["foto"]; ?>">
    
  <label for="deskripsi" style="color: black;">Deskripsi</label>
    <input type="text" name="deskripsi" required value="<?= $layanan["deskripsi"]; ?>" class =" form form-control">
      <br>

  <label for="foto">Gambar</label> <br>
    <img src="../img/web/<?= $layanan['foto']; ?>"width="60%">
      <br><br>
    <input type="file" name="foto" id="foto"><br>
      
      <button class="btn btn-primary mt-4" type="submit" name="submit">Simpan</button>
    </div>
  </div>
</form>

  <?php 
include "../template/footer.php";
?>
