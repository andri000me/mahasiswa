<?php 
	include "inc/koneksi.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username == "") {
		echo "Username tidak boleh kosong";
	}else if ($password == "") {
		echo "Password tidak boleh kosong";
	}else{
		$sql = $mysqli->query("SELECT * FROM admin WHERE username = '$username' and password = md5('$password')");
		$hasil = $sql->fetch_assoc();

		if ($hasil) {
			session_start();
			$_SESSION['import'] = $hasil['nama'];
			$_SESSION['hai'] = 1;
			echo "Silahkan Masuk";
		}else{
			echo "Username and Password Salah";
		}

	}

	

 ?>