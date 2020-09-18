<?php 
include "../template/header.php";

//koneksi database
$conn = mysqli_connect('localhost','root','','db_website');

$id = $_GET["id"];

// query data galeri berdasarkan id
$galeri = query("SELECT * FROM tbl_galeri WHERE id = '$id'")[0];


function query($query) {
  global $conn;
    $result3 = mysqli_query($conn, $query);
    $rows = [];
      while( $row = mysqli_fetch_assoc($result3) ) {
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

  $query = "UPDATE tbl_galeri SET 
            deskripsi = '$deskripsi',
            foto = '$foto'
            WHERE id = $id
          ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function upload() {
  $namaFile = $_FILES['foto'] ['name'];
  $ukuranFile =$_FILES ['foto'] ['size'];
  $error = $_FILES ['foto'] ['error'];
  $tmpName = $_FILES ['foto'] ['tmp_name'];

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
        document.location.href = '../galeri.php';
        </script>";
    } else {
      echo "
      <script>
      alert('data gagal di edit')
        document.location.href = '../galeri.php';
        </script>";
    }

  }
?>
     <form action="" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
          <h1>Edit Galeri<hr></h1>
          
          <div class="col-sm-6">
            <input type="hidden" name="id" value="<?= $galeri["id"]; ?>">
            <input type="hidden" name="fotolama" value="<?= $galeri["foto"]; ?>">
          <label for="deskripsi" style="color: black;">Deskripsi</label>
            <input type="text" name="deskripsi" required value="<?= $galeri["deskripsi"]; ?>" class =" form form-control">
            <br>

          <label for="foto">Gambar</label>
            <br>
            <img src="../img/web/<?= $galeri['foto']; ?>" width="200">
              <br><br>
            <input type="file" name="foto" id="foto">
          <br>

      <button class="btn btn-primary mt-4" type="submit" name="submit">Simpan</button>
    </div>
  </div>
</form>

  <?php 
include "../template/footer.php";
?>
