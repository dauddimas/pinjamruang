<?php 
  session_start();
  include "koneksi.php";
  if (empty($_SESSION['username'] && $_SESSION['password'])) {
    header("location:cek_login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>[Admin] Pengajuan | Sekolah Pasca Sarjana</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="./style.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    (function($, window) {
    'use strict';

    var MultiModal = function(element) {
        this.$element = $(element);
        this.modalCount = 0;
    };

    MultiModal.BASE_ZINDEX = 1040;

    MultiModal.prototype.show = function(target) {
        var that = this;
        var $target = $(target);
        var modalIndex = that.modalCount++;

        $target.css('z-index', MultiModal.BASE_ZINDEX + (modalIndex * 20) + 10);

        window.setTimeout(function() {
            
            if(modalIndex > 0)
                $('.modal-backdrop').not(':first').addClass('hidden');

            that.adjustBackdrop();
        });
    };

    MultiModal.prototype.hidden = function(target) {
        this.modalCount--;

        if(this.modalCount) {
           this.adjustBackdrop();

            $('body').addClass('modal-open');
        }
    };

    MultiModal.prototype.adjustBackdrop = function() {
        var modalIndex = this.modalCount - 1;
        $('.modal-backdrop:first').css('z-index', MultiModal.BASE_ZINDEX + (modalIndex * 20));
    };

    function Plugin(method, target) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('multi-modal-plugin');

            if(!data)
                $this.data('multi-modal-plugin', (data = new MultiModal(this)));

            if(method)
                data[method](target);
        });
    }

    $.fn.multiModal = Plugin;
    $.fn.multiModal.Constructor = MultiModal;

    $(document).on('show.bs.modal', function(e) {
        $(document).multiModal('show', e.target);
    });

    $(document).on('hidden.bs.modal', function(e) {
        $(document).multiModal('hidden', e.target);
    });
}(jQuery, window));
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
        <li class="active"><a href="./admin_menu.php">Menu Admin</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="kontak.html">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 text-center backtop">
        <br><br><br><br>
        <a href="./admin_menu.php"><button class="btn backbutton1"><span class="glyphicon glyphicon-menu-left"></span> Kembali</button></a>
    </div>
    <div class="col-sm-8 text-center">
        <br><br><br><br>
        <h2>Menu Admin Peminjaman Ruangan</h2>
        <h2>Daftar Pengajuan Peminjaman Ruangan</h2><br>
        <h3>Sekolah Pasca Sarjana</h3>
        <h3>Universitas Diponegoro</h3><br><br>
    </div>
    <div class="col-sm-2">
    </div>
  </div>


  <div class="row content">
    <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="text-center">

              <tr>
                <th>Nama Peminjam</th>
                <th>Instansi</th>
                <th>Nama Ruang</th>
                <th>Kegiatan</th>
                <th>Waktu Pelaksanaan</th>
                <th>Waktu Selesai</th>
                <th>Status</th>
        <!--<th>Aksi</th>-->
              </tr>
            </thead>

          <tbody>

    <?php 
		include 'koneksi.php';
    
		$data = mysqli_query($koneksi,"select * from meminjam");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['nama_peminjam']; ?></td>
        <td><?php echo $d['instansi_peminjam']; ?></td>
				<td><?php echo $d['nama_ruang']; ?></td>
        <td><?php echo $d['nama_kegiatan']; ?></td>
        <td><?php echo $d['start_date'] ?></td>
				<td><?php echo $d['end_date']; ?></td>
        <td><?php echo $d['status']; ?></td>
				<!--<td><?php echo "<a href='#myModal' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=".$d['id_ruang'].">Edit</a>"; ?></td>-->
			</tr>
			<?php 
		}
	?>
    </tbody>
    </table>
    </div>
    </div>
    <div class="col-sm-1"></div>
</div>

  <div class="row content">
    <div class="col-md-3"></div>
      <div class="col-md-6 text-center"><a target="_blank" href="export_excel.php" class="btn btnacc">EXPORT KE EXCEL</a></div>
    <div class="col-md-3"></div>  
  </div>
</div>
</body>
</html>