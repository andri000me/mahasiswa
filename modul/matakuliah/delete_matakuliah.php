<?php 
	require "../../inc/koneksi.php";

	$id = $_GET['id'];

	$sql = $mysqli->query("DELETE FROM tb_matakuliah WHERE id_matkul = '$id'");

	if ($sql) {
		header("location: ../../home.php?modul=mata-kuliah");
	}else{
		echo "<script>alert('Data Gagal Dimasukan');</script>";
		header("location: ../../home.php?modul=mata-kuliah");
	}
 ?>