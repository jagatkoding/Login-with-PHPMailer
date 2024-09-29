<?php
	require('koneksi.php');
	session_start();

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$code = $_POST['code'];

		$query = "SELECT * FROM tb_akun WHERE reset_pascode = '$code'";
		$sql = mysqli_query($conn, $query);
		$result = mysqli_fetch_assoc($sql);

		if($result){
			$_SESSION['code'] = $code;
			header('Location: resetpassword.php');
		} else {
			$_SESSION['status'] = "danger, kode tidak sesuai !";
			header('Location: input_resetcode.php');
		}
	}
?>