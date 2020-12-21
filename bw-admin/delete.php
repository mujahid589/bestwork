<?php
 include $_SERVER['DOCUMENT_ROOT'].'/database/db.php';
if (isset($_GET['mid'])) {
  $id=$_GET['mid'];
  $query=mysqli_query($db,"delete from messages where message_id='$id'");
  if($query){
    header('location:messages.php?check=1&message=Message deleted suscessfully');
  }
  else {
    header('location:messages.php?check=0&message=Something went wrong deleting message');
  }
}
if (isset($_GET['uid'])) {
  $id=$_GET['uid'];
  $query=mysqli_query($db,"delete from users where userid='$id'");
  if($query){
    header('location:users.php?check=1&message=User deleted suscessfully');
  }
  else {
    header('location:users.php?check=0&message=Something went wrong deleting user');
  }
}
 ?>
