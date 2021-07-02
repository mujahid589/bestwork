<?php
session_start();
include '../database/db.php';
include "../app/functions/controller.php";

if (isset($_POST['purpose'])) {
  extract($_POST);
  $pid=$_SESSION['pid'];
  if($purpose=="saveJob"){

    $query=insert("saved_jobs","jobid,pid","'$jid','$pid'");
    if($query){
      echo "success";
    } else {
      echo "failed";
    }

  }

  if($purpose=="unsaveJob"){
    $query=delete("saved_jobs","where jobid='$jid' and pid='$pid'");
    if($query){
      echo "success";
    } else {
      echo "failed";
    }

  }



}


 ?>
