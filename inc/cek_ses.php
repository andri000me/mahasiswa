<?php 
	if (!$_SESSION['admin']) {
		header("location: index.php");
	}

 ?>