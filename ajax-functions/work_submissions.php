<?php
session_start();
include '../database/db.php';
include "../app/functions/controller.php";

extract($_POST);
if(isset($purpose)){


// Accept Delivery
  if ($purpose=="accWork") {
    $updateStatus=update("work_submissions","status='2' where subid='$id'");

    if($updateStatus){
      $getContract=select("work_submissions","where subid='$id'");
      $row=records($getContract);
      $ccid=$row['contractid'];

      // Updating Escrow Now
      $updateEscrow=update("escrow","status='1' where contarctid='$ccid'");
        if ($updateEscrow) {

          $getAmount=select("escrow","where contarctid='$ccid'");
          $erow=records($getAmount);
          $amount=$erow['amount'];
          $esid=$erow['esid'];
          $datetime=date('Y-m-d H:i:s') ;
          $clearDate=date('Y-m-d') ;
          $clearDate=date('Y-m-d', strtotime($clearDate. ' + 5 days'));

          // Updating Pending Balance
          $updateBalance=insert("pendingclearance","esid,contractid,pid,amount,datetime,clearance_at,status","'$esid','$ccid','$proid','$amount','$datetime','$clearDate','0'");
          if ($updateBalance) {
            echo "success";
          }
          else {
            echo "failedToClear";
          }
        }
        else {
          echo "failedToEscrow";
        }
    }
    else{
      echo "failedToUpdate";
    }
  }



  // Send Revision

  if ($purpose=="revWork") {
    $updateStatus=update("work_submissions","status='1' where subid='$id'");
    if($updateStatus){
      echo "success";
    }
    else {
      echo "failed";
    }
  }


}

?>
