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
	<title>Kirim Ulang Verifikasi</title>
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
  		<form class="form-login" method="post" action="resend_verify.php">
  			<h3 class="fw-normal text-center">Verifikasi Email</h3>
  			<input name="email" type="email" class="form-control mb-2" placeholder="E-mail" required>
  			<button class="btn btn-primary w-100 mb-2" type="submit">
  				<i class="fa fa-plane"></i>
  				Kirim Ulang
  			</button>
  			<p class="mb-2">sudah punya akun ? <a href="index.php">masuk</a></p>
  			<p class="text-muted text-center mt-4">&copy; 2024</p>
  		</form>
	</div>
</body>
</html>