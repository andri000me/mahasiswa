<?php 
	require "../../inc/koneksi.php";

	$id = $_GET['id'];

	$sql = $mysqli->query("DELETE FROM tb_dosen WHERE id_dosen = '$id'");

	if ($sql) {
		header("location: ../../home.php?modul=dosen");
	}else{
		echo "<script>alert('Data Gagal Dimasukan');</script>";
		header("location: ../../home.php?modul=dosen");
	}
 ?>