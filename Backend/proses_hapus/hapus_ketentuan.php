<?php 
$conn = mysqli_connect('localhost','root','','db_website');
$result7= mysqli_query($conn, "SELECT * FROM tbl_ketentuan where id = 1");
$ketentuan = mysqli_fetch_assoc($result7);


function hapus($id) {
  $conn= mysqli_connect('localhost','root','','db_website');
  mysqli_query($conn, "DELETE FROM tbl_ketentuan WHERE id = $id");
  return mysqli_affected_rows($conn);


}

$id = $_GET["id"];
if( hapus($id) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus')
        document.location.href = '../ketentuan.php';
        </script>
  ";
} else {
  echo "
        <script>
        alert('data gagal dihapus')
        document.location.href = '../ketentuan.php';
        </script>
  ";
}
