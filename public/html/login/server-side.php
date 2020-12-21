<?php
$msg="";
if (isset($_POST['submit'])) {
  extract($_POST);
  $query=select("users","where username='$uname' or email='$uname'");
  $ifexists=rows($query);
  if($ifexists==1){
    $query=select("users","where (username='$uname' or email='$uname') and password='$password'");
    $ifexists=rows($query);
      if($ifexists==1){
        $data=records($query);
        $type=$data['type'];
        if($type==1){
          $_SESSION['pid']=$data['uid'];
          redirect("freelancer-dashboard");
        }
        else if($type==2){
          $_SESSION['cid']=$data['uid'];
          redirect("client-dashboard");
        }
      }else {
        $msg=error("Incorrect Password");
      }
  }else {
    $msg=error("There is no account associated with this username/email");
  }
}

 ?>
