<?php 
	require "../../inc/koneksi.php";

	$id = $_POST['id'];
	$semester = $_POST['semester'];
	$tahun = $_POST['tahun'];
	$mahasiswa = ucwords($_POST['mahasiswa']);

	$sql = "UPDATE tb_semester SET semester = '$semester', tahun = '$tahun', mahasiswa = '$mahasiswa' WHERE id_semester = '$id'";
	$hasil = $mysqli->query($sql);

	if ($hasil) {
		header("location: ../../home.php?modul=semester");
	}else{
		echo "<script>alert('Data Gagal Dimasukan');</script>";
		header("location: ../../home.php?modul=semester");
	}

 ?>