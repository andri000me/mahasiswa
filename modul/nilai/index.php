<?php 
	require "inc/koneksi.php";
	include "inc/fungsi.php";
 ?>

 <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>


 <script type="text/javascript">

    function pilih_matkul(nip)
    {
      $.ajax({
            url: 'modul/nilai/matkul.php',
            data : 'nip='+nip,
            type: "post", 
            dataType: "html",
             timeout: 10000,
            success: function(response){
              $("#matakuliah").html(response); 
              $("#matakuliah").removeAttr('disabled');
          }
        });
    }

    function bersih()
    {
              $("#mahasiswa").removeAttr('disabled'); 
              $("#n_tugas").removeAttr('disabled'); 
              $("#n_tugas").removeAttr('disabled'); 
              $("#n_absen").removeAttr('disabled'); 
              $("#n_akhir").removeAttr('disabled'); 
              $("#n_uts").removeAttr('disabled');    
    }



    $(document).ready(function(){
      
      $("#submit").click(function(event){   
        event.preventDefault();   

        var nip = $("#nip").val();
        var matakuliah = $("#matakuliah").val();
        var mahasiswa = $("#mahasiswa").val();
        var n_absen = $("#n_absen").val();
        var n_tugas = $("#n_tugas").val();
        var n_uts = $("#n_uts").val();
        var n_akhir = $("#n_akhir").val();

          $.ajax({
            url: "modul/nilai/proses_add.php",
            type: "POST",     
            data: "nip="+nip+
              "&matakuliah="+matakuliah+
              "&mahasiswa="+mahasiswa+
              "&n_absen="+n_absen+
              "&n_tugas="+n_tugas+
              "&n_uts="+n_uts+
              "&n_akhir="+n_akhir,
            success: function(data){
              

            if (data == "Data Berhasil dimasukan") {
              swal(data,"","success");
              $("#nip").val("");
              $("#nip").focus();
              $("#mahasiswa").val("");
              $("#matakuliah").val("");
              $("#n_absen").val("");
              $("#n_tugas").val("");
              $("#n_uts").val("");
              $("#n_akhir").val("");
            }else{
              swal(data,"","error");
              $("#nip").focus();
            }
          }
        });

      });

      
    });
  </script>



<div class="row">
                <div class="col-lg-12" style="margin-top:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 50px">
                            <h4 align="center"><b>Data Nilai</b></h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                              <!-- tab menu -->
                              <ul class="nav nav-tabs">
                                <li class="active" id="popopo"><a href="?modul=nilai">Daftar Nilai</a></li>
                                <li><a data-toggle="tab" href="#tambah">Tambah Data</a></li>
                              </ul>
                              <!-- akhir tab menu -->

                              
                              <!-- awal menu -->
                                <div class="tab-content">

                                  <!-- awal menu read -->
                                  <div id="daftar" class="tab-pane fade in active" style="margin-top:10px">
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
                                  <!-- akhir menu read -->

                                  <!-- awal menu tambah -->
                                  <div id="tambah" class="tab-pane fade"  style="margin-top:10px">
                                    
                                    <form action="modul/nilai/pp.php" method="POST" class="form-horizontal" role="form">

                                      <div class="form-group">
                                      <label class="control-label col-sm-3" for="nip">Dosen:</label>  
                                      <div class="col-sm-8">
                                        <select class="form-control" id="nip" name="nip" onchange="pilih_matkul(this.value);">
                                        <option disabled selected>--- Pilih Salah Satu ---</option>
                                        <?php 
                                          $sql = $mysqli->query("SELECT nip, nama_dosen FROM tb_dosen ORDER BY nip");
                                          while($row = $sql->fetch_assoc()){ ?>
                                            <option value="<?=$row['nip']?>"><?=$row['nip']." | ".$row['nama_dosen']?></option>
                                          <?php }
                                         ?>         
                                      </select>
                                      </div>
                                    </div>

                                    <div id="coba">
                                          <div class="form-group">
                                        <label class="control-label col-sm-3" for="matakuliah">Matakuliah:</label>  
                                        <div class="col-sm-8">
                                          <select class="form-control" id="matakuliah" name="matakuliah" id="matakulih" onchange="bersih();" disabled>
                                          <option>--- Pilih Salah Satu ---</option>     
                                        </select>
                                        </div>
                                      </div>

                                          <div class="form-group">
                                        <label class="control-label col-sm-3" for="mahasiswa">Mahasiswa:</label>  
                                        <div class="col-sm-8">
                                          <select class="form-control" id="mahasiswa" name="mahasiswa" disabled>
                                          <option disabled selected>--- Pilih Salah Satu ---</option>
                                          <?php 
                                            $sql = $mysqli->query("SELECT nis, nama_siswa FROM tb_mahasiswa ORDER BY nis");
                                            while($row = $sql->fetch_assoc()){ ?>
                                              <option value="<?=$row['nis'];?>"><?=$row['nis']." | ".$row['nama_siswa']?></option>
                                            <?php }
                                           ?>         
                                        </select>
                                        </div>
                                      </div>  

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="">Nilai:</label>  
                                        <div class="col-sm-4">
                                          <input type="text" id="n_absen" name="n_absen" placeholder="Absen" class="form-control" disabled>
                                        </div>
                                        <div class="col-sm-4">
                                          <input type="text" id="n_tugas" name="n_tugas" placeholder="Tugas" class="form-control" disabled>
                                        </div>
                                      </div>  

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="mahasiswa"></label>  
                                        <div class="col-sm-4">
                                          <input type="text" id="n_uts" name="n_uts" placeholder="UTS" class="form-control" disabled>
                                        </div>
                                        <div class="col-sm-4">
                                          <input type="text" id="n_akhir" name="n_akhir" placeholder="Akhir" class="form-control" disabled>
                                        </div>
                                      </div>  

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="telepon"></label>  
                                        <div class="col-sm-6">
                                          <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                                          <input type="reset" class="btn btn-danger" value="Reset">
                                        </div>
                                      </div>   
                                    </div>
                                    <!-- akhir coba -->
                                    

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