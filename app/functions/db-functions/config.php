<?php
// $user="";
function fLoggedin(){
if(isset($_SESSION['uid']) && isset($_SESSION['pid'])){
  $UID=$_SESSION['uid'];
  $PID=$_SESSION['pid'];
  $GLOBALS['uid']=$UID;
  $GLOBALS['pid']=$PID;
  $getuserdata=select("users","where uid='$UID'");
  $GLOBALS['user']=records($getuserdata);
  $getprofdata=select("profs","where pid='$PID'");
  $GLOBALS['prof']=records($getprofdata);

  return true;
  }
  else {
  return false;
}

}

function cLoggedin(){
if(isset($_SESSION['uid']) && isset($_SESSION['cid'])){
  $UID=$_SESSION['uid'];
  $CID=$_SESSION['cid'];
  $GLOBALS['uid']=$UID;
  $GLOBALS['cid']=$CID;
  $getuserdata=select("users","where uid='$UID'");
  $GLOBALS['user']=records($getuserdata);
  $getclientdata=select("clients","where cid='$CID'");
  $GLOBALS['client']=records($getclientdata);
  return true;
}else {
  return false;
}
}

 ?>
