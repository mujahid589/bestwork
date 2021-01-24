<?php
$msg="";
if (isset($_POST['submit'])) {
  extract($_POST);
  // $udata=  file_get_contents('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR']);
  // $data= json_decode($udata);
  // if($data){
  // $timezone= $data->timezone;
  // }
  $timezone="";
  $check=select("users","where email='$email'");
  $count=rows($check);
  if($count==1){
    $msg=error("Email Already Exists. Try <a href='login' style='color:black'>Login</a> ");
  }
  else {
    $checkUsername=select("users","where username='$uname'");
    $countUser=rows($checkUsername);
    if($countUser==1){
      $msg=error('Username already exists, Try another username');
    }
    else {
      if($type==1){
        $action=insert("users","name,username,email,password,timezone,type","'$name','$uname','$email','$password','$timezone','$type'");
        if($action){
          $id=lastid();
          $actpro=insert("profs","status,uid","'0',$id");
          $plid=lastid();
          $_SESSION['uid']=$id;
          $_SESSION['pid']=$plid;
          redirect('freelancer-dashboard');
        }
        else {
        $msg=  error("Something Went Wrong. Please Contact <a href='mailto:info@bestwork.pk'>Support</a> ". mysqli_error($db));
        }
      }
      else if ($type==2) {
        $action=insert("users","name,username,email,password,timezone,type","'$name','$uname','$email','$password','$timezone','$type'");
        if($action){
          $id=lastid();
          $actcli=insert("prof","status","'0'");
          $actpro=insert("clients","status,uid","'0',$id");
          $clid=lastid();
          $_SESSION['uid']=$id;
          $_SESSION['cid']=$clid;
          redirect('client-dashboard');
        }
        else {
          $msg=  error("Something Went Wrong. Please Contact <a href='mailto:info@bestwork.pk'>Support</a> ". mysqli_error($db));
        }
      }

    }
  }

}

if (!empty($msg)) {
  echo $msg;
}


// $udata= file_get_contents('http://ip-api.com/json/' . '110.39.174.66');
 ?>
