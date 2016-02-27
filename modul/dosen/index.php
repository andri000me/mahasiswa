<?php 
include "inc/koneksi.php";
include "inc/fungsi.php";
?>

	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			$("#submit").click(function(event){		
				event.preventDefault();		

				var nip = $("#nip").val();
				var nama_siswa = $("#nama_dosen").val();
				var tgl_lahir = $("#tgl_lahir").val();
				var alamat = $("#alamat").val();
				var j_kel = $("#j_kel").val();
				var telepon = $("#telepon").val();

					$.ajax({
						url: "modul/dosen/proses_add.php",
						type: "POST",			
						data: "nip="+nip+							
							"&nama_dosen="+nama_siswa+
							"&tgl_lahir="+tgl_lahir+
							"&j_kel="+j_kel+
							"&alamat="+alamat+
							"&telepon="+telepon,
						success: function(data){
						if (data == "Field Tidak boleh kosong") {
							$("#nip").focus();
							swal(data,"","warning")
						}else if (data == "Data Berhasil dimasukan") {
							$("#nip").val("").focus();
							$("#nama_dosen").val("");
							$("#tgl_lahir").val("");
							$("#alamat").val("");
							$("#j_kel").val("");
							$("#telepon").val("");
							swal(data,"","success")
						}else if(data == "NIP sudah terdaftar"){
							$("#nip").focus();
							swal(data,"","warning")
						}else{
							$("#nama_dosen").focus();
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
				<h4 align="center"><b>Data Dosen</b></h4>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">

				<!-- tab menu -->
				<a style="margin-bottom:10px" href="modul/laporan/lap_dosen.php" target="_blank" class="btn btn-primary pull-right"><span class='glyphicon glyphicon-print'></span>  Print</a>
				<ul class="nav nav-tabs">
					<li class="active" id="popopo"><a href="?modul=dosen">Daftar Mahasiswa</a></li>
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
                                        <tr bgcolor="#F73B3B" style="color: white">
											<th>No</th>
											<th>NIP</th>
											<th>Nama Dosen</th>				
											<th>Jenis Kelamin</th>
											<th>Alamat</th>
											<th>Telepon</th>
											<th style="text-align: center">Aksi</th>
										</tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                    $no = 1;
                                    	$sql = $mysqli->query("SELECT * FROM tb_dosen");
                                    	while($row = $sql->fetch_assoc()){
                                     ?>
                                        <tr class="odd gradeX">
                                        	<td><?=$no++?></td>
											<td><?=$row['nip']?></td>
											<td><?=ucwords($row['nama_dosen'])?></td>
											<td><?=$row['j_kel']?></td>
											<td><?=$row['alamat']?></td>
											<td><?=$row['telepon']?></td>
											<td align="center">
												<a href="?modul=dosen&a=edit&id=<?=$row['id_dosen']?>" class="btn btn-primary" title="Edit Data"><i class="glyphicon glyphicon-edit xl"></i></a>
												<a href="modul/dosen/delete_dosen.php?id=<?=$row['id_dosen']?>" class="btn btn-danger"  title="Delete Data"><i class="fa fa-times-circle"></i></a>
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
							<form action="modul/dosen/proses_add.php" method="POST" class="form-horizontal" role="form">
					      	 

							  <div class="form-group">
							    <label class="control-label col-sm-3" for="nip">NIP:</label>	
							    <div class="col-sm-5">
							      <input type="text" name="nip" class="form-control" id="nip" placeholder="Nomor Induk Pegawai">
							    </div>
							  </div>

							   <div class="form-group">
							    <label class="control-label col-sm-3" for="nama_dosen">Nama Dosen:</label>	
							    <div class="col-sm-8">
							      <input type="text" name="nama_dosen" class="form-control" id="nama_dosen" placeholder="Nama Dosen">
							    </div>
							  </div>

							  <div class="form-group">
								  <label class="control-label col-sm-3" for="j_kel">Jenis Kelamin:</label>
								  <div class="col-sm-8">
									  <label class="checkbox-inline">
									      <input type="checkbox" value="laki-laki" id="j_kel" name="j_kel">Laki - Laki
									  </label>
									  <label class="checkbox-inline">
									      <input type="checkbox" value="perempuan" id="j_kel" name="j_kel">Perempuan
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
