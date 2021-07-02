<?php
session_start();
include '../database/db.php';
include "../app/functions/controller.php";

extract($_POST);
if (isset($jobid)) {
  $con=select("connects","where pid='$pid'");
  $pcon=records($con);
  $sconnects=$pcon['total']-$connects;
  $upd=update("connects","total='$sconnects' where pid='$pid'");
  $datetime=date('Y-m-d H:i:s') ;
  $query=insert("proposals","jobid,pid,proposal,budget,deadline,datetime,status","'$jobid','$pid','$proposal','$budget','$deadline','$datetime','0'");
  if($query){
    echo "success";
  }else {
    echo "failed" .qerror();
  }
}


 ?>
