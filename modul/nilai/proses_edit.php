<?php 
	require "../../inc/koneksi.php";
	include "../../inc/fungsi.php";

	$id = $_POST['id'];
	$nip = $_POST['nip'];
	$matakuliah = $_POST['matakuliah'];
	$mahasiswa = $_POST['mahasiswa'];
	$n_absen = $_POST['n_absen'];
	$n_uts = $_POST['n_uts'];
	$n_tugas = $_POST['n_tugas'];
	$n_akhir = $_POST['n_akhir'];
	$semester = cek_semester($mahasiswa);
	$predikat = hitung($n_absen, $n_tugas, $n_uts, $n_akhir);

	$sql = "UPDATE tb_nilai SET nip = '$nip', matakuliah = '$matakuliah', semester = '$semester', mahasiswa = '$mahasiswa', n_absen = '$n_absen', n_uts = '$n_uts', n_tugas = '$n_tugas', n_akhir = '$n_akhir', predikat = '$predikat' WHERE id_nilai = '$id'";
	$hasil = $mysqli->query($sql);

	if ($hasil) {
		echo "<script>alert('Data Berhasil diupdate');
		location.href='../../home.php?modul=nilai';</script>";
	}else{
		echo "<script>alert('Data Gagal diupdate');
		location.href='../../home.php?modul=nilai'</script>";
	}

 ?>