<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Manage Clients</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="home.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Manage Clients</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">

						</div>
					</div>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
          <?php if (isset($_GET['check']) && $_GET['check']==1 && isset($_GET['message'])&& $_GET['message']!=''){ ?>
            <div class="alert alert-success">
              <?php echo $_GET['message'] ?>
            </div>
          <?php }?>
          <?php if (isset($_GET['check']) && $_GET['check']==0 && isset($_GET['message'])&& $_GET['message']!=''){ ?>
            <div class="alert alert-danger">
              <?php echo $_GET['message'] ?>
            </div>
          <?php }?>

          <!-- Export Datatable start -->
  				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
  					<div class="clearfix mb-20">
  						<div class="pull-left">
  							<!-- <h5 class="text-blue">Data Table with Export Buttons</h5> -->
  						</div>
  					</div>
  					<div class="row">
  						<table class="stripe hover data-table-export nowrap">
  							<thead>
  								<tr>
                    <th>Sr.</th>
  									<th >Name</th>
  									<th>Username</th>
  									<th>Email</th>
                    <th>Actions</th>
  								</tr>
  							</thead>
  							<tbody>
                  <?php
                  $a=1;
                  $query=mysqli_query($db,"select * from users where type='2' order by uid desc");
                  while ($row=mysqli_fetch_array($query)){
                    ?>


  								<tr>
                    <td><?php echo $a; ?></td>
  									<td class="table-plus"><?php echo $row['name'] ?></td>
                    <td><?php echo $row['username'] ?></td>
  									<td><?php echo $row['email'] ?></td>
                    <td>
                      <div class="dropdown">
  											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
  												<i class="fa fa-ellipsis-h"></i>
  											</a>
  											<div class="dropdown-menu dropdown-menu-right">
  												<a class="dropdown-item" href="delete.php?ucid=<?php echo $row['uid'] ?>"><i class="fa fa-trash"></i> Delete</a>
  											</div>
  										</div>
                    </td>
  								</tr>
                  <?php
                  // code...
                  $a++;
                  }
                  ?>
  							</tbody>
  						</table>
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
