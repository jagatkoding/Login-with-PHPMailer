<?php
	require 'koneksi.php';
	session_start();

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT * FROM tb_akun WHERE email = '$email'";
		$sql = mysqli_query($conn, $query);
		$result = mysqli_fetch_assoc($sql);

		if($result){
			if($result['verify_status'] == '1'){
				if(password_verify($password, $result['password'])){
					$_SESSION['email'] = $email;
					header('Location: dashboard.php');
				} else {
					echo "
					<script>
						alert('password tidak sesuai');
						window.location.href = 'index.php';
					</script>";
				}
			} else {
				$_SESSION['status'] = "warning, silahkan cek email!, <a href='verify_ulang.php'> tidak terima email?</a>";
				header('Location: index.php');
			}
			
		} else {
			echo "
				<script>
					alert('email tidak tersedia');
					window.location.href = 'index.php';
				</script>";
		}
		//echo $email." - ".$password;
	}
?>