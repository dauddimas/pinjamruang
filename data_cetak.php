
<center>
<h1>Data Pengajuan Ruangan <br/> Sekolah Pasca Sarjana </h1>
<center>
<table border="1">
	<tr>
       
		<th>No.</th>
		<th>Nama Peminjam </th>
		<th>Instansi</th>
		<th>Nama Ruang</th>
		<th>Kegiatan</th>
        <th>Waktu Pelaksanaan </th>
        <th>Waktu selsai</th>
        
	</tr>
    <center>
	<?php
	//koneksi ke database
	include 'koneksi.php';
	
	//query menampilkan data
	$sql = mysqli_query($koneksi, "SELECT * FROM meminjam ");
	$no = 1;
	while($data = mysqli_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['nama_peminjam'].'</td>
			<td>'.$data['instansi_peminjam'].'</td>
			<td>'.$data['nama_ruang'].'</td>
			<td>'.$data['nama_kegiatan'].'</td>
            <td>'.$data['start_date'].'</td>
            <td>'.$data['end_date'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>
