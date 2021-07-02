<?php
if (isset($_POST['imgupdate'])){

    $file_name=$_FILES['pic']['name'];
    $file_tmp=$_FILES['pic']['tmp_name'];
    $upd=update('profs',"image='$file_name' where pid='$pid'");
    if($upd){
        $msg=success('Profile Image updated successfully');
        move_uploaded_file($file_tmp,"media/users/professionals/".$file_name);
        redirect("/my-profile");
    }else{
        $msg=error('Something went wrong');
    }

} ?>
