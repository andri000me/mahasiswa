<?php 
	require "../../inc/koneksi.php";

	$nip = $_POST['nip'];
	$nama_dosen = ucwords($_POST['nama_dosen']);
	$j_kel = $_POST['j_kel'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];

	if (empty($nip) || empty($nama_dosen) || empty($j_kel) || empty($alamat) || empty($telepon)) {
		echo "Field Tidak boleh kosong";
	}else{
		$sql = $mysqli->query("SELECT * FROM tb_dosen WHERE nip = '$nip'");
		$hasil = $sql->fetch_assoc();

		if ($hasil) {
			echo "NIP sudah terdaftar";
		}else{

			$sql = "INSERT INTO tb_dosen(nama_dosen, nip, j_kel, alamat, telepon) VALUES ('$nama_dosen','$nip','$j_kel','$alamat','$telepon')";
			$hasil = $mysqli->query($sql);

			if ($hasil) {
				echo "Data Berhasil dimasukan";
				// header("location: ../../home.php?modul=dosen");
			}else{
				echo "Data Gagal dimasukan";
				// header("location: ../../home.php?modul=dosen");
			}
		}	
	}


	
 ?>