<?php
function lastid(){
  $db=$GLOBALS['DB'];
  return mysqli_insert_id($db);
}
function rows($query){
  return mysqli_num_rows($query);
}
function records($query){
  return mysqli_fetch_array($query);
}
 ?>
