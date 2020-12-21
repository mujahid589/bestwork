<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<body>
  <?php
  $msg="";
  $q=mysqli_query($db,"select * from pages where page_id='1' ");
  $get=mysqli_fetch_array($q);
if (isset($_POST['submit'])) {
  extract($_POST);
  $content=mysqli_real_escape_string($db,$content);
  $query=mysqli_query($db,"update pages set content='$content' where page_id='1'");
  if($query){
    $msg="<div class='alert alert-success'>Content Updated Successfully</div>";
  }else {
    $msg="<div class='alert alert-danger'>Something went wrong</div>";
  }
  }
   ?>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>About Us</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="home.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">About Us</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<!-- <div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div> -->
						</div>
					</div>
				</div>
        <form method="post">
				<div class="html-editor pd-20 bg-white border-radius-4 box-shadow mb-30">
					<h3 class="weight-500">About Us</h3>
          <?php
          if(!empty($msg)){
            echo "$msg";
          }
           ?>
					<!-- <p>Simple, beautiful wysiwyg editors</p> -->
					<textarea name="content" class="textarea_editor form-control border-radius-0" placeholder="Enter text ...">
<?php echo $get['content'] ?>
          </textarea>
          <br>
          <input type="submit" name="submit" value="Update Content" class="btn btn-info">
				</div>
      </form>
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>
