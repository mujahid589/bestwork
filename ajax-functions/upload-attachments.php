<?php
session_start();
include '../database/db.php';
include "../app/functions/controller.php";
$jid=$_SESSION['jid'];
$target_dir = "../media/job-attachments/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
// $jid=$_GET['jobid'] ;
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
    $fname=$_FILES["file"]["name"] ;
    $q=insert("job_attachements","name,jobid","'$fname','$jid'");
    if ($q) {
      echo "success";
    }else {
      echo qerror();
    }
  }
