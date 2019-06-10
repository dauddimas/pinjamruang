<?php

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=prototype;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Eror gan : '.$e->getMessage());
}
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM meminjam WHERE kode_pinjam = $id";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Gagal prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Gagal execute');
	}
	
}elseif (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$status = 'Disetujui';
	
	$sql = "UPDATE meminjam SET nama_kegiatan = '$title', start_date = '$start', end_date = '$end', status = '$status', color = '$color'  WHERE kode_pinjam = $id ";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Gagal prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Gagal execute');
	}

}
header('Location: admin_jadwal.php');

	
?>
