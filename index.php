<!DOCTYPE html>
<?php
	session_start();
	if(isset($_SESSION['email'])){
		header('Location: dashboard.php');
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Masuk Akun</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css">
	<script src="js/bootstrap.bundle.min.js"></script>
	<style type="text/css">
		body{
			height: 80vh;
			display: flex;
			align-items: center;
			background-color: #f5f5f5;
		}
		.form-login{
			max-width: 330px;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
  		<form class="form-login" method="post" action="login.php">
  			<h3 class="fw-normal text-center">Masuk Akun</h3>
  			<?php
  				if(isset($_SESSION['status'])){
  					$split = explode(', ', $_SESSION['status']);
  			?>
		  			<div class="alert alert-<?php echo $split[0]; ?> alert-dismissible fade show" role="alert">
					  <?php echo $split[1]; if(count($split)>2){echo ' '.$split[2];}?>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php
					session_unset();
				}
			?>
  			<div class="form-floating mb-2">
  				<input type="text" name="email" class="form-control" placeholder="E-mail" required>
  				<label>E-mail</label>
  			</div>
  			<div class="form-floating mb-2">
  				<input type="password" name="password" class="form-control" placeholder="Password" required>
  				<label>Password</label>
  			</div>
  			<p><a href="lupapassword.php">lupa password ?</a></p>
  			<button class="btn btn-primary w-100 mb-2" type="submit">
  				<i class="fa fa-sign-in"></i>
  				Masuk
  			</button>
  			<p class="mb-2">tidak punya akun ? <a href="daftar.php">daftar</a></p>
  			<p class="text-muted text-center">&copy; 2024</p>
  		</form>
	</div>
</body>
</html>