<?php include('connect.php') ?>

<?php

		$edit_id=$_GET['edit'];
		$query1 = "select * from blogcategory where bcid = '$edit_id'";
		$run=mysqli_query($connect, $query1);
		while($row=mysqli_fetch_array($run)){  
			$id=$row[0];
			$name=$row[1];
			$discription=$row[2];
			$image=$row[3];
		}

 ?>	

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>update</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/master.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>		
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
	<script src="js/data.js"></script>
</head>

<body>
<div class="container">
<h3 class="alert alert-success" align="center">Update blog</h3>
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
 
    <input type="hidden" class="form-control" name="i" value="<?php echo $id ?>">
  </div>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="n" value="<?php echo $name ?>">
  </div>
  <div class="form-group">
    <label>Description</label>
    <input type="text" class="form-control" name="d" value="<?php echo $discription ?>">
  </div>
  <div class="form-group">
    <label>image</label>
    <input type="file" class="form-control" name="im" value="<?php echo $image ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="update">Update Now</button>
</form>

<?php

	if(isset($_POST['update']))
	{
		
		$editid=$_POST['i'];
		$name1=$_POST['n'];
		$description1=$_POST['d'];
		$image1=$_FILES['im']['name'];
		$query2="update blogcategory set name='$name1', description='$description1', image='$image1' where bcid='$edit_id'";
		if(mysqli_query($connect, $query2)){
			header('location:blog.php');
			} 

		}

 ?>

</div><!--container-->
</body>
</html>