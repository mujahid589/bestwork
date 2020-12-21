<?php
error_reporting(0);

 $conn=mysqli_connect("localhost","root","","best");

 if (isset($_POST['submit']))

  { $a=$_POST['email']; 
    $b=$_POST['Password'];
  $qry="SELECT * FROM best WHERE EmailId='$a' AND Password='$b'";
 $result=mysqli_query($conn,$qry);
 $row=mysqli_num_rows($result);
   if($row<1){
  ?>
  <script>
   window.open('login.php','_self');
  alert('username and password not match');
 
  </script>
  <?php
  
  }
  else{
  $data=mysqli_fetch_assoc($result);
  
  $id=$data['did'];
  
  session_start();
  
  $_SESSION['uid']=$id;
  
  header('location:donatioStatus.php');
  }

}
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
</head>
<body>

</body>
<h1 align="center">Login Page</h1>


  <form name="donor" method="post">
    <div class="container" >
         
     
        <div class="row"> 
<label style="font-style: italic"><b>Email</b> <a style="color: red; font-size: 26" >* :</a></label>
<input type="email" name="email" class="form-control" required="">
        </div>
         <div class="row"> 
<label style="font-style: italic"><b>Password</b> <a style="color: red; font-size: 26" >* :</a></label>
<input type="Password" name="Password" class="form-control" required="">
        </div>
<br><br>
        <div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div> </div>
    </div>

</form>
</html>