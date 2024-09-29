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
			if($result['verify_status'] == 1){
				$_SESSION['status'] = "success, email sudah diverifikasi!";
				header('Location: index.php');
			} else {
				$query = "UPDATE tb_akun SET verify_token = '$verify_token' WHERE email = '$email'";

				if($conn->query($query) === TRUE){
					//echo "akun berhasil didaftarkan";
					sendmail_verify($email, $verify_token, $email_template);
					$_SESSION['status'] = "success, link verifikasi telah dikirimkan !";
					header('Location: index.php');
				}
			}
		} else {
			$_SESSION['log'] = "email belum didaftarkan !";
			header('Location: daftar.php');
		}

		//echo $email. " - ".$password." - ".$confirm_password;
		
		$conn->close();
	}
?>