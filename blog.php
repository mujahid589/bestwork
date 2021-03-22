<?php include('connect.php');
include('nav.inc.php');
include('meta.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blog category</title>
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
<h3 class="alert alert-success" align="center">BLOG CATEGORIES</h3>

<table class="table table-bordered">
	 <a href="insert.php" class="btn btn-primary fa fa-pen"> Insert</a>
	<tr>
		<th>Category id</th>
    	<th>Categories</th>
    	<th>Discription</th>
        <th>image</th>
        <th>Actions</th>

        </tr>
    
    <?php
	
		$query1="select * from blogcategory";
		$run=mysqli_query($connect, $query1);
		
		while($row=mysqli_fetch_array($run)){  
			$id=$row[0];
			$name=$row[1];
			$discription=$row[2];
			$image=$row[3];
			
	
	 ?>
    
    <tr align="center">
    	<td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $discription; ?></td>
        <td><?php echo'<img src="./image/'.$row['image'].'" width="100px;" height="100px;" alt="image is loading">'?></td>
        <td>
        	<a href="delete.php?del=<?php echo $id; ?>" class="btn btn-primary fa fa-trash"> Delete</a>
        	<a href="edit.php?edit=<?php echo $id; ?>" class="btn btn-info fa fa-edit"> Edit</a></td>
    </tr>
    
    
    <?php }  ?> <!-- to include tr in loop-->
    
</table>


</div><!--container-->
<?php
include('footer.inc.php')
  ?>
</body>
</html>