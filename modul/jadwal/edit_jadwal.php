<?php 
	require "inc/koneksi.php";
	$id = $_GET['id'];
	$cek = $mysqli->query("SELECT * FROM tb_jadwal WHERE id_jadwal = '$id'");
	$hasil = $cek->fetch_assoc();
 ?>

 <div class="row">
                <div class="col-lg-12" style="margin-top:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 50px">
                            <a href="?modul=jadwal" style="color: white;display: block" class="pull-left"><button class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Kembali</button></a>
                            <span class="pull-right" style="font-size: 22px">Edit Data Jadwal</span>
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                             <form action="modul/jadwal/proses_edit.php" method="POST" class="form-horizontal" role="form">
                             	<input type="hidden" name="id" value="<?=$hasil['id_jadwal']?>">

								 <div class="form-group">
								    <label class="control-label col-sm-4" for="nip">Dosen:</label>	
								    <div class="col-sm-4">
								      <select class="form-control" id="nip" name="nip">
								      <option>--- Pilih Salah Satu ---</option>
								      <?php 
						      	  	$sql = $mysqli->query("SELECT nip, nama_dosen FROM tb_dosen ORDER BY nip");
						      	  	while($row = $sql->fetch_assoc()){ 
						      	  		if ($row['nip'] == $hasil['nip']) {
							      	  			?><option value="<?=$row['nip'];?>" selected><?=$row['nip']." | ".$row['nama_dosen']?></option><?php
							      	  		}else{
							      	  			?><option value="<?=$row['nip']?>"><?=$row['nip']." | ".$row['nama_dosen']?></option><?php
							      	  		}
						      	  		}
						      	   ?>			    
									  </select>
								    </div>
								  </div>

								  <div class="form-group">
								    <label class="control-label col-sm-4" for="nip">Semester:</label>	
								    <div class="col-sm-1">
								      <select class="form-control" id="semester" name="semester">
								      <option>--</option>
								      <?php 
							      	  	$sql = $mysqli->query("SELECT DISTINCT(semester) FROM tb_semester");
							      	  	while($row = $sql->fetch_assoc()){ 
							      	  		if ($row['semester'] == $hasil['semester']) {
								      	  			?><option value="<?=$row['semester'];?>" selected><?=$row['semester']?></option><?php
								      	  		}else{
								      	  			?><option value="<?=$row['semester'];?>"><?=$row['semester']?></option><?php
								      	  		}
							      	  	}
							      	   ?>						      	   
									  </select>
								    </div>
								  </div>

								  <div class="form-group">
								    <label class="control-label col-sm-4" for="nip">Matakuliah:</label>	
								    <div class="col-sm-4">
								      <select class="form-control" id="matakuliah" name="matakuliah">
								      <option>Pilih Matakuliah</option>
								      <?php 
						      	  	$sql = $mysqli->query("SELECT kode_matkul, matakuliah FROM tb_matakuliah");
						      	  	while($row = $sql->fetch_assoc()){ 
							      	  		if ($row['kode_matkul'] == $hasil['matakuliah']) {
								      	  			?><option value="<?=$row['kode_matkul'];?>" selected><?=$row['kode_matkul']." | ".$row['matakuliah']?></option><?php
								      	  		}else{
								      	  			?><option value="<?=$row['kode_matkul'];?>" selected><?=$row['kode_matkul']." | ".$row['matakuliah']?></option><?php
								      	  		}
							      	  	}
							      	 ?>

						      	   <option value="<?=$row['kode_matkul'];?>"><?=$row['kode_matkul']." | ".$row['matakuliah']?></option>		    
									  </select>
								    </div>
								  </div>

								  <div class="form-group">
								    <label class="control-label col-sm-4" for="status">Status:</label>	
								    <div class="col-sm-2">
								      <select class="form-control" id="status" name="status">
								      <?php 
								      	if ($hasil['status'] == '1') {
								      		?>
								      			<option value="1" selected>On</option>	    
									      		<option value="0">Off</option>
								      		<?php
								      	}else{
								      		?>
								      			<option value="1">On</option>	    
									      		<option value="0" selected>Off</option>	
									      <?php
								      	}
								       ?>
									      
									  </select>
								    </div>
								  </div>	

								  <div class="form-group">
								    <label class="control-label col-sm-3" for=""></label>	
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



           