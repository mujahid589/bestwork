<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<?php
session_start();
if(isset($_SESSION['admin'])){
  header('location:home.php');
}
if (isset($_POST['submit'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];
	// echo $name;
	$query=mysqli_query($db,"select * from users where email='$email' and password='$password' and type='2' ");
	$count=mysqli_num_rows($query);
	// echo $count;
	if($count==1){
		$getdata=mysqli_fetch_array($query);
		// echo $getdata['userid'];
		$_SESSION['admin']=$getdata['userid'];
		// echo $_SESSION['admin'];
		header('Location:home.php');
	}
	else {
		$msg="<div class='alert alert-danger'>Incorrect Username/Password</div>";
	}
}
 ?>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="/media/main/logo.png" alt="login"  style="width:250px !important;display:block;margin:0 auto">
			<h6 class="text-center mb-30">Login | Management Portal</h6>
			<?php if(!empty($msg)){
				echo $msg;
			} ?>
			<form method="post">
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" name="email" required placeholder="Email">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" name="password" class="form-control" required placeholder="**********">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
								<!-- use code for form submit -->
								<input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="submit" value="Sign In">
							<!-- <a class="btn btn-outline-primary btn-lg btn-block" href="index.php">Sign In</a> -->
						</div>
					</div>
					<div class="col-sm-6">
						<!-- <div class="forgot-password padding-top-10"><a href="forgot-password.php">Forgot Password</a></div> -->
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>
