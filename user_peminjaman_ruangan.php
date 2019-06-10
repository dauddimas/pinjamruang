<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pengajuan | Sekolah Pasca Sarjana</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.css" />
  <link href="./style.css" type="text/css" rel="stylesheet">
 
  <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({locale: 'id'});
                $('#datetimepicker2').datetimepicker({
                    locale: 'id',
                    useCurrent: false //Important! See issue #1075
                });
                $("#datetimepicker1").on("dp.change", function (e) {
                    $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
                });
                $("#datetimepicker2").on("dp.change", function (e) {
                    $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
                });
            });
  </script>

<style>
    
</style>
</head>





<body>
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Menu Utama</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="kontak.html">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 text-center backtop">
        <br><br><br><br>
        <a href="./user_peminjaman.php"><button class="btn backbutton1"><span class="glyphicon glyphicon-menu-left"></span> Kembali</button></a>
    </div>
    <div class="col-sm-8 text-center">
        <br><br><br><br>
        <h2>Form Pengajuan Peminjaman Ruangan</h2><br>
        <h3>Sekolah Pasca Sarjana</h3>
        <h3>Universitas Diponegoro</h3><br><br>
    </div>
    <div class="col-sm-2">
    </div>
  </div>
</div>

	<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from ruangan where id_ruang='$id'");
    while($d = mysqli_fetch_array($data)){
		?>

<div class="col-md-12 daftar">
  <div class="col-sm-3"></div>
	<div class="col-md-6 form">
		<form method="post" action="user_peminjaman_aksi.php">
			<div class="form-group">
		    	<label>Nama Ruangan</label>
				<input type="hidden" name="id_ruang" value="<?php echo $d['id_ruang']; ?>">
                <input type="hidden" name="status" value="<?php echo $d['status']; ?>">
                <input type="text" class="form-control" name="nama_ruang" readonly value="<?php echo $d['nama_ruang']; ?>">
			</div>
            <?php 
	}
	?>


            <div class="form-group">
		    	<label>Nama Peminjam</label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Peminjam" name="nama_peminjam" required autocomplete="off">
            </div>


            <div class="form-group">
          <label>Nama Instansi</label>
          <input type="text" class="form-control" placeholder="Masukkan Nama Instansi" name="instansi_peminjam" required autocomplete="off">
        </div>


            <div class="form-group">
		    	<label>Nama Kegiatan</label>
		    	<input type="text" class="form-control" placeholder="Masukkan Nama Kegiatan" name="nama_kegiatan" required autocomplete="off">
		  	</div>

            


            <div class="form-group">
		    	<label>Waktu Mulai Meminjam</label>
		    	<div class='input-group date' id='datetimepicker1'>
                    <input type='text' placeholder="Tentukan Tanggal dan Jam Mulai Kegiatan" name="start_date" class="form-control" autocomplete="off" onkeydown="event.preventDefault()"/>
                    <span class="input-group-addon calicon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>


            <div class="form-group">
		    	<label>Waktu Selesai Meminjam</label>
		    	<div class='input-group date' id='datetimepicker2'>
                    <input type='text' placeholder="Tentukan Tanggal dan Jam Selesai Kegiatan" name="end_date" class="form-control" autocomplete="off" onkeydown="event.preventDefault()"/>
                    <span class="input-group-addon calicon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>    
		  	</div>

            

            <br>
            
              <input type="submit" value="AJUKAN" name="submit" class="btn btnacc">
            
            <br><br>
		</form>
	</div>
  <div class="col-sm-3"></div>
</div>
<br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="js/moment.js"></script>
        <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript">
            $(function () {
                $('.date').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm'
                });
            });
        </script>

</body>
</html>