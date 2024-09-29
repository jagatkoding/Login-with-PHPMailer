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
	<title>Reset Password</title>
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
  		<form class="form-login" onsubmit="return validateForm()" method="post" action="proses_reset.php">
  			<h3 class="fw-normal text-center">Reset Password</h3>
  			<?php
  				if(isset($_SESSION['log'])){
  			?>
		  			<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Gagal,</strong> <?php echo $_SESSION['log']; ?>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php
					session_unset();
				}
			?>
  			<input name="password" id="password" type="password" class="form-control mb-2" placeholder="Password" required>
  			<input name="confirm_password" id="confirm_password" type="password" class="form-control mb-2" placeholder="Konfirmasi Password" required>
  			<button class="btn btn-primary w-100 mb-2" type="submit">
  				<i class="fa fa-refresh"></i>
  				Atur Ulang
  			</button>
  			<p class="text-muted text-center">&copy; 2024</p>
  		</form>
	</div>
	
</body>
</html>