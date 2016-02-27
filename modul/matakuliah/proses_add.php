<?php 
	require "../../inc/koneksi.php";

	$kode_matkul = strtoupper($_POST['kode_matkul']);
	$matakuliah = $_POST['matakuliah'];
	$sks = $_POST['sks'];

	$sql = "INSERT INTO tb_matakuliah(kode_matkul, matakuliah, sks) VALUES ('$kode_matkul','$matakuliah','$sks')";
	$hasil = $mysqli->query($sql);

	if ($hasil) {
		header("location: ../../home.php?modul=mata-kuliah");
	}else{
		echo "<script>alert('Data Gagal Dimasukan');</script>";
		header("location: ../../home.php?modul=mata-kuliah");
	}
 ?>