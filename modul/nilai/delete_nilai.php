<?php 
	
	require "../../inc/koneksi.php";

	$id = $_GET['id'];

	$sql = $mysqli->query("DELETE FROM tb_nilai WHERE id_nilai = '$id'");

	if ($sql) {
		echo "<script>alert('Data berhasil dihapus');
		location.href='../../home.php?modul=nilai'</script>";
	}else{
		echo "<script>alert('Data gagal dihapus');
		location.href='../../home.php?modul=nilai'</script>";
	}


 ?>