<?php include('connect.php') ?>

<?php 
	$delete_id=$_GET['del'];
	$query="delete from blogcategory where bcid='$delete_id'";
	if(mysqli_query($connect, $query)){
		header('location:blog.php');
	}

?>