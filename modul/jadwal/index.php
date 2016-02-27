<?php 
	require "inc/koneksi.php";
	include "inc/fungsi.php";
 ?>

<!-- <fieldset> -->
	<!-- <legend>
		<p><span style="text-align: left">Data Mahasiswa</span>
		<span style="float: right; font-size: 18px; line-height: 40px">Total data: <?=$jum?></span></p>			
	</legend> -->
	<!-- <div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom: 10px">Tambah</button>
		<form style="float: right" action="" method="POST">
			<input type="text" name="cari">
			<input type="submit" name="submit" class="btn btn-sm btn-primary" value="Cari">
		</form>
	</div> -->
	
	<div class="row">
                <div class="col-lg-12" style="margin-top:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 50px">
                            <h4 style="float: left"><b>Data jadwal</b></h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="float: right">Tambah Data</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr bgcolor="#5492FA" style="color: white">
                                            <th align="center">No</th>
                                            <th>NIP</th>
                                            <th>Semester</th>
                                            <th>Matakuliah</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                    $no = 1;
                                    	$sql = $mysqli->query("SELECT * FROM tb_jadwal");
                                    	while($row = $sql->fetch_assoc()){
                                     ?>
                                        <tr class="odd gradeX">
                                        	<td align="center" style="width: 50px"><?=$no++?></td>
                    											<td><?=$row['nip']?></td>
                    											<td><?=$row['semester']?></td>				
                    											<td><?=ucwords($row['matakuliah'])?></td>
                    											<td><?php
                                            if ($row['status'] == 1) {
                                              echo "On";
                                            }else{
                                              echo "Off";
                                            }
                                          ?></td>
                    											<td align="center">
                                            <a href="?modul=jadwal&a=edit&id=<?=$row['id_jadwal']?>" class="btn btn-primary" title="Edit Data"><i class="glyphicon glyphicon-edit xl"></i></a>
                    												<a href="modul/mahasiswa/delete_jadwal.php?id=<?=$row['id_jadwal']?>" class="btn btn-danger" title="Delete Data"><i class="fa fa-times-circle"></i></a>
                    											</td>
                                        </tr>
                                      <?php
                                      	}
                                      ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


<!-- Modal Tambah Data-->
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3781FC">
        <h4 class="modal-title" style="font-weight: bold">Tambah Data Jadwal</h4>
      </div>
      <div class="modal-body">
      	<form action="modul/jadwal/proses_add.php" method="POST" class="form-horizontal" role="form">

		 <div class="form-group">
		    <label class="control-label col-sm-3" for="nip">Dosen:</label>	
		    <div class="col-sm-8">
		      <select class="form-control" id="nip" name="nip">
		      <option>--- Pilih Salah Satu ---</option>
		      <?php 
      	  	$sql = $mysqli->query("SELECT nip, nama_dosen FROM tb_dosen ORDER BY nip");
      	  	while($row = $sql->fetch_assoc()){ ?>
      	  		<option value="<?=$row['nip']?>"><?=$row['nip']." | ".$row['nama_dosen']?></option>
      	  	<?php }
      	   ?>			    
			  </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-3" for="nip">Semester:</label>	
		    <div class="col-sm-4">
		      <select class="form-control" id="semester" name="semester">
		      <option>Pilih Semester</option>
		      <?php 
      	  	$sql = $mysqli->query("SELECT DISTINCT(semester) FROM tb_semester");
      	  	while($row = $sql->fetch_assoc()){ ?>
      	  		<option value="<?=$row['semester'];?>"><?=$row['semester']?></option>
      	  	<?php }
      	   ?>			    
			  </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-3" for="nip">Matakuliah:</label>	
		    <div class="col-sm-4">
		      <select class="form-control" id="matakuliah" name="matakuliah">
		      <option>Pilih Matakuliah</option>
		      <?php 
      	  	$sql = $mysqli->query("SELECT kode_matkul, matakuliah FROM tb_matakuliah");
      	  	while($row = $sql->fetch_assoc()){ ?>
      	  		<option value="<?=$row['kode_matkul'];?>"><?=$row['kode_matkul']." | ".$row['matakuliah']?></option>
      	  	<?php }
      	   ?>			    
			  </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-3" for="status">Status:</label>	
		    <div class="col-sm-4">
		      <select class="form-control" id="status" name="status">
			      <option value="1">On</option>	    
			      <option value="0">Off</option>
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
      <div class="modal-footer" style="background-color: #5492FA">
      	<h5 align="left" style="float: left">Sistem Akademik Mahasiswa STIKOM CKI</h5>
        <button type="button" class="btn" data-dismiss="modal" style="background-color: #F4F3ED">Close</button>
      </div>
    </div>

  </div>
</div>

</body>
</html>
