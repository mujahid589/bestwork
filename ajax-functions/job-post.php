<?php
session_start();
include '../database/db.php';
include "../app/functions/controller.php";

if (isset($_POST['purpose'])) {
  extract($_POST);

  $title=mysqli_real_escape_string($db,$title);
  $description=mysqli_real_escape_string($db,$description);
  $skill=mysqli_real_escape_string($db,$skill);
  $datetime=date('Y-m-d H:i:s') ;

$cid=$_SESSION['cid'];
  $query=insert("jobs","cid,jobtitle,description,skills,budget,time,connects,datetime","'$cid','$title','$description','$skill','$budget','$time','$connects','$datetime'");
  if ($query) {
    $jid=lastid();
    $_SESSION['jid']=$jid;
    echo $_SESSION['jid'];
    // echo "success";
  }else {
    echo "failed". qerror();
  }
}

?>
