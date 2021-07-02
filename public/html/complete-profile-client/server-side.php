<?php
$msg="";
$cid=$client['cid'];
$uid=$user['uid'];
if(isset($_POST['submit'])){
    extract($_POST);
        $query=update('clients',"name='$cname',country='$country',city='$city',description='$description',status='1' where cid='$cid' ");
    if($query){
//            $msg=success('Profile Updated Successfully');
        redirect('complete-profile');
        }else{
            $msg=error('Something went wrong while updating profile');
        }
}

if (isset($_POST['imgupdate'])){

    $file_name=$_FILES['pic']['name'];
    $file_tmp=$_FILES['pic']['tmp_name'];
    $upd=update('clients',"image='$file_name' where cid='$cid'");
    if($upd){
        $msg=success('Profile Image updated successfully');
        move_uploaded_file($file_tmp,"media/users/clients/".$file_name);
    }else{
        $msg=error('Something went wrong'. mysqli_error($db));
    }

}
if (isset($_POST['approval'])){

    $check=select('profile_requests',"where type='1' and uid='$cid'");
    $count=rows($check);
    if($count==1){
        $get=records($check);
        $rid=$get['req_id'];
        $att=$get['attempts'] + 1;
        $q=update('profile_requests',"attempts='$att', status='0' where uid='$uid' ");
        $u=update('clients',"status='2' where cid='$cid'");

        if ($q && $u){
//            $msg=success('Your profile has submitted for review. We will get back to you in 24 to 72 hours');
            redirect('client-dashboard');
        }else{
            error('Something went wrong, please try again later');
        }
    }else{
        $q=insert('profile_requests','type,attempts,uid,status',"'1','1','$uid','0'");
        $u=update('clients',"status='2' where cid='$cid'");
        if($q&&$u){
//            $msg=success('Your profile has submitted for review. We will get back to you in 24 to 72 hours');
            redirect('client-dashboard');
        }
    }


}

?>