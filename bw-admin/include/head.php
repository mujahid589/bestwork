	<?php
	ob_start();
	session_start();
	include 'database/db.php';
	$filename= basename($_SERVER['PHP_SELF']);
	if(!isset($_SESSION['admin'])){
		if($filename=!"index.php"){
		header('location:index.php');
		}
	}else {
		$aid=$_SESSION['admin'];
		$query=mysqli_query($db,"select * from users where uid='$aid'");
		if($query){
			$ad=mysqli_fetch_array($query);
			// echo $ad['name'];
		}
		if($filename=='index.php'){
			header('location:home.php');
		}

	}
	?>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Bestwork Admin Panel</title>

	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="images/favicon.png">
	<link rel="stylesheet" href="vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/build/jquery.steps.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">