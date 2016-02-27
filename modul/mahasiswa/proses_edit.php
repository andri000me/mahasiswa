<?php 
	require "../../inc/koneksi.php";
	include "../../inc/fungsi.php";
?>
	<script type="text/javascript" src="../../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../../js/sweet/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../js/sweet/sweetalert.css">
<?php
	$id = $_POST['id'];
	$nama_siswa = ucwords($_POST['nama_siswa']);
	$nis = $_POST['nis'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$j_kel = $_POST['j_kel'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];

	$ql = "UPDATE tb_mahasiswa SET nama_siswa = '$nama_siswa', nis = '$nis', tgl_lahir = '$tgl_lahir', j_kel = '$j_kel', alamat = '$alamat', telepon = '$telepon' WHERE id_siswa = '$id'";
	$sql = $mysqli->query($ql);
	if ($sql) {
		echo "<script>location.href= '../../home.php?modul=mahasiswa';
		</script>";
	}else{
		echo "<script>alert('Update Data berhasil');
		window.history.back();
		</script>";
	}
	
 ?>