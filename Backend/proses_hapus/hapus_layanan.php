<?php 
$conn = mysqli_connect('localhost','root','','db_website');
$result4= mysqli_query($conn, "SELECT * FROM tbl_layanan where id = 1");
$layanan = mysqli_fetch_assoc($result4);


function hapus($id) {
  $conn= mysqli_connect('localhost','root','','db_website');
  mysqli_query($conn, "DELETE FROM tbl_layanan WHERE id = $id");
  return mysqli_affected_rows($conn);


}

$id = $_GET["id"];
if( hapus($id) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus')
        document.location.href = '../layanan.php';
        </script>
  ";
} else {
  echo "
        <script>
        alert('data gagal dihapus')
        document.location.href = '../layanan.php';
        </script>
  ";
}
