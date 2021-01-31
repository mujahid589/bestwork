<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
  <?php
  $msg="";
  if (isset($_POST['submit'])) {
    extract($_POST);
    $admin=$_SESSION['admin'];
  $query=mysqli_query($db,"update users set name='$name',username='$uname',email='$email',password='$pass' where uid='$admin'");
  if ($query) {
    $msg="<div class='alert alert-success'>Details Updated Successfully. Refresh page to see changes</div>";
  }
  else {
    $msg="<div class='alert alert-danger'>Something went wrong while creating your account. Please try again later.</div>";
  }
  }
      ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">

<?php if (!empty($msg)) {
echo $msg;
// code...
}
 ?>
			<div class="min-height-200px">
				<div class="page-header">
          <div class="pd-20 bg-white border-radius-4 p-5 box-shadow mb-30">

            <form  method="post" name="frm1" onsubmit="return validate()">
					<div class="row"><?php
          $user=$_SESSION['admin'];
          $query=mysqli_query($db,"select * from users where uid='$user'");
          $u=mysqli_fetch_array($query);
 ?>

              <label for="name"> <i class="fa fa-user-circle"></i> Name</label>
              <input type="text"  required id="name" name="name" value="<?php echo $u['name'] ?>" class="form-control" >
              <br>
<br>              <label for="uname"> <i class="fa fa-user"></i> User Name</label>
              <input type="text"  id="uname" name="uname" class="form-control" value="<?php echo $u['username'] ?>" readonly>
              <br>
    <br>            <label for="email"> <i class="fa fa-envelope"></i> Email</label>
                <input type="email"  id="email" name="email" class="form-control" value="<?php echo $u['email'] ?>" readonly >
                <br>
<br>
                <label for="password"> <i class="fa fa-lock"></i> password</label>
                <input type="password"  required id="password" name="pass" class="form-control" value="<?php echo $u['password'] ?>">

                <br>
<br>
              <!-- <div class="md-form"> -->
              <button type="submit" name="submit" class="btn btn-default black">Update Profile <i class="fa fa-sign-out"></i> </button>
              <!-- </div> -->
            </form>


  					</div>
  				</div>
  				<!-- Export Datatable End -->


				</div>
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>
