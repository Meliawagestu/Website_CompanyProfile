<?php 
include "../template/header.php";
$conn = mysqli_connect('localhost','root','','db_website');

$id = $_GET["id"];

// query data produk berdasarkan id
$struktur = query("SELECT * FROM tbl_struktur WHERE id = '$id'")[0];

function query($query) {
  global $conn;
  $result5 = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result5) ) {
    $rows[] = $row;
  }
  return $rows;
}

function ubah($data) {
  global $conn;

  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $jabatan = htmlspecialchars($data["jabatan"]);
  $fotolama = htmlspecialchars($data["fotolama"]);

 // cek apakah user pilih gambar baru atau tidak
  if( $_FILES['foto'] ['error'] === 4 ) {
    $foto = $fotolama;
  } else {
    $foto = upload();
  }

 $query = "UPDATE tbl_struktur SET 
          nama = '$nama',
          jabatan = '$jabatan',
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
        document.location.href = '../struktur.php';
        </script>";
    } else {
      echo "
      <script>
      alert('data gagal di edit')
        document.location.href = '../struktur.php';
        </script>";
    }
  }
?>
     <form action="" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
      <h1>Edit Struktur</h1>
      <div class="row">
      <div class="col-sm-7">

      <input type="hidden" name="id" value="<?= $struktur["id"]; ?>">

      <input type="hidden" name="fotolama" value="<?= $struktur["foto"]; ?>">
      <ul></ul>

      <label for="jabatan" style="color: black;">Jabatan</label>
      <input type="teks" name="jabatan" required value="<?= $struktur["jabatan"]; ?>" class =" form form-control">
      <br>

      <label for="nama" style="color: black;">Nama</label>
      <input type="teks" name="nama" required value="<?= $struktur["nama"]; ?>" class =" form form-control">
      <br>

      <button class="btn btn-primary btn-block form-control mt-5" type="submit" name="submit">Simpan</button>
      </div>
      <div class="col-sm-3">
        <br>

      <label for="foto">Gambar</label>
      <br><br>
      <img src="../img/web/<?= $struktur['foto']; ?>"width="200">
      <br><br>

      <input type="file" name="foto" id="foto">
      <br>
      
    </div>
  </div>
</form>
</div>


  <?php 
include "../template/footer.php";
?>
