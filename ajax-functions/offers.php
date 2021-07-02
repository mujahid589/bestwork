<?php
session_start();
include '../database/db.php';
include "../app/functions/controller.php";

if (isset($_POST['purpose'])) {
  $purpose=$_POST['purpose'];
  extract($_POST);
  if($purpose=="addOffer"){
    $query=insert("offer","ppid,pid,title,description,budget,deadline,status","'$ppid',$pid,'$title','$description','$budget','$deadline','0'");
    if($query){
      echo "success";
    }else {
      echo "failed" . qerror();
    }
  }
  if($purpose=="rOffer"){
  $q=delete("offer","where offid='$id'");
    if ($q) {
      echo "success";
    }else {
      echo "failed ".qerror();
    }
  }
}

if($purpose=="accOffer"){
$q=update("offer","status='1'where offid='$id'");
  if ($q) {
    $getDetails=select("offer","where offid='$id'");
    $pp=records($getDetails);
    $proid=$pp['pid'];
    $ppid=$pp['ppid'];
    $getDetailsPro=select("proposals","where ppid='$ppid'");
    $pj=records($getDetailsPro);
    $jid=$pj['jobid'];
    $getDetailsJob=select("jobs","where jobid='$jid'");
    $jj=records($getDetailsJob);
    $clientid=$jj['cid'];
    $datetime=date('Y-m-d H:i:s') ;

    $cnt=insert("contract","ppid,jid,cid,pid,offid,datetime,status","'$ppid','$jid','$clientid','$proid','$id','$datetime','0'");
    if ($cnt) {
      $lcid=lastid();
      $amount=$pp['budget'];
      $esc=insert("escrow","contarctid,amount,status","'$lcid','$amount','0'");
      if ($esc) {
        echo $lcid;
      }else {
        echo "failedToStart";
      }
    }else {
      echo "failedToContract";
    }
  }else {
    echo "failed";
  }
}



?>
