<?php 
	require "../../inc/koneksi.php";

	$semester = $_POST['semester'];
	$tahun = $_POST['tahun'];
	$mahasiswa = $_POST['mahasiswa'];

	$sql = "INSERT INTO tb_semester(semester, tahun, mahasiswa) VALUES ('$semester','$tahun','$mahasiswa')";
	$hasil = $mysqli->query($sql);

	if ($hasil) {
		echo "Data Berhasil dimasukan";
		// header("location: ../../home.php?modul=semester");
	}else{
		echo "Data Gagal dimasukan";
		// echo "<script>alert('Data Gagal Dimasukan');</script>";
		// header("location: ../../home.php?modul=semester");
	}
 ?>