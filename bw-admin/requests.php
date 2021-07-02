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
$msg="";
if(isset($_GET['approve'])){
$get=$_GET['approve'];
$cid=$_GET['uid'];
if($get==1){
    $query=mysqli_query($db,"update clients set status='4' where uid=$cid");
    $query2=mysqli_query($db,"update profile_requests set status='1' where uid=$cid");
    if($query && $query2 ){
        $msg="Profile Approved Successfully";
    }else{
        $msg="Something went wrong while approving profile";
    }
}else if($get==0){
    $query=mysqli_query($db,"update clients set status='3' where uid=$cid");
    $query2=mysqli_query($db,"update profile_requests set status='0' where uid=$cid");
    if($query && $query2 ){
        $msg="Profile Declined Successfully";
    }else{
        $msg="Something went wrong while declining profile";
    }

}
}

?>
<div class="main-container">

    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Manage Profile Requests</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Requests</li>
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
<!--                        <h5 >Manage Resq</h5>-->
                    </div>
                </div>
                <div class="row">

                    <!-- Bootstrap CSS -->
                    <!-- jQuery first, then Bootstrap JS. -->
                    <!-- Nav tabs -->
                    <div class="col-md-12">
                        <?php
                        if(!empty($msg)){
                            ?>

                            <div class="alert alert-info">
                                <?php echo $msg;?>
                            </div>

                            <?php
                        }
                        ?>

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">
                                Clients Requests
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Professionals Requests</a>
                        </li>
                    </ul>
                    </div>

                        <div class="col-md-12">
                    <!-- Tab panes -->
                    <div class="tab-content p-3">
                        <div role="tabpanel" class="tab-pane fade in active show" id="profile">



                            <!-- Export Datatable start -->

                                    <table class="stripe hover data-table-export nowrap">
                                        <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th >Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Attempts</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a=1;
                                        $query=mysqli_query($db,"select * from profile_requests where type='1' and status=0 order by uid desc");
                                        while ($d=mysqli_fetch_array($query)){
                                            $ud=$d['uid'];
//                                            echo $ud;
                                            $q=mysqli_query($db,"select * from users where uid='$ud'");
                                            $row=mysqli_fetch_array($q);
                                            ?>


                                            <tr>
                                                <td><?php echo $a; ?></td>
                                                <td class="table-plus"><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['username'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $d['attempts'] ?></td>
                                                <td>
                                                    <a href="request-detail.php?uid=<?php echo $row['uid'] ;?>" class="btn btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="requests.php?approve=1&uid=<?php echo $row['uid'] ?>" class="btn btn-success">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <a href="requests.php?approve=0&uid=<?php echo $row['uid'] ?>" class="btn btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </a>
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
                        <div role="tabpanel" class="tab-pane fade" id="buzz">



                            <!-- Export Datatable start -->

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
                                        $query=mysqli_query($db,"select * from users where type='1' order by uid desc");
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
                                                            <a class="dropdown-item" href="delete.php?upid=<?php echo $row['uid'] ?>"><i class="fa fa-trash"></i> Delete</a>
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
                    <div class="clearfix"></div>

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
