<?php 
$conn = mysqli_connect('localhost','root','','db_website');
$result3= mysqli_query($conn, "SELECT * FROM tbl_pencapaian where id = 1");
$service = mysqli_fetch_assoc($result3);


function hapus($id) {
  $conn= mysqli_connect('localhost','root','','db_website');
  mysqli_query($conn, "DELETE FROM tbl_pencapaian WHERE id = $id");
  return mysqli_affected_rows($conn);


}

$id = $_GET["id"];
if( hapus($id) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus')
        document.location.href = '../pencapaian.php';
        </script>
  ";
} else {
  echo "
        <script>
        alert('data gagal dihapus')
        document.location.href = '../pencapaian.php';
        </script>
  ";
}
