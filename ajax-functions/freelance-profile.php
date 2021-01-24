<?php
include '../database/db.php';
include "../app/functions/controller.php";

if(isset($_GET['purpose'])){

#Add Language

  if($_GET['purpose']=="addLanguage"){
    extract($_GET);
    $checkexistance=select("languages","where pid='$pid' and language='$lang'");
    $count=rows($checkexistance);
    if($count==1){
        echo "exists";
    }else {
    $query=insert("languages","pid,language,level","'$pid','$lang','$level'");
    if($query){
      echo lastid($query);
    }else {
      echo "failed";
    }
  }
  }

#Delete Language

    if($_GET['purpose']=="delLanguage"){
      extract($_GET);
      $query=delete("languages","where pid='$pid' and lid='$lid'");
      if($query){
        echo "success";
      }else {
        echo "failed";
      }

    }
#Add Experience

    if($_GET['purpose']=="addExperience"){
      extract($_GET);
      $query=insert("experience","title,company,location,datefrom,dateto,description,status,pid","'$title','$company','$location','$expst','$exped','$expdesc','1',$pid");
      if ($query) {
      }else {
        echo "failed";
      }
    }

}

 ?>
