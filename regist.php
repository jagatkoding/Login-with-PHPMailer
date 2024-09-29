<?php
	require('sendmail_verify.php');
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$confirm_password = $_POST['confirm_password'];

		$query = "SELECT * FROM tb_akun WHERE email = '$email'";
		$sql = mysqli_query($conn, $query);
		$result = mysqli_fetch_assoc($sql);

		$verify_token = md5(rand());
		$email_template = "
	        <h2>Kamu telah melakukan pendaftaran akun Jagat Koding</h2>
	        <h4>Verifikasi emailmu agar dapat login, klik tautan berikut !</h4>
	        <a href='http://localhost/formlogin/verify_email.php?token=$verify_token'>[ Klik Disini ]</a>
	    ";

		if($result){
			$_SESSION['log'] = "email sudah digunakan !";
			header('Location: daftar.php');
		} else {
			$query = "INSERT INTO tb_akun(email, password, verify_token, verify_status, reset_pascode) VALUES ('$email', '$password', '$verify_token', '0', '0')";

			if($conn->query($query) === TRUE){
				//echo "akun berhasil didaftarkan";
				sendmail_verify($email, $verify_token, $email_template);
				$_SESSION['status'] = "warning, silahkan cek email!, <a href='verify_ulang.php'> tidak terima email?</a>";
				header('Location: index.php');
			}
		}

		//echo $email. " - ".$password." - ".$confirm_password;
		
		$conn->close();
	}
?>