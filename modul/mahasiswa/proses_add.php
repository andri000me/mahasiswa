<?php 
	require "../../inc/koneksi.php";
	include "../../inc/fungsi.php";

	$nama_siswa = ucwords($_POST['nama_siswa']);
	$nis = $_POST['nis'];
	$tgl_lahir = ubahDate($_POST['tgl_lahir']);
	$j_kel = $_POST['j_kel'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];

	$sql = "INSERT INTO tb_mahasiswa(nama_siswa, nis, tgl_lahir, j_kel, alamat, telepon) VALUES ('$nama_siswa','$nis','$tgl_lahir','$j_kel','$alamat','$telepon')";
	$hasil = $mysqli->query($sql);

	if ($hasil) {
		echo "Data Berhasil dimasukan";
		// header("location: ../../home.php?modul=mahasiswa");
	}else{
		echo "Data gagal Dimasukan";
		// echo "<script>alert('Data Gagal Dimasukan');</script>";
		// header("location: ../../home.php?modul=mahasiswa");
	}
 ?>