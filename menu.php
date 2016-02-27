<?php
if (isset($_SESSION['admin'])) {
?>
	<ul>
			<li class="utama"><a href="?modul=home">Beranda</a></li>
			<li class="utama"><a href="#">Data Master</a>
				<ul>
					<li><a href="?modul=mahasiswa">Mahasiswa</a></li>
					<li><a href="?modul=dosen">Dosen</a></li>
				</ul>
			</li>
			<li class="utama"><a href="#">Kuliah</a>
				<ul>
					<li><a href="?modul=semester">Semester</a></li>
					<li><a href="?modul=jadwal">Jadwal</a></li>
					<li><a href="?modul=mata-kuliah">Mata Kuliah</a></li>
					<li><a href="?modul=nilai">Nilai</a></li>
				</ul>
			</li>
			<li class="utama"><a href="?modul=laporan">Laporan</a></li>
			<li class="utama" style="float: right; background-color: #F61010"><a href="logout.php">Logout</a></li>
	</ul>
<?php
}