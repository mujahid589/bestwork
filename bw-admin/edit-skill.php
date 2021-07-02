<!DOCTYPE html>
<html>
<head>
    <?php include('include/head.php'); ?>
</head>
<body>
<?php
$msg="";
if (isset($_GET['skid'])) {

    extract($_GET);
    $query=mysqli_query($db,"select * from skills where skill_id='$skid'");
    $get=mysqli_fetch_array($query);
}
if (isset($_POST['submit'])) {
    extract($_POST);
    $query=mysqli_query($db,"update skills set skill_name='$name',slug='$slug', skill_description='$desc' where skill_id='$skid'");
    if($query){
        $msg="<div class='alert alert-success'>Skill Updated Successfully. <a href='skills.php'>Go Back</a></div>";
    }else {
        $msg="<div class='alert alert-danger'>Something went wrong<br> ".  mysqli_error($db) ." </div>";
    }

}
if (isset($_POST['save'])) {
    extract($_POST);
    $file_name=$_FILES['pic']['name'];
    $file_tmp=$_FILES['pic']['tmp_name'];
    $query=mysqli_query($db,"update skills set skill_image='$file_name' where skill_id='$skid'");
    if($query){
        move_uploaded_file($file_tmp,"../media/skills/".$file_name);
        $msg="<div class='alert alert-success'>Skill Image Updated Successfully. <a href='skills.php'>Go Back</a></div>";
    }else {
        $msg="<div class='alert alert-danger'>Something went wrong<br> ".  mysqli_error($db) ." </div>";
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
                            <h4>Edit Skill Category</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="categories.php">Skill Categories</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Skill Category</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">

                    </div>
                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <?php if (isset($msg)){ ?>
                    <?php echo $msg ?>
                <?php }?>

                <!-- Export Datatable start -->
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <!-- <h5 class="text-blue">Data Table with Export Buttons</h5> -->
                        </div>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required value="<?php echo $get['skill_name'] ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Skill Slug</label>
                                    <input type="text" name="slug" id="result" readonly class="form-control" required value="<?php echo $get['slug'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Skill Description</label>
                                    <textarea name="desc"  class="form-control" required ><?php echo $get['skill_description'] ?>
                                    </textarea>
                                </div>
                            </div>

                            <div class="clearfix">

                            </div>
                            <div class="col-md-12">

                                <input type="submit" name="submit" value="Update Skill" class="btn btn-success">

                            </div>
                            <div class="clearfix">

                            </div>



                    </form>

                    <div class="clearfix">

                    </div>
                    <div class="col-md-12">
                        <br>
                        <form enctype="multipart/form-data" method="post">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Attach Image</label>
                                        <input type="file" name="pic" required class="form-control" required value="">
                                    </div>
                                    <br>
                                    <input type="submit" name="save" class="btn btn-default" value="Update Image">
                        </form>
                    </div>
                </div>



            </div>
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
