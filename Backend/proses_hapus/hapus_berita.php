<?php 
$conn = mysqli_connect('localhost','root','','db_website');
$result2= mysqli_query($conn, "SELECT * FROM tbl_berita where id = 4");
$berita = mysqli_fetch_assoc($result2);


function hapus($id) {
  $conn= mysqli_connect('localhost','root','','db_website');
  mysqli_query($conn, "DELETE FROM tbl_berita WHERE id = $id");
  return mysqli_affected_rows($conn);


}

$id = $_GET["id"];
if( hapus($id) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus')
        document.location.href = '../berita.php';
        </script>
  ";
} else {
  echo "
        <script>
        alert('data gagal dihapus')
        document.location.href = '../berita.php';
        </script>
  ";
}
