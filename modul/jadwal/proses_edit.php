<?php 
	require "../../inc/koneksi.php";

	$id = $_POST['id'];
	$nip = $_POST['nip'];
	$semester = $_POST['semester'];
	$matakuliah = $_POST['matakuliah'];
	$status = $_POST['status'];


	$sql = "UPDATE tb_jadwal SET nip = '$nip', semester = '$semester', matakuliah = '$matakuliah', status = '$status' WHERE id_jadwal = '$id'";
	$hasil = $mysqli->query($sql);

	if ($hasil) {
		header("location: ../../home.php?modul=jadwal");
	}else{
		echo "<script>alert('Data Gagal Dimasukan');
		location.href='../../home.php?modul=jadwal';
		</script>";

	}

 ?> 