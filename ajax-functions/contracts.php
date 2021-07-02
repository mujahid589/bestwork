<?php
include '../database/db.php';
include "../app/functions/controller.php";
extract($_POST);

if($purpose=="endCont"){

$change=update("contract","status='4' where conid='$id'");
  if($change){
    echo "success";
  }else {
    echo "failed";
  }
}




if($purpose=="cancelCont"){
  $change=update("contract","status='1' where conid='$id'");
    if($change){
      echo "success";
    }else {
      echo "failed";
    }
}

if($purpose=="cancelContFree"){
  $change=update("contract","status='2' where conid='$id'");
    if($change){
      echo "success";
    }else {
      echo "failed";
    }

}


if($purpose=="decCont"){
  $change=update("contract","status='3' where conid='$id'");
    if($change){
      echo "success";
    }else {
      echo "failed";
    }

}



 ?>
