<?php 
include "inc/koneksi.php";
include "inc/fungsi.php";
?>

	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-ui/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
	<script type="text/javascript">
		$(document).ready(function(){

			$(function() {
			         $("#tgl_lahir").datepicker({
			         	changeMonth: true,
			         	changeYear: true,
			         	showAnim: 'slideDown'
			         });
			       });
			
			$("#submit").click(function(event){		
				event.preventDefault();		

				var nis = $("#nis").val();
				var nama_siswa = $("#nama_siswa").val();
				var tgl_lahir = $("#tgl_lahir").val();
				var alamat = $("#alamat").val();
				var j_kel = $("#j_kel").val();
				var telepon = $("#telepon").val();

				

					$.ajax({
						url: "modul/mahasiswa/proses_add.php",
						type: "POST",			
						data: "nama_siswa="+nama_siswa+
							"&nis="+nis+
							"&tgl_lahir="+tgl_lahir+
							"&j_kel="+j_kel+
							"&alamat="+alamat+
							"&telepon="+telepon,
						success: function(data){
							

						if (data == "Data Berhasil dimasukan") {
							swal(data,"","success")
							$("#nis").val("").focus();
							$("#nama_siswa").val("");
							$("#tgl_lahir").val("");
							$("#alamat").val("");
							$("#j_kel").val("");
							$("#telepon").val("");
						}else{
							$("#nis").focus();
							swal(data,"","error")
						}
					}
				});

			});

			
		});
	</script>

	
<div class="row" id="row">
	<div class="col-lg-12" style="margin-top:10px">
		<div class="panel panel-default">
			<div class="panel-heading" style="height: 50px">
				<h4 align="center"><b>Data Mahasiswa</b></h4>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">

				<!-- tab menu -->
				<a style="margin-bottom:10px" href="modul/laporan/lap_mahasiswa.php" target="_blank" class="btn btn-primary pull-right"><span class='glyphicon glyphicon-print'></span>  Print</a>
				<ul class="nav nav-tabs">
					<li class="active" id="popopo"><a href="?modul=mahasiswa">Daftar Mahasiswa</a></li>
					<li><a data-toggle="tab" href="#tambah">Tambah Data</a></li>

				</ul>


				<!-- akhir tab menu -->

				
				<!-- awal menu -->
					<div class="tab-content">

						<!-- awal menu read -->
						<div id="daftar" class="tab-pane fade in active" style="margin-top:10px">
							<div class="dataTable_wrapper">
							
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							    <thead>
							        <tr bgcolor="#605ca8" style="color: white">
							            <th align="center">No</th>
							            <th>NIS</th>
							            <th>Nama Mahasiswa</th>
							            <th>Tanggal Lahir</th>
							            <th width="250px">Aksi</th>
							        </tr>
							    </thead>
							    <tbody>
							        <?php 
							        $no = 1;
							    	$sql = $mysqli->query("SELECT * FROM tb_mahasiswa");
							    	while($row = $sql->fetch_assoc()){
							     ?>
							        <tr class="odd gradeX">
							        	<td align="center" style="width: 50px"><?=$no++?></td>
										<td><?=$row['nis']?></td>
										<td><?=ucwords($row['nama_siswa'])?></td>				
										<td><?=tanggal($row['tgl_lahir']);?></td>
										<td align="center">
											<a href="?modul=mahasiswa&a=detail&id=<?=$row['id_siswa']?>" class="btn btn-info"  title="Detail Data"><i class="glyphicon glyphicon-info-sign"></i></a>
											<a href="?modul=mahasiswa&a=edit&id=<?=$row['id_siswa']?>" class="btn btn-primary" title="Edit Data"><i class="glyphicon glyphicon-edit xl"></i></a>
											<a href="modul/mahasiswa/delete_mahasiswa.php?id=<?=$row['id_siswa']?>" id="hapus" class="btn btn-danger" title="Delete Data" ><i class="fa fa-times-circle" id="hapus"></i></a>
										</td>
							        </tr>
							      <?php
							      	}
							      ?>
							        
							    </tbody>
							</table>
							</div>
						</div>
						<!-- akhir menu read -->

						<!-- awal menu tambah -->
						<div id="tambah" class="tab-pane fade"  style="margin-top:10px">
							<form action="modul/mahasiswa/proses_add.php" method="POST" class="form-horizontal" role="form">

								<div class="form-group">
									<label class="control-label col-sm-3" for="nis">NIS:</label>	
									<div class="col-sm-5">
										<input type="text" name="nis" class="form-control" id="nis" placeholder="Nomor Induk Siswa">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3" for="nama_siswa">Nama Mahasiswa:</label>	
									<div class="col-sm-8">
										<input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="Nama Lengkap">
									</div>
								</div>		 

								<div class="form-group">
									<label class="control-label col-sm-3" for="tgl_lahir">Tanggal Lahir:</label>	
									<div class="col-sm-5">
										<input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="Pilih Tanggal">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3" for="j_kel">Jenis Kelamin:</label>
									<div class="col-sm-8">
										<label class="checkbox-inline">
											<input type="checkbox" value="laki-laki" name="j_kel" id="j_kel">Laki - Laki
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" value="perempuan" name="j_kel" id="j_kel">Perempuan
										</label>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3" for="alamat">Alamat:</label>	
									<div class="col-sm-8">
										<textarea class="form-control" rows="5" id="alamat" name="alamat"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3" for="telepon">Telepon:</label>	
									<div class="col-sm-6">
										<input type="text" name="telepon" class="form-control" id="telepon" placeholder="Telepon">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3" for="telepon"></label>	
									<div class="col-sm-6">
										<input type="submit" class="btn btn-primary" id="submit" value="Submit">
									<input type="reset" class="btn btn-danger" value="Reset">
									</div>
								</div>
							</form>
						</div>
						<!-- akhir menu tambah -->
					</div>
				</div>
				<!-- akhir menu -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->