<?php
	session_start();

	if (isset($_SESSION['import'])) {
		header("location: home.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Administrasi</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/sweet/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="js/sweet/sweetalert2.css">
	
	<script type="text/javascript">
		$(document).ready(function(){

			$("#login").click(function(event){
				event.preventDefault();	

				var username = $("#username").val();
			var password = $("#password").val();

				$.ajax({
					url: "proses_login.php",
					type: "POST",			
					data: "username="+username+
						"&password="+password,
					success: function(data){
						if (data == "Username tidak boleh kosong") {
							$("#username").focus();
							swal(data, "" , "warning")
						}else if (data == "Password tidak boleh kosong") {
							$("#password").focus();
							swal(data, "" , "warning")
						}else{
							$("#username").val("").focus();
							$("#password").val("");
							swal(data, "" , "error")
						}

						if (data == "Silahkan Masuk") {
                            swal(data)
							$("html").hide();							
							window.location.href="home.php";

						}

					}
				});

			});

			
		});
	</script>
</head>

<body>
	 <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-md-4 col-md-offset-4">
            <img src="images/login.png" class="img-circle" width="30%" alt="" style="margin-bottom: -80px; margin-left: 125px">
                <div class="login-panel panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title" align="center"><strong>LOGIN</strong></h3>
                        
                    
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                            <input type="text" class="form-control" id="username" placeholder="Username">
                                </div>
                                <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                            <input type="password" class="form-control" id="password" placeholder="Username">
                                	</div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="index.html" class="btn btn-lg btn-warning btn-block" id="login">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>


	
</body>
</html>