<?php 
	require "../../inc/koneksi.php";

	$id = $_POST['id'];
	$nama_dosen = ucwords($_POST['nama_dosen']);
	$nip = $_POST['nip'];
	$j_kel = $_POST['j_kel'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];

	$sql = "UPDATE tb_dosen SET nama_dosen = '$nama_dosen', nip = '$nip', j_kel = '$j_kel', alamat = '$alamat', telepon = '$telepon' WHERE id_dosen = '$id'";
	$hasil = $mysqli->query($sql);

	if ($hasil) {
		header("location: ../../home.php?modul=dosen");
	}else{
		echo "<script>alert('Data Gagal Dimasukan');
		location.href='../../home.php?modul=dosen';
		</script>";

	}

 ?> 