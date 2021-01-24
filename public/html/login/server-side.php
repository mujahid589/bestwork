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
        $uid=$data['uid'];
        if($type==1){
          $prof=select("profs","where uid='$uid'");
          $datapro=records($prof);
          $_SESSION['uid']=$uid;
          $_SESSION['pid']=$datapro['pid'];
          redirect("freelancer-dashboard");
        }
        else if($type==2){
          $client=select("clients","where uid='$uid'");
          $datacli=records($client);
          $_SESSION['uid']=$uid;
          $_SESSION['cid']=$datacli['cid'];
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
