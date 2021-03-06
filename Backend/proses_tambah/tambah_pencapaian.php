<?php 
include "../template/header.php";
// koneksi ke DBMS
$conn = mysqli_connect('localhost','root','','db_website');

function query($query) {
  global $conn;
  $result9 = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result9) ) {
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


  $query = "INSERT INTO tbl_pencapaian
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

if(isset($_POST['submit'])){
 
 // cek apakah data berhasil ditambahkan atau tidak
  if( tambah($_POST) > 0 ) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      document.location.href = '../pencapaian.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      document.location.href = '../pencapaian.php';
    </script> 

    ";
   }
 }
?>

<form action="" method="post" enctype="multipart/form-data">
     <div class="container-fluid">
      <h1>Tambah Pencapaian<hr></h1>
        

         <div class="col-sm-4 ml-1 mr-2">
            <label>Gambar</label>
             <img src="../img/web/<?= $pencapaian['foto']; ?>">
             <input type="file" name="foto">
              <br>
          
            <div class="row">
              <div class="col-sm-12 mt-2">
                <label>Deskripsi</label>
                  <input type="text" name="deskripsi" class="form form-control" required="">
                    <br>
                      <button class="btn btn-primary mt-2" type="submit" name="submit">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>

  <?php 
include "../template/footer.php";
?>
s