<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Admin | Sekolah Pasca Sarjana</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="./style.css" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width , initial-scale=1">
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
        <a href="./index.php"><button class="btn backbutton1"><span class="glyphicon glyphicon-menu-left"></span> Kembali</button></a>
    </div>
    <div class="col-sm-8 text-center">
        <br><br><br><br>
        <h2>Login Admin Peminjaman Ruangan</h2><br>
        <h3>Sekolah Pasca Sarjana</h3>
        <h3>Universitas Diponegoro</h3><br><br>
    </div>
    <div class="col-sm-2">
    </div>
  </div>
</div>

          <?php 
          if(isset($_GET['pesan'])){
          if($_GET['pesan']=="gagal"){
          echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
          }
          }
          ?>

<div class="container-fluid">
  <div class="row content">
  	<div class="col-sm-3"></div>
  	<div class="col-sm-6">
    	<form action="cek_login.php" method="post" autocomplete="off">
    		<div class="form-group">
      			<label>Username</label>
      			<input type="text" class="form-control" name="username" placeholder="Username"><br>
      		</div>
      		<div class="form-group">
      			<label>Password</label>
      			<input type="password" class="form-control" name="password" placeholder="Password"><br>
      		</div>
      		    <button type="submit" name="login_admin" class="btn btnacc">LOGIN</button>
    	</form>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div>

  </body>
</html>