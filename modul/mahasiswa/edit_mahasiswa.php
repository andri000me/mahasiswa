<?php 
	require "inc/koneksi.php";
	$id = $_GET['id'];
	$cek = $mysqli->query("SELECT * FROM tb_mahasiswa WHERE id_siswa = '$id'");
	$row = $cek->fetch_assoc();
 ?>
 <div class="row">
                <div class="col-lg-12" style="margin-top:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 50px">
                            <a href="?modul=mahasiswa" style="color: white;display: block" class="pull-left"><button class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Kembali</button></a>
                            <span class="pull-right" style="font-size: 22px">Edit Data Mahasiswa</span>
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                        	<form action="modul/mahasiswa/proses_edit.php" method="POST" class="form-horizontal col-sm-10" role="form" style="margin: 0 60px">
								<input type="hidden" name="id" value="<?=$row['id_siswa']?>">
									  <div class="form-group">
									    <label class="control-label col-sm-4" for="nis">NIS:</label>	
									    <div class="col-sm-6">
									      <input type="text" name="nis" class="form-control" id="nis" placeholder="Nomor Induk Siswa" value="<?=$row['nis']?>">
									    </div>
									  </div>

							      	  <div class="form-group">
									    <label class="control-label col-sm-4" for="nama_siswa">Nama Mahasiswa:</label>	
									    <div class="col-sm-8">
									      <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="Nama Lengkap" value="<?=$row['nama_siswa']?>">
									    </div>
									  </div>

									  <div class="form-group">
									    <label class="control-label col-sm-4" for="tgl_lahir">Tanggal Lahir:</label>	
									    <div class="col-sm-6">
									      <input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="YYYY-mm-dd" value="<?=$row['tgl_lahir']?>">
									    </div>
									  </div>

									  <div class="form-group">
										  <label class="control-label col-sm-4" for="j_kel">Jenis Kelamin:</label>
										  <?php 
										  	if ($row['j_kel'] == "laki-laki") {
										  		?>
										  		<div class="col-sm-6">
												  <label class="checkbox-inline">
												      <input type="checkbox" value="laki-laki" name="j_kel" checked>Laki - Laki
												  </label>
												  <label class="checkbox-inline">
												      <input type="checkbox" value="perempuan" name="j_kel">Perempuan
												  </label>
											  </div>
										  	<?php
										  	}else{
										  		?>
										  		<div class="col-sm-6">
												  <label class="checkbox-inline">
												      <input type="checkbox" value="laki-laki" name="j_kel" >Laki - Laki
												  </label>
												  <label class="checkbox-inline">
												      <input type="checkbox" value="perempuan" name="j_kel" checked>Perempuan
												  </label>
											  </div>
										  	<?php
										  	}
										   ?>
										  
									  </div>

									  <div class="form-group">
									    <label class="control-label col-sm-4" for="alamat">Alamat:</label>	
									    <div class="col-sm-8">
									      <textarea class="form-control" rows="5" id="alamat" name="alamat"><?=$row['alamat']?></textarea>
									    </div>
									  </div>

									  <div class="form-group">
									    <label class="control-label col-sm-4" for="telepon">Telepon:</label>	
									    <div class="col-sm-6">
									      <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Telepon" value="<?=$row['telepon']?>">
									    </div>
									  </div>

									  <div class="form-group">
									    <label class="control-label col-sm-4"></label>	
									    <div class="col-sm-6">
									      <input type="submit" class="btn btn-primary" value="Submit">
									      <input type="reset" class="btn btn-danger" value="Reset">
									    </div>
									  </div>

							      	</form>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
