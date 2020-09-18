<?php
// mengaktifkan session php
@session_start();
// menghubungkan dengan koneksi
$koneksi = mysqli_connect("localhost","root","","db_website");


// check koneksi
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


?>

