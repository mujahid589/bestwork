<?php

if (isset($_POST['imgupdate'])){

    $file_name=$_FILES['pic']['name'];
    $file_tmp=$_FILES['pic']['tmp_name'];
    $upd=update('clients',"image='$file_name' where cid='$cid'");
    if($upd){
//        $msg=success('Profile Image updated successfully');
        move_uploaded_file($file_tmp,"media/users/clients/".$file_name);
        redirect('client-dashboard');
    }else{
        $msg=error('Something went wrong'. mysqli_error($db));
    }

}

?>