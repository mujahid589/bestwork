<!DOCTYPE html>
<html>
<head>
    <?php include('include/head.php'); ?>
</head>
<body>
<?php
include 'include/sidebar.php';
include 'include/header.php';
if(isset($_POST['save'])){
//    echo "<script>alert()</script>";
    extract($_POST);
    $file_name=$_FILES['pic']['name'];
    $file_tmp=$_FILES['pic']['tmp_name'];
    $query=mysqli_query($db,"insert into skills(skill_name,skill_description,skill_image,slug,parent)
    values('$name','$desc','$file_name','$slug',0) ");
    if($query){
        move_uploaded_file($file_tmp,"../media/skills/".$file_name);
        header('location:skills.php?message=Skills added successfully&check=1');
    }else{
//        echo "error";
//        echo mysqli_error($db);
        header('location:skills.php?message=Something went wrong&check=0');
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
                            <h4>Add Skills</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Add Skill</li>
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
                        <h5 >Add Skill</h5>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" required placeholder="Enter Skill Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="slug" id="result" readonly class="form-control" required placeholder="Enter Skill Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="file" name="pic" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="desc" placeholder="Enter Description here" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="submit" name="save" class="btn btn-default">
                            </div>
                        </div>

                        <div class="clearfix">

                        </div>
                    </div>
            </div>
            </form>


        </div>
    </div>


    <?php include('include/footer.php'); ?>
</div>
</div>
<?php include('include/script.php'); ?>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){

        $('#name').on('input',function(){
            var str=$('#name').val();
            var $slug = $('#name').val();
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            $('#result').val($slug.toLowerCase());

        });
    });
</script>
