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
	<title>Daftar Akun</title>
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
	<script type="text/javascript">
		function validateForm(){
			var password = document.getElementById("password").value;
			var confirmPassword = document.getElementById("confirm_password").value;

			if(password !== confirmPassword){
				alert("Password dan konfirmasi password tidak sesuai !");
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
	<div class="container-fluid">
  		<form class="form-login" onsubmit="return validateForm()" method="post" action="regist.php">
  			<h3 class="fw-normal text-center">Daftar Akun</h3>
  			<?php
  				if(isset($_SESSION['log'])){
  			?>
		  			<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Gagal,</strong> email sudah terdaftar !
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php
					session_unset();
				}
			?>
  			<input id="email" name="email" type="email" class="form-control mb-2" placeholder="E-mail" required>
  			<input name="password" id="password" type="password" class="form-control mb-2" placeholder="Password" required>
  			<input name="confirm_password" id="confirm_password" type="password" class="form-control mb-2" placeholder="Konfirmasi Password" required>
  			<button class="btn btn-primary w-100 mb-2" type="submit">
  				<i class="fa fa-pencil"></i>
  				Daftar
  			</button>
  			<p class="mb-2">sudah punya akun ? <a href="index.php">masuk</a></p>
  			<p class="text-muted text-center">&copy; 2024</p>
  		</form>
	</div>
	
</body>
</html>