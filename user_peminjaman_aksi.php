<?php 
// koneksi database
include 'koneksi.php';
 
if(isset($_POST['submit'])){

// menangkap data yang di kirim dari form
$id_ruang = $_POST['id_ruang'];
$nama_peminjam = $_POST['nama_peminjam'];
$instansi_peminjam = $_POST['instansi_peminjam'];
$nama_ruang = $_POST['nama_ruang'];
$nama_kegiatan = $_POST['nama_kegiatan'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$status = 'Diajukan';
$color = '#28a745';
 
// menginput data ke database
mysqli_query($koneksi,"INSERT into meminjam (id_ruang, nama_peminjam, instansi_peminjam, nama_ruang, nama_kegiatan, start_date, end_date, status, color) VALUES ('$id_ruang', '$nama_peminjam', '$instansi_peminjam', '$nama_ruang', '$nama_kegiatan', '$start_date', '$end_date', '$status', '$color') ") or die(mysqli_error());
 
// mengalihkan halaman kembali ke index.php

if($update){
  
    echo 'Data berhasil di simpan! ';  //Pesan jika proses simpan sukses
    echo '<a href="peminjaman.php?id='.$id_ruang.'">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
    
   }else{
    
    echo 'Gagal menyimpan data! ';  //Pesan jika proses simpan gagal
    echo '<a href="peminjaman.php?id='.$id_ruang.'">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
    
   }

}
   echo json_encode($data);
header("location:user_peminjaman.php");
 
?>