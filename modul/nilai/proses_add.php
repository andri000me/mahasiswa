<?php 
	require "../../inc/koneksi.php";
	include "../../inc/fungsi.php";

	$nip = $_POST['nip'];
	$matakuliah = $_POST['matakuliah'];
	$mahasiswa = $_POST['mahasiswa'];
	$semester = cek_semester($_POST['mahasiswa']);
	$n_absen = $_POST['n_absen'];
	$n_tugas = $_POST['n_tugas'];
	$n_uts = $_POST['n_uts'];
	$n_akhir = $_POST['n_akhir'];
	$predikat = hitung($_POST['n_absen'], $_POST['n_tugas'], $_POST['n_uts'], $_POST['n_akhir']);

	$sql = "INSERT INTO tb_nilai(nip, matakuliah, semester, mahasiswa, n_absen, n_tugas, n_uts, n_akhir, predikat) 
	VALUES ('$nip','$matakuliah', $semester,'$mahasiswa','$n_absen','$n_tugas','$n_uts','$n_akhir', '$predikat')";
	$hasil = $mysqli->query($sql);

	if ($hasil) {
		echo "Data Berhasil dimasukan";
		// header("location: ../../home.php?modul=nilai");
	}else{
		echo "Data Gagal dimasukan";
		// echo "<script>alert('Data Gagal Dimasukan');</script>";
		// header("location: ../../home.php?modul=nilai");
	}

	// echo var_dump($nip)."<br>".
	// 	var_dump($matakuliah)."<br>".
	// 	var_dump($mahasiswa)."<br>".
	// 	var_dump($semester)."<br>".
	// 	var_dump($n_absen)."<br>".
	// 	var_dump($n_tugas)."<br>".
	// 	var_dump($n_uts)."<br>".
	// 	var_dump($n_akhir)."<br>".
	// 	var_dump($predikat)."<br>";
 ?>