<?php 
	require "inc/koneksi.php";
	include "inc/fungsi.php";
 ?>

 <div class="row">
                <div class="col-lg-12" style="margin-top:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 50px">
                            <h4 style="float: left"><b>Data Matakuliah</b></h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="float: right">Tambah Data</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr bgcolor="#F73B3B" style="color: white">
											<th>No</th>
											<th>Kode Matakuliah</th>
											<th>Matakuliah</th>
											<th>SKS</th>
											<th style="text-align: center">Aksi</th>
										</tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                    $no = 1;
                                    	$sql = $mysqli->query("SELECT * FROM tb_matakuliah");
                                    	while($row = $sql->fetch_assoc()){
                                     ?>
                                        <tr>
											<td><?=$no++?></td>
											<td><?=$row['kode_matkul']?></td>
											<td><?=ucwords($row['matakuliah'])?></td>
											<td><?=$row['sks']?></td>
											<td align="center">
                        <a href="?modul=mata-kuliah&a=edit&id=<?=$row['id_matkul']?>" class="btn btn-primary" title="Edit Data"><i class="glyphicon glyphicon-edit xl"></i></a>
												<a href="modul/matakuliah/delete_matakuliah.php?id=<?=$row['id_matkul']?>" class="btn btn-danger" title="Delete Data"><i class="fa fa-times-circle"></i></a>
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
      <div class="modal-header" style="background-color: #F3C128">
        <h4 class="modal-title" style="font-weight: bold">Tambah Data Matakuliah</h4>
      </div>
      <div class="modal-body">
      	<form action="modul/matakuliah/proses_add.php" method="POST" class="form-horizontal" role="form">

      	<div class="form-group">
		    <label class="control-label col-sm-3" for="kode_matkul">Kode Matakuliah</label>	
		    <div class="col-sm-5">
		      <input type="text" name="kode_matkul" class="form-control" id="kode_matkul" placeholder="Kode Matakuliah">
		    </div>
		  </div>

      	  <div class="form-group">
		    <label class="control-label col-sm-3" for="nis">Matakuliah</label>	
		    <div class="col-sm-5">
		      <input type="text" name="matakuliah" class="form-control" id="matakuliah" placeholder="Matakuliah">
		    </div>
		  </div>

      	  <div class="form-group">
		    <label class="control-label col-sm-3" for="sks">SKS:</label>	
		    <div class="col-sm-8">
		      <input type="text" name="sks" class="form-control" id="sks" placeholder="Jumlah SKS">
		    </div>
		  </div>		 

		  <div class="form-group">
		    <label class="control-label col-sm-3" for="telepon"></label>	
		    <div class="col-sm-6">
		      <input type="submit" class="btn btn-primary" value="Submit">
		      <input type="reset" class="btn btn-danger" value="Reset">
		    </div>
		  </div>

      	</form>
      </div>
      <div class="modal-footer" style="background-color: #F9A90F">
      	<h5 align="left" style="float: left">Sistem Akademik Mahasiswa STIKOM CKI</h5>
        <button type="button" class="btn" data-dismiss="modal" style="background-color: #F8E58A">Close</button>
      </div>
    </div>

  </div>
</div>