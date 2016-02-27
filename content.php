<?php 
	
		
		$modul = @$_GET['modul'];
		$a = @($_GET['a']);

		if ($modul == "") {
			$modul = "home";
		}

		switch ($modul) {
			case 'home':
				include "modul/index.php";
				break;

			case 'mahasiswa':
					if ($a == "") {
						include "modul/mahasiswa/index.php";
					}else if($a == "edit"){
						include "modul/mahasiswa/edit_mahasiswa.php";
					}elseif ($a == "detail") {
						include "modul/mahasiswa/detail.php";
					}
				break;

			case 'dosen':
					if ($a == "") {
						include "modul/dosen/index.php";
					}else if($a == "edit"){
						include "modul/dosen/edit_dosen.php";
					}
				break;

			case 'mata-kuliah':
					if ($a == "") {
						include "modul/matakuliah/index.php";
					}else if($a == "edit"){
						include "modul/matakuliah/edit_matakuliah.php";
					}
				break;

			case 'semester':
					if ($a == "") {
						include "modul/semester/index.php";
					}else if($a == "edit"){
						include "modul/semester/edit_semester.php";
					}
				break;

			case 'jadwal':
					if ($a == "") {
						include "modul/jadwal/index.php";
					}else if($a == "edit"){
						include "modul/jadwal/edit_jadwal.php";
					}
				break;

			case 'nilai':
					if ($a == "") {
						include "modul/nilai/index.php";
					}else if($a == "edit"){
						include "modul/nilai/edit_nilai.php";
					}
				break;

			case 'laporan':
					if ($a == "") {
						include "modul/laporan/index.php";
					}
				break;



			
			default:
				echo "<div class='row'>
						<div align='center' style='color: #C51818; font-family:arial; font-size: 50px; margin-top: 100px'>
							404 Page not found
						</div>
						<div align='center'><img src='images/admin.png' class='img-circle' style='border: 1px solid #B6B3B3'></div>
					</div>";
				break;
		}
	

 ?>