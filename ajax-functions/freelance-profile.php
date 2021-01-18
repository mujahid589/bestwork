<?php
include '../database/db.php';
include "../app/functions/controller.php";

if(isset($_GET['purpose'])){

  if($_GET['purpose']=="addLanguage"){
    extract($_GET);
    $checkexistance=select("languages","where uid='$uid' and language='$lang'");
    $count=rows($checkexistance);
    if($count==1){
        echo "exists";
    }else {
    $query=insert("languages","uid,language,level","'$uid','$lang','$level'");
    if($query){
      echo "success";
    }else {
      echo "failed";
    }
  }
  }


    if($_GET['purpose']=="delLanguage"){
      extract($_GET);
      $query=delete("languages","where uid='$uid' and lid='$lid'");
      if($query){
        echo "success";
      }else {
        echo "failed";
      }

    }



}

 ?>
