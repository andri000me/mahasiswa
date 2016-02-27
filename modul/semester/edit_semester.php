<?php 
	require "inc/koneksi.php";
	$id = $_GET['id'];
	$cek = $mysqli->query("SELECT * FROM tb_semester WHERE id_semester = '$id'");
	$row = $cek->fetch_assoc();
 ?>

 	<div class="row">
                <div class="col-lg-12" style="margin-top:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 50px">
                            <a href="?modul=semester" style="color: white;display: block" class="pull-left"><button class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Kembali</button></a>
                            <span class="pull-right" style="font-size: 22px">Edit Data Semester</span>
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="modul/semester/proses_edit.php" method="POST" class="form-horizontal col-sm-8" role="form" style="margin: 0 60px">
								<input type="hidden" name="id" value="<?=$row['id_semester']?>">
									  <div class="form-group">
									    <label class="control-label col-sm-4" for="semester">Semester:</label>	
									    <div class="col-sm-2">
									    	<select name="semester" class="form-control">
									    	<?php 
									    	$i = 1;
									    	while($i <= 8){
									    		if ($i == $row['semester']) {
									    			echo "<option value='$row[semester]' selected>$row[semester]</option>";
									    		}else{
									    			echo "<option value='$i'>$i</option>";
									    		}

									    		$i++;
									    	}
									    	 ?>
									    	</select>
									    </div>
									  </div>

							      	  <div class="form-group">
									    <label class="control-label col-sm-4" for="tahun">Tahun:</label>	
									    <div class="col-sm-8">
									      <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Tahun Ajaran" value="<?=$row['tahun']?>">
									    </div>
									  </div>

									  <div class="form-group">
									    <label class="control-label col-sm-4" for="mahasiswa">mahasiswa:</label>	
									    <div class="col-sm-6">
									      <select class="form-control" id="mahasiswa" name="mahasiswa">
									      <!-- <option value="<?=$row['mahasiswa']?>"><?=$row['mahasiswa']?></option> -->
									      <?php
									      	$mahasiswa = $row['mahasiswa'];
									      ?>
									      <?php 
							      	  	$sql = $mysqli->query("SELECT nis, nama_siswa FROM tb_mahasiswa ORDER BY nis");
							      	  	while($row = $sql->fetch_assoc()){
							      	  		if ($row['nama_siswa'] == $mahasiswa) {
							      	  			?><option value="<?=$row['nis'];?>" selected><?=$row['nis']." | ".$row['nama_siswa']?></option><?php
							      	  		}else{
							      	  			?><option value="<?=$row['nis'];?>"><?=$row['nis']." | ".$row['nama_siswa']?></option><?php
							      	  		}

							      	  	}
							      	  	 ?>  
										  </select>
									    </div>
									  </div>

									  <div class="form-group">
									    <label class="control-label col-sm-4"></label>	
									    <div class="col-sm-6">
									      <input type="submit" class="btn btn-primary" value="Submit">
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