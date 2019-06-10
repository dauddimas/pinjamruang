<?php

// Connexion à la base de données
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=prototype;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Eror gan : '.$e->getMessage());
}

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];

	$sql = "UPDATE meminjam SET  start_date = '$start', end_date = '$end' WHERE kode_pinjam = $id ";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Eror prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Gagal execute');
	}else{
		die ('OK');
	}

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
