<!DOCTYPE html>
<html lang="en">
<head>
  <title>Peminjaman | Sekolah Pasca Sarjana</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="css/bootstrap-datetimepicker.css" />
  <link href="./style.css" type="text/css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
 
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
        <li class="active"><a href="./index.php">Menu Utama</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>





<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 text-center backtop">
        <br><br><br><br>
        <a href="./index.php"><button class="btn backbutton1"><span class="glyphicon glyphicon-menu-left"></span> Kembali</button></a>
    </div>
    <div class="col-sm-8 text-center">
        <br><br><br><br>
        <h2>Pengajuan Peminjaman Ruangan</h2><br>
        <h3>Sekolah Pasca Sarjana</h3>
        <h3>Universitas Diponegoro</h3><br><br><br><br>
    </div>
    <div class="col-sm-2">
    </div>
  </div>

<div class="row content">
  <div class="col-md-12 text-center daftar">
				<?php 
					include "koneksi.php";
					$query = "SELECT * FROM ruangan";
                    $result = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));
                    
					while($row = mysqli_fetch_array($result)){
                ?>
        
				<div class="col-md-4 detail">
					<img src="assets/img/undipthumb.png" alt="" height="256" width="256">
					<h5><b><?php echo $row['nama_ruang']; ?></b></h5>
                    <p><?php echo 'Gedung '.$row['gedung']; ?></p>
                    <p><?php echo $row['status']; ?></p>
                    <td><?php echo "<a href='#myModal' class='btn btn-pjm' id='tombol' data-toggle='modal' data-id=".$row['id_ruang'].">DETAIL</a>"; ?></td> 
                    <td><a href="user_peminjaman_ruangan.php?id=<?php echo $row['id_ruang']; ?>" class='btn btn-pjm' id='tombol'>PINJAM</a></td>       
				</div>
				<?php 
					}
				?>
			</div>
		</div>
</div>
    


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Detail Ruangan</h3>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btndec" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'user_detailruangan.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>