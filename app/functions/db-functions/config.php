<?php
// $user="";
function fLoggedin(){
if(isset($_SESSION['pid'])){
  $PID=$_SESSION['pid'];
  $GLOBALS['pid']=$PID;
  $getuserdata=select("users","where uid='$PID'");
  $GLOBALS['user']=records($getuserdata);
  return true;
  }
  else {
  return false;
}

}

function cLoggedin(){
if(isset($_SESSION['cid'])){
  $CID=$_SESSION['cid'];
  $GLOBALS['cid']=$CID;
  $getuserdata=select("users","where uid='$CID'");
  $GLOBALS['user']=records($getuserdata);
  return true;
}else {
   false;
}
}

 ?>
