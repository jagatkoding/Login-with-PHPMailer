<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['email'])){
		header('Location: index.php');
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css">
	<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="text-center px-4 py-5">
			<img class="d-block mx-auto mb-1" src="assets/iconjk.png" width="95" height="95">
			<span class="badge rounded-pill text-bg-primary">
				Selamat Datang
			</span>
			<h2 class="fw-bold text-body-emphasis mt-3"><?php echo $_SESSION['email'];?></h2>
			<div class="col-lg-6 mx-auto">
				<p class="lead">
					Halaman utama setelah pengguna masuk menggunakan akun yang sudah terdaftar pada penyimpanan website
				</p>
			</div>
			<a href="logout.php" class="btn btn-danger mt-3">
				<i class="fa fa-sign-out"></i>
				Keluar
			</a>
		</div>
	</div>
</body>
</html>