<?php 
	require "../../inc/koneksi.php";



	$nip = $_POST['nip'];
	$semester = $_POST['semester'];
	$matakuliah = $_POST['matakuliah'];
	$status = $_POST['status'];

	if ($nip == "" || $semester == "" || $matakuliah == "" || $status == "") {
		echo "<script>alert('Data tidak boleh kosong');
		location.href='../../home.php?modul=jadwal';
		</script>";
	}else{
		$sql = "INSERT INTO tb_jadwal(nip, semester, matakuliah , status) VALUES ('$nip','$semester','$matakuliah','$status')";
		$hasil = $mysqli->query($sql);

		if ($hasil) {
			header("location: ../../home.php?modul=jadwal");
		}else{
			echo "<script>alert('Data Gagal Dimasukan');</script>";
			header("location: ../../home.php?modul=jadwal");
		}	
	}

	
 ?>