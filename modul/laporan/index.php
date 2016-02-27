<?php 
include "inc/koneksi.php";
include "inc/fungsi.php";
?>
 
<div class="row" id="row">
  <div class="col-lg-12" style="margin-top:10px">
    <div class="panel panel-default">
      <div class="panel-heading" style="height: 50px">
        <h4 align="center"><b>Laporan</b></h4>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">

        <!-- tab menu -->
        
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#mahasiswa">Mahasiswa</a></li>
          <li><a data-toggle="tab" href="#dosen">Dosen</a></li>
          <li><a data-toggle="tab" href="#semester">Semester</a></li>
          <li><a data-toggle="tab" href="#jadwal">Jadwal</a></li>
          <li><a data-toggle="tab" href="#matakuliah">Matakuliah</a></li>
          <li><a data-toggle="tab" href="#nilai">Nilai</a></li>
        </ul>


        <!-- akhir tab menu -->

        
        <!-- awal menu -->
          <div class="tab-content">

            <!-- awal menu read -->
            <div id="mahasiswa" class="tab-pane fade in active" style="margin-top:10px">
              <div class="dataTable_wrapper">
              
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
				    <thead>
				        <tr bgcolor="#605ca8" style="color: white">
				            <th align="center">No</th>
				            <th>NIS</th>
				            <th>Nama Mahasiswa</th>
				            <th>Tanggal Lahir</th>
				            <th>Jenis Kelamin</th>
				            <th>Alamat</th>
				            <th>Telepon</th>
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
							<td><?=gender($row['j_kel'])?></td>
							<td><?=$row['alamat']?></td>
							<td><?=$row['telepon']?></td>
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
            <div id="dosen" class="tab-pane fade"  style="margin-top:10px">
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
                      
                                        </tr>
                                      <?php
                                        }
                                      ?>
                                        
                                    </tbody>
                                </table>
              </div>
            </div>
            <!-- akhir menu tambah -->

            <div id="semester" class="tab-pane fade" style="margin-top:10px">
              <div class="dataTable_wrapper">
              
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr bgcolor="#F73B3B" style="color: white">
                        <th>No</th>
                          <th>Semester</th>
                          <th>Tahun</th>
                          <th>Mahasiswa</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php 
                  $no = 1;
                    $sql = $mysqli->query("SELECT * FROM tb_semester");
                    while($row = $sql->fetch_assoc()){
                   ?>
                      <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['semester']?></td>
                        <td><?=ucwords($row['tahun'])?></td>
                        <td><?=ucwords(cek_mahasiswa($row['mahasiswa']))?></td>
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
            <div id="jadwal" class="tab-pane fade"  style="margin-top:10px">
              <div class="dataTable_wrapper">
              
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr bgcolor="#5492FA" style="color: white">
                                            <th align="center">No</th>
                                            <th>NIP</th>
                                            <th>Semester</th>
                                            <th>Matakuliah</th>
                                            <th>Status</th>
                                            
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
                                        
                                        </tr>
                                      <?php
                                        }
                                      ?>
                                        
                                    </tbody>
                                </table>
              </div>
            </div>
            <!-- akhir menu tambah -->


            <!-- awal menu tambah -->
            <div id="matakuliah" class="tab-pane fade"  style="margin-top:10px">
              <div class="dataTable_wrapper">
              
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr bgcolor="#F73B3B" style="color: white">
                      <th>No</th>
                      <th>Kode Matakuliah</th>
                      <th>Matakuliah</th>
                      <th>SKS</th>
                      
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
                      
                    </tr>
                                      <?php
                                        }
                                      ?>
                                        
                                    </tbody>
                                </table>
              </div>
            </div>
            <!-- akhir menu tambah -->


            <!-- awal menu tambah -->
            <div id="nilai" class="tab-pane fade"  style="margin-top:10px">
              <div class="dataTable_wrapper">
              
              <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 13px">
                                    <thead>
                                        <tr bgcolor="#F73B3B" style="color: white">
                                            <th rowspan="2" style="line-height: -25px" width="10px">No</th>
                                            <th rowspan="2" style="line-height: -25px" width="50px">Dosen</th>
                                            <th rowspan="2" width="10px">Semester</th>
                                            <th rowspan="2" style="line-height: -25px">Matakuliah</th>
                                            <th rowspan="2">Mahasiswa</th>
                                            <th colspan="4" style="text-align: center" style="line-height: -25px">Nilai</th>
                                            <th rowspan="2" style="text-align: center" style="line-height: -25px">Rank</th>
                                            <th style="text-align: center" rowspan="2" style="line-height: -25px">Aksi</th>
                                        </tr>
                                        <tr bgcolor="#794BFB" style="color: white">
                                            <th>Absen</th>
                                            <th>Tugas</th>
                                            <th>UTS</th>
                                            <th>Akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                    $no = 1;
                                      $sql = $mysqli->query("SELECT tb_nilai.id_nilai, tb_dosen.nama_dosen, tb_nilai.semester, tb_matakuliah.matakuliah, tb_mahasiswa.nama_siswa, tb_nilai.n_absen, tb_nilai.n_tugas, tb_nilai.n_uts, tb_nilai.n_akhir, tb_nilai.predikat FROM tb_dosen, tb_mahasiswa, tb_matakuliah, tb_nilai WHERE tb_nilai.nip = tb_dosen.nip and tb_matakuliah.kode_matkul = tb_nilai.matakuliah and tb_mahasiswa.nis = tb_nilai.mahasiswa");
                                      while($row = $sql->fetch_assoc()){
                                     ?>
                                        <tr>
                                          <td><?=$no++?></td>
                                          <td><?=$row['nama_dosen']?></td>
                                          <td align="center" width="10px"><?=$row['semester']?></td>
                                          <td><?=$row['matakuliah']?></td>
                                          <td><?=$row['nama_siswa']?></td>
                                          <td align="center"><?=$row['n_absen']?></td>
                                          <td align="center"><?=$row['n_tugas']?></td>
                                          <td align="center"><?=$row['n_uts']?></td>
                                          <td align="center"><?=$row['n_akhir']?></td>
                                          <td align="center" id="pret"><?=ucwords(predikat($row['predikat']))?></td>
                                          <td align="center" width="82px">
                                            <a href="?modul=nilai&a=edit&id=<?=$row['id_nilai']?>" title="Edit Data" class="btn btn-primary"><i class="glyphicon glyphicon-edit xl"></i></a>
                                            <a href="modul/nilai/delete_nilai.php?id=<?=$row['id_nilai']?>" title="Delete Data" class="btn btn-danger"><i class="fa fa-times-circle"></i></a>
                                          </td>
                                        </tr>
                                    <?php
                                      }
                                    ?>
                                                            
                                    </tbody>
                                </table>
              </div>
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
