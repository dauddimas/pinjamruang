<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=prototype;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Error gan : '.$e->getMessage());
}

$sql = "SELECT kode_pinjam, nama_peminjam, nama_ruang, nama_kegiatan, start_date, end_date, status, color FROM meminjam ";

$req = $bdd->prepare($sql);
$req->execute();

$meminjam = $req->fetchAll();

  session_start();
  include "koneksi.php";
  if (empty($_SESSION['username'] && $_SESSION['password'])) {
    header("location:cek_login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>[Admin] Jadwal | Sekolah Pasca Sarjana</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="./style.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <!-- Bootstrap Core CSS >
  <link href="css/bootstrap.min.css" rel="stylesheet"-->
  
  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.3.0/flatpickr.css">

  <!-- FullCalendar -->
  <link href='css/fullcalendar.min.css' rel='stylesheet' />

  <style>
    #calendar {
      max-width: 680px;
      margin-top: 6em;
      margin-bottom: 1em;
      margin-left: auto;
      margin-right: auto;
    }

    #keterangan {
      max-width: 680px;
      margin-top: 0;
      margin-bottom: 1em;
      margin-left: auto;
      margin-right: auto;
    }

    .manual {
      max-width: 680px;
      margin-top: 1em;
      margin-bottom: 1em;
      margin-left: auto;
      margin-right: auto;
      border-style: solid;
      border-color: #93a4ff;
      background-color: #eaedfc;
    }

    .manual li {
      margin: 5px;
    }

    .col-centered{
      float: none;
      margin: 0 auto;
    }
    
    .badge-success{color:#fff;background-color:#28a745}

    .badge-danger{color:#fff;background-color:#dc3545}

    .bootstrap-datetimepicker-widget {z-index:1151 !important;}

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
        <h2>Jadwal Peminjaman Ruangan</h2><br>
        <h3>Sekolah Pasca Sarjana</h3>
        <h3>Universitas Diponegoro</h3><br><br>
    </div>
    <div class="col-sm-2">
    </div>
  </div>
</div>

<div class="container-fluid text-center">
  <div id='calendar'></div>
</div>  

<div class="container" id="keterangan">
  <div class="col-lg-1 col-offset-6 centered"></div>
  <h4>Keterangan:</h4><!--
  <badge class="badge badge-success">Diajukan</badge>
  <badge class="badge badge-danger">Disetujui</badge>-->
  <div class="manual">
    <ul>
      <li><badge class="badge badge-success">Diajukan</badge>
  <badge class="badge badge-danger">Disetujui</badge></li>
      <li>Klik dua kali pada event untuk mengedit detail peminjaman.</li>
    </ul>
  </div>
</div>

<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="editEventTitle.php">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Nama Kegiatan</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Kegiatan">
          </div>
          </div>
          <div class="form-group">
          <label for="start" class="col-sm-2 control-label">Tanggal masuk</label>
          <div class="col-sm-10">
            <input type="text" name="start" class="form-control" id="start" data-input>
          </div>
          </div>
          <div class="form-group">
          <label for="end" class="col-sm-2 control-label">Tanggal keluar</label>
          <div class="col-sm-10">
            <input type="text" name="end" class="form-control" id="end" >
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Setujui?</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
              <option value="">Pilih</option>
              <option style="color:#dc3545;" value="#dc3545">&#9724; Ya</option>
              <option style="color:#28a745;" value="#28a745">&#9724; Tidak</option>
            </select>
          </div>
          </div>
            <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label class="text-danger"><input type="checkbox"  name="delete"> Hapus ajuan</label>
              </div>
            </div>
          </div>
          
          <input type="hidden" name="id" class="form-control" id="id">
        
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
      </div>
      </div>
    </div>

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  
  <!-- Flatpickr -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.3.0/flatpickr.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
  <script>
    $("#start").flatpickr({
      enableTime: true,
      //minDate: "today",
      locale: "id",
      //altInput: true,
      //altFormat: "j F Y",
      dateFormat: "Y-m-d H:i",
      time_24hr: true,
      timeFormat: "H:i",
      static: true
  });
    $("#end").flatpickr({
      enableTime: true,
      //minDate: "today",
      locale: "id",
      //altInput: true,
      //altFormat: "j F Y",
      dateFormat: "Y-m-d H:i",
      time_24hr: true,
      timeFormat: "H:i",
      static: true
  });
  </script>

  <!-- FullCalendar -->
  <script src='js/moment.min.js'></script>
  <script src='js/fullcalendar.min.js'></script>
  <script src='js/id.js'></script>
  <script>

  $(document).ready(function() {
    var initialLocaleCode = 'id';

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth'
      },
      navLinks: true,
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          $('#ModalEdit #id').val(event.id);
          $('#ModalEdit #title').val(event.title);
          $('#ModalEdit #start').val(event.start.format('YYYY-MM-DD HH:mm'));
          $('#ModalEdit #end').val(event.end.format('YYYY-MM-DD HH:mm'));
          $('#ModalEdit #color').val(event.color);
          $('#ModalEdit').modal('show');
        });
      },
      eventDrop: function(event, delta, revertFunc) { // si changement de position

        edit(event);

      },
      eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

        edit(event);

      },
      events: [
        <?php foreach($meminjam as $event): 
      
        $start = explode(" ", $event['start_date']);
        $end = explode(" ", $event['end_date']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start_date'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end_date'];
        }
      ?>
        {
          id: '<?php echo $event['kode_pinjam']; ?>',
          title: '<?php echo $event['nama_kegiatan']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
        },
      <?php endforeach; ?>
      ]
    });
    function edit(event){
      start = event.start.format('YYYY-MM-DD HH:mm');
      if(event.end){
        end = event.end.format('YYYY-MM-DD HH:mm');
      }else{
        end = start;
      }
      
      id =  event.id;
      
      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;
      
      $.ajax({
       url: 'editEventDate.php',
       type: "POST",
       data: {Event:Event},
       success: function(rep) {
          if(rep == 'OK'){
            alert('Tersimpan');
          }else{
            alert('Data tidak tersimpan. Coba lagi.'); 
          }
        }
      });
    }
  });




  </script>
</body>
</html>