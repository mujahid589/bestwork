<?php
?>
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
<div class="main-container">

    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Manage Skills</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Skills</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="add-skill.php" class="btn btn-primary">Add New Skill</a>

                    </div>
                </div>
            </div>


            <div class="pd-20 bg-white border-radius-4 box-shadow ">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h5 >Manage Skills</h5>
                    </div>
                </div>
                <div class="row">

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

                    <table class="stripe hover data-table-export nowrap">
                        <thead>
                        <tr>
                            <th>Sr.</th>
                            <th >Skill Name</th>
                            <th>Skill Image</th>
                            <th>Actions</th>
                            <th>Skill Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $a=1;
                        $query=mysqli_query($db,"select * from skills where parent='' order by skill_id desc");
                        while ($row=mysqli_fetch_array($query)){
                            ?>


                            <tr>
                                <td><?php echo $a; ?></td>
                                <td class="table-plus"><?php echo $row['skill_name'] ?></td>
                                <td><img src="../media/skills/<?php echo $row['skill_image'] ?>" height="50" width="50"></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="edit-skill.php?skid=<?php echo $row['skill_id'] ?>"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="delete.php?skid=<?php echo $row['skill_id'] ?>"><i class="fa fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $row['skill_description'] ?></td>
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



        </div>
    </div>


    <?php include('include/footer.php'); ?>
</div>
</div>
<?php include('include/script.php'); ?>
</body>
</html>
