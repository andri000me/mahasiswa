<?php 
	require "inc/koneksi.php";
	$id = $_GET['id'];
	$cek = $mysqli->query("SELECT * FROM tb_nilai WHERE id_nilai = '$id'");
	$row = $cek->fetch_assoc();
 ?>

 <div class="row">
                <div class="col-lg-12" style="margin-top:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 50px">
                            <a href="?modul=nilai" style="color: white;display: block" class="pull-left"><button class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Kembali</button></a>
                            <span class="pull-right" style="font-size: 22px">Edit Data Nilai</span>
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="modul/nilai/proses_edit.php" method="POST" class="form-horizontal" role="form">
                            <input type="hidden" name="id" value="<?=$id?>">

						      	<div class="form-group">
						        <label class="control-label col-sm-4" for="nip">Dosen:</label>  
						        <div class="col-sm-4">
						        <select class="form-control" id="nip" name="nip">
						        <?php 

						        	$sql = $mysqli->query("SELECT nip, nama_dosen FROM tb_dosen");
						        	while ($hasil = $sql->fetch_assoc()) {
						        		if ($hasil['nip'] == $row['nip']) {
						        			echo "<option value='$hasil[nip]' selected>$hasil[nip] | $hasil[nama_dosen]</option>";
						        		}else{
						        			echo "<option value='$hasil[nip]'>$hasil[nip] | $hasil[nama_dosen]</option>";
						        		}
						        	}
						         ?>
						        </select>
						        </div>
						      </div>

						      <div class="form-group">
						        <label class="control-label col-sm-4" for="nip">Matakuliah:</label>  
						        <div class="col-sm-6">
						          <select class="form-control" id="matakuliah" name="matakuliah">
						          <option>--- Pilih Salah Satu ---</option>
						          <?php 
						          	$sql = $mysqli->query("SELECT matakuliah, kode_matkul FROM tb_matakuliah");
						          	while ($hasil = $sql->fetch_assoc()) {
						          		if ($hasil['kode_matkul'] == $row['matakuliah']) {
						          			echo "<option value = '$hasil[kode_matkul]' selected>$hasil[kode_matkul] | $hasil[matakuliah]</option>";
						          		}else{
						          			echo "<option value = '$hasil[kode_matkul]'>$hasil[kode_matkul] | $hasil[matakuliah]</option>";
						          		}
						          	}
						          ?>   
						        </select>
						        </div>
						      </div>

						      	  <div class="form-group">
								    <label class="control-label col-sm-4" for="mahasiswa">Mahasiswa:</label>	
								    <div class="col-sm-4">
								      <select class="form-control" id="mahasiswa" name="mahasiswa">
								      <?php 
								      $sql = $mysqli->query("SELECT nis, nama_siswa FROM tb_mahasiswa");
								      while ($hasil = $sql->fetch_assoc()) {
								      	if ($hasil['nis'] == $row['mahasiswa']) {
								      		echo "<option value='$hasil[nis]' selected>$hasil[nis] | $hasil[nama_siswa]</option>";
								      	}else{
								      		echo "<option value='$hasil[nis]'>$hasil[nis] | $hasil[nama_siswa]</option>";
								      	}
								      }
								      ?>    
									  </select>
								    </div>
								  </div>	

						      <div class="form-group">
						        <label class="control-label col-sm-4" for="mahasiswa">Nilai:</label>  
						        <div class="col-sm-2">
						          <input type="text" name="n_absen" placeholder="Absen" class="form-control" value="<?=$row['n_absen']?>">
						        </div>
						        <div class="col-sm-2">
						          <input type="text" name="n_tugas" placeholder="Tugas" class="form-control" value="<?=$row['n_tugas']?>">
						        </div>
						      </div>  

						      <div class="form-group">
						        <label class="control-label col-sm-4" for="mahasiswa"></label>  
						        <div class="col-sm-2">
						          <input type="text" name="n_uts" placeholder="UTS" class="form-control" value="<?=$row['n_uts']?>">
						        </div>
						        <div class="col-sm-2">
						          <input type="text" name="n_akhir" placeholder="Akhir" class="form-control" value="<?=$row['n_akhir']?>">
						        </div>
						      </div>  

								  <div class="form-group">
								    <label class="control-label col-sm-4" for="telepon"></label>	
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