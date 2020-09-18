<?php 
$conn= mysqli_connect('localhost','root','','db_website');
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$isi = $_POST['isi'];
$gambar = $_POST['gambar'];
$insert = "INSERT into tbl_berita values('','$judul','$isi','')";
mysqli_query($conn,$insert);
header('location:http://localhost/website/Backend/berita.php');
