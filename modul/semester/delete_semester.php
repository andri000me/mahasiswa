<?php 
	require "../../inc/koneksi.php";

	$id = $_GET['id'];

	$sql = $mysqli->query("DELETE FROM tb_semester WHERE id_semester = '$id'");

	if ($sql) {
		header("location: ../../home.php?modul=semester");
	}else{
		echo "<script>alert('Data Gagal Dimasukan');</script>";
		header("location: ../../home.php?modul=semester");
	}
 ?>