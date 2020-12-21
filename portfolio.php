 <?php
 session_start();
  
 $id=$_SESSION['uid'];
  ?>
<?php
error_reporting(0);
 $conn=mysqli_connect("localhost","root","","best");

 if (isset($_POST['submit']))

  { 
    $id= $id;
    $a=$_POST['status']; 
    $b=$_POST['date'];
  $qry="INSERT INTO `portfolio`(`id`, `user_id`, `status`, `date`) VALUES (Null,'$id','$a','$b')";
 $result=mysqli_query($conn,$qry);
 
   if($result){ ?>
     <div class="alert alert-success alert-dismissible">
                    
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span style="margin-left:-32px" aria-hidden="true">&times;</span></button>
  <strong><span class="text-center">Confirmation!Record Updated Successfully</span></strong>

</div>
<?php }else{
 
   echo ".'<p class='alert-danger text-center'>Sorry Something went Wrong'</p>'";
  }

}
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>Bestwork.pk | Add portfolio</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
</head>
<body>
  <a class="text-right" href="logout.php">Logout</a>
</body>
<h1 align="center">Add Portfolio</h1>
  <form name="donor" method="post">
    <div class="container" >
    <div class="row"> 
<label style="font-style: italic"><b>Portfolio</b> <a style="color: red; font-size: 26" >* :</a></label>
<input type="file" name="date" class="form-control" required="">
        </div>
        <div class="row"> 
<label style="font-style: italic"><b>Qulification</b> <a style="color: red; font-size: 26" >* :</a></label>
<input type="file" name="date" class="form-control" required="">
        </div>
        <div class="row"> 
<label style="font-style: italic"><b>certificates</b> <a style="color: red; font-size: 26" >* :</a></label>
<input type="file" name="date" class="form-control" required="">
</div>
<br><br>
<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer">
</div>
</div>
</div>
</div>
</form>
</html>