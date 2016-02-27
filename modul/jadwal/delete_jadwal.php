<?php 
	require "../../inc/koneksi.php";

	$id = $_GET['id'];

	$sql = $mysqli->query("DELETE FROM tb_jadwal WHERE id_jadwal = '$id'");

	if ($sql) {
		header("location: ../../home.php?modul=jadwal");
	}else{
		echo "<script>alert('Data Gagal Dimasukan');</script>";
		header("location: ../../home.php?modul=jadwal");
	}
 ?>