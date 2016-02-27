<?php 
	require "../../inc/koneksi.php";

	$id = $_POST['id'];
	$kode_matkul = strtoupper($_POST['kode_matkul']);
	$matakuliah = $_POST['matakuliah'];
	$sks = $_POST['sks'];

	$sql = "UPDATE tb_matakuliah SET kode_matkul = '$kode_matkul', matakuliah = '$matakuliah', sks = '$sks' WHERE id_matkul = '$id'";
	$hasil = $mysqli->query($sql);

	if ($hasil) {
		header("location: ../../home.php?modul=mata-kuliah");
	}else{
		echo "<script>alert('Data Gagal Dimasukan');</script>";
		header("location: ../../home.php?modul=mata-kuliah");
	}

 ?>