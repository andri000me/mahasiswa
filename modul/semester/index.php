<?php 
include "inc/koneksi.php";
include "inc/fungsi.php";
?>
 

<script src="js/jquery-ui/jquery.js"></script>
<script src="js/jquery-ui/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
  
  
  <script type="text/javascript">
    $(document).ready(function(){

      $(function() {
         $( "#tasdhun" ).datepicker({
                dateFormat: 'yy',
                showAnim: 'clip'
         });
       });
      
      $("#submit").click(function(event){   
        event.preventDefault();   

        var semester = $("#semester").val();
        var tahun = $("#tahun").val();
        var mahasiswa = $("#mahasiswa").val();
        

          $.ajax({
            url: "modul/semester/proses_add.php",
            type: "POST",     
            data: "semester="+semester+
              "&tahun="+tahun+
              "&mahasiswa="+mahasiswa,
            success: function(data){

            if (data == "Data Berhasil dimasukan") {
              $("#semester").val("").focus();
              $("#mahasiswa").val("");
              $("#tahun").val("");
              swal(data)
            }else{
              $("#semester").focus();
              swal(data)
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
        <h4 align="center"><b>Data Semester</b></h4>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">

        <!-- tab menu -->
        <ul class="nav nav-tabs">
          <li class="active" id="popopo"><a href="?modul=semester">Daftar Semester</a></li>
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
                          <th>Semester</th>
                          <th>Tahun</th>
                          <th>Mahasiswa</th>
                          <th style="text-align: center">Aksi</th>
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
                        <td align="center">
                          <a href="?modul=semester&a=edit&id=<?=$row['id_semester']?>" class="btn btn-primary" title="Edit Data"><i class="glyphicon glyphicon-edit xl"></i></a>
                          <a href="modul/semester/delete_semester.php?id=<?=$row['id_semester']?>" class="btn btn-danger" title="Delete Data"><i class="fa fa-times-circle"></i></a>
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
              <form action="modul/semester/proses_add.php" method="POST" class="form-horizontal" role="form">

              <div class="form-group">
              <label class="control-label col-sm-3" for="semester">Semester</label> 
              <div class="col-sm-3">
                  <select name="semester" id="semester" class="form-control">
                    <option disabled selected>--</option>
                    option
                    <?php 
                    $i = 1;
                    while ( $i <= 8) {
                        echo "<option value='$i'>$i</option>";
                        $i++;
                    }
                   ?>
                  </select>
              </div>
            </div>

                <div class="form-group">
              <label class="control-label col-sm-3" for="tahun">Tahun:</label>  
              <div class="col-sm-5">
                <input type="text" name="tahun" class="form-control" id="tahun" autocomplete="off" placeholder="Tahun">
              </div>
            </div>

                <div class="form-group">
              <label class="control-label col-sm-3" for="mahasiswa">Mahasiswa:</label>  
              <div class="col-sm-8">
                <select class="form-control" id="mahasiswa" name="mahasiswa">
                <option>--- Pilih Salah Satu ---</option>
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
