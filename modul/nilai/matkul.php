<?php 

$mysqli = new mysqli('localhost','root','','mahasiswa');

$nip = $_POST['nip'];
$sql = $mysqli->query("SELECT tb_matakuliah.kode_matkul, tb_matakuliah.matakuliah,tb_matakuliah.kode_matkul, tb_jadwal.nip FROM tb_jadwal, tb_matakuliah WHERE tb_jadwal.matakuliah=tb_matakuliah.kode_matkul and tb_jadwal.nip = '$nip'");
// $sql = $mysqli->query("SELECT * FROM tb_jadwal WHERE nip = '$nip'");
$cek = $sql->num_rows;
if ($cek == 0) {
	echo "<option value=''>Matakuliah tidak tersedia</option>";
}else{
	echo "<option disabled selected >Pilih Salah satu</option>";
	while($row = $sql->fetch_assoc()){
		echo "<option value='".$row['kode_matkul']."'>".$row['kode_matkul']." | ".$row['matakuliah']."</option>";
	}
}



?>    