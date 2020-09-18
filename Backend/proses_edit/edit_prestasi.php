<?php 
include "../template/header.php";
$conn = mysqli_connect('localhost','root','','db_website');

// ambil data dari URL
$id = $_GET["id"];

// query data produk berdasarkan id
$prestasi = query("SELECT * FROM tbl_prestasi WHERE id = '$id'")[0];

function query($query) {
  global $conn;
  $result8 = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result8) ) {
    $rows[] = $row;
  }
  return $rows;
}

function ubah($data) {
  global $conn;

  $id = $data["id"];
  $judul = htmlspecialchars($data["judul"]);
  $isi = htmlspecialchars($data["isi"]);
  $fotolama = htmlspecialchars($data["fotolama"]);

 // cek apakah user pilih gambar baru atau tidak
  if( $_FILES['foto'] ['error'] === 4 ) {
    $foto = $fotolama;
  } else {
    $foto = upload();
  }

  $query = " UPDATE tbl_prestasi SET
            foto = '$foto',
            judul = '$judul',
            isi = '$isi'
            WHERE id = $id";

mysqli_query ($conn, $query);

return mysqli_affected_rows($conn);

}

function upload() {
  $namaFile = $_FILES['foto'] ['name'];
  $ukuranFile =$_FILES ['foto'] ['size'];
  $error = $_FILES ['foto'] ['error'];
  $tmpName = $_FILES ['foto'] ['tmp_name'];

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
        document.location.href = '../prestasi.php';
        </script>";
    } else {
      echo "
      <script>
      alert('data gagal di ubah')
        document.location.href = '../prestasi.php';
        </script>";
    }
  }

?>
     <form action="" method="post" enctype="multipart/form-data">
      <div class="container-fluid">
        <h1>Edit Prestasi</h1>

      <div class="row">
        <div class="col-sm-6">
          <input type="hidden" name="id" value="<?= $prestasi["id"]; ?>">
            <input type="hidden" name="fotolama" value="<?= $prestasi["foto"]; ?>">
              <ul></ul>

      <label for="judul" style="color: black;">Judul</label>
        <input type="teks" name="judul" required value="<?= $prestasi["judul"]; ?>" class =" form form-control">
          <br>

      <label for="isi" style="color: black;">Isi</label>
        <textarea name="isi" rows="12" class="form-control" ><?php echo"$prestasi[isi]"; ?></textarea>
          <br>

    <button class="btn btn-primary btn-block form-control mt-3" type="submit" name="submit">Simpan</button>
    </div>

      <div class="col-sm-3 text-center">
        <br>
          <label for="foto">Gambar</label>
            <br>
              <img src="../img/web/<?= $prestasi['foto']; ?>"width="200">
            <br><br>
          <input type="file" name="foto" id="foto">
        <br>
      </div>
    </div>
  </div>
</form>


  <?php 
include "../template/footer.php";
?>
