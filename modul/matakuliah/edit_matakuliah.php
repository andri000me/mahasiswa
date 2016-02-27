<?php 
	require "inc/koneksi.php";
	$id = $_GET['id'];
	$cek = $mysqli->query("SELECT * FROM tb_matakuliah WHERE id_matkul = '$id'");
	$row = $cek->fetch_assoc();
 ?>

 <div class="row">
                <div class="col-lg-12" style="margin-top:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 50px">
                            <a href="?modul=mata-kuliah" style="color: white;display: block" class="pull-left"><button class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Kembali</button></a>
                            <span class="pull-right" style="font-size: 22px">Edit Data Matakuliah</span>
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                        	<form action="modul/matakuliah/proses_edit.php" method="POST" class="form-horizontal col-sm-10" role="form" style="margin: 0 60px">
								<input type="hidden" name="id" value="<?=$row['id_matkul']?>">
									  <div class="form-group">
									    <label class="control-label col-sm-4" for="kode_matkul">Kode Matakuliah:</label>	
									    <div class="col-sm-6">
									      <input type="text" name="kode_matkul" class="form-control" id="kode_matkul" placeholder="Kode Matakuliah" value="<?=$row['kode_matkul']?>">
									    </div>
									  </div>

							      	  <div class="form-group">
									    <label class="control-label col-sm-4" for="matakuliah">Matakuliah:</label>	
									    <div class="col-sm-8">
									      <input type="text" name="matakuliah" class="form-control" id="matakuliah" placeholder="Nama Lengkap" value="<?=$row['matakuliah']?>">
									    </div>
									  </div>

									  <div class="form-group">
									    <label class="control-label col-sm-4" for="sks">SKS:</label>	
									    <div class="col-sm-6">
									      <input type="text" name="sks" class="form-control" id="sks" placeholder="Nilai SKS" value="<?=$row['sks']?>">
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