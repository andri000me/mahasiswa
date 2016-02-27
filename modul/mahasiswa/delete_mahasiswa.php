<?php 
	require "../../inc/koneksi.php";

	$id = $_GET['id'];

	$sql = $mysqli->query("DELETE FROM tb_mahasiswa WHERE id_siswa = '$id'");

	if ($sql) {
		header("location: ../../home.php?modul=mahasiswa");
	}else{
		
		echo "<script>alert('Data Gagal Dimasukan');
		location.href: ../../home.php?modul=mahasiswa);
		</script>";
		
	}
 ?>