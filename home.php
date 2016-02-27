<?php
include_once "inc/koneksi.php";
session_start();



if (!$_SESSION['import']) {
	header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Akademik Mahasiswa</title>
	<link rel="stylesheet" href="">

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Social Buttons CSS -->
    <link href="bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">

    <!--     sweetalert -->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/sweet/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/sweet/sweetalert2.css">

    <style type="text/css">
        .navbar-nav >li:hover > a{
            background :#434343;
        }

        .navbar-right > li > a:hover{
            background-color: #525151;
        }

        .navbar-right > li > a:after{
            background-color: #525151;
        }

        img:hover{
            -moz-transform: rotate(360deg);
            -webkit-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }

        .dropdown-menu .dropdown-user{
            background-color: #D10B0B;
        }
    </style>
</head>
<body>
<?php

if ($_SESSION['hai'] == 1) {
    ?>
        <script type="text/javascript">
        
            swal({   title: "Selamat Datang",   text: "Sistem Akademik Mahasiswa",   imageUrl: "images/open2.png",
            timer: 2000,   showConfirmButton: true,
            allowEscapeKey: true});
        </script>
    <?php    
}
$_SESSION['hai']++;

?>



<div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-inverse navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?modul=home" style="color: white">Sistem Akademik Mahasiswa</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-inverse navbar-top-links navbar-right">
                <li class="dropdown" id="coba">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white">
                        <i class="fa fa-user fa-fw"  style="color: white"></i> Selamat Datang <?=$_SESSION['import']?>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search" align="center">
                            <div align="center">
                               <img src="images/mahasiswa.png" alt="Admin" class="img-circle" style="border: 1px solid #E6E6E6" width="40%"><br>
                               <h4 style="border-bottom: solid 1px blue; padding-bottom: 3px"><b><?=ucwords($_SESSION['import'])?></b></h4>
                               <h5 style="margin: 0; margin-top: -5px"><b>Administrator</b></h5>
                            </div>                           
                        </li>
                        <li>
                            <a href="?modul=home"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-user"></i> Data Master<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?modul=mahasiswa">Mahasiswa</a>
                                </li>
                                <li>
                                    <a href="?modul=dosen">Dosen</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-transfer"></i> Kuliah<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?modul=semester">Semester</a>
                                </li>
                                <li>
                                    <a href="?modul=jadwal">Jadwal</a>
                                </li>
                                <li>
                                    <a href="?modul=mata-kuliah">Matakuliah</a>
                                </li>
                                <li>
                                    <a href="?modul=nilai">Nilai</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="?modul=laporan"><i class="fa fa-table fa-fw"></i> Laporan</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="fa fa-power-off fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper"  style="background-color: #EFF0F1">
        
           <?php include "content.php";?> 
        
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



	<!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
     <script src="js/jquery-ui/jquery.js"></script>
    <script src="js/jquery-ui/jquery-ui.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>
</html>