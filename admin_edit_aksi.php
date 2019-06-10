<?php 
// koneksi database
include 'koneksi.php';
 

if(isset($_POST['submit'])){


// menangkap data yang di kirim dari form
$id = $_POST['id_ruang'];
$nama = $_POST['nama_ruang'];
$gedung = $_POST['gedung'];
$lantai = $_POST['lantai'];
$fasilitas1 = $_POST['fasilitas1'];
$fasilitas2 = $_POST['fasilitas2'];
$fasilitas3 = $_POST['fasilitas3'];
$status = $_POST['status'];
 
// update data ke database
$update = mysqli_query($koneksi, "UPDATE ruangan SET nama_ruang = '$nama', gedung = '$gedung', lantai = '$lantai', fasilitas1 = '$fasilitas1', fasilitas2 = '$fasilitas2', fasilitas3 = '$fasilitas3', status = '$status' WHERE id_ruang = '$id' ") or die(mysqli_error($koneksi));



}
header("location:admin_fasilitas.php");
 
?>