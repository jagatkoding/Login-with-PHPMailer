<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "program_login";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error){
		die("Koneksi gagal". $conn->connect_error);
	}
	//echo "koneksi berhasil";
?>