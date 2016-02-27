<?php 
	include "inc/koneksi.php";
	include "inc/fungsi.php";

	$id = $_GET['id'];

	$sql= $mysqli->query("SELECT * FROM tb_mahasiswa WHERE id_siswa = '$id'");
	$hasil = $sql->fetch_assoc();

 ?>

<div class="row" id="row">
	<div class="col-lg-12" style="margin-top:10px">
		<div class="panel panel-default">
			<div class="panel-heading" style="height: 50px">
 					<a href="?modul=mahasiswa" style="color: white;display: block" class="pull-left"><button class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Kembali</button></a>
                    <span class="pull-right" style="font-size: 22px">Detail Mahasiswa</span>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<table class="table table-striped table-bordered" style="width: 550px; margin: 10px auto;">
					<tr>
						<td width="190px"><strong>Nis</strong></td>
						<td><?=$hasil['nis']?></td>
					</tr>
					<tr>
						<td><strong>Nama Mahasiswa</strong></td>
						<td><?=$hasil['nama_siswa']?></td>
					</tr>
					<tr>
						<td><strong>Tanggal Lahir</strong></td>
						<td><?=tanggal($hasil['tgl_lahir'])?></td>
					</tr>
					<tr>
						<td><strong>Jenis Kelamin</strong></td>
						<td><?=$hasil['j_kel']?></td>
					</tr>
					<tr>
						<td><strong>Alamat</strong></td>
						<td><?=$hasil['alamat']?></td>
					</tr>
					<tr>
						<td><strong>Telepon</strong></td>
						<td><?=$hasil['telepon']?></td>
					</tr>
				</table>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->




