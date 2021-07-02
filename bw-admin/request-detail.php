<!DOCTYPE html>
<html>
<head>
    <?php include('include/head.php'); ?>
</head>
<body>
<?php
include 'include/sidebar.php';
include 'include/header.php';
?>
<?php
if (isset($_GET['uid'])){
    $uid=$_GET['uid'];
    echo $uid;
    $query=mysqli_query($db,"select * from users where uid='$uid'");
    $query2=mysqli_query($db,"select * from clients where uid='$uid'");
    $row=mysqli_fetch_array($query);
    $row2=mysqli_fetch_array($query2);
}
?>

<div class="main-container">

    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Request Details</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="requests.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Request Details</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">

                    </div>
                </div>
            </div>


            <div class="pd-20 bg-white border-radius-4 box-shadow ">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h5> Client Name: <?php  echo $row['name'] ?> </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-7">


                            <p>
                       Username:  <?php  echo $row['username'] ?>
                    </p>


        <p>

                    Email:  <?php  echo $row['email'] ?>
        </p>
                        <p>

                        Phone :  <?php  echo $row['phone'] ?>
                    </p>
                    <p>

                        Timezone:  <?php  echo $row['timezone'] ?>
                    </p>
                            </div>
                        <div class="col-md-5">
                            <img src="/media/users/clients/<?php echo $row2['image'] ?>" width="150" alt="">
                            
                        </div>
                        
                        </div>
                    <hr>
                    <p>

                        Company Name:  <?php  echo $row2['name'] ?>
                    </p>
                    <p>

                        Description:  <?php  echo $row2['description'] ?>
                    </p>
                    <p>

                        Located At:  <?php  echo $row2['city'] . ", " . $row2['country'] ?>
                    </p>

                        <a href="requests.php?approve=1&uid=<?php echo $row['uid'] ?>" class="btn btn-success">
                            Approve <i class="fa fa-check"></i>
                        </a>
                        <a href="requests.php?approve=0&uid=<?php echo $row['uid'] ?>" class="btn btn-danger">
                            Decline <i class="fa fa-times"></i>
                        </a>


                    </div>


                </div>
            </div>



        </div>
    </div>


    <?php include('include/footer.php'); ?>
</div>
</div>
<?php include('include/script.php'); ?>
</body>
</html>
