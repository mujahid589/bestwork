<?php
include 'connect.php';
?>
<?php

	if(isset($_POST['insert'])){
		
		$name=$_POST['n'];
		$discription=$_POST['d'];
		$imagen=$_FILES["i"]["name"];
		$dst="./image/".$imagen;
		move_uploaded_file($_FILES["i"]["tmp_name"],$dst);
		
		$query="insert into blogcategory values (NULL,'$name','$discription','$imagen')";

		if(mysqli_query($connect, $query)){
			echo "<h2>Data Inserted!</h2>";
			header("location:blog.php");
			}
		
		}

 ?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/master.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>		
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
	<script src="js/data.js"></script>
	<div class="container">
 <h3 class="alert alert-success" align="center">Insert blog</h3>
<form method="post" name="form1" enctype="multipart/form-data" >
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" placeholder="Name" name="n">
  </div>
  <div class="form-group">
    <label>Discription</label>
    <input type="text" class="form-control" placeholder="discription" name="d">
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" class="form-control" name="i">
  </div>
  <button type="submit" class="btn btn-primary" name="insert">Save</button>
</form>
</div>